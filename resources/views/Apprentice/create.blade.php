@extends('Layout.app')

@section('content')
<div class="card shadow-sm p-4">
    <h1 class="mb-4 h3 text-dark">Registrar Nuevo Aprendiz</h1>
    
    <form action="{{ route('apprentice.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label fw-medium">Nombre del Aprendiz:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-medium">Correo Electrónico:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-medium">Número de Celular:</label>
            <input type="text" name="cell_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-medium">Curso / Ficha:</label>
            <select name="course_id" class="form-select" required>
                <option value="">-- Seleccione un Curso --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label fw-medium">Computador Asignado:</label>
            <select name="computer_id" class="form-select" required>
                <option value="">-- Seleccione un Computador --</option>
                @foreach($computers as $computer)
                    <option value="{{ $computer->id }}">Equipo #{{ $computer->number }} - {{ $computer->brand }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success px-4" style="background-color: #39A900; border: none;">Guardar Aprendiz</button>
    </form>
</div>
@endsection