<?php
$conexion = new mysqli("localhost", "root", "", "rapido_sabroso");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "SELECT * FROM clientes";
$result = $conexion->query($sql);

if (!$result) {
    die("Error en la consulta: " . $conexion->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lista de Registros</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f4f4f4;
    }

    .acciones a {
      margin-right: 10px;
      text-decoration: none;
      color: #007bff;
    }

    .acciones a.eliminar {
      color: red;
    }

    /* Estilo responsive */
    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      thead tr {
        display: none;
      }

      tr {
        margin-bottom: 15px;
        border: 1px solid #ccc;
        padding: 10px;
        background: #f9f9f9;
      }

      td {
        position: relative;
        padding-left: 50%;
        border: none;
        border-bottom: 1px solid #eee;
      }

      td::before {
        content: attr(data-label);
        position: absolute;
        top: 10px;
        left: 10px;
        font-weight: bold;
        white-space: nowrap;
      }
    }
  </style>
</head>
<body>

<h2>Listado de Personas</h2>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Paterno</th>
      <th>Materno</th>
      <th>Edad</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td data-label="ID"><?= $row['id'] ?></td>
        <td data-label="Nombre"><?= $row['nombre'] ?></td>
        <td data-label="Paterno"><?= $row['paterno'] ?></td>
        <td data-label="Materno"><?= $row['materno'] ?></td>
        <td data-label="Edad"><?= $row['edad'] ?></td>
        <td data-label="Acciones" class="acciones">
          <a class="editar" href="editar.php?id=<?= $row['id'] ?>">Editar</a>
          <a class="eliminar" href="eliminar.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar este registro?')">Eliminar</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

</body>
</html>
