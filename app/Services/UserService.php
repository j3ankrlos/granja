<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

/**
 * Skill 798: Improve Codebase Architecture
 * Este servicio encapsula la lógica de los usuarios para mantener los componentes
 * Livewire limpios y enfocados solo en la interfaz.
 */
class UserService
{
    /**
     * Obtener usuarios con filtros.
     */
    public function getFilteredUsers(string $search = '', string $orderBy = 'id', string $direction = 'desc', int $perPage = 10)
    {
        return User::with('roles')
            ->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('username', 'like', "%{$search}%");
            })
            ->orderBy($orderBy, $direction)
            ->paginate($perPage);
    }

    /**
     * Crear o actualizar un usuario.
     */
    public function saveUser(array $data, ?int $userId = null): User
    {
        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
        ];

        if (!empty($data['password'])) {
            $userData['password'] = Hash::make($data['password']);
        }

        $user = User::updateOrCreate(['id' => $userId], $userData);
        
        if (isset($data['role'])) {
            $user->syncRoles([$data['role']]);
        }

        return $user;
    }

    /**
     * Eliminar un usuario de forma segura.
     */
    public function deleteUser(int $id): bool
    {
        $user = User::findOrFail($id);
        
        // No permitir borrarse a sí mismo
        if ($user->id === auth()->id()) {
            return false;
        }

        return $user->delete();
    }

    /**
     * Obtener todos los roles disponibles.
     */
    public function getAvailableRoles(): Collection
    {
        return Role::all();
    }
}
