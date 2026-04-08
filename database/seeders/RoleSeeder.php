<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        /**
         * 1. LIMPIEZA DE CACHÉ DE PERMISOS
         */
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /**
         * 2. DEFINICIÓN DE PERMISOS BASE
         */
        $permissions = [
            'ver dashboard',
            'ver usuarios',
            'crear usuarios',
            'editar usuarios',
            'eliminar usuarios',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }

        /**
         * 3. CREACIÓN DEL ROL SUPER ADMIN
         */
        $roleAdmin = Role::updateOrCreate(['name' => 'Super Admin']);

        // Asignamos todos los permisos existentes al rol de Super Admin
        $roleAdmin->syncPermissions(Permission::all());

        /**
         * 4. GENERACIÓN DEL USUARIO ADMINISTRADOR
         * Cambiado a: admin@admin.com / admin
         */
        $admin = User::updateOrCreate(
            ['email' => 'admin@admin.com'], // Se recomienda usar formato email
            [
                'name' => 'Administrador Sistema',
                'password' => Hash::make('admin'), // Contraseña: admin
                'email_verified_at' => now(),
            ]
        );

        // Asignación del rol al usuario
        $admin->assignRole($roleAdmin);
    }
}