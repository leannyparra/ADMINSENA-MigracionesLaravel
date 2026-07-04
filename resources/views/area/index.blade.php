@extends('Layout.app')

@section('content')
<div class="container my-5">
    
    <!-- Encabezado Principal -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="fw-bold text-dark m-0" style="font-size: 1.8rem; letter-spacing: -0.5px;">Áreas del Centro</h1>
            <p class="text-secondary small m-0 mt-1">Listado y administración de las áreas de formación.</p>
        </div>
        <!-- Botón Nueva Área adaptado a tu ruta area/create -->
        <div>
            <a href="{{ url('area/create') }}" class="btn text-white fw-semibold px-4 py-2 shadow-sm custom-btn-create" style="background-color: #39A900; font-size: 0.85rem; letter-spacing: 0.5px;">
                <i class="bi bi-plus-lg me-1"></i> NUEVA ÁREA
            </a>
        </div>
    </div>

    <!-- Bloque Principal Tipo Tarjeta Plana -->
    <div class="bg-white border rounded-3 shadow-sm overflow-hidden">
        
        <!-- Barra de Control Superior -->
        <div class="p-4 bg-light border-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <h5 class="fw-bold text-dark m-0" style="font-size: 1.05rem;">Listado de Áreas</h5>
            
            <!-- Buscador adaptado a tu lista area/list -->
            <form action="{{ url('area/list') }}" method="GET" class="d-flex align-items-center position-relative" style="max-width: 320px; width: 100%;">
                <input class="form-control bg-white border pe-5 py-2 small search-input-flat" type="search" name="search" placeholder="Buscar área..." value="{{ request('search') }}" style="font-size: 0.9rem; border-radius: 6px;">
                <button class="btn p-0 position-absolute end-0 me-3 d-flex align-items-center justify-content-center text-secondary opacity-75" type="submit" style="height: 100%;">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <!-- Tabla Reducida (Corregida con tus rutas exactas) -->
        <div class="table-responsive">
            <table class="table table-hover align-middle m-0 style-flat-table">
                <thead class="table-light text-secondary uppercase small fw-semibold border-bottom">
                    <tr>
                        <th class="px-4 py-3" style="width: 100px;">ID</th>
                        <th class="px-4 py-3">Nombre del Área</th>
                        <th class="px-4 py-3 text-end" style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse($areas as $area)
                        <tr>
                            <!-- ID -->
                            <td class="px-4 py-3 fw-medium text-secondary">#{{ $area->id }}</td>
                            
                            <!-- Nombre del Área -->
                            <td class="px-4 py-3 fw-semibold text-dark">
                                <a href="{{ url('area/' . $area->id) }}" class="text-decoration-none text-dark hover-link-sena">
                                    {{ $area->name }}
                                </a>
                            </td>
                            
                            <!-- Acciones -->
                            <td class="px-4 py-3 text-end">
                                <div class="d-inline-flex gap-2">
                                    <!-- 👁️ Botón del ojo corregido a tu ruta area/{id} -->
                                    <a href="{{ url('area/' . $area->id) }}" class="btn btn-sm btn-light border text-secondary px-2.5 py-1.5 custom-action-btn" title="Ver Detalles">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <!-- Icono de edición (Por si creas la ruta de editar en singular más adelante) -->
                                    <a href="{{ url('area/' . $area->id . '/edit') }}" class="btn btn-sm btn-light border text-secondary px-2.5 py-1.5 custom-action-btn" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-secondary">
                                <i class="bi bi-folder-x fs-1 opacity-50 d-block mb-2"></i>
                                No se encontraron áreas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        @if(method_exists($areas, 'links') && $areas->hasPages())
            <div class="p-4 bg-light border-top d-flex justify-content-center">
                {{ $areas->links() }}
            </div>
        @endif

    </div>
</div>

<!-- Estilos CSS -->
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