@extends('Layout.app')

@section('content')
<div class="container my-5">
    
    <!-- Encabezado Principal estilo image_663109.png -->
    <div class="mb-4">
        <h1 class="fw-bold text-dark m-0" style="font-size: 1.8rem; letter-spacing: -0.5px;">Detalle del Aprendiz</h1>
    </div>

    <!-- Bloque Principal Tipo Tarjeta Plana -->
    <div class="bg-white border rounded-3 shadow-sm overflow-hidden">
        
        <!-- Sistema de Pestañas Superiores (Tabs) idéntico a la imagen -->
        <ul class="nav nav-tabs row g-0 text-center border-bottom bg-light list-unstyled m-0" id="apprenticeTab" role="tablist">
            <li class="nav-item col-md-4" role="presentation">
                <button class="nav-link w-100 py-3 active fw-semibold d-flex align-items-center justify-content-center gap-2 custom-tab-btn" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="true">
                    <i class="bi bi-check-circle-fill text-success fs-5"></i> Información Personal
                </button>
            </li>
            <li class="nav-item col-md-4" role="presentation">
                <button class="nav-link w-100 py-3 fw-semibold text-secondary d-flex align-items-center justify-content-center gap-2 custom-tab-btn" id="academic-tab" data-bs-toggle="tab" data-bs-target="#academic" type="button" role="tab" aria-controls="academic" aria-selected="false">
                    <i class="bi bi-circle text-muted fs-5"></i> Detalles Académicos
                </button>
            </li>
            <li class="nav-item col-md-4" role="presentation">
                <button class="nav-link w-100 py-3 fw-semibold text-secondary d-flex align-items-center justify-content-center gap-2 custom-tab-btn" id="hardware-tab" data-bs-toggle="tab" data-bs-target="#hardware" type="button" role="tab" aria-controls="hardware" aria-selected="false">
                    <i class="bi bi-circle text-muted fs-5"></i> Equipo Asignado
                </button>
            </li>
        </ul>

        <!-- Contenido de las Pestañas (Modo Lectura / Formulario Bloqueado) -->
        <div class="tab-content p-4 p-md-5" id="apprenticeTabContent">
            
            <!-- PESTAÑA 1: INFORMACIÓN PERSONAL -->
            <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                <h5 class="fw-bold text-dark mb-4" style="font-size: 1.1rem;">Datos de Perfil</h5>
                
                <div class="row g-4">
                    <!-- Nombre -->
                    <div class="col-md-6">
                        <label class="form-label text-secondary small fw-semibold m-0 mb-1">Nombre Completo</label>
                        <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-medium">
                            {{ $apprentice->name }}
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-md-6">
                        <label class="form-label text-secondary small fw-semibold m-0 mb-1">Correo Electrónico</label>
                        <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark">
                            {{ $apprentice->email }}
                        </div>
                    </div>
                    <!-- Teléfono -->
                    <div class="col-md-6">
                        <label class="form-label text-secondary small fw-semibold m-0 mb-1">Número de Teléfono</label>
                        <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark">
                            {{ $apprentice->cell_number }}
                        </div>
                    </div>
                    <!-- Fecha de Registro -->
<!-- Fecha de Registro (Corregida para evitar el error de valor null) -->
<div class="col-md-6">
    <label class="form-label text-secondary small fw-semibold m-0 mb-1">Fecha de Registro</label>
    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark">
        {{ $apprentice->created_at ? $apprentice->created_at->format('d/m/Y - h:i A') : 'No registrada' }}
    </div>
</div>
                </div>
            </div>

            <!-- PESTAÑA 2: DETALLES ACADÉMICOS -->
            <div class="tab-pane fade" id="academic" role="tabpanel" aria-labelledby="academic-tab">
                <h5 class="fw-bold text-dark mb-4" style="font-size: 1.1rem;">Información del Programa</h5>
                
                <div class="row g-4">
                    <!-- Ficha/Curso -->
                    <div class="col-md-6">
                        <label class="form-label text-secondary small fw-semibold m-0 mb-1">Código de Ficha (Curso)</label>
                        <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-bold">
                            {{ $apprentice->course_id }}
                        </div>
                    </div>
                    <!-- Estado Académico simulando los inputs select de la imagen -->
                    <div class="col-md-6">
                        <label class="form-label text-secondary small fw-semibold m-0 mb-1">Estado en Plataforma</label>
                        <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark d-flex align-items-center gap-2">
                            <span class="badge bg-success rounded-circle p-1" style="width: 8px; height: 8px;"></span> Formación Activa
                        </div>
                    </div>
                </div>
            </div>

            <!-- PESTAÑA 3: EQUIPO ASIGNADO -->
            <div class="tab-pane fade" id="hardware" role="tabpanel" aria-labelledby="hardware-tab">
                <h5 class="fw-bold text-dark mb-4" style="font-size: 1.1rem;">Infraestructura y Cómputo</h5>
                
                <div class="row g-4">
                    <!-- ID del Computador -->
                    <div class="col-md-6">
                        <label class="form-label text-secondary small fw-semibold m-0 mb-1">Código del Computador Asignado</label>
                        <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-medium">
                            <i class="bi bi-laptop me-2 text-secondary"></i> Computador #{{ $apprentice->computer_id }}
                        </div>
                    </div>
                    <!-- Ambiente de formación -->
                    <div class="col-md-6">
                        <label class="form-label text-secondary small fw-semibold m-0 mb-1">Ambiente Relacionado</label>
                        <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark">
                            Ambiente de Desarrollo de Software (ADSO)
                        </div>
                    </div>
                </div>
            </div>

        </div>

<!-- Barra de Botones Inferior Derecha (Corregida para evitar errores de rutas) -->
        <div class="bg-light border-top p-4 d-flex justify-content-end gap-3">
            <!-- Regresa a la raíz o listado anterior usando URL limpia -->
            <a href="{{ url()->previous() }}" class="btn fw-semibold px-4 py-2 border text-secondary bg-white shadow-sm custom-btn-cancel" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                VOLVER
            </a>
            <!-- Envía a la URL de edición usando la ID de manera segura -->
            <a href="{{ url('/aprendices/' . $apprentice->id . '/edit') }}" class="btn text-white fw-semibold px-4 py-2 shadow-sm custom-btn-continue" style="background-color: #39A900; font-size: 0.85rem; letter-spacing: 0.5px;">
                EDITAR APRENDIZ <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

    </div>
</div>

<!-- Estilos para lograr los bordes e indicadores de pestañas exactos -->
<style>
    /* Estilos del sistema de tabs plano */
    .custom-tab-btn {
        border: none !important;
        border-radius: 0 !important;
        background: transparent !important;
        transition: all 0.2s ease;
    }
    
    /* Pestaña activa: le da la línea verde inferior idéntica a la imagen */
    .custom-tab-btn.active {
        color: #39A900 !important;
        border-bottom: 3px solid #39A900 !important;
        background-color: #ffffff !important;
    }

    /* Campos de texto deshabilitados para simular formulario limpio */
    .form-control-plaintext {
        border: 1px solid #dee2e6 !important;
        font-size: 0.95rem;
    }

    /* Efectos hover para los botones de acción estilo image_663109.png */
    .custom-btn-cancel:hover {
        background-color: #f8f9fa !important;
        color: #212529 !important;
    }
    .custom-btn-continue:hover {
        background-color: #2e8500 !important;
    }
</style>
@endsection