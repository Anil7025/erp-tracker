<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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