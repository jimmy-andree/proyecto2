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
?>
<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">

 <!--DIV nombre--->
		 	<div class="form-group">
		 		<label for="nombrecliente">Nombre del cliente</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="text" class="form-control" id="nombrecliente" name="registroNombrecliente">
		 			
		 		</div>
		 		
		 	</div>	

 <!--DIV apellido--->
		 	<div class="form-group">
		 		<label for="apellido">Apellido</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="text" class="form-control" id="apellido" name="registroApellido">
		 			
		 		</div>
		 		
		 	</div>	

 <!--DIV DPI--->
		 	<div class="form-group">
		 		<label for="dpi">DPI</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="number" class="form-control" id="dpi" name="registroDPI">
		 			
		 		</div>
		 		
		 	</div>	


 <!--DIV Direccion--->
		 	<div class="form-group">
		 		<label for="direccion">Direccion</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="text" class="form-control" id="direccion" name="registroDireccion">
		 			
		 		</div>
		 		
		 	</div>



 <!--DIV fechanacimiento--->
		 	<div class="form-group">
		 		<label for="fechanacimiento">Fecha de nacimiento</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="date" class="form-control" id="fechanacimiento" name="registroFechanacimiento">
		 			
		 		</div>
		 		
		 	</div>

		<?php

		 	/* asi se trabajan los metodos NO estaticos estos hacen responsable al controlador y no llevan ni if ni 2 puntos.
		 	$registro = new ControladorFormularios();
		 	$registro -> ctrRegistro();
		 	*/

		 	/* Asi se trabajan los metodos estaticos, estos se usan si tiene dos puntos (::) y si tiene un if que sirve para controlar todo el controlador*/
		 	$cliente = ControladorFormularios::ctrCliente();

		 	if ($cliente == "ok")
		 	{
		 		echo'<script>
		 			if(window.history.replaceState)
		 			{
		 				window.history.replaceState( null, null, window.location.href);

		 			}
		 			</script>';


		 		echo '<div class="alert alert-success">El cliente ha sido registrado</div>';

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