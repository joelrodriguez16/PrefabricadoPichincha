<?php
session_start();

// Cerrar sesión
session_unset();
session_destroy();

// Redirigir a la página de inicio o a donde desees
header("Location: grado.php");
exit();
?>
