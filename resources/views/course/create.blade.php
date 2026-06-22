<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Curso</title>
</head>
<body>
    <h1>Registrar Nuevo Curso / Ficha</h1>
    <form action="{{ route('course.store') }}" method="POST">
        @csrf
        
        <label>
            Número de Curso (Ficha):
            <input type="text" name="course_number" required>
        </label>
        <br><br>

        <label>
            Jornada / Día:
            <input type="text" name="day" required>
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

        <button type="submit">Guardar Curso</button>
    </form>
</body>
</html>