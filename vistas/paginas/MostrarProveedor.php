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

$usuarios = ControladorFormularios::ctrSeleccionarProveedor();

/* echo '<pre>';
print_r($usuarios);
echo '</pre>'; */

?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre del Proveedor</th>
			<th>NIT</th>
			<th>Direccion</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

			<?php foreach ($usuarios as $key => $value): ?>
			<tr>
			<td><?php echo ($key+1)?></td>	
			<td><?php echo $value["nombre"] ?></td>
			<td><?php echo $value["NIT"]  ?></td>
			<td><?php echo $value["direccion"]  ?></td>
			<td>
				<div class="btn-group">
					<div class="px-1">


				   		<?php // aca le decimos al boton que nos mande a la pagina actualizar cliente, se pone en id el nombre del id de la base de datos despues de actualizar  cliente 
				   		/* Ejemplo:    
				   		<a href="index.php?pagina=NOMBRE DE LA PAGINA&id=<?php echo $value["ID DE LA BASE DE DATOS"] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> */?>

				   		<a href="index.php?pagina=ActualizarProveedor&id=<?php echo $value["IDproveedor"] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
			

				 		</div>


				 		<?php // Aca es para darle funcion al boton de eliminar */?>



				 		<form method="post">


				 		<input type="hidden" name="eliminarProveedor" value="<?php echo $value["IDproveedor"]; ?>">
				 		<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>	
				 		<?php
				 		$eliminar = new ControladorFormularios();
				 		$eliminar-> ctrEliminarProveedor();

				 		?>
				 		</form>
					
				</div>
			</td>
			</tr>

			<?php endforeach ?>
	</tbody>
</table>	