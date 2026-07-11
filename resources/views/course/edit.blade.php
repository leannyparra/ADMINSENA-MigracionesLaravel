@extends('Layout.app')

@section('content')
<div class="container py-4">
    <!-- Contenedor tipo Tarjeta (Card) -->
    <div class="card border-0 shadow-sm mx-auto" style="max-width: 700px; border-radius: 12px;">
        
        <!-- Encabezado de la Tarjeta -->
        <div class="card-header bg-white border-0 pt-4 px-4">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-journal-bookmark text-success fs-4"></i>
                <h3 class="m-0 fw-bold text-dark" style="letter-spacing: -0.5px;">Editar Programa / Ficha</h3>
            </div>
            <p class="text-muted small m-0 mt-1">Actualiza la información, jornada y relaciones de la ficha seleccionada.</p>
        </div>

        <!-- Cuerpo del Formulario -->
        <div class="card-body p-4">
            <form action="{{ route('course.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- ID del Curso -->
                <input type="hidden" name="id" value="{{ $course->id }}">

                <div class="row g-3">
                    <!-- Número de Ficha -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark small">Número de Ficha:</label>
                        <input type="text" name="course_number" class="form-control border-secondary-subtle" value="{{ old('course_number', $course->course_number) }}">
                    </div>

                    <!-- Jornada -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark small">Jornada:</label>
                        <input type="text" name="day" class="form-control border-secondary-subtle" value="{{ old('day', $course->day) }}">
                    </div>

                    <!-- Área -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark small">Área:</label>
                        <select name="area_id" class="form-select border-secondary-subtle">
                            <option value="">Seleccione un área...</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}" {{ old('area_id', $course->area_id) == $area->id ? 'selected' : '' }}>
                                    {{ $area->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Centro de Formación -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark small">Centro de Formación:</label>
                        <select name="training_center_id" class="form-select border-secondary-subtle">
                            <option value="">Seleccione un centro...</option>
                            @foreach($training_centers as $center)
                                <option value="{{ $center->id }}" {{ old('training_center_id', $course->training_center_id) == $center->id ? 'selected' : '' }}>
                                    {{ $center->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Separador -->
                <hr class="text-black-50 my-4">

                <!-- Botones de Acción de la parte inferior -->
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <a href="{{ url('course/list') }}" class="btn fw-semibold px-4 py-2 border text-secondary bg-white shadow-sm custom-btn-cancel" style="font-size: 0.85rem; letter-spacing: 0.5px; border-radius: 8px;">
                        Cancelar
                    </a>
                    
                    <button type="submit" class="btn text-white fw-semibold px-4 py-2 shadow-sm custom-btn-submit" style="background-color: #39A900; font-size: 0.85rem; letter-spacing: 0.5px; border-radius: 8px;">
                        Actualizar Ficha
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Estilos integrados para consistencia visual -->
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