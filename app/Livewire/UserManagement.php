<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use App\Services\UserService;

class UserManagement extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 10;
    public string $orderBy = 'id';
    public bool $isAsc = false;
    
    public bool $showModal = false;
    public $userId; 
    public string $name = '';
    public string $email = '';
    public string $username = '';
    public string $password = '';
    public $role = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1]
    ];

    public function updatingSearch() { $this->resetPage(); }

    public function rules() {
        return [
            'name' => 'required|min:3|max:100',
            'email' => "required|email|unique:users,email,{$this->userId}",
            'username' => "required|min:4|unique:users,username,{$this->userId}",
            'password' => $this->userId ? 'nullable|min:6' : 'required|min:6',
            'role' => 'required|exists:roles,name'
        ];
    }

    public function create() {
        $this->reset(['userId', 'name', 'email', 'username', 'password', 'role']);
        $this->showModal = true;
    }

    public function edit(User $user) {
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username ?? '';
        $this->role = $user->roles->first()?->name ?? '';
        $this->showModal = true;
    }

    public function save(UserService $userService) {
        $data = $this->validate();

        $user = $userService->saveUser($data, $this->userId);

        $this->showModal = false;
        
        $this->dispatch('notify', [
            'icon' => 'success',
            'title' => $this->userId ? 'Usuario Actualizado' : 'Usuario Creado',
            'text' => "El usuario {$user->name} ha sido procesado correctamente."
        ]);
        
        $this->reset(['userId', 'name', 'email', 'username', 'password', 'role']);
    }

    #[On('delete-user-confirmed')]
    public function delete($id, UserService $userService) {
        if ($userService->deleteUser($id)) {
            $this->dispatch('notify', [
                'icon' => 'success', 
                'title' => 'Eliminado', 
                'text' => 'El registro ha sido removido del sistema.'
            ]);
        } else {
            $this->dispatch('notify', [
                'icon' => 'error', 
                'title' => 'Acción no permitida', 
                'text' => 'No puedes eliminar tu propia cuenta operativa.'
            ]);
        }
    }

    public function render(UserService $userService)
    {
        $users = $userService->getFilteredUsers(
            $this->search, 
            $this->orderBy, 
            $this->isAsc ? 'asc' : 'desc', 
            $this->perPage
        );

        return view('livewire.user-management', [
            'users' => $users,
            'roles' => $userService->getAvailableRoles(),
        ])->title('Gestión de Usuarios');
    }
}
