@extends('Layout.app')

@section('content')
<div class="container py-4">
    <!-- Contenedor tipo Tarjeta (Card) -->
    <div class="card border-0 shadow-sm mx-auto" style="max-width: 800px; border-radius: 12px;">
        
        <!-- Encabezado de la Tarjeta -->
        <div class="card-header bg-white border-0 pt-4 px-4">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-pencil-square text-success fs-4"></i>
                <h3 class="m-0 fw-bold text-dark" style="letter-spacing: -0.5px;">Actualizar Aprendiz</h3>
            </div>
            <p class="text-muted small m-0 mt-1">Modifica los datos del aprendiz seleccionado en el sistema.</p>
        </div>

        <!-- Cuerpo del Formulario -->
        <div class="card-body p-4">
            <form action="{{ route('apprentice.update', $apprentice) }}" method="POST">
                @csrf
                @method('put')

                <div class="row g-3">
                    <!-- ID del Aprendiz (Solo Lectura) -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-secondary small">ID Aprendiz</label>
                        <input type="text" class="form-control bg-light border-0 fw-bold text-secondary text-center" value="#{{$apprentice->id}}" disabled>
                    </div>

                    <!-- Campo Nombre -->
                    <div class="col-md-8">
                        <label for="name" class="form-label fw-semibold text-dark small">Nombre Completo</label>
                        <input type="text" id="name" name="name" class="form-control border-secondary-subtle" value="{{ old('name', $apprentice->name)}}" required>
                    </div>

                    <!-- Campo Email -->
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-semibold text-dark small">Correo Electrónico</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-secondary-subtle text-muted"><i class="bi bi-envelope"></i></span>
                            <input type="email" id="email" name="email" class="form-control border-secondary-subtle" value="{{ old('email', $apprentice->email)}}" required>
                        </div>
                    </div>

                    <!-- Campo Teléfono -->
                    <div class="col-md-6">
                        <label for="cell_number" class="form-label fw-semibold text-dark small">Teléfono Móvil</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-secondary-subtle text-muted"><i class="bi bi-telephone"></i></span>
                            <input type="text" id="cell_number" name="cell_number" class="form-control border-secondary-subtle" value="{{ old('cell_number', $apprentice->cell_number) }}">
                        </div>
                    </div>

                    <!-- Selector: Curso o Ficha -->
                    <div class="col-md-6">
                        <label for="course_id" class="form-label fw-semibold text-dark small">Curso o Ficha</label>
                        <select id="course_id" name="course_id" class="form-select border-secondary-subtle" required>
                            <option value="">-- Selecciona un Curso --</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id', $apprentice->course_id) == $course->id ? 'selected' : '' }}>
                                    Ficha {{ $course->course_number }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Selector: Computador Asignado -->
                    <div class="col-md-6">
                        <label for="computer_id" class="form-label fw-semibold text-dark small">Computador Asignado</label>
                        <select id="computer_id" name="computer_id" class="form-select border-secondary-subtle">
                            <option value="">-- Sin Computador --</option>
                            @foreach($computers as $computer)
                                <option value="{{ $computer->id }}" {{ old('computer_id', $apprentice->computer_id) == $computer->id ? 'selected' : '' }}>
                                    💻 Computador #{{ $computer->id }}
                                </option>
                            @endforeach
                        </select>
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

<!-- Pequeño bloque de estilos para transiciones y pulido visual -->
<style>
    .form-control:focus, .form-select:focus {
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