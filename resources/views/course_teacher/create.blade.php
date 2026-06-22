<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Cursos a Instructores</title>
</head>
<body>
    <h1>Asignar Instructor a una Ficha / Curso</h1>

    @if (session('status'))
        <p style="color: green;">{{ session('status') }}</p>
    @endif

    <form action="{{ route('course-teacher.store') }}" method="POST">
        @csrf
        
        <label>
            Seleccione el Instructor:
            <select name="teacher_id" required>
                <option value="">-- Seleccione un Instructor --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }} ({{ $teacher->email }})</option>
                @endforeach
            </select>
        </label>
        <br><br>

        <label>
            Seleccione la Ficha / Curso:
            <select name="course_id" required>
                <option value="">-- Seleccione una Ficha --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">Ficha #{{ $course->course_number }} - Jornada {{ $course->day }}</option>
                @endforeach
            </select>
        </label>
        <br><br>

        <button type="submit">Vincular Instructor y Curso</button>
    </form>
</body>
</html>