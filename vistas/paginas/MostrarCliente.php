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

/*Aca envio dos espacios vacios para el controlador ya que del otro lado mandamos item y valor */

$usuarios = ControladorFormularios::ctrSeleccionarCliente(null, null);

/*echo '<pre>';
print_r($usuarios);
echo '</pre>';*/

?>
<div id="dvd_factura">  
<table class="table table-striped" id="dvd_cliente" >
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre del cliente</th>
			<th>Apellido</th>
			<th>DPI</th>
			<th>Direccion</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

			<?php foreach ($usuarios as $key => $value): ?>
			<tr>
			<td><?php echo ($key+1)?></td>	
			<td><?php echo $value["nombre"] ?></td>
			<td><?php echo $value["apellido"]  ?></td>
			<td><?php echo $value["DPI"]  ?></td>
			<td><?php echo $value["direccion"]  ?></td>
			<td>
				 <div class="btn-group">
				   		<div class="px-1">


				   		<?php // aca le decimos al boton que nos mande a la pagina actualizar cliente, se pone en id el nombre del id de la base de datos despues de actualizar  cliente 
				   		/* Ejemplo:    
				   		<a href="index.php?pagina=NOMBRE DE LA PAGINA&id=<?php echo $value["ID DE LA BASE DE DATOS"] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> */?>

				   		<a href="index.php?pagina=ActualizarCliente&token=<?php echo $value["token"] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
			

				 		</div>


				 		<?php // Aca es para darle funcion al boton de eliminar */?>



				 		<form method="post">


				 		<input type="hidden" name="EliminarCliente" value="<?php echo $value["token"]; ?>">
				 		<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>	
				 		<?php
				 		$eliminar = new ControladorFormularios();
				 		$eliminar-> ctrEliminarCliente();

				 		?> 

				 		


				



				 		</form>
						
					</div>
			</td>
			</tr>

			<?php endforeach ?>
	</tbody>
</table>
</div>

<br>

<div>

	<button id="btn-print" type="button">print </button>

</div>	
<br>

<div>

	<button id="btn-print2" type="button">print2 </button>

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

		$("#btn-print2").on("click",function(){
			$("#dvd_formcliente").show()
		});

		imprimir_mensaje("Hola Mundo");
	})

	//function imprimir_mensaje(mensaje){
		alert(mensaje);
	//}

</script>