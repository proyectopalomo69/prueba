<?php
// 1. Conectar a MySQL
$servername = "localhost";
$username = "root"; // o el usuario que uses
$password = ""; // si tienes contraseña, cámbiala
$database = "rapido_sabroso";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// 2. Recibir datos del formulario
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$edad = $_POST['edad'];

// 3. Insertar en la base de datos
$sql = "INSERT INTO clientes (nombre, paterno, materno, edad) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $nombre, $paterno, $materno, $edad);

if ($stmt->execute()) {
    echo "Registro exitoso. <a href='menu.html'>Ir al menú</a>";
} else {
    echo "Error: " . $conn->error;
}

// 4. Cerrar conexión
$stmt->close();
$conn->close();
?>
