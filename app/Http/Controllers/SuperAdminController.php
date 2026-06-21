<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class SuperAdminController extends Controller
{
    public function index(): View
    {
        return view('super-admin.index', [
            'usersCount' => User::count(),
            'rolesCount' => Role::count(),
            'permissionsCount' => Permission::count(),
            'recentUsers' => User::with('roles')->latest()->limit(5)->get(),
        ]);
    }

    public function users(): View
    {
        return view('super-admin.users', [
            'users' => User::with(['roles', 'permissions'])->latest()->paginate(10),
            'roles' => Role::orderBy('name')->get(),
            'permissions' => Permission::orderBy('name')->get(),
        ]);
    }

    public function storeUser(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'roles' => ['required', 'array', 'min:1'],
            'roles.*' => ['required', Rule::exists('roles', 'name')->where('guard_name', 'web')],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,name'],
        ]);

        $roles = collect($validated['roles'])
            ->reject(fn (string $role): bool => $role === 'super admin')
            ->values()
            ->all();

        if ($roles === []) {
            return back()
                ->withErrors(['roles' => 'New user ko kam se kam ek non-super-admin role assign karein.'])
                ->withInput();
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified_at' => now(),
        ]);

        $user->assignRole($roles);
        $user->syncPermissions($validated['permissions'] ?? []);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return back()->with('status', "{$user->name} created successfully. Login: {$user->email} / Password: jo aapne set kiya.");
    }

    public function updateUserAccess(Request $request, User $user): RedirectResponse
    {
        if ($user->hasRole('super admin')) {
            return back()->with('status', 'Super Admin readonly mode me hai. Is user ka role ya permission change nahi ho sakta.');
        }

        $validated = $request->validate([
            'roles' => ['nullable', 'array'],
            'roles.*' => ['exists:roles,name'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,name'],
        ]);

        $roles = collect($validated['roles'] ?? [])->reject(fn (string $role): bool => $role === 'super admin')->values()->all();

        $user->syncRoles($roles);
        $user->syncPermissions($validated['permissions'] ?? []);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return back()->with('status', "{$user->name} access updated successfully.");
    }

    public function roles(): View
    {
        return view('super-admin.roles', [
            'roles' => Role::with('permissions')->orderBy('name')->get(),
            'permissions' => Permission::orderBy('name')->get(),
        ]);
    }

    public function storePermission(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:permissions,name'],
        ]);

        Permission::findOrCreate(strtolower(trim($validated['name'])), 'web');

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return back()->with('status', 'New permission created successfully. Super Admin ko ye permission automatically access hogi.');
    }

    public function updateRolePermissions(Request $request, Role $role): RedirectResponse
    {
        if ($role->name === 'super admin') {
            return back()->with('status', 'Super Admin role readonly mode me hai. Is role ki permissions change nahi ho sakti.');
        }

        $validated = $request->validate([
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,name'],
        ]);

        $role->syncPermissions($validated['permissions'] ?? []);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return back()->with('status', "{$role->name} permissions updated successfully.");
    }
}