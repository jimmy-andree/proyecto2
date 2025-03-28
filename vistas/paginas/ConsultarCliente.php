<?php

$conexion = new mysqli("localhost", "root", "", "proyecto1");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_POST['DPI'])) {
    $DPI = $_POST['DPI'];
    $sql = "SELECT * FROM cliente WHERE DPI = '$DPI'";
    $result = $conexion->query($sql);
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "Cliente no encontrado"]);
    }
    exit;
}

?>
