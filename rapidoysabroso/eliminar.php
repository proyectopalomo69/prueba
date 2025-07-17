<?php
$conn = new mysqli("localhost", "root", "", "rapido_sabroso");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM clientes WHERE id=$id");
}

$conn->close();
header("Location: listar.php");
?>
