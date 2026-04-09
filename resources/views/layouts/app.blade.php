<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Granja Porcina') }}</title>

    <!-- Fonts: Skill 793 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons: Skill 790 -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- Styles / Scripts: Skill 790 (Bootstrap 5 via Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @livewireStyles
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar Inteligente: Skill 790 & 793 -->
        <nav id="sidebar" role="navigation" aria-label="Menú Principal">
            <div class="sidebar-header d-flex align-items-center justify-content-center py-4">
                <div class="logo-full fw-bold text-white fs-4">
                    <span class="text-warning">Granja</span>Control
                </div>
                <div class="logo-mini text-warning fs-3" style="display: none;">
                    <i class="ph-fill ph-piggy-bank"></i>
                </div>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" wire:navigate title="Dashboard">
                        <i class="ph ph-house"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('users*') ? 'active' : '' }}">
                    <a href="{{ url('/users') }}" wire:navigate title="Usuarios">
                        <i class="ph ph-users-three"></i> <span>Gestión Usuarios</span>
                    </a>
                </li>

                <div class="sidebar-divider my-3 mx-3 opacity-25 border-top border-white d-block d-collapsed-none"></div>

                <li>
                    <a href="#" title="Inventario">
                        <i class="ph ph-package"></i> <span>Inventario</span>
                    </a>
                </li>
                <li>
                    <a href="#" title="Partos">
                        <i class="ph ph-calendar-check"></i> <span>Registro Partos</span>
                    </a>
                </li>
                <li>
                    <a href="#" title="Reportes">
                        <i class="ph ph-chart-line-up"></i> <span>Reportes</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg top-navbar sticky-top">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-light rounded-circle shadow-sm me-3" style="width: 40px; height: 40px;">
                        <i class="ph ph-list fs-5"></i>
                    </button>

                    <div class="ms-auto d-flex align-items-center">
                        @auth
                            <div class="dropdown">
                                <button class="btn btn-link text-dark text-decoration-none dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0284c7&color=fff" class="rounded-circle me-2" width="32">
                                    <span class="fw-semibold small d-none d-md-inline">{{ auth()->user()->name }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                    <li><a class="dropdown-item" href="#"><i class="ph ph-user me-2"></i> Perfil</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="ph ph-sign-out me-2"></i> Cerrar Sesión
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>

            <!-- Main Content Area: Skill 799 -->
            <main class="p-4" role="main">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                        <i class="ph ph-check-circle me-2"></i> {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @livewireScripts
    
    <!-- Sidebar Logic: Skill 793 -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('sidebarCollapse');
            const sidebar = document.getElementById('sidebar');
            
            // Cargar estado previo
            if (localStorage.getItem('sidebar-collapsed') === 'true') {
                sidebar.classList.add('collapsed');
            }

            btn.addEventListener('click', function () {
                sidebar.classList.toggle('collapsed');
                localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('collapsed'));
            });
        });
    </script>
</body>
</html>
