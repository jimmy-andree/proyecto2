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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<div id="dvd_factura"></div>
<body>

    <div class="card">
  <h5 class="card-header">Buscar Cliente</h5>
  <div class="card-body">
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

    <h2>Factura No. <span id="factura-id"><?= $nuevo_id ?></span></h2>
    
    <label>DPI Cliente:</label>
    <input type="text" id="DPI" placeholder="Ingrese DPI">
    <button id="buscar-cliente">Buscar</button>

    <h3>Datos del Cliente</h3>
    <p>Nombre: <span id="cliente-nombre"></span></p>
    <p>Dirección: <span id="cliente-direccion"></span></p>

    <script>
        $(document).ready(function(){
            $("#buscar-cliente").click(function(){
                let DPI = $("#DPI").val();
                
                $.post("factura.php", { DPI: DPI }, function(data){
                    let cliente = JSON.parse(data);
                    
                    if (cliente.error) {
                        alert(cliente.error);
                    } else {
                        $("#cliente-nombre").text(cliente.nombre);
                        $("#cliente-direccion").text(cliente.direccion);
                    }
                });
            });
        });
    </script>
</body>

<br>

<div>

    <button id="btn-print" type="button">print </button>

</div>  


<script type="text/javascript">
    
    $(document).ready(function (){
        $("#btn-print").on("click",function(){
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
              });
        });
</script>
</html>
