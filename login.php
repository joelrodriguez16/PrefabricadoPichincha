<?php
session_start();

require_once('procesar_reserva.php');

// Procesar formulario de login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['contrasena']);

    $sql = "SELECT id, nombre_usuario FROM usuarios WHERE nombre_usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
        header("location: tuberia.php"); // Redirige a la página de inicio
        exit(); // Importante: asegura que el script se detenga después de redirigir
    } else {
        $error = "Nombre de usuario o contraseña incorrectos";
    }
}
// No es necesario cerrar la conexión aquí, ya que procesar_reserva.php se encarga de eso

?>

<!DOCTYPE html>
<html lang="es">
<head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
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
            width: 100%;
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

    <form method="post" action="">
    <h1>Login Usuario</h1>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>

        <input type="submit" name="login" value="Iniciar Sesión">
    </form>

    <!-- ... (resto de tu contenido HTML) ... -->
</body>
</html>
