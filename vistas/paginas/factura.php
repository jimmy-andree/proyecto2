<?php
$conexion = new mysqli("localhost", "root", "", "proyecto1");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el último ID de factura
$sql = "SELECT MAX(IDfactura) AS ultimo_id FROM factura";
$result = $conexion->query($sql);
$row = $result->fetch_assoc();
$nuevo_id = $row['ultimo_id'] + 1;

// Buscar cliente por DPI
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

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Factura</title>

    <style>
        .card-header {
            background-color: #007bff;    
            color: #ffffff;
        }

    </style>
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
</head>
<body>

    <div class="card text-center">
  <div class="card-header">
    Buscar Cliente
  </div>
  <div class="card-body">
    <form>
  <div class="form-group">
    <label for="txtDPI">DPI</label>
    <input type="number" class="form-control" id="txtDPI" aria-describedby="dpiHelp">
    <small id="dpiHelp" class="form-text text-muted">Ingresa tu DPI</small>
  </div>
  
  <button type="submit" class="btn btn-primary">Buscar</button>
</form>
  </div>
</div>

<br/>

<div class="card text-center">
  <div class="card-header">
    Datos Cliente
  </div>
  <div class="card-body">
    <h2>Factura No. <span id="factura-id"><?= $nuevo_id ?></span></h2>

    <p>Nombre: <span id="cliente-nombre"></span></p>
    <p>Dirección: <span id="cliente-direccion"></span></p>
</div>
</div>


<br>

<div>

    <button id="btn-print" type="button">print </button>

</div>  


<script type="text/javascript">
    
    $(document).ready(function (){
        $("#btn-print").on("click", function(){
            var pdf = new jsPDF();

            html2canvas(document.getElementById('dvd_factura'), {
              scale: 2, 
              //width: document.getElementById('dvd_cliente').offsetWidth,  
              //height: document.getElementById('dvd_cliente').offsetHeight, 
              onrendered: function(canvas) {
                var imgData = canvas.toDataURL('image/png');
               
                pdf.addImage(imgData, 'PNG', 10, 10, 180, 0);
            pdf.save('prueba4.pdf');
                }
                })
              });
        });

</script>
</body>
</html>
