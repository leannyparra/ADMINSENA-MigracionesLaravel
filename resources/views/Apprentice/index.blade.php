@extends('Layout.app')

@section('content')
<div class="container mt-5">

    <!-- Encabezado de la sección (Título + Botón) -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-dark m-0" style="font-size: 2rem; letter-spacing: -0.5px;">Aprendices</h1>
        
        <a href="{{ route('apprentice.create') }}" class="btn text-white fw-semibold rounded-pill px-4 shadow-sm" style="background-color: #39A900; font-size: 0.9rem;">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Aprendiz
        </a>
    </div>

    <!-- Estructura de la Tabla Flotante estilo image_654541.png -->
    <div class="table-responsive">
        <table class="table align-middle" style="border-collapse: separate; border-spacing: 0 12px;">
            <thead>
                <tr class="text-secondary opacity-75" style="font-size: 0.85rem; letter-spacing: 0.5px; border: none;">
                    <th class="border-0 ps-4" style="width: 80px;">ID</th>
                    <th class="border-0">Nombre Completo</th>
                    <th class="border-0">Correo Electrónico</th>
                    <th class="border-0">Teléfono</th>
                    <th class="border-0 text-center">Curso</th>
                    <th class="border-0 text-center">Equipo</th>
                    <th class="border-0 text-center pe-4" style="width: 100px;">Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($apprentices as $apprentice)
                <tr class="bg-white shadow-sm custom-row-card">
                    
                    <!-- ID con esquina redondeada izquierda -->
                    <td class="ps-4 fw-bold text-secondary border-0 py-3 style-left-radius">
                        #{{ $apprentice->id }}
                    </td>
                    
                    <!-- Avatar con Iniciales + Nombre -->
                    <td class="fw-bold text-dark border-0 py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 36px; height: 36px; background-color: #e2f5d3; color: #1e5a00; font-size: 0.85rem;">
                                {{ strtoupper(substr($apprentice->name, 0, 2)) }}
                            </div>
                            <span>{{ $apprentice->name }}</span>
                        </div>
                    </td>
                    
                    <!-- Email -->
                    <td class="text-secondary border-0 py-3" style="font-size: 0.9rem;">
                        {{ $apprentice->email }}
                    </td>
                    
                    <!-- Teléfono -->
                    <td class="text-secondary border-0 py-3" style="font-size: 0.9rem;">
                        {{ $apprentice->cell_number }}
                    </td>
                    
                    <!-- Curso -->
                    <td class="text-center border-0 py-3">
                        <span class="badge rounded-pill bg-light text-dark border px-3 py-2 fw-medium" style="font-size: 0.8rem;">
                            Ficha {{ $apprentice->course_id }}
                        </span>
                    </td>
                    
                    <!-- Equipo -->
                    <td class="text-center border-0 py-3">
                        <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #e2f5d3; color: #236602; font-size: 0.8rem;">
                            <i class="bi bi-laptop me-1"></i> Pc {{ $apprentice->computer_id }}
                        </span>
                    </td>
                    
                    <!-- Botón de tres puntos (...) para Ver Detalle -->
                    <td class="text-center pe-4 border-0 py-3 style-right-radius">
                        <a href="{{ route('apprentice.show', $apprentice->id) }}" class="btn btn-light rounded-circle border d-inline-flex align-items-center justify-content-center shadow-sm hover-dots-btn" style="width: 38px; height: 38px;" title="Ver Detalle">
                            <i class="bi bi-three-dots text-secondary fs-5"></i>
                        </a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<!-- Estilos exclusivos para las filas separadas -->
<style>
    /* Hace que las filas se separen entre sí físicamente */
    body {
    background-color: #f4f5f6 !important;
}
    .table {
        border-collapse: separate !important;
        border-spacing: 0 12px !important;
    }

    /* Redondea las esquinas exteriores de la fila completa */
    .style-left-radius {
        border-top-left-radius: 12px !important;
        border-bottom-left-radius: 12px !important;
    }
    .style-right-radius {
        border-top-right-radius: 12px !important;
        border-bottom-right-radius: 12px !important;
    }

    /* Efecto de elevación al pasar el mouse por encima */
    .custom-row-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .custom-row-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.05) !important;
    }

    /* Hover para el botón de tres puntos */
    .hover-dots-btn:hover {
        background-color: #39A900 !important;
        border-color: #39A900 !important;
    }
    .hover-dots-btn:hover i {
        color: white !important;
    }
</style>
@endsection