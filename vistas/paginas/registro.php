<div class="d-flex justify-content-center text-center">

		<form class="p-5 bg-light" method="post">

		 <!---Un DIV es el cuadro del formulario---->
		 <!--DIV Registro--->
		 	<div class="form-group">
		 		<label for="nombre">Nombre</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="text" class="form-control" id="nombre" name="registroNombre">
		 			
		 		</div>
		 		
		 	</div>	

		 	<!--DIV correo electronico--->
		 	<div class="form-group">
		 		<label for="email">Correo Electronico</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-envelope"></i>
		 				</span>
		 			</div>
		 			<input type="email" class="form-control" id="email" name="registroEmail">
		 			
		 		</div>
		 		
		 	</div>

		 	<!--DIV Contraseña--->
		 	<div class="form-group">
		 		<label for="pwd">Contraseña</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-lock"></i>
		 				</span>
		 			</div>
		 			<input type="password" class="form-control" id="pwd" name="registroPassword">
		 			
		 		</div>
		 		
		 	</div>

		 	<?php

		 	/* asi se trabajan los metodos NO estaticos
		 	$registro = new ControladorFormularios();
		 	$registro -> ctrRegistro();
		 	*/

		 	/* Asi se trabajan los metodos estaticos*/
		 	$registro = ControladorFormularios::ctrRegistro();

		 	if ($registro == "ok")
		 	{
		 		echo'<script>
		 			if(window.history.replaceState)
		 			{
		 				window.history.replaceState( null, null, window.location.href);

		 			}
		 			</script>';


		 		echo '<div class="alert alert-success">El usuario ha sido registrado</div>';

		 	}



		 	?>



		 	<!--Boton de enviar--->
		 	<button type="submit" class="btn btn-primary">Enviar</button>


		</form>
	



</div>