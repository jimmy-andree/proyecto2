<?php
class ControladorFormularios{

/*este metodo sirve para registrar en la base de datps*/
	/* public function ctrRegistro()
	{

		if (isset($_POST["registroNombre"]))
		{
			echo $_POST["registroNombre"];
		}
	} */


	

	static public function ctrConsultarCliente($item, $valor)
	{
		$tabla = "cliente";

		$respuesta = ModeloFormularios::mdlConsultarCliente($tabla, $item, $valor);

		return $respuesta;
	}

	/*este nos dice que el controlador cliente funcionara si y solo si RegistroNombre lleva un dato, la tabla cliente va  a dejar empezar a registrar los demas datos en los nombres : nombre, apellido, direccion etc. luego si son correctos los enviara a nuestro modeloformularios a la casilla de modelo cliente, si modelo cliente tiene todo bien, nos regresa la respuesta con un OK, el cual se ira a Cliente para que la casilla de cliente registrado se active */

	// Registro User------------------------------------------------------------------------------------

	static public function ctrRegistro()
	{
		if (isset($_POST["registroNombre"]))
		{
			$tabla = "registros";

			$datos = array ("nombre" => $_POST["registroNombre"],
			                "email" => $_POST["registroEmail"],
							"password" => $_POST["registroPassword"]);

			$respuesta = ModeloFormularios::mdlRegistro( $tabla, $datos);
			return $respuesta;



			// return "ok";
		}

	}



	/* Ingresos--------------------------------------------------------------------------------------------- */

	public function ctrIngreso ()
	{

		/* item es el campo que va a validar en la tabla de datos */
		/* Valor es el ingreso email que va en la pagina ingresom(lo que escribo en el formulario) */
		if (isset($_POST["ingresoEmail"]))
		{
			$tabla = "registros";
			$item = "email"; // El campo de la tabla
			$valor = $_POST["ingresoEmail"]; //Lo que escribo en el formulario

			$respuesta = ModeloFormularios::mdlParaIngresar($tabla, $item, $valor);


			if ($respuesta ["email"]== $_POST["ingresoEmail"] && $respuesta["password"]== $_POST["ingresoPassword"])
			{

				$_SESSION["validarIngreso"] = "ok";
				/*echo "Ingreso calidad"; */
				echo '<script>
					if(window.history.replaceState)
					{
						window.history.replaceState (null, null, window.location.href);
					}

					window.location = "index.php?pagina=MostrarCliente";

					</script>';
			}

			else 
			{
					echo '<script>
					if(window.history.replaceState)
					{
						window.history.replaceState (null, null, window.location.href);
					}
					</script>';

					echo '<div class="alert alert-danger"> Usuario o contraseña incorrectos.</div>';
			}
		}

	}


	//-------------------------------------CLIENTE--------------------------------------------
	static public function ctrCliente()
	{
		if (isset($_POST["registroNombrecliente"]))
		{
			$tabla = "cliente";
			$token = md5($_POST['registroNombrecliente']."+".$_POST['registroApellido']);

			$datos = array ("token" => $token,
							"nombre" => $_POST["registroNombrecliente"],
			                "apellido" => $_POST["registroApellido"],
							"direccion" => $_POST["registroDireccion"],
							"dpi" => $_POST["registroDPI"]);

			$respuesta = ModeloFormularios::mdlCliente($tabla, $datos);
			return $respuesta;
			
		}
	}


	//----------------------------------Mostrar clientes -------------------------------------------------------

	static public function ctrSeleccionarCliente($item, $valor)
	{
		$tabla = "cliente";

		$respuesta = ModeloFormularios::mdlSeleccionarCliente($tabla, $item, $valor);

		return $respuesta;
	}

	//----------------------------------actualizar clientes UPDATE -------------------------------------------------------

		static public function ctrActualizarCliente()
	{

		if(isset($_POST["actualizarNombre"]))
		{

			$usuario = ModeloFormularios::mdlSeleccionarCliente("Cliente", "token", $_POST['tokenUsuario']);

			$compararToken = md5($usuario["nombre"]."+". $usuario["apellido"]);
			/*echo '<pre>';
			print_r($_POST['IDUsuario']);
			echo '</pre>';*/

			/*echo '<pre>';
			print_r($usuario["IDcliente"]);
			echo '</pre>';*/
			if($compararToken == $_POST['tokenUsuario'] && $_POST['IDUsuario'] == $usuario["IDcliente"])
			{

				$tabla = "cliente";

				$actualizarToken = md5($_POST['actualizarNombre']."+".$_POST['actualizarApellido']);

				$datos = array("id" => $_POST['IDUsuario'],
								"token" => $actualizarToken,
							"nombre" => $_POST["actualizarNombre"],
			                "apellido" => $_POST["actualizarApellido"],
							"direccion" => $_POST["actualizarDireccion"],
							"dpi" => $_POST["actualizarDPI"]);

				$respuesta = ModeloFormularios::mdlActualizarClientes($tabla, $datos);

				return $respuesta;		

			}
			else
			{
				$respuesta = "error";
				return $respuesta;
			}

		}
	}


//----------------------------------eliminar clientes  -------------------------------------------------------

