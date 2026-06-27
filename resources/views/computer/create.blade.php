@extends('Layout.app')

@section('content')
<style>
    .form-control:focus {
        border-color: #39A900 !important;
        box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15) !important;
    }
    .btn-sena-success {
        background-color: #39A900 !important;
        color: white !important;
        transition: all 0.3s ease;
    }
    .btn-sena-success:hover {
        background-color: #2e8500 !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(57, 169, 0, 0.2) !important;
    }
    .btn-sena-light {
        background-color: #f8f9fa;
        color: #6c757d;
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
    }
    .btn-sena-light:hover {
        background-color: #e9ecef;
        color: #495057;
    }
    .card-top-line {
        border-top: 5px solid #39A900 !important;
    }
</style>

<div class="row justify-content-center align-items-center py-5 mt-2" style="min-height: 80vh;">
    <div class="col-12 col-md-10 col-lg-8">
        
        <div class="card shadow-lg border-0 rounded-4 p-3 p-md-5 bg-white card-top-line">
            <div class="card-body">
                
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="fs-3">💻</span> 
                        <h1 class="h4 fw-bold text-dark m-0" style="color: #00324D !important;">Registrar Nuevo Computador</h1>
                    </div>
                    <p class="text-muted small">Ingresa los datos correspondientes para habilitar el equipo en el ambiente de formación.</p>
                </div>

                <form action="{{ route('computer.store') }}" method="POST">
                    @csrf

                    <div class="row g-4 mb-4">
                        
                        <div class="col-12 col-md-6">
                            <label for="number" class="form-label fw-semibold text-secondary text-uppercase tracking-wider small" style="font-size: 0.75rem;">
                                Número de Equipo
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-light-subtle text-muted">#</span>
                                <input type="number" 
                                       id="number" 
                                       name="number" 
                                       value="{{ old('number') }}"
                                       class="form-control border-light-subtle rounded-end-3 @error('number') is-invalid @enderror" 
                                       placeholder="Ej. 15" 
                                       required 
                                       style="padding: 10px 12px; font-size: 0.95rem;">
                            </div>
                            <div class="form-text text-muted mt-1" style="font-size: 0.8rem;">
                                Identificador único grabado en el chasis.
                            </div>
                            @error('number')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="brand" class="form-label fw-semibold text-secondary text-uppercase tracking-wider small" style="font-size: 0.75rem;">
                                Marca del Equipo
                            </label>
                            <input type="text" 
                                   id="brand" 
                                   name="brand" 
                                   value="{{ old('brand') }}"
                                   class="form-control border-light-subtle rounded-3 @error('brand') is-invalid @enderror" 
                                   placeholder="Ej. Lenovo, HP, Dell" 
                                   required 
                                   style="padding: 10px 12px; font-size: 0.95rem;">
                            <div class="form-text text-muted mt-1" style="font-size: 0.8rem;">
                                Marca fabricante del dispositivo.
                            </div>
                            @error('brand')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <hr class="text-black-50 my-4" style="opacity: 0.1;">

                    <div class="d-flex align-items-center justify-content-end gap-2">
                        <a href="{{ url()->previous() }}" class="btn btn-sena-light fw-medium px-4 py-2 rounded-3" style="font-size: 0.9rem;">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-sena-success fw-semibold px-4 py-2 rounded-3 shadow-sm" style="font-size: 0.9rem;">
                            Guardar Equipo
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection