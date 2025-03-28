<?php



/* Aca nos sirve para recoger el valor del ID que envia el boton, el valor que aparece en la URL, el ITEM señala la columna de donde va a busca (ID), el valor señala el ID que debe encontrar (El numero de la URL) 
el GET pregunta si va algo en el ID de la URL, es ese ID.*/

	if ($_GET["IDproducto"]) 
	{
		$item = "IDproducto";
		$valor = $_GET["IDproducto"];


		$usuarios=ControladorFormularios::ctrActualizarPrducto($item, $valor);



	}


	/* echo '<pre>';
	print_r($usuarios);
	echo '</pre>'; */

	

?>
 

<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">

 <!--DIV nombre--->
		 	<div class="form-group">
		 		<label for="precio">Descripcion</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
 <!--Aca se agrega VALUE usando PHP se coloca el nombre que va en USUARIOS, osea el nombre de la casilla de la base de datos, esto nos sirve para mostrar en la casilla los valores que ya estaban registrados antes

 Ademas los name de las cajas de texto se cambian los registronombre, por actualizarnombre--->
		 			<input type="text" class="form-control" id="descripcion" name="actualizardescripcion" value="<?php echo $usuarios["descripcion"]; ?>">
		 			
		 		</div>
		 		
		 	</div>	

 <!--DIV Precio--->
		 	<div class="form-group">
		 		<label for="precio">Precio Compra</label>
		 		<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="text" class="form-control" id="PrecioCompra" name="actualizarPrecioCompra" value="<?php echo $usuarios["PrecioCompra"]; ?>">
		 			
		 		</div>
		 		
		 	</div>

<!--DIV PrecioVenta--->
		 	<div class="form-group">
		 		<label for="PrecioVenta">Precio Venta</label>
		 			<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="text" class="form-control" id="PrecioVenta" name="actualizarPrecioVenta" value="<?php echo $usuarios["PrecioVenta"]; ?>">
		 			
		 		</div>
		 		
		 	</div>		
<!--DIV existencia--->
		 	<div class="form-group">
		 		<label for="existencia">Existencia</label>
		 			<div class="input-group">
		 			<div class="input-group-prepend">
		 				<span class="input-group-text">
		 					<i class="fas fa-user"></i>
		 				</span>
		 			</div>
		 			<input type="text" class="form-control" id="existencia" name="actualizarExistencia" value="<?php echo $usuarios["existencia"]; ?>">
		 			
		 		</div>
		 		
		 	</div>	


 <!--INPUT escondidos--->

 <div class="form-group">	
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>	
				</div>
				<input type="hidden"  name="ActualizarID"	value="<?php echo $usuarios["IDproducto"];?>">

			</div>	
			
		</div>	

		 	

		 	 <!--Esta parte se usa para el UPDATE, para que sirva el boton de actualizar--->
		<?php

		$respuesta = ControladorFormularios::ctrActualizarPrductoUPDATE();
			if($respuesta=="ok")

			{
				echo'<script>

		 			if(window.history.replaceState)
		 			{
		 				window.history.replaceState( null, null, window.location.href);

		 			}
		 			</script>';


		 		echo '<div class="alert alert-success">El producto ha sido actualizado </div>;

		 		<script>
		 			setTimeout(function()
		 			
		 			{window.location = "index.php?pagina=producto";},3000);
		 		</script>';



			}


		


		 ?>



		 	<!--Boton de enviar--->
		 	<button type="submit" class="btn btn-primary">Enviar</button>


		</form>
	



</div>