<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$baseDeDatos = "reservas";

$conn = new mysqli($servidor, $usuario, $contrasena, $baseDeDatos);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}



// Procesar formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['contrasena']);

    $sql_check = "SELECT id FROM usuarios WHERE nombre_usuario = '$usuario'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows == 0) {
        $sql_insert = "INSERT INTO usuarios (nombre_usuario, contrasena) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ss", $usuario, $contrasena);

        if ($stmt_insert->execute()) {
            // Establecer sesión y redirigir a grado.php
            $_SESSION['nombre_usuario'] = $usuario;

            // Mostrar mensaje de registro exitoso y redirigir después de 2 segundos
            echo "<script>alert('Su usuario ha sido registrado correctamente'); setTimeout(function(){ window.location.href = 'login.php'; }, 2000);</script>";
            exit();
        } else {
            $error = "Error en el registro: " . $stmt_insert->error;
        }
    } else {
        $error = "El nombre de usuario ya está en uso";
    }
}

// Procesar formulario de reserva
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reservar"])) {
    // Verificar si el usuario está autenticado
    if (!isset($_SESSION['id'])) {
        // Si no está autenticado, mostrar un mensaje y evitar la acción
        $mensaje = "Debes iniciar sesión o registrarte para realizar una reserva.";
        echo "<script>alert('$mensaje'); setTimeout(function(){ window.location.href = 'grado.php'; }, 500);</script>";
        exit();
    } else {
        // Usuario autenticado, procesar la reserva
        $producto = $_POST["producto"];
        $cantidad = $_POST["cantidad"];
        $fechaReserva = date("Y-m-d H:i:s");
        $idUsuario = $_SESSION['id'];

        // Obtener el precio del producto
        $precio = obtenerPrecioDelProducto($producto);

        if ($precio === false) {
            echo "Error al obtener el precio del producto.";
            exit;
        }

        // Insertar los datos en la tabla de historial_reservas
        $sql_reserva = "INSERT INTO historial_reservas (id_usuario, nombre_producto, cantidad, precio, fecha_reserva) VALUES (?, ?, ?, ?, ?)";
        $stmt_reserva = $conn->prepare($sql_reserva);

        // Verificar si la preparación fue exitosa
        if ($stmt_reserva === false) {
            die("Error en la preparación de la consulta: " . $conn->error);
        }

        // Vincular parámetros
        $stmt_reserva->bind_param("issds", $idUsuario, $producto, $cantidad, $precio, $fechaReserva);

        // Verificar si la vinculación fue exitosa
        if ($stmt_reserva === false) {
            die("Error al vincular parámetros: " . $conn->error);
        }

        if ($stmt_reserva->execute()) {
            // Ahora también insertar los datos en la tabla de productos
            $sql_producto = "INSERT INTO productos (nombre_producto, cantidad, precio, fecha_reserva) VALUES (?, ?, ?, ?)";
            $stmt_producto = $conn->prepare($sql_producto);

            // Verificar si la preparación fue exitosa
            if ($stmt_producto === false) {
                die("Error en la preparación de la consulta: " . $conn->error);
            }

            // Vincular parámetros
            $stmt_producto->bind_param("sids", $producto, $cantidad, $precio, $fechaReserva);

            // Verificar si la vinculación fue exitosa
            if ($stmt_producto === false) {
                die("Error al vincular parámetros: " . $conn->error);
            }

            if ($stmt_producto->execute()) {
                $mensaje = "Reserva exitosa. ¡Gracias por tu compra!";
                echo "<script>alert('$mensaje'); setTimeout(function(){ window.location.href = 'tuberia.php'; }, 1000);</script>";
                exit();
            } else {
                echo "Error al procesar la reserva en la tabla de productos: " . $stmt_producto->error;
            }
        } else {
            echo "Error al procesar la reserva en la tabla de historial_reservas: " . $stmt_reserva->error;
        }
    }
}

// Función para obtener el precio del producto (simulación)
function obtenerPrecioDelProducto($nombreProducto) {
    $precios = [
        "Tubo de 60cm" => 19.00,
        "Tubo de 80cm" => 30.00,
        "Tubo de 90cm" => 70.00,
        "Tubo de 120cm" => 80.00,
        "Tubos Decorativos" => 7.00,

        "Modelo Corazón 20x20" => 20.00,
        "Modelo Rombo 20x20" => 47.00,
        "Modelo Estrella 20x20" => 59.00,
        "Modelo Estrella 25x25" => 89.00,
        "Modelo la Hoja 25x25" => 59.00,
        "Modelo Folor 25x25" => 89.00,
        "Modelo Corazón 30x30" => 47.00,
        "Modelo Rombo 30x30" => 59.00,
        "Modelo Folor 30x30" => 89.00,
        "Modelo Estrella 40x40" => 47.00,
        "Modelo Lax 40x40" => 59.00,
        "Modelo Rombo 40x40" => 89.00,

        "Balaustre Modelo Rayado" => 4.00,
        "Balaustre Modelo Redondo" => 4.00,
        "Balaustre Modelo la Copa" => 4.00,
        "Balaustre Modelo La Garza" => 4.75,
        "Balaustre Modelo Decorativo" => 4.75,
        "Balaustre Modelo Estandar" => 4.75,
        "Balaustre Modelo Fino" => 5.00,
 
    ];

    if (isset($precios[$nombreProducto])) {
        return $precios[$nombreProducto];
    } else {
        return false;
    }
}
?>
