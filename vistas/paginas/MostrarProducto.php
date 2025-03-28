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

$usuarios = ControladorFormularios::ctrSeleccionarPrducto();

/* echo '<pre>';
print_r($usuarios);
echo '</pre>'; */

?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>IDproducto</th>
			<th>descripcion</th>
			<th>Proveedor</th>
			<th>PrecioCompra</th>
			<th>PrecioVenta</th>
			<th>existencia</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

<?php foreach ($usuarios as $key => $value): ?>
			<tr>
				<td><?php echo ($key+1) ?></td>
				<td><?php echo $value["IDproducto"]?></td>
				<td><?php echo $value["descripcion"]?></td>
				<td><?php echo $value["nombre"]?></td>
				<td><?php echo $value["PrecioCompra"]?></td>
				<td><?php echo $value["PrecioVenta"]?></td>
				<td><?php echo $value["existencia"]?></td>

				<td>
					<div class="btn-group">

						<div class="px-1">

						<a href="index.php?pagina=ActualizarProducto&IDproducto=<?php echo $value["IDproducto"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

						</div>

						<form method="post">

						<input type="hidden" name="EliminarPrducto" value="<?php echo $value["IDproducto"];  ?>">

						<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

						<?php

							$eliminar = new ControladorFormularios();
							$eliminar -> ctrEliminarPrducto();

						?>


						</form>
					</div>
				</td>
			</tr>	
		<?php endforeach ?>
	</tbody>
</table>	