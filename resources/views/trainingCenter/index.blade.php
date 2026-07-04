@extends('Layout.app')

@section('content')
<div class="container my-5">
    
    <!-- Encabezado Principal -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="fw-bold text-dark m-0" style="font-size: 1.8rem; letter-spacing: -0.5px;">Centros de Formación</h1>
            <p class="text-secondary small m-0 mt-1">Administración de sedes, complejos y centros de aprendizaje.</p>
        </div>
        <!-- Botón Nuevo Centro CORREGIDO a tu ruta con guion medio -->
        <div>
            <a href="{{ url('training-center/create') }}" class="btn text-white fw-semibold px-4 py-2 shadow-sm custom-btn-create" style="background-color: #39A900; font-size: 0.85rem; letter-spacing: 0.5px;">
                <i class="bi bi-plus-lg me-1"></i> NUEVO CENTRO
            </a>
        </div>
    </div>

    <!-- Bloque Principal Tipo Tarjeta Plana -->
    <div class="bg-white border rounded-3 shadow-sm overflow-hidden">
        
        <!-- Barra de Control Superior -->
        <div class="p-4 bg-light border-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <h5 class="fw-bold text-dark m-0" style="font-size: 1.05rem;">Sedes Registradas</h5>
            
            <!-- Buscador adaptado a tu lista training-center/list -->
            <form action="{{ url('training-center/list') }}" method="GET" class="d-flex align-items-center position-relative" style="max-width: 320px; width: 100%;">
                <input class="form-control bg-white border pe-5 py-2 small search-input-flat" type="search" name="search" placeholder="Buscar por nombre o ubicación..." value="{{ request('search') }}" style="font-size: 0.9rem; border-radius: 6px;">
                <button class="btn p-0 position-absolute end-0 me-3 d-flex align-items-center justify-content-center text-secondary opacity-75" type="submit" style="height: 100%;">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <!-- Tabla Plana de Centros de Formación -->
        <div class="table-responsive">
            <table class="table table-hover align-middle m-0 style-flat-table">
                <thead class="table-light text-secondary uppercase small fw-semibold border-bottom">
                    <tr>
                        <th class="px-4 py-3" style="width: 90px;">ID</th>
                        <th class="px-4 py-3">Nombre del Centro</th>
                        <th class="px-4 py-3">Ubicación / Dirección</th>
                        <th class="px-4 py-3 text-end" style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse($trainingCenters as $center)
                        <tr>
                            <!-- ID de Registro -->
                            <td class="px-4 py-3 text-secondary fw-medium">#{{ $center->id }}</td>
                            
                            <!-- Nombre (name) con link al Show -->
                            <td class="px-4 py-3 fw-bold text-dark">
                                <a href="{{ url('training-center/' . $center->id) }}" class="text-decoration-none text-dark hover-link-sena">
                                    <i class="bi bi-building me-2 text-secondary"></i> {{ $center->name }}
                                </a>
                            </td>
                            
                            <!-- Ubicación (location) -->
                            <td class="px-4 py-3 text-secondary" style="font-size: 0.95rem;">
                                <i class="bi bi-geo-alt me-1 text-muted"></i> {{ $center->location }}
                            </td>
                            
                            <!-- Acciones CORREGIDAS a training-center/{id} -->
                            <td class="px-4 py-3 text-end">
                                <div class="d-inline-flex gap-2">
                                    <!-- 👁️ Botón del ojo arreglado -->
                                    <a href="{{ url('training-center/' . $center->id) }}" class="btn btn-sm btn-light border text-secondary px-2.5 py-1.5 custom-action-btn" title="Ver Detalles">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <!-- Enlace de edición preparado con guion medio -->
                                    <a href="{{ url('training-center/' . $center->id . '/edit') }}" class="btn btn-sm btn-light border text-secondary px-2.5 py-1.5 custom-action-btn" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-secondary">
                                <i class="bi bi-building-dash fs-1 opacity-50 d-block mb-2"></i>
                                No se encontraron centros de formación registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        @if(method_exists($trainingCenters, 'links') && $trainingCenters->hasPages())
            <div class="p-4 bg-light border-top d-flex justify-content-center">
                {{ $trainingCenters->links() }}
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