<?php

$conexion = new mysqli("localhost", "root", "", "proyecto1");

// Verificar la conexi�n
if ($conexion->connect_error) {
    die("Error de conexi�n: " . $conexion->connect_error);
}

if (isset($_POST['nombre-producto'])) {
    $prducto = $_POST['prducto'];
    $sql = "SELECT * FROM prducto WHERE prducto = '$prducto'";
    $result = $conexion->query($sql);
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "Producto no encontrado"]);
    }
    exit;
}

?>
