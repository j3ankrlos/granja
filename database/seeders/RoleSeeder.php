<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\RoleManagementService;

class RoleSeeder extends Seeder
{
    public function run(RoleManagementService $roleService): void
    {
        // 1. Limpieza de caché
        $roleService->clearCache();

        // 2. Permisos base
        $permissions = [
            'ver dashboard',
            'ver usuarios',
            'crear usuarios',
            'editar usuarios',
            'eliminar usuarios',
        ];
        $roleService->syncPermissions($permissions);

        // 3. Setup del Rol Admin
        $roleService->setupRole('Super Admin');

        // 4. Crear usuario administrador inicial
        $roleService->createAdmin(
            'Administrador Sistema',
            'admin@admin.com',
            'admin',
            'admin'
        );
    }
}