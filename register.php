<?php
session_start();
require_once('procesar_reserva.php');

// Inicializar las variables de mensaje
$mensaje_exito = "";
$mensaje_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
    $cedula = mysqli_real_escape_string($conn, $_POST['cedula']);
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['contrasena']);

    // Validar y procesar los nuevos campos
    if (strlen($cedula) == 10 && is_numeric($cedula)) {
        $sql_check = "SELECT id FROM usuarios WHERE nombre_usuario = '$usuario'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows == 0) {
            $sql_insert = "INSERT INTO usuarios (nombre, apellido, cedula, nombre_usuario, contrasena) VALUES ('$nombre', '$apellido', '$cedula', '$usuario', '$contrasena')";
            
            if ($conn->query($sql_insert) === TRUE) {
                // Establecer sesión y redirigir a login.php
                $_SESSION['nombre_usuario'] = $usuario;
                header("location: login.php");
                exit();
            } else {
                $mensaje_error = "Error en el registro: " . $conn->error;
            }
        } else {
            $mensaje_error = "El nombre de usuario ya está en uso";
        }
    } else {
        $mensaje_error = "Número de cédula inválido";
    }
}

$conn->close();
?>

<!-- Añadir el formulario de registro a continuación -->
<!DOCTYPE html>
<html lang="es">
<head>
<style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente */
            z-index: 9998; /* Asegura que el overlay esté por debajo del formulario */
        }

        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999; /* Asegura que el formulario esté por encima del overlay */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: calc(100% - 22px); /* 22px es la suma del padding y el borde */
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: #ff0000;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>

    <!-- ... (tu contenido HTML) ... -->

    <!-- Mostrar mensaje de éxito si existe -->
    <?php if ($mensaje_exito): ?>
        <p style="color: green;"><?php echo $mensaje_exito; ?></p>
    <?php endif; ?>

    <!-- Mostrar mensaje de error si existe -->
    <?php if ($mensaje_error): ?>
        <p style="color: red;"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>

    <div class="overlay"></div>

<div class="login-container">
    <form method="post" action="">
        <h1>Registro de Usuario</h1>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>

        <label for="cedula">Número de Cédula:</label>
        <input type="text" name="cedula" maxlength="10" pattern="\d{10}" title="Ingrese un número de cédula válido" required>

        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>

        <input type="submit" name="register" value="Registrar">
    </form>
</div>
    <!-- ... (resto de tu contenido HTML) ... -->
    <script>
        document.getElementById('openLoginForm').addEventListener('click', function() {
            document.getElementById('loginFormContainer').style.display = 'block';
        });
    </script>
</body>
</html>
