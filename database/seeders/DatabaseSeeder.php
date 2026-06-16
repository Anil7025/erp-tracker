<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'view dashboard',
            'manage users',
            'manage roles',
            'manage employees',
            'manage attendance',
            'manage payroll',
            'manage projects',
            'manage tasks',
            'view reports',
            'manage profile',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission, 'web');
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $rolePermissions = [
            'super admin' => $permissions,
            'admin' => [
                'view dashboard',
                'manage users',
                'manage employees',
                'manage attendance',
                'manage projects',
                'manage tasks',
                'view reports',
                'manage profile',
            ],
            'hr' => [
                'view dashboard',
                'manage employees',
                'manage attendance',
                'manage payroll',
                'view reports',
                'manage profile',
            ],
            'manager' => [
                'view dashboard',
                'manage projects',
                'manage tasks',
                'view reports',
                'manage profile',
            ],
            'staff' => [
                'view dashboard',
                'manage tasks',
                'manage profile',
            ],
            'user' => [
                'view dashboard',
                'manage profile',
            ],
        ];

        foreach ($rolePermissions as $roleName => $rolePermissionNames) {
            Role::findOrCreate($roleName, 'web')->syncPermissions($rolePermissionNames);
        }

        $superAdmin = User::updateOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        $superAdmin->assignRole('super admin');

        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        $admin->assignRole('admin');
    }
}
