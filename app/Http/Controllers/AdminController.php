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

class AdminController extends Controller
{
    private const MANAGED_ROLES = ['manager', 'hr', 'staff', 'user'];

    public function index(): View
    {
        return view('admin.index', [
            'managedRoles' => self::MANAGED_ROLES,
            'usersCount' => User::role(self::MANAGED_ROLES)->count(),
            'roles' => Role::whereIn('name', self::MANAGED_ROLES)->withCount('users')->orderBy('name')->get(),
        ]);
    }

    public function users(): View
    {
        return view('admin.users', [
            'users' => User::role(self::MANAGED_ROLES)->with('roles')->latest()->paginate(10),
            'managedRoles' => self::MANAGED_ROLES,
        ]);
    }

    public function storeUser(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', Rule::in(self::MANAGED_ROLES)],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified_at' => now(),
        ]);

        $user->assignRole($validated['role']);

        return back()->with('status', "{$user->name} created as {$validated['role']} successfully.");
    }

    public function updateUserRole(Request $request, User $user): RedirectResponse
    {
        if ($user->hasRole(['super admin', 'admin'])) {
            return back()->with('status', 'Admin panel se Super Admin ya Admin user change nahi ho sakta.');
        }

        $validated = $request->validate([
            'role' => ['required', Rule::in(self::MANAGED_ROLES)],
        ]);

        $user->syncRoles([$validated['role']]);

        return back()->with('status', "{$user->name} role updated successfully.");
    }

    public function roles(): View
    {
        return view('admin.roles', [
            'roles' => Role::whereIn('name', self::MANAGED_ROLES)->with('permissions')->orderBy('name')->get(),
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

        return back()->with('status', 'New permission created successfully. Ab aap is permission ko managed roles me assign kar sakte hain.');
    }

    public function updateRolePermissions(Request $request, Role $role): RedirectResponse
    {
        if (! in_array($role->name, self::MANAGED_ROLES, true)) {
            return back()->with('status', 'Admin sirf Manager, HR, Staff aur User roles ki permissions manage kar sakta hai.');
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