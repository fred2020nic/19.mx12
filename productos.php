<?php
$servername = "localhost"; // Cambia esto según tu configuración
$username = "root"; // Cambia esto según tu configuración
$password = ""; // Cambia esto según tu configuración
$dbname = "pos"; // Cambia esto según tu configuración

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

$barra = $_POST['producto'];

// Realizar la consulta
$query = "SELECT id FROM products WHERE barras = '$barra'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row['id'];
} else {
    echo 0;
}

// Cerrar la conexión
mysqli_close($conn);
