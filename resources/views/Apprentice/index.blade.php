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
                    
                    <td class="text-center border-0 py-3 style-right-radius align-middle">
                        <div class="table-actions">
                            <!-- Botón Ver Detalle (Ojo) -->
                            <a href="{{ route('apprentice.show', $apprentice->id) }}" 
                            class="action-btn btn-view" 
                            title="Ver Detalle">
                                <i class="bi bi-eye"></i>
                            </a>
                        
                            <!-- Botón Editar (Lápiz - Color SENA) -->
                            <a href="{{ route('apprentice.edit', $apprentice->id) }}" 
                            class="action-btn btn-edit" 
                            title="Editar Aprendiz">
                                <i class="bi bi-pencil"></i>
                            </a>

                        <form action="{{ route('apprentice.destroy', $apprentice->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-delete-custom" title="Eliminar Aprendiz" onclick="return confirm('¿Estás seguro de que deseas eliminar este aprendiz?')">
                                <!-- Icono de papelera en SVG puro (Nunca se va a romper) -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 20px; height: 20px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </form>
                     

                        </div>
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
    /* Contenedor horizontal en la celda */
    .table-actions {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px; /* Separación perfecta entre los dos botones */
        vertical-align: middle;
    }

    /* Base redonda y limpia para ambos botones */
    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 8px; /* Combina con el estilo redondeado de tu diseño */
        font-size: 1.1rem;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
    }

    /* 1. Botón de Ver (Estilo sutil / Neutral) */
    .btn-view {
        background-color: #f1f5f9;
        color: #475569;
        border: 1px solid #e2e8f0;
    }

    .btn-view:hover {
        background-color: #e2e8f0;
        color: #0f172a;
        transform: translateY(-1px);
    }

    /* 2. Botón de Editar (Fondo Verde SENA suave o sólido) */
    .btn-edit {
        background-color: #e8f5e9; /* Un verde clarito de fondo que combina con tus badges */
        color: #39A900;            /* El verde corporativo en el icono */
        border: 1px solid #c8e6c9;
    }

    .btn-edit:hover {
        background-color: #39A900; /* Se vuelve sólido al pasar el mouse */
        color: #ffffff;            /* El icono pasa a blanco */
        border-color: #39A900;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(57, 169, 0, 0.2);
    }
    .btn-delete-custom {
        background-color: #fef2f2; /* Fondo rojo/crema muy suave */
        color: #ef4444;            /* Icono rojo */
        border: 1px solid #fee2e2;  /* Borde sutil */
        width: 40px;
        height: 40px;
        border-radius: 10px;       /* Esquinas suavizadas idénticas al botón verde */
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        padding: 0;                /* Quita el padding de Bootstrap que lo volvía óvalo */
    }

    .btn-delete-custom:hover {
        background-color: #ef4444; /* Se llena de rojo al pasar el mouse */
        color: #ffffff;            /* El icono se vuelve blanco */
        border-color: #ef4444;
    }
</style>
@endsection