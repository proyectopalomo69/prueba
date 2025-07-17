<?php
$conn = new mysqli("localhost", "root", "", "rapido_sabroso");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM clientes WHERE id=$id");
    $cliente = $result->fetch_assoc();
}

if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $edad = $_POST['edad'];

    $conn->query("UPDATE clientes SET nombre='$nombre', paterno='$paterno', materno='$materno', edad=$edad WHERE id=$id");
    header("Location: listar.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Cliente</title>
</head>
<body>
  <h2>Editar Cliente</h2>
  <form method="POST">
    <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $cliente['nombre'] ?>" required><br><br>

    <label>Paterno:</label>
    <input type="text" name="paterno" value="<?= $cliente['paterno'] ?>" required><br><br>

    <label>Materno:</label>
    <input type="text" name="materno" value="<?= $cliente['materno'] ?>" required><br><br>

    <label>Edad:</label>
    <input type="number" name="edad" value="<?= $cliente['edad'] ?>" required><br><br>

    <button type="submit" name="actualizar">Actualizar</button>
  </form>

  <br>
  <a href="listar.php">Volver</a>
</body>
</html>

<?php $conn->close(); ?>