	public function ctrEliminarCliente()
	{
		if(isset($_POST["EliminarCliente"]))
		{
			$usuario = ModeloFormularios::mdlSeleccionarCliente("cliente", "token", $_POST['EliminarCliente']);

			if($usuario !='')
			{

		
					$compararToken = md5($usuario["nombre"]."+". $usuario["apellido"]);

					if($compararToken == $_POST['EliminarCliente'])
					{


						$tabla = "cliente";
						$valor = $_POST["EliminarCliente"];

						$respuesta = ModeloFormularios::mdlEliminarCliente($tabla, $valor);

						/*if($respuesta == "ok")
						{

							echo '<script>

								if ( window.history.replaceState ) {

									window.history.replaceState( null, null, window.location.href );

								}

								window.location = "index.php?pagina=inicio";

							</script>';

						}*/

				 	}
			}	
	

		}

	}






	
//----------------------------------------------PROVEEDOR-----------------------------------------------------

	static public function ctrProveedor()
	{
		if (isset($_POST["registroNombreproveedor"]))
		{
			$tabla = "proveedor";

			$datos = array ("nombre" => $_POST["registroNombreproveedor"],
			                "nit" => $_POST["registroNit"],
							"direccion" => $_POST["registroDireccionproveedor"]);

			$respuesta = ModeloFormularios::mdlProveedor( $tabla, $datos);
			return $respuesta;








			// return "ok";
		}

	}

	//----------------------------------Mostrar Proveedor -------------------------------------------------------

	static public function ctrSeleccionarProveedor()
	{
		$tabla = "proveedor";

		$respuesta = ModeloFormularios::mdlSeleccionarProveedor($tabla);

		return $respuesta;
	}

	//----------------------------------actualizar PROVEEDOR -------------------------------------------------------

	static public function ctrActualizarProveedor($item, $valor)
	{
		$tabla = "proveedor";

		$respuesta = ModeloFormularios::mdlActualizarProveedor($tabla, $item, $valor);

		return $respuesta;
	}

	//----------------------------------actualizar PROVEEDOR UPDATE -------------------------------------------------------

	static public function ctrActualizarProveedorUPDATE()

	{
		if(isset($_POST["actualizarNombreproveedor"]))
		{


			$tabla = "proveedor";

			$datos = array ("id" => $_POST["ActualizarID"],
			                "nombre" => $_POST["actualizarNombreproveedor"],
			                "nit" => $_POST["actualizarNit"],
							"direccion" => $_POST["actualizarDireccionproveedor"]);

			$respuesta = ModeloFormularios::mdlActualizarProveedorUPDATE( $tabla, $datos);
			return $respuesta;

		}
	}



//----------------------------------eliminar PROVEEDOR  -------------------------------------------------------

	public function ctrEliminarProveedor()
	{
		if(isset($_POST["eliminarProveedor"]))
		{
			$tabla = "proveedor";
			$valor = $_POST["eliminarProveedor"];

			$respuesta = ModeloFormularios::mdlEliminarProveedor($tabla, $valor);
			
			if ( $respuesta == "ok")
			{
				echo '<script>
					if(window.history.replaceState)
					{
						window.history.replaceState (null, null, window.location.href);
					}

					window.location = "index.php?pagina=proveedor";

					</script>';
				
			}
		}

	}




	//----------------------------------------------PRODUCTO-----------------------------------------------------

	static public function ctrPrducto()
	{
		if (isset($_POST["registroDescripcion"]))
		{
			$tabla = "prducto";

			$datos = array ("descripcion" => $_POST["registroDescripcion"],
							"existencia" => $_POST["registroExistencia"],
			                "PrecioCompra" => $_POST["registroPrecioCompra"],
			                "IDproveedor" => $_POST["IDproveedor"],
							"PrecioVenta" => $_POST["registroPrecioVenta"]);


			$respuesta = ModeloFormularios::mdlPrducto( $tabla, $datos);
			return $respuesta;








			// return "ok";
		}

	}

	//----------------------------------Mostrar producto -------------------------------------------------------

	static public function ctrSeleccionarPrducto()
	{
		$tabla = "prducto";

		$respuesta = ModeloFormularios::mdlSeleccionarPrducto($tabla);

		return $respuesta;
	}


	//----------------------------------actualizar Producto -------------------------------------------------------

	static public function ctrActualizarPrducto($item, $valor)
	{
		$tabla = "prducto";

		$respuesta = ModeloFormularios::mdlActualizarPrducto($tabla, $item, $valor);

		return $respuesta;
	}



	//----------------------------------actualizar PRODUCTO UPDATE -------------------------------------------------------

	static public function ctrActualizarPrductoUPDATE()

	{
		if(isset($_POST["actualizardescripcion"]))
		{


			$tabla = "prducto";

			$datos = array ("id" => $_POST["ActualizarID"],
			                "descripcion" => $_POST["actualizardescripcion"],
			                "existencia" => $_POST["actualizarExistencia"],
							"PrecioCompra" => $_POST["actualizarPrecioCompra"],
							"PrecioVenta" => $_POST["actualizarPrecioVenta"]);
							

			$respuesta = ModeloFormularios::mdlActualizarPrductoUPDATE( $tabla, $datos);
			return $respuesta;

		}
	}


//----------------------------------eliminar Producto  -------------------------------------------------------

	public function ctrEliminarPrducto()
	{
		if(isset($_POST["EliminarPrducto"]))
		{
			$tabla = "prducto";
			$valor = $_POST["EliminarPrducto"];

			$respuesta = ModeloFormularios::mdlEliminarPrducto($tabla, $valor);
			
			if ( $respuesta == "ok")
			{
				echo '<script>
					if(window.history.replaceState)
					{
						window.history.replaceState (null, null, window.location.href);
					}

					window.location = "index.php?pagina=MostrarProducto";

					</script>';
				
			}
		}

	}





}

?>
