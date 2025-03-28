<?php
    session_start(); // esto nos da permiso a utilizar variables tipo sesión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="HTML/fontawesome/css/all.min.css">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">-->

    <style>
        body {
            background-color: #f0f8ff; /* Color de fondo suave */
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: #007bff; /* Azul vibrante para el menú */
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #f0f8ff !important;
        }
        .dropdown-menu {
            background-color: #28a745; /* Verde para los dropdowns */
        }
        .dropdown-item {
            color: white;
        }
        .dropdown-item:hover {
            background-color: #007bff; /* Azul al pasar el mouse */
            color: white;
        }
        .container-fluid h3 {
            text-align: center;
            margin-top: 20px;
            font-size: 2.5em;
            color: #333; /* Color del título */
        }
        .container {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

    <div class="container-fluid">
        <h3>Proyecto Jimmy Lester Leidy</h3>
    </div>

   


    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Inicio
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?pagina=ingreso">Ingreso</a>
                        <a class="dropdown-item" href="index.php?pagina=registro">Registro</a>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cliente
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?pagina=cliente">Cientes</a>
                        <a class="dropdown-item" href="index.php?pagina=MostrarCliente">Mostrar lista de clientes</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Proveedor
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?pagina=proveedor">Proveedor</a>
                        <a class="dropdown-item" href="index.php?pagina=MostrarProveedor">Mostrar Proveedor</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Producto
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?pagina=producto">Producto</a>
                        <a class="dropdown-item" href="index.php?pagina=MostrarProducto">Mostrar lista de producto</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Factura
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?pagina=factura">Realizar Factura</a>
                        <a class="dropdown-item" href="index.php?pagina=RealizarVenta.html">Realizar Venta</a>
                    </div>
                </li>


                <!--SALIR -->
                <?php if ($_GET["pagina"] == 'salir'): ?>

                    <li class="nav-item">
                        <a href="index.php?pagina=salir" class="nav-link active">Salir</a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a href="index.php?pagina=salir" class="nav-link">Salir</a>
                    </li>

                <?php endif ?>




            </ul>
        </div>
    </nav>

    <div class="container py-5">
        <?php
        if (isset($_GET["pagina"])) {
            $pagina = $_GET["pagina"];
            $valid_pages = ["registro", "ingreso", "ActualizarCliente", "MostrarCliente", "cliente", "proveedor", "MostrarProveedor", "ActualizarProveedor", "producto", "ActualizarProducto", "MostrarProducto", "salir", "registro", "factura", "ConsultarCliente", "RealizarVenta.html"];
            
            if (in_array($pagina, $valid_pages)) {
                if(strpos($pagina, ".html") !== false){
                    include "paginas/" . $pagina;
                }
                else{
                    include "paginas/" . $pagina . ".php";
                }
            } else {
                include "paginas/error404.php";
            }
        } else {
            include "paginas/cliente.php";
        }
        ?>
    </div>


    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>