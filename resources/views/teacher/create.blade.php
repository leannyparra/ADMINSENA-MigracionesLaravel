<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Profesor</title>
</head>
<body>
    <h1>Registrar Profesor</h1>
    <form action="{{ route('teacher.store') }}" method="POST">
        @csrf
        
        <label>
            Nombre del Profesor:
            <input type="text" name="name" required>
        </label>
        <br><br>

        <label>
            Correo Electrónico:
            <input type="email" name="email" required>
        </label>
        <br><br>

        <label>
            Área:
            <select name="area_id" required>
                <option value="">-- Seleccione un Área --</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endforeach
            </select>
        </label>
        <br><br>

        <!-- Llave Foránea: training_center_id -->
        <label>
            Centro de Formación:
            <select name="training_center_id" required>
                <option value="">-- Seleccione un Centro de Formación --</option>
                @foreach($training_centers as $center)
                    <option value="{{ $center->id }}">{{ $center->name }}</option>
                @endforeach
            </select>
        </label>
        <br><br>

        <button type="submit">Guardar Profesor</button>
    </form>
</body>
</html>