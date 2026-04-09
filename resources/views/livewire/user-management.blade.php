<div>
    <div class="card card-body mb-4">
        <div class="row g-3 d-flex align-items-center justify-content-between">
            <div class="col-12 col-md-5">
                <input wire:model.live.debounce.300ms="search" type="search" class="form-control" placeholder="Buscar usuarios...">
            </div>
            <div class="col-12 col-md-auto text-end">
                <button wire:click="create" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#userModal">
                    <i class="ph ph-plus-circle me-1"></i> Nuevo Usuario
                </button>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="bg-light text-dark text-uppercase small fw-bold">
                    <tr>
                        <th scope="col" wire:click="$set('orderBy', 'name')" class="cursor-pointer py-3 ps-4">
                            Nombre 
                            <i class="ph {{ $orderBy == 'name' ? ($isAsc ? 'ph-sort-ascending' : 'ph-sort-descending') : 'ph-arrows-down-up text-muted' }}"></i>
                        </th>
                        <th scope="col" wire:click="$set('orderBy', 'username')" class="cursor-pointer py-3">
                            Usuario
                            <i class="ph {{ $orderBy == 'username' ? ($isAsc ? 'ph-sort-ascending' : 'ph-sort-descending') : 'ph-arrows-down-up text-muted' }}"></i>
                        </th>
                        <th scope="col" class="py-3">Email</th>
                        <th scope="col" class="py-3">Rol</th>
                        <th scope="col" class="text-center py-3 pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=6c757d&color=fff&bold=true" class="rounded-circle me-3" width="36">
                                    <div>
                                        <span class="fw-bold text-dark d-block">{{ $user->name }}</span>
                                        <small class="text-muted">UID: {{ $user->id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-secondary border fw-medium px-2 py-1 text-lowercase">{{ $user->username ?? 'n/a' }}</span></td>
                            <td><span class="text-muted small">{{ $user->email }}</span></td>
                            <td>
                                @php $roleName = $user->roles->first()?->name; @endphp
                                <span class="badge rounded-pill {{ $roleName == 'Super Admin' ? 'bg-danger-subtle text-danger border border-danger' : 'bg-primary-subtle text-primary border border-primary' }} px-3 py-2">
                                    {{ $roleName ?? 'Sin Rol' }}
                                </span>
                            </td>
                            <td class="text-center pe-4">
                                <div class="btn-group shadow-sm">
                                    <button wire:click="edit({{ $user->id }})" class="btn btn-white btn-sm border" data-bs-toggle="modal" data-bs-target="#userModal" aria-label="Editar">
                                        <i class="ph ph-pencil-simple text-primary"></i>
                                    </button>
                                    <button wire:click="$dispatch('confirm-delete', { id: {{ $user->id }}, method: 'delete-user-confirmed' })" class="btn btn-white btn-sm border" aria-label="Eliminar">
                                        <i class="ph ph-trash text-danger"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <div class="py-4">
                                    <i class="ph ph-users-three fs-1 opacity-25 d-block mb-3"></i>
                                    <p class="mb-0">No se encontraron resultados para "{{ $search }}"</p>
                                    <button wire:click="$set('search', '')" class="btn btn-link btn-sm text-decoration-none">Limpiar búsqueda</button>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white border-0 py-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="small text-muted">
                    Mostrando {{ $users->firstItem() }} - {{ $users->lastItem() }} de {{ $users->total() }} registros
                </div>
                <div>
                    {{ $users->links(data: ['scrollTo' => false]) }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <div wire:ignore.self class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-bottom px-4">
                    <h5 class="modal-title fw-bold" id="userModalLabel">
                        <i class="ph {{ $userId ? 'ph-pencil' : 'ph-user-plus' }} me-2 text-primary"></i>
                        {{ $userId ? 'Propiedades del Usuario' : 'Nuevo Registro Operativo' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="$set('showModal', false)"></button>
                </div>
                <div class="modal-body p-4 bg-light-subtle">
                    <form wire:submit.prevent="save">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label small fw-bold text-uppercase">Nombre Completo</label>
                                <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Ej: Juan Pérez">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase">Usuario</label>
                                <input wire:model="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="min. 4 caracteres">
                                @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase">Rol</label>
                                <select wire:model="role" class="form-select @error('role') is-invalid @enderror">
                                    <option value="">Seleccionar...</option>
                                    @foreach($roles as $rol)
                                        <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                                    @endforeach
                                </select>
                                @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-bold text-uppercase">Correo Institucional</label>
                                <input wire:model="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="usuario@granja.com">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-bold text-uppercase">Contraseña</label>
                                <div class="input-group">
                                    <input wire:model="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ $userId ? 'Dejar vacío para no cambiar' : 'Definir contraseña inicial' }}">
                                    <span class="input-group-text bg-white"><i class="ph ph-lock"></i></span>
                                </div>
                                @error('password') <div class="invalid-feedback text-danger d-block mt-1 small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex gap-2 justify-content-end">
                            <button type="button" class="btn btn-link text-decoration-none text-muted fw-bold" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm" wire:loading.attr="disabled">
                                <span wire:loading.remove wire:target="save">Guardar Sistema</span>
                                <span wire:loading wire:target="save"><i class="ph ph-circle-notch fa-spin me-2"></i> Procesando...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
