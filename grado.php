<?php
session_start();


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

?>

<!DOCTYPE html>
<html>
<head>
    <title>Prefabricados Pichincha</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/887a835504.js" crossorigin="anonymous"></script>

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
	width:100%; /* Establecemos que el ancho sera del 90% */
	max-width:1200px; /* Aqui le decimos que el ancho máximo sera de 1000px */
	margin: auto; /* Centramos los elementos */
	overflow:hidden; /* Eliminamos errores de float */
}

header .logo {
	color:#f2f2f2;
	font-size:33px;
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
</style>
</head>
<body>
    
<header>
    <div class="wrapper">
        <div class="logo">Prefabricados Pichincha</div>
        <nav>
            <a href="quienes.php">Quienes somos</a>
            <a href="ornamentale.php">Ornamentales</a>
            <a href="tuberia.php">Tubos</a>
            <a href="balaustre.php">Balaustres</a>
            
            <?php
                    // Verifica si el usuario está autenticado
                    if (!isset($_SESSION['id'])) {
                        echo '<a href="login.php" id="openLoginForm">Login</a>';
                        echo '<a href="register.php">Register</a>';
                    } else {
                        echo '<a href="cerrar_sesion.php">Cerrar Sesión</a>';
                    }
                ?>

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
<br>
<br>
<h2 style="font-family: Georgia, 'Times New Roman', Times, serif; text-align:center;" class="color">PRODUCTOS</h2>
<br>
<div class="slider-frame">
    <ul>
    <li><img src="img/balala.jpg" alt=""></li>
        <li><img src="img/ornamentaaa.jpg" alt=""></li>
        <li><img src="img/tubcemen.jpg" alt=""></li>
        <li><img src="img/balaustreeeeee.jpg" alt=""></li>
        


    </ul>
</div>
    <center>

        
            <div class="cuadro">
                <a href="tuberia.php">
                <figure>
               <img src="imagenes/tubo.jpg">
                <div class="capa1">
                    <h2>TUBERIA</h2>
            </figure>
        </a>
                <a href="ornamentale.php">
                    <figure>
                <img src="imagenes/ornamen.jpg">
                <div class="capa2">
                    <h2>ORNAMENTALES</h2>
                    </figure>
                </a>      
                           
                <a href="balaustre.php">
                        <figure>
                <img src="imagenes/bala.jpg">
                <div class="capa3">
                    <h2>BALAUSTRES</h2>
                        </figure>
                    </a>        
            </div>
    </center>


    
    <h2 style="font-family: Georgia, 'Times New Roman', Times, serif; text-align:center;" class="color">OBRAS</h2>
    <br>
    <center>
        <div class="cuadro1">
            <figure>
            <img src="imagenes/TRABAJO1.jpg" alt="Imagen 1">
            <div class="capa4">
            
        </figure>
            <figure>
            <img src="imagenes/TRABAJO2.jpg" alt="Imagen 2">
            <div class="capa5">
              
            </figure>
        <figure>
            <img src="imagenes/TRABAJO3.jpg" alt="Imagen 3">
            <div class="capa6">
               
        </figure>
        </div>
    <br>
    <br>
    <br><br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.298532953149!2d-79.67349603044185!3d0.9248656607575318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fd4bf004a3962c5%3A0xd2cbbd4274962ca1!2sPrefabricados%20Pichincha!5e0!3m2!1ses!2sec!4v1706902979604!5m2!1ses!2sec" width="700" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

<br><br><br>
    </center>

    <script type="text/javascript">
		window.addEventListener("scroll", function(){
			var header = document.querySelector("header");
			header.classList.toggle("abajo",window.scrollY>0);
		})
	</script>
 
</body>
<footer>
    <div class="footercontainer">
        <div class="socialicons"> 
            <a href="https://www.facebook.com/mary.llumipanta"><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href="https://wa.me/5930980236641?text=Hola quiero información de su negocio" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
        <center>
        <div class="footerbotton">
            <p>CopyRight &copy;2023; Designed by <span class="designed">Joel Rodriguez|Jamileth Cevallos|Jasmany Fuller</span></p>
            </center>

        </div>   
    </div>
</footer>
</html>
