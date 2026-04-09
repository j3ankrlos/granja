<div class="container-fluid py-4">
    <!-- Fila 1 de Tarjetas -->
    <div class="row g-4 mb-4">
        <!-- Inventario A002 -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card bg-grad-blue">
                <div class="stat-card-label">Inventario A002</div>
                <div class="stat-card-value">{{ $data['inventarioA002Count'] }}</div>
                <div class="stat-card-sub">Productos Totales</div>
                <i class="ph ph-hard-drive stat-card-icon"></i>
            </div>
        </div>

        <!-- Inventario A006 -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card bg-grad-green">
                <div class="stat-card-label">Inventario A006</div>
                <div class="stat-card-value">{{ $data['inventarioA006Count'] }}</div>
                <div class="stat-card-sub">Productos Totales</div>
                <i class="ph ph-stack stat-card-icon"></i>
            </div>
        </div>

        <!-- Solicitudes Pendientes -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card bg-grad-orange">
                <div class="stat-card-label">Solicitudes Pendientes</div>
                <div class="stat-card-value">{{ $data['solicitudesPendientesCount'] }}</div>
                <div class="stat-card-sub">Requieren Aprobación</div>
                <i class="ph ph-paper-plane-tilt stat-card-icon"></i>
            </div>
        </div>

        <!-- Alertas Stock A006 -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card bg-grad-red">
                <div class="stat-card-label">Alertas Stock A006</div>
                <div class="stat-card-value">{{ $data['alertasStockA006Count'] }}</div>
                <div class="stat-card-sub">Productos Críticos</div>
                <i class="ph ph-warning stat-card-icon"></i>
            </div>
        </div>
    </div>

    <!-- Fila 2 de Tarjetas -->
    <div class="row g-4 mb-4">
        <!-- Personal Activo -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card bg-grad-teal">
                <div class="stat-card-label">Personal Activo</div>
                <div class="stat-card-value">{{ $data['personalActivoCount'] }}</div>
                <div class="stat-card-sub">Empleados Registrados</div>
                <i class="ph ph-users-three stat-card-icon"></i>
            </div>
        </div>

        <!-- En Reposo -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card bg-grad-purple">
                <div class="stat-card-label">En Reposo</div>
                <div class="stat-card-value">{{ $data['enReposoCount'] }}</div>
                <div class="stat-card-sub">Total Granja</div>
                <i class="ph ph-first-aid stat-card-icon"></i>
            </div>
        </div>

        <!-- Vacaciones -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card bg-grad-pink">
                <div class="stat-card-label">Vacaciones</div>
                <div class="stat-card-value">{{ $data['vacacionesCount'] }}</div>
                <div class="stat-card-sub">Total Granja</div>
                <i class="ph ph-airplane stat-card-icon"></i>
            </div>
        </div>

        <!-- Regresos Pendientes -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card bg-grad-dark-orange">
                <div class="stat-card-label">Regresos Pendientes</div>
                <div class="stat-card-value">{{ $data['regresosPendientesCount'] }}</div>
                <div class="stat-card-sub">Sin confirmar regreso</div>
                <i class="ph ph-clock-counter-clockwise stat-card-icon"></i>
            </div>
        </div>
    </div>

    <!-- Sección Inferior: Actividad y Accesos -->
    <div class="row g-4">
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center">
                            <i class="ph ph-history fs-4 text-primary me-2"></i>
                            <h5 class="card-title mb-0 fw-bold">Actividad Reciente</h5>
                        </div>
                        <button class="btn btn-outline-primary btn-sm px-3 rounded-pill fw-bold">Ver todo</button>
                    </div>

                    <div class="text-center py-5">
                        <i class="ph ph-file-search display-1 text-muted opacity-25 mb-3"></i>
                        <p class="text-muted mb-0">No hay actividad reciente.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center">
                            <i class="ph ph-lightning fs-4 text-warning me-2"></i>
                            <h5 class="card-title mb-0 fw-bold">Accesos Directos</h5>
                        </div>
                        <span class="badge bg-light text-muted fw-bold">Top más usados</span>
                    </div>

                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action border-0 px-0 mb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-danger-subtle text-danger rounded-3 p-2 me-3"
                                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="ph ph-calendar-check fs-5"></i>
                                    </div>
                                    <span class="fw-bold text-dark">Registrar Asistencia</span>
                                </div>
                                <i class="ph ph-arrow-right text-muted"></i>
                            </div>
                        </a>

                        <a href="/users" wire:navigate
                            class="list-group-item list-group-item-action border-0 px-0 mb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary-subtle text-primary rounded-3 p-2 me-3"
                                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="ph ph-users-three fs-5"></i>
                                    </div>
                                    <span class="fw-bold text-dark">Gestión de Usuarios</span>
                                </div>
                                <i class="ph ph-arrow-right text-muted"></i>
                            </div>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action border-0 px-0 mb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info-subtle text-info rounded-3 p-2 me-3"
                                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="ph ph-hard-drive fs-5"></i>
                                    </div>
                                    <span class="fw-bold text-dark">Inventario A002</span>
                                </div>
                                <i class="ph ph-arrow-right text-muted"></i>
                            </div>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action border-0 px-0 mb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success-subtle text-success rounded-3 p-2 me-3"
                                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="ph ph-stack fs-5"></i>
                                    </div>
                                    <span class="fw-bold text-dark">Inventario A006</span>
                                </div>
                                <i class="ph ph-arrow-right text-muted"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>