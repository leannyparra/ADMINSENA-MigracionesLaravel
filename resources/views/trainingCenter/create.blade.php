<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Centro de Formacion</title>
</head>
<body>
    <h1>Registrar Centro de Formacion</h1>
    <form action="{{ route('training_center.store') }}" method="POST">
        @csrf
        <label>
            Nombre del Centro:
            <input type="text" name="name" required>
        </label>
        <br><br>
        <label>
            Ubicación:
            <input type="text" name="location" required>
        </label>
        <br><br>
        <button type="submit">Guardar Centro</button>
    </form>
</body>
</html>