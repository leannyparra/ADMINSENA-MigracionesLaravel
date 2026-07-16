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

                        <td class="px-4 py-3 text-end align-middle">
                            <div class="d-inline-flex align-items-center justify-content-end gap-2">
                                
                                <!-- 👁️ Botón del ojo (Ver Detalles) -->
                                <a href="{{ route('area.show', $area->id) }}" 
                                class="btn btn-sm btn-light border text-secondary custom-action-btn" 
                                title="Ver Detalles">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <!-- 📝 Botón de edición (Editar) -->
                                <a href="{{ route('area.edit', $area->id) }}" 
                                class="btn btn-sm btn-light border text-secondary custom-action-btn" 
                                title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <!-- 🗑️ Formulario de eliminación (Sin márgenes que lo desalineen) -->
                                <form action="{{ route('area.destroy', $area->id) }}" method="POST" class="m-0 p-0 d-inline-flex">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-delete-custom" title="Eliminar Area" onclick="return confirm('¿Estás seguro de que deseas eliminar esta area?')">
                                        <!-- Icono de papelera en SVG puro -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 20px; height: 20px;">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>

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

    .hover-link-sena:hover {
        color: #39A900 !important;
    }

    /* Unificamos el tamaño y diseño de los botones de Ver y Editar con el de Eliminar */
.custom-action-btn {
    background-color: #ffffff !important;
    width: 40px;
    height: 40px;
    border-radius: 10px !important; /* Esquinas suavizadas idénticas al botón rojo */
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    padding: 0; /* Quita paddings internos para centrado perfecto */
}

.custom-action-btn:hover {
    background-color: #f4f4f4 !important;
    color: #39A900 !important;
    border-color: #39A900 !important;
}

/* El botón de eliminar se mantiene consistente */
.btn-delete-custom {
    background-color: #fef2f2; /* Fondo rojo/crema muy suave */
    color: #ef4444;            /* Icono rojo */
    border: 1px solid #fee2e2;  /* Borde sutil */
    width: 40px;
    height: 40px;
    border-radius: 10px;       /* Esquinas suavizadas */
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    padding: 0;                
}

.btn-delete-custom:hover {
    background-color: #ef4444; /* Se llena de rojo al pasar el mouse */
    color: #ffffff;            /* El icono se vuelve blanco */
    border-color: #ef4444;
}
</style>
@endsection