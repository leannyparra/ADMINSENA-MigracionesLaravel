<!-- Navbar completamente plano de pantalla completa (colores institucionales) -->
<nav class="navbar navbar-expand-lg bg-white border-bottom py-3 style-flat-navbar">
    <div class="container-fluid px-4 px-md-5">
        
        <!-- Logotipo Institucional -->
        <a class="navbar-brand d-flex align-items-center fw-bold m-0 text-dark" href="{{ url('/') }}" style="font-size: 1.4rem;">
            <i class="bi bi-shield-check me-2" style="color: #39A900; font-size: 1.6rem;"></i>
            <span>Admin<span style="color: #39A900;">SENA</span></span>
        </a>

        <!-- Botón Móvil -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flatNavbarSena" aria-controls="flatNavbarSena" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú de Navegación -->
        <div class="collapse navbar-collapse" id="flatNavbarSena">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-5 gap-3">
                
                <!-- Inicio -->
                <li class="nav-item">
                    <a class="nav-link px-2 {{ Request::is('/') ? 'active fw-bold text-dark position-relative active-green-line' : 'fw-medium text-secondary hover-dark-link' }}" 
                       href="{{ url('/') }}">
                       Inicio
                    </a>
                </li>
                
                <!-- Gestión Base -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-medium px-2 {{ Request::is('training-center*') ? 'active fw-bold text-dark position-relative active-green-line' : 'text-secondary hover-dark-link' }}" 
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestión Base
                    </a>
                    <ul class="dropdown-menu border shadow-sm mt-2">
                        <li>
                            <a class="dropdown-item {{ Request::is('training-center*') ? 'bg-light fw-bold text-success' : '' }}" 
                               href="{{ route('trainingCenter.index') }}">
                               Centros de Formación
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ Request::is('area*') ? 'bg-light fw-bold text-success' : '' }}" 
                               href="{{ route('area.index') }}">
                               Areas
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ Request::is('computer*') ? 'bg-light fw-bold text-success' : '' }}" 
                               href="{{ route('computer.index') }}">
                               Equipos
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Operación Académica -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-medium px-2 {{ (Request::is('teacher*') || Request::is('course*')) ? 'active fw-bold text-dark position-relative active-green-line' : 'text-secondary hover-dark-link' }}" 
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Operación Académica
                    </a>
                    <ul class="dropdown-menu border shadow-sm mt-2">
                        <li>
                            <a class="dropdown-item {{ Request::is('teacher*') ? 'bg-light fw-bold text-success' : '' }}" 
                               href="{{ url('teacher/list') }}">
                               Instructores
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ Request::is('course*') ? 'bg-light fw-bold text-success' : '' }}" 
                               href="{{ url('course/list') }}">
                               Cursos / Fichas
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ Request::is('apprentice*') ? 'bg-light fw-bold text-success' : '' }}" 
                               href="{{ url('apprentice/list') }}">
                               Aprendices
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Buscador general -->
            <form class="d-flex align-items-center justify-content-end position-relative" role="search" style="max-width: 320px; width: 100%;">
                <input class="form-control rounded-start-pill bg-light border-0 pe-5 py-2" type="search" placeholder="Buscar..." aria-label="Search" style="font-size: 0.95rem;">
                <button class="btn rounded-end-pill position-absolute end-0 top-0 h-100 px-4 d-flex align-items-center justify-content-center text-white" type="submit" style="background-color: #39A900;">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            
        </div>
    </div>
</nav>

<!-- Estilos para forzar el diseño plano de lado a lado -->
<style>
    .style-flat-navbar {
        width: 100vw !important;
        position: relative !important;
        left: 50% !important;
        right: 50% !important;
        margin-left: -50vw !important;
        margin-right: -50vw !important;
        box-shadow: none !important;
    }

    /* Línea verde inferior para el link activo */
    .active-green-line::after {
        content: '';
        position: absolute;
        bottom: -6px;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: #39A900;
        border-radius: 2px;
    }

    .hover-dark-link:hover {
        color: #212529 !important;
    }
</style>