<?php
// ESTO ES PARA VALIDAR EL INICIO DE SESION SINO NO DEJA USARSE
if (!isset($_SESSION["validarIngreso"]))
{
	echo '<script>window.location = "index.php?pagina=ingreso";</script>';
	return;
}

else 
{
	if($_SESSION["validarIngreso"] !="ok")
	{
		echo '<script>window.location = "index.php?pagina=ingreso";</script>';
		return;

	}

}

$usuarios = ControladorFormularios::ctrSeleccionarProveedor(null, null);
?>
<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">

 <!--DIV Descripcion--->
		 	<div class="form-group">
		 		<label for="descripcion">Descripcion</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="text" class="form-control" id="descripcion" name="registroDescripcion">
		 			
		 		</div>
		 		
		 	</div>	

		 	<div class="form-group">
		 		<label for="existencia">Existencia</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="text" class="form-control" id="existencia" name="registroExistencia">
		 			
		 		</div>
		 		
		 	</div>		





		 <!--<label for="existencia">Proveedor</label>
		 	
		 <br>

		<select name="IDproveedor" id="pet-select" class="form-select">


		<?php foreach ($usuarios as $key => $value): ?>
		<option value="<?php echo $value["IDproveedor"]; ?>"><?php echo $value["nombre"]; ?></option>


          
        <?php endforeach ?>
        </select>

        <br>-->

        <div class="mb-3">
		    <label for="proveedor-select" class="form-label">Seleccione un proveedor</label>
		    <select name="IDproveedor" id="proveedor-select" class="form-select">
		        <?php foreach ($usuarios as $key => $value): ?>
		        <option value="<?php echo $value["IDproveedor"]; ?>"><?php echo $value["nombre"]; ?></option>
		        <?php endforeach ?>
		    </select>
			</div>





























 <!--DIV Precio--->
		 	<div class="form-group">
		 		<label for="PrecioCompra">Precio Compra</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="text" class="form-control" id="PrecioCompra" name="registroPrecioCompra">
		 			
		 		</div>
		 		
		 	</div>	

		 	<div class="form-group">
		 		<label for="PrecioVenta">Precio Venta</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="text" class="form-control" id="PrecioVenta" name="registroPrecioVenta">
		 			
		 		</div>
		 		
		 	</div>	


			<?php
		 		$producto = ControladorFormularios::ctrPrducto();

		 	if ($producto == "ok")
		 	{
		 		echo'<script>
		 			if(window.history.replaceState)
		 			{
		 				window.history.replaceState( null, null, window.location.href);

		 			}
		 			</script>';


		 		echo '<div class="alert alert-success">El producto ha sido registrado</div>';

		 	}

		 	// Agregado el  2 del 11 del 2024 
		 	/* else 
		 	{
		 		echo '<div class="alert alert-fail">Nel chavo esta mal</div>';

		 	} */ 



		 	?>


		 	<!--Boton de enviar--->
		 	<button type="submit" class="btn btn-primary">Enviar</button>


		</form>
	



</div>