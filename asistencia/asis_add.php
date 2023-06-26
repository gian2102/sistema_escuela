<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingreso de Asistencia</title>
</head>
<body>
  <h1>Ingreso de Asistencia</h1>
  <form action="procesar_asistencia.php" method="POST">
    <label for="alumno_id">ID del Alumno:</label>
    <input type="text" name="alumno_id" id="alumno_id" required>

    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" id="fecha" required>

    <label for="asistencia">Asistencia:</label>
    <select name="asistencia" id="asistencia" required>
      <option value="Asistio">Asistió</option>
      <option value="No asistio">No asistió</option>
    </select>

    <label for="observacion">Observación:</label>
    <input type="text" name="observacion" id="observacion">

    <input type="submit" name="submit" value="Registrar Asistencia">
  </form>
</body>
</html>
