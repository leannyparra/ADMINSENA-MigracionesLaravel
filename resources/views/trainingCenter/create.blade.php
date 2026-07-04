@extends('Layout.app')

@section('content')
<div class="container my-5">
    
    <!-- Encabezado Principal -->
    <div class="mb-4">
        <h1 class="fw-bold text-dark m-0" style="font-size: 1.8rem; letter-spacing: -0.5px;">Registrar Centro de Formación</h1>
        <p class="text-secondary small m-0 mt-1">Ingrese los datos para dar de alta una nueva sede o complejo de aprendizaje.</p>
    </div>

    <!-- Bloque Principal Tipo Tarjeta Plana -->
    <div class="bg-white border rounded-3 shadow-sm overflow-hidden" style="max-width: 650px;">
        
        <!-- Pestaña Única Superior -->
        <div class="bg-light border-bottom px-4 py-3">
            <span class="fw-semibold d-flex align-items-center gap-2" style="color: #39A900;">
                <i class="bi bi-building-add fs-5"></i> Formulario de Registro
            </span>
        </div>

        <!-- Formulario (Ruta Corregida a tu web.php) -->
        <form action="{{ route('trainingCenter.store') }}" method="POST" class="m-0">
            @csrf

            <div class="p-4 p-md-5">
                <div class="row g-4">
                    
                    <!-- Nombre del Centro (name) -->
                    <div class="col-12">
                        <label for="name" class="form-label text-secondary small fw-semibold mb-1">Nombre del Centro de Formación</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Ej. Centro de Comercio y Servicios" style="font-size: 0.95rem; border-radius: 6px;" required>
                        @error('name')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Ubicación (location) -->
                    <div class="col-12">
                        <label for="location" class="form-label text-secondary small fw-semibold mb-1">Ubicación / Dirección Regional</label>
                        <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" placeholder="Ej. Calle 4 # 2-30, Popayán" style="font-size: 0.95rem; border-radius: 6px;" required>
                        @error('location')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>

            <!-- Barra de Botones Inferior -->
            <div class="bg-light border-top p-4 d-flex justify-content-end gap-3">
                <a href="{{ url('training-center/list') }}" class="btn fw-semibold px-4 py-2 border text-secondary bg-white shadow-sm custom-btn-cancel" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                    CANCELAR
                </a>
                <button type="submit" class="btn text-white fw-semibold px-4 py-2 shadow-sm custom-btn-continue" style="background-color: #39A900; font-size: 0.85rem; letter-spacing: 0.5px;">
                    GUARDAR CENTRO <i class="bi bi-check-lg ms-1"></i>
                </button>
            </div>

        </form>

    </div>
</div>

<!-- Estilos CSS -->
<style>
    .form-control:focus {
        border-color: #39A900 !important;
        box-shadow: 0 0 0 3px rgba(57, 169, 0, 0.15) !important;
    }

    .custom-btn-cancel:hover {
        background-color: #f8f9fa !important;
        color: #212529 !important;
    }

    .custom-btn-continue:hover {
        background-color: #2e8500 !important;
    }
</style>
@endsection