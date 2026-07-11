@extends('Layout.app')

@section('content')
<div class="container my-5">
    
    <!-- Encabezado Principal -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="fw-bold text-dark m-0" style="font-size: 1.8rem; letter-spacing: -0.5px;">Programas / Fichas</h1>
        </div>
        <div>
            <a href="{{ url('course/create') }}" class="btn text-white fw-semibold px-4 py-2 shadow-sm custom-btn-create" style="background-color: #39A900; font-size: 0.85rem; letter-spacing: 0.5px; border-radius: 8px;">
                NUEVA FICHA
            </a>
        </div>
    </div>

    <!-- Bloque Principal Tipo Tarjeta Plana -->
    <div class="bg-white border rounded-3 shadow-sm overflow-hidden">
        
        <!-- Barra de Control Superior -->
        <div class="p-4 bg-light border-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <h5 class="fw-bold text-dark m-0" style="font-size: 1.05rem;">Listado</h5>
            
            <!-- Buscador -->
            <form action="{{ url('course/list') }}" method="GET" class="d-flex align-items-center position-relative" style="max-width: 320px; width: 100%;">
                <input class="form-control bg-white border pe-5 py-2 small search-input-flat" type="search" name="search" placeholder="Buscar..." value="{{ request('search') }}" style="font-size: 0.9rem; border-radius: 6px;">
                <button class="btn p-0 position-absolute end-0 me-3 d-flex align-items-center justify-content-center text-secondary opacity-75" type="submit" style="height: 100%; background: none; border: none;">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <!-- Tabla Plana de Cursos -->
        <div class="table-responsive">
            <table class="table table-hover align-middle m-0 style-flat-table">
                <thead class="table-light text-secondary uppercase small fw-semibold border-bottom">
                    <tr>
                        <th class="px-4 py-3" style="width: 90px;">ID</th>
                        <th class="px-4 py-3">Número de Ficha</th>
                        <th class="px-4 py-3">Jornada</th>
                        <th class="px-4 py-3">Área</th>
                        <th class="px-4 py-3">Centro de Formación</th>
                        <th class="px-4 py-3 text-end" style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse($courses as $course)
                        <tr>
                            <!-- ID -->
                            <td class="px-4 py-3 text-secondary fw-medium">#{{ $course->id }}</td>
                            
                            <!-- Ficha -->
                            <td class="px-4 py-3 fw-bold text-dark">
                                <a href="{{ url('course/' . $course->id) }}" class="text-decoration-none text-dark hover-link-sena">
                                    {{ $course->course_number }}
                                </a>
                            </td>
                            
                            <!-- Jornada -->
                            <td class="px-4 py-3 text-secondary" style="font-size: 0.95rem;">
                                {{ $course->day }}
                            </td>
                            
                            <!-- Área -->
                            <td class="px-4 py-3 text-secondary">
                                {{ $course->area?->name }}
                            </td>
                            
                            <!-- Centro -->
                            <td class="px-4 py-3 text-secondary">
                                <span class="badge bg-light text-dark border px-2 py-1.5 fw-normal" style="font-size: 0.85rem; border-radius: 6px;">
                                    {{ $course->training_Center?->name }}
                                </span>
                            </td>
                            
                            <!-- Acciones -->
                            <td class="px-4 py-3 text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('course.show', $course->id) }}" class="btn btn-sm btn-light border text-secondary px-2.5 py-1.5 custom-action-btn" style="border-radius: 6px;">
                                        Ver
                                    </a>
                                    <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-light border text-secondary px-2.5 py-1.5 custom-action-btn" style="border-radius: 6px;">
                                        Editar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-secondary">
                                No se encontraron cursos o fichas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        @if(method_exists($courses, 'links'))
            <div class="p-4 bg-light border-top d-flex justify-content-center">
                {{ $courses->links() }}
            </div>
        @endif

    </div>
</div>

<!-- Estilos CSS Personalizados -->
<style>
    .custom-btn-create {
        transition: background-color 0.2s ease, transform 0.1s ease;
    }
    .custom-btn-create:hover {
        background-color: #2e8500 !important;
    }
    .custom-btn-create:active {
        transform: scale(0.98);
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

    .hover-link-sena {
        transition: color 0.15s ease;
    }
    .hover-link-sena:hover {
        color: #39A900 !important;
    }
</style>
@endsection