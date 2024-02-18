<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

date_default_timezone_set('America/Guayaquil');

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$baseDeDatos = "reservas";

$conn = new mysqli($servidor, $usuario, $contrasena, $baseDeDatos);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$idUsuario = $_SESSION['id'];

$sqlHistorial = "SELECT * FROM historial_reservas WHERE id_usuario = ?";
$stmtHistorial = $conn->prepare($sqlHistorial);

if ($stmtHistorial === false) {
    die("Error en la preparación de la consulta de historial_reservas: " . $conn->error);
}

$stmtHistorial->bind_param("i", $idUsuario);

if ($stmtHistorial === false) {
    die("Error al vincular parámetros para historial_reservas: " . $conn->error);
}

$stmtHistorial->execute();
$resultHistorial = $stmtHistorial->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        nav {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            background-color: #4CAF50;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
        }

        nav a:hover {
            background-color: #45a049;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <h1>Historial de Reservas</h1>
    </header>

    <nav>
        <div>
            <!-- Coloca aquí cualquier otro enlace del menú -->
        </div>
        <div>
            <a href="grado.php">Volver al Inicio</a>
            <a href="ornamentale.php">Ornamentales</a>
            <a href="tuberia.php">Tubos</a>
            <a href="balaustre.php">Balaustres</a>
            <!-- Agregamos el botón de Inicio -->
        </div>
    </nav>

    <h2 style="text-align:center;">Reservas realizadas</h2>

    <table>
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Fecha de Reserva</th>
            </tr>
        </thead>
        <tbody>
        <?php
while ($row = $resultHistorial->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['nombre_producto'] . "</td>";
    echo "<td>" . $row['cantidad'] . "</td>";
    echo "<td>$" . $row['precio'] . "</td>";
    echo "<td>" . date('Y-m-d H:i:s', strtotime($row['fecha_reserva'])) . "</td>";
    echo "<td><button class='eliminar-btn' data-id='" . $row['id'] . "'>Eliminar</button></td>";
    echo "</tr>";
}

?>

        </tbody>
    </table>

    <center>
    <form action="fpdf/PruebaV.php" method="post">
                            <button type="submit" name="descargar_pdf" class="button-genera-reserva" formtarget="_blank">Genera tu Reserva</button></li></form>

                            </center>                       
    <footer>
        <!-- ... (código anterior) ... -->
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtener todos los botones de eliminación
        var eliminarButtons = document.querySelectorAll('.eliminar-btn');

        // Agregar un evento de clic a cada botón
        eliminarButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Obtener el ID del elemento a eliminar
                var idReserva = this.getAttribute('data-id');

                // Pregunta al usuario si realmente quiere eliminar el elemento
                if (confirm("¿Estás seguro de que deseas eliminar esta reserva?")) {
                    // Redirigir a un script de PHP para manejar la eliminación
                    window.location.href = 'eliminar_reserva.php?id=' + idReserva;
                }
            });
        });
    });
</script>

</body>

</html>
