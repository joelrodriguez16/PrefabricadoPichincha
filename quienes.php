<?php
session_start();

// ...

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reservar"])) {
    // Verifica si el usuario está autenticado
    if (!isset($_SESSION['id'])) {
        // Si no está autenticado, muestra un mensaje y evita la acción
        $mensaje = "Debes iniciar sesión o registrarte para realizar una reserva.";
        echo "<script>alert('$mensaje');</script>";
    } else {
        // Si el usuario está autenticado, procesa la reserva como lo hacías antes
        // Resto del código de procesamiento de reserva...
    }
}

// ...
?>


<!DOCTYPE html>
<html>
<head>
    <title>Prefabricados Pichincha</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        header {
            position: fixed;
	width:100%; /* Establecemos que el header abarque el 100% del documento */
    height: 150px;
	overflow:hidden; /* Eliminamos errores de float */
	background:#ffaf38;
	margin-bottom:20px;
    z-index: 999;
}

.wrapper {
	width:90%; /* Establecemos que el ancho sera del 90% */
	max-width:2000px; /* Aqui le decimos que el ancho máximo sera de 1000px */
	margin:auto; /* Centramos los elementos */
	overflow:hidden; /* Eliminamos errores de float */
}

header .logo {
	color:#f2f2f2;
	font-size:30px;
	line-height:200px;
	float:left;
}

header nav {
	float:right;
	line-height:200px;
}

header nav a {
	display:inline-block;
	color:#fff;
	text-decoration:none;
	padding:10px 20px;
	line-height:normal;
	font-size:20px;
	font-weight:bold;
	-webkit-transition:all 500ms ease;
	-o-transition:all 500ms ease;
	transition:all 500ms ease;
}

header nav a:hover {
	background:#ff0b0b;
	border-radius:50px;
}
    </style>

</head>
<body>
    <header>
    <div class="wrapper">
            <div class="logo">Prefabricados Pichincha</div>
            
            <nav>
                <a href="grado.php">Inicio</a>
                <a href="ornamentale.php">Ornamentales</a>
                <a href="tuberia.php">Tubos</a>
                <a href="balaustre.php">Balaustres</a>
                <a href="historial_reservas.php">Ver Historial</a>
                <?php
                    // Verifica si el usuario está autenticado
                    if (isset($_SESSION['id'])) {
                        echo '<a href="cerrar_sesion.php">Cerrar Sesión</a>';
                    } else {
                        echo '<a href="login.php">Login</a>';
                        echo '<a href="register.php">Register</a>';
                    }
                ?>
    
            </lu>                  
    
            </nav>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <th><h2>Visión</th></h2>
            <th><h2> Misión</th></h2>
            <th><h2>Valores</th></h2>
        </tr>
        <tr>
            <td class="imagenes"><img src="img/vision.png"></td>
            <br>
            <td class="imagenes"><img src="img/mision.png"></td>
            <br>
            <td class="imagenes"><img src="img/valores.png"></td>
        </tr>
        <tr>
            <td class="visi" id="misi">Siempre pensar en las necesidades del cliente, con los mejores productos</td>
            <td class="visi" id="vision">Acomodar las necesidades y expectativas de nuestros clientes fabricando nuestros productos de una manera que garantice el máximo nivel de satisfacción del cliente.</td>
            <td class="visi" id="valores">
                <ul>
                    <li>Empoderamiento</li>
                    <li>Progreso</li>
                    <li>Creatividad</li>
                    <li>Responsabilidad</li>
                    <li>Sostenibilidad</li>
                </ul>
            </td>
        </tr>
    </table>
</body>
<footer>
    <div class="footercontainer">
        <div class="socialicons"> 
            <a href="https://www.facebook.com/mary.llumipanta"><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href="https://wa.me/5930980236641?text=Hola quiero información de su negocio"target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
        <center>
        <div class="footerbotton">
            <p>CopyRight &copy;2023; Designed by <span class="designed">Joel Rodriguez|Jamileth Cevallos|Jasmany Fuller</span></p>
            </center>
    </div>
</footer>
</html>