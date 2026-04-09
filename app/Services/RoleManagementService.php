<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Skill 798: Improve Codebase Architecture
 * This service centralizes Role and Permission management, making the system 
 * more maintainable and easier to scale or refactor.
 */
class RoleManagementService
{
    /**
     * Synchronize a list of permissions.
     */
    public function syncPermissions(array $permissions): void
    {
        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }
    }

    /**
     * Create or update a role and assign permissions to it.
     */
    public function setupRole(string $roleName, array $permissions = []): Role
    {
        $role = Role::updateOrCreate(['name' => $roleName]);
        
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        } else {
            // If permissions empty, assign all current ones
            $role->syncPermissions(Permission::all());
        }

        return $role;
    }

    /**
     * Create a system administrator.
     */
    public function createAdmin(string $name, string $email, string $username, string $password): User
    {
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'username' => $username,
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ]
        );

        $user->assignRole('Super Admin');

        return $user;
    }

    /**
     * Clear Spatie permission cache.
     */
    public function clearCache(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
