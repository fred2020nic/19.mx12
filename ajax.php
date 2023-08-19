<?php
$servername = "localhost"; // Cambia esto según tu configuración
$username = "root"; // Cambia esto según tu configuración
$password = ""; // Cambia esto según tu configuración
$dbname = "pos"; // Cambia esto según tu configuración

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

$keys = "";
$values = "";

$counter = 0;
$total = count($_POST);

foreach ($_POST as $key => $value) {
    $keys .= "$key";
    $values .= "'$value'";

    if ($counter < $total - 1) {
        $keys .= ",";
        $values .= ",";
    }

    $counter++;
}

// Realizar la consulta
$query = "INSERT INTO clientes ($keys) VALUES ($values)";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 1;
} else {
    echo "Error al agregar el cliente" . $query;
}

// Cerrar la conexión
mysqli_close($conn);
