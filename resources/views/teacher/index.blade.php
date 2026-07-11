@extends('Layout.app')

@section('content')
<div class="container my-5">
    
    <!-- Encabezado Principal -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="fw-bold text-dark m-0" style="font-size: 1.8rem; letter-spacing: -0.5px;">Instructores</h1>
            <p class="text-secondary small m-0 mt-1">Gestión, datos de contacto y asignación de áreas para el personal docente.</p>
        </div>
        <!-- Botón Nuevo Instructor (Ruta en singular) -->
        <div>
            <a href="{{ url('teacher/create') }}" class="btn text-white fw-semibold px-4 py-2 shadow-sm custom-btn-create" style="background-color: #39A900; font-size: 0.85rem; letter-spacing: 0.5px;">
                <i class="bi bi-plus-lg me-1"></i> NUEVO INSTRUCTOR
            </a>
        </div>
    </div>

    <!-- Bloque Principal Tipo Tarjeta Plana -->
    <div class="bg-white border rounded-3 shadow-sm overflow-hidden">
        
        <!-- Barra de Control Superior -->
        <div class="p-4 bg-light border-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <h5 class="fw-bold text-dark m-0" style="font-size: 1.05rem;">Listado de Instructores</h5>
            
            <!-- Buscador adaptado a tu lista teacher/list -->
            <form action="{{ url('teacher/list') }}" method="GET" class="d-flex align-items-center position-relative" style="max-width: 320px; width: 100%;">
                <input class="form-control bg-white border pe-5 py-2 small search-input-flat" type="search" name="search" placeholder="Buscar por nombre o correo..." value="{{ request('search') }}" style="font-size: 0.9rem; border-radius: 6px;">
                <button class="btn p-0 position-absolute end-0 me-3 d-flex align-items-center justify-content-center text-secondary opacity-75" type="submit" style="height: 100%;">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <!-- Tabla Plana de Instructores -->
        <div class="table-responsive">
            <table class="table table-hover align-middle m-0 style-flat-table">
                <thead class="table-light text-secondary uppercase small fw-semibold border-bottom">
                    <tr>
                        <th class="px-4 py-3" style="width: 80px;">ID</th>
                        <th class="px-4 py-3">Nombre Instructor</th>
                        <th class="px-4 py-3">Correo Electrónico</th>
                        <th class="px-4 py-3">Área</th>
                        <th class="px-4 py-3">Centro de Formacion</th>
                        <th class="px-4 py-3 text-end" style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse($teachers as $teacher)
                        <tr>
                            <!-- ID de Registro -->
                            <td class="px-4 py-3 text-secondary fw-medium">#{{ $teacher->id }}</td>
                            
                            <!-- Nombre (name) con link al Show -->
                            <td class="px-4 py-3 fw-bold text-dark">
                                <a href="{{ url('teacher/' . $teacher->id) }}" class="text-decoration-none text-dark hover-link-sena">
                                    <i class="bi bi-person-badge me-2 text-secondary"></i> {{ $teacher->name }}
                                </a>
                            </td>
                            
                            <!-- Correo Electrónico (email) -->
                            <td class="px-4 py-3 text-secondary" style="font-size: 0.95rem;">
                                {{ $teacher->email }}
                            </td>
                            
                            <!-- Área (area_id - Asumiendo relación 'area' en el modelo) -->
                            <td class="px-4 py-3 text-secondary">
                                <span class="badge bg-light text-dark border px-2 py-1" style="font-size: 0.85rem; font-weight: 500;">
                                    {{ $teacher->area->name}}
                                </span>
                            </td>
                                                        
                            <!-- Centro -->
                            <td class="px-4 py-3 text-secondary">
                                <span class="badge bg-light text-dark border px-2 py-1.5 fw-normal" style="font-size: 0.85rem; border-radius: 6px;">
                                    {{ $teacher->training_Center?->name ?? 'Sin Centro' }}
                                </span>
                            </td>
                            
                            <!-- Acciones en singular (teacher/{id}) -->
                            <td class="px-4 py-3 text-end">
                                <div class="d-inline-flex gap-2">
                                    <!-- 👁️ Ver detalles (Show) -->
                                    <a href="{{ route('teacher.show', $teacher->id) }}" class="btn btn-sm btn-light border text-secondary px-2.5 py-1.5 custom-action-btn" title="Ver Detalles">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <!-- Editar (Edit) -->
                                    <a href="{{ route('teacher.edit', $teacher->id)}}" class="btn btn-sm btn-light border text-secondary px-2.5 py-1.5 custom-action-btn" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-secondary">
                                <i class="bi bi-people fs-1 opacity-50 d-block mb-2"></i>
                                No se encontraron instructores registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        @if(method_exists($teachers, 'links') && $teachers->hasPages())
            <div class="p-4 bg-light border-top d-flex justify-content-center">
                {{ $teachers->links() }}
            </div>
        @endif

    </div>
</div>

<!-- Estilos CSS unificados -->
<style>
    .custom-btn-create:hover {
        background-color: #2e8500 !important;
    }

    .search-input-flat:focus {
        border-color: #39A900 !important;
        box-shadow: 0 0 0 3px rgba(57, 169, 0, 0.15) !important;
    }

    .style-flat-table th {
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        background-color: #f8f9fa;
    }
    
    .style-flat-table tr {
        border-bottom: 1px solid #efefef;
    }

    .custom-action-btn {
        background-color: #ffffff !important;
        transition: all 0.2s ease;
    }
    .custom-action-btn:hover {
        background-color: #f4f4f4 !important;
        color: #39A900 !important;
        border-color: #39A900 !important;
    }

    .hover-link-sena:hover {
        color: #39A900 !important;
    }
</style>
@endsection