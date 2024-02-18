<?php
session_start();

// Verificar si el usuario está autenticado
$usuarioAutenticado = isset($_SESSION['id']);


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
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="app.js" async></script>

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
	max-width:1500px; /* Aqui le decimos que el ancho máximo sera de 1000px */
	margin:auto; /* Centramos los elementos */
	overflow:hidden; /* Eliminamos errores de float */
}

header .logo {
	color:#f2f2f2;
	font-size:40px;
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

/* Estilos CSS para el botón "Genera tu Reserva" */
.button-genera-reserva {
    background-color: #db0909;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
    position: fixed;
    right: 40px; /* Ajusta la distancia desde el borde derecho */
    z-index: 999;
}

.button-genera-reserva:hover {
    background-color: #ff6600;
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

            </nav>
        </div>
        </header>
        <body>
            
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


                <form action="fpdf/PruebaV.php" method="post">
                <?php
        // Mostrar el botón solo si el usuario está autenticado
        if ($usuarioAutenticado) {
            echo '<button type="submit" name="descargar_pdf" class="button-genera-reserva" formtarget="_blank">Genera tu Reserva</button>';
        }
        ?>

                            <button type="submit" name="descargar_pdf" class="button-genera-reserva" formtarget="_blank">Genera tu Reserva</button></li>

                </form>
                                
        
                            <h2 style="font-family: Georgia, 'Times New Roman', Times, serif; text-align:center;" class="color">TUBERIAS</h2>
            
            <section class="contenedor">
        <!-- Contenedor de elementos -->
        <div class="producto">
    <img src="imagenes/tubo60.jpg" alt="Producto 1">
    <h2>Tubo de 60cm</h2>
    <p></p>
    <p>Precio: $19.00</p>
    <form action="procesar_reserva.php" method="post">
        <input type="hidden" name="producto" value="Tubo de 60cm">
        <input type="number" name="cantidad" min="1" value="1">
        <input type="hidden" name="precio" value="$19.00">
        <button type="submit" name="reservar">Reservar</button>
    </form>
</div>
        
            <div class="producto">
                <img src="imagenes/tubo80.jpg" alt="Producto 2">
                <h2>Tubo de 80cm</h2>
                <p></p>
                <p>Precio: $30.00</p>
                <form action="procesar_reserva.php" method="post">
                    <input type="hidden" name="producto" value="Tubo de 80cm">
                    <input type="number" name="cantidad" min="1" value="1">
                    <input type="hidden" name="precio" value="$30.00">
                    <button type="submit" name="reservar">Reservar</button>
                </form>
            </div>
        
            <div class="producto">
                <img src="imagenes/tubo90.jpg" alt="Producto 3">
                <br>
                <br>
                <br>
                <br>
                <h2>Tubo de 90cm</h2>
                <p></p>
                <p>Precio: $70.00</p>
                <form action="procesar_reserva.php" method="post">
                    <input type="hidden" name="producto" value="Tubo de 90cm">
                    <input type="number" name="cantidad" min="1" value="1">
                    <input type="hidden" name="precio" value="$70.00">
                    <button type="submit" name="reservar">Reservar</button>
                </form>
            </div>
        
            <div class="producto">
                <img src="imagenes/tubo120.jpg" alt="Producto 4">
                <br>
                <h2>Tubo de 120cm</h2>
                <p></p>
                <p>Precio: $80.00</p>
                <form action="procesar_reserva.php" method="post">
                    <input type="hidden" name="producto" value="Tubo de 120cm">
                    <input type="number" name="cantidad" min="1" value="1">
                    <input type="hidden" name="precio" value="$80.00">
                    <button type="submit" name="reservar">Reservar</button>
                </form>
            </div>
        
        </section>

        <section class="contenedor">
        <!-- Contenedor de elementos -->
        <div class="producto">
        <img src="imagenes/tubodeco.png" alt="Producto 1">
        <h2>Tubos Decorativos</h2>
        <p></p>
        <p>Precio: $7.00</p>
        <form action="procesar_reserva.php" method="post">
           <input type="hidden" name="producto" value="Tubos Decorativos">
           <input type="number" name="cantidad" min="1" value="1">
           <input type="hidden" name="precio" value="$7.00">
           <button type="submit" name="reservar">Reservar</button>
        </form>
        </div>
        
            
        
        </section>

        <?php
        require('fpdf/fpdf.php'); 

        if (isset($_POST["descargar_pdf"])) {
            
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(40, 10, 'Resumen de Reservas');

            

            
            $pdf->Output('resumen_reservas.pdf', 'D'); 
            exit();
        }
        ?>

        
    
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
    </footer>
    </html>