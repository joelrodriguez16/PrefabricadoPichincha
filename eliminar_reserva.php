<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$baseDeDatos = "reservas";

$conn = new mysqli($servidor, $usuario, $contrasena, $baseDeDatos);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si se proporcionó un ID válido para eliminar
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idReserva = $_GET['id'];

    // Preparar y ejecutar la consulta de eliminación
    $sqlEliminarReserva = "DELETE FROM historial_reservas WHERE id = ?";
    $stmtEliminarReserva = $conn->prepare($sqlEliminarReserva);

    if ($stmtEliminarReserva === false) {
        die("Error en la preparación de la consulta de eliminación: " . $conn->error);
    }

    $stmtEliminarReserva->bind_param("i", $idReserva);

    if ($stmtEliminarReserva === false) {
        die("Error al vincular parámetros para la eliminación: " . $conn->error);
    }

    $stmtEliminarReserva->execute();

    // Redirigir de nuevo al historial de reservas después de eliminar
    header("Location: historial_reservas.php");
    exit();
} else {
    // Si no se proporciona un ID válido, redirigir a la página principal
    header("Location: index.php");
    exit();
}
?>
