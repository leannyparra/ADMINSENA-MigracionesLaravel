<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Aprendiz</title>
</head>
<body>
    <h1>Registrar Nuevo Aprendiz</h1>
    <form action="{{ route('apprentice.store') }}" method="POST">
        @csrf
        
        <label>
            Nombre del Aprendiz:
            <input type="text" name="name" required>
        </label>
        <br><br>

        <label>
            Correo Electrónico:
            <input type="email" name="email" required>
        </label>
        <br><br>

        <label>
            Número de Celular:
            <input type="text" name="cell_number" required>
        </label>
        <br><br>

        <label>
            Curso / Ficha:
            <select name="course_id" required>
                <option value="">-- Seleccione un Curso --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_number }}</option>
                @endforeach
            </select>
        </label>
        <br><br>

        <label>
            Computador Asignado:
            <select name="computer_id" required>
                <option value="">-- Seleccione un Computador --</option>
                @foreach($computers as $computer)
                    <option value="{{ $computer->id }}">Equipo #{{ $computer->number }} - {{ $computer->brand }}</option>
                @endforeach
            </select>
        </label>
        <br><br>

        <button type="submit">Guardar Aprendiz</button>
    </form>
</body>
</html>