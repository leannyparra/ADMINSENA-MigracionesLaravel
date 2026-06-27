@extends('Layout.app')

@section('content')
<!-- El py-4 y mt-3 le dan la separación perfecta del Navbar para que no se vea encima -->
<div class="py-4 mt-3">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6">
            
            <!-- Título Estilizado -->
            <div class="mb-4">
                <h1 class="h3 fw-bold text-dark mb-1">Formulario de Áreas</h1>
                <p class="text-muted small">Registra una nueva área técnica o administrativa para la gestión de infraestructura.</p>
            </div>

            <!-- Formulario Directo -->
            <form action="{{ route('area.store') }}" method="POST">
                @csrf

                <!-- Campo de Entrada con Diseño Limpio -->
                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold text-secondary text-uppercase tracking-wider small" style="font-size: 0.75rem;">
                        Nombre del Área
                    </label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Ej. Teleinformática y Tecnología" required style="padding: 12px; font-size: 0.95rem;">
                    <div class="form-text text-muted">Use nombres claros y descriptivos institucionales.</div>
                </div>

                <!-- Botón de Envío -->
                <div class="pt-2">
                    <button type="submit" class="btn btn-success fw-semibold px-4 py-2.5 rounded-2 shadow-sm" style="background-color: #39A900; border: none; font-size: 0.9rem;">
                        Guardar Área
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection