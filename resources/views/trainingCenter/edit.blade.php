@extends('Layout.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm" style="border-radius: 8px;">
                <div class="card-header bg-white border-0 pt-4 pb-2">
                    <h5 class="fw-bold text-dark mb-0">Editar Centro de Formación</h5>
                    <p class="text-muted small mb-0">Modifica los detalles del centro institucional.</p>
                </div>

                <div class="card-body pt-3">
                    <form action="{{ route('trainingCenter.update', $trainingCenter->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Directiva obligatoria para actualizaciones --}}

                        <!-- Campo Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label text-secondary small fw-bold">Nombre del Centro</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $trainingCenter->name) }}" 
                                   placeholder="Ej. Centro de Comercio y Servicios"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo Ubicación -->
                        <div class="mb-4">
                            <label for="location" class="form-label text-secondary small fw-bold">Ubicación / Ciudad</label>
                            <input type="text" 
                                   class="form-control @error('location') is-invalid @enderror" 
                                   id="location" 
                                   name="location" 
                                   value="{{ old('location', $trainingCenter->location) }}" 
                                   placeholder="Ej. Popayán, Cauca"
                                   required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botones de Acción -->
                        <div class="d-flex justify-content-end gap-2 border-top pt-3">
                            <a href="{{ route('trainingCenter.index') }}" class="btn btn-light border text-secondary px-4 py-2" style="border-radius: 6px;">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary px-4 py-2" style="border-radius: 6px; background-color: #042444; border-color: #042444;">
                                Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection