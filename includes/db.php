<?php
$db_host = "localhost";
$db_user = "Jose";
$db_password = "Jfcz3001!";
$db_name = "pruebatecnica";


// Crear conexión
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
