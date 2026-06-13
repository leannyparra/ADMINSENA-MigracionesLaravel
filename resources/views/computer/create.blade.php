<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Computador</title>
</head>
<body>
    <h1>Registrar Nuevo Computador</h1>
    <form action="{{ route('computer.store') }}" method="POST">
        @csrf
        <label>
            Numero de Equipo:
            <input type="number" name="number" required>
        </label>
        <br><br>
        <label>
            Marca del Equipo:
            <input type="text" name="brand" required>
        </label>
        <br><br>
        <button type="submit">Guardar Computador</button>
    </form>
</body>
</html>