<?php

include('Conectar.php'); 
$conn = mysqli_connect($host, $usuario, $clave, $base_de_datos); 


$nombre = $_POST['nombre']; 
$apellido = $_POST['apellido'];
$insert_query = "INSERT INTO tabla_usuarios (nombre, apellido) VALUES ('$nombre', '$apellido')";
mysqli_query($conn, $insert_query); 


$select_query = "SELECT * FROM tabla_usuarios WHERE condicion = 'algo'";
$resultado = mysqli_query($conn, $select_query); 

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "Nombre: " . $fila['nombre'] . "<br>";
    echo "Apellido: " . $fila['apellido'] . "<br>";
}
mysqli_close($conn); 
?>


<?php

include('Conectar.php'); 
$conn = mysqli_connect($host, $usuario, $clave, $base_de_datos); 


$nombre = $_POST['nombre']; 
$apellido = $_POST['apellido'];
$insert_query = "INSERT INTO tabla_usuarios (nombre, apellido) VALUES ('$nombre', '$apellido')";
mysqli_query($conn, $insert_query); 


$select_query = "SELECT * FROM tabla_usuarios WHERE condicion = 'algo'";
$resultado = mysqli_query($conn, $select_query);

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "Nombre: " . $fila['nombre'] . "<br>";
    echo "Apellido: " . $fila['apellido'] . "<br>";
}
mysqli_close($conn); 
?>
