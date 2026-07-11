@extends('Layout.app')

@section('content')
<div class="container py-4">
    <!-- Contenedor tipo Tarjeta (Card) - Ajustado a un ancho ideal para formularios cortos -->
    <div class="card border-0 shadow-sm mx-auto" style="max-width: 600px; border-radius: 12px;">
        
        <!-- Encabezado de la Tarjeta -->
        <div class="card-header bg-white border-0 pt-4 px-4">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-layers text-success fs-4"></i>
                <h3 class="m-0 fw-bold text-dark" style="letter-spacing: -0.5px;">Actualizar Área</h3>
            </div>
            <p class="text-muted small m-0 mt-1">Modifica el nombre del área o ambiente en el sistema.</p>
        </div>

        <!-- Cuerpo del Formulario -->
        <div class="card-body p-4">
            <form action="{{ route('area.update', $area) }}" method="POST">
                @csrf
                @method('put')

                <div class="row g-3">
                    <!-- Campo Nombre del Área -->
                    <div class="col-12">
                        <label for="name" class="form-label fw-semibold text-dark small">Nombre del Área</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-secondary-subtle text-muted">
                                <i class="bi bi-tag"></i>
                            </span>
                            <input type="text" id="name" name="name" class="form-control border-secondary-subtle" value="{{ old('name', $area->name) }}" placeholder="Ej. Redes, Desarrollo de Software" required>
                        </div>
                    </div>
                </div>

                <!-- Separador -->
                <hr class="text-black-50 my-4">

                <!-- Botones de Acción de la parte inferior -->
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <a href="{{ url()->previous() }}" class="btn fw-semibold px-4 py-2 border text-secondary bg-white shadow-sm custom-btn-cancel" style="font-size: 0.85rem; letter-spacing: 0.5px; border-radius: 8px;">
                        VOLVER
                    </a>
                    
                    <button type="submit" class="btn text-white fw-semibold px-4 py-2 shadow-sm custom-btn-submit" style="background-color: #39A900; font-size: 0.85rem; letter-spacing: 0.5px; border-radius: 8px;">
                        GUARDAR CAMBIOS <i class="bi bi-check-circle ms-1"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Estilos integrados para mantener la consistencia del grupo -->
<style>
    .form-control:focus {
        border-color: #39A900 !important;
        box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15) !important;
    }
    .custom-btn-cancel:hover {
        background-color: #f8fafc !important;
        color: #1e293b !important;
    }
    .custom-btn-submit:hover {
        background-color: #2e8800 !important;
        box-shadow: 0 4px 12px rgba(57, 169, 0, 0.2) !important;
    }
</style>
@endsection