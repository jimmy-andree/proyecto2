<?php 
	
	if(isset($_GET["token"]))
	{
		$item = "token";
		$valor = $_GET["token"];

		$usuario = ControladorFormularios::ctrSeleccionarCliente($item, $valor);
		/*echo '<pre>';
		print_r($usuario);
		echo '</pre>';*/
	}
?>


<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">

		<div class="form-group">
			<label for="existencia">Nombre</label>
			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-user"></i>
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" id="nombre" name="actualizarNombre">

			</div>
			
		</div>

		<div class="form-group">
			<label for="existencia">Apellido</label>
			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-user"></i>
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $usuario["apellido"]; ?>" id="apellido" name="actualizarApellido">
			
			</div>
			
		</div>

		<div class="form-group">
			<label for="existencia">DPI</label>
			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-envelope"></i>
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $usuario["DPI"]; ?>" id="DPI" name="actualizarDPI">
			
			</div>
			
		</div>

		<div class="form-group">
			<label for="existencia">Dirección</label>
			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-envelope"></i>
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $usuario["direccion"]; ?>" id="direccion" name="actualizarDireccion">
				<input type="hidden" name="tokenUsuario" value="<?php echo $usuario["token"]; ?>">
				<input type="hidden" name="IDUsuario" value="<?php echo $usuario["IDcliente"]; ?>">
			
			</div>
		</div>




		<?php

			$actualizar = ControladorFormularios::ctrActualizarCliente();

		if($actualizar == "error"){

			echo '<script>

			if ( window.history.replaceState ) {

				window.history.replaceState( null, null, window.location.href );

			}

			</script>';

			echo '<div class="alert alert-danger">Error al actualizar</div>';


		}

		if($actualizar == "ok"){

			echo '<script>

			if ( window.history.replaceState ) {

				window.history.replaceState( null, null, window.location.href );

			}

			</script>';

			echo '<div class="alert alert-success">El usuario ha sido actualizado</div>


			<script>

				setTimeout(function(){
				
					window.location = "index.php?pagina=cliente";

				},3000);

			</script>';

		}

		?>

		<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>

</div>