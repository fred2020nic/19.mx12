<?php
$servername = "localhost"; // Cambia esto según tu configuración
$username = "root"; // Cambia esto según tu configuración
$password = ""; // Cambia esto según tu configuración
$dbname = "pos"; // Cambia esto según tu configuración

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$tipo = $_POST['tipo'];

// Realizar la consulta
$query = "INSERT INTO movimientos (producto,cantidad,tipo) VALUES ($producto,$cantidad,$tipo)";
$result = mysqli_query($conn, $query);

if ($result) {
    if ($tipo == 1) {
        $query1 = "UPDATE products SET cantidad = cantidad + $cantidad WHERE id = $producto";
    } else {
        $query1 = "UPDATE products SET cantidad = cantidad - $cantidad WHERE id = $producto";
    }
    $result1 = mysqli_query($conn, $query1);
    if ($result1) {
        echo 1;
    } else {
        echo "Error al agregar borrar producto" . $query1;
    }
} else {
    echo "Error al agregar el cliente" . $query;
}

// Cerrar la conexión
mysqli_close($conn);
