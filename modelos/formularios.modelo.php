<?php 

require_once "conexion.php";

class ModeloFormularios
{
	/* Este modelo se crea para insertar los datos dentro de la base de datos, y tienen que ir los nombres de como aparecen en la tabla del controlador y de la base de datos  */

	static public function mdlConsultarCliente($tabla, $item, $valor)
	{
		/* $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); */
		$stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha,'%d/%m/%y') AS fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt -> fetch();

	}


	// ------------------------------Registrar User----------------------------------------------------
	static public function mdlRegistro($tabla, $datos) 
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password) VALUES (:nombre, :email, :password)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

		if($stmt->execute())
		{
			return "ok";
		}

		else

		{
			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();
		$stmt = null; 

	}


	// --------------------------Ingreso del user ------------------------------------------------------
	static public function mdlParaIngresar($tabla, $item, $valor)
	{
		/* $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); */
		$stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha,'%d/%m/%y') AS fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt -> fetch();

	}



	//-------------------------------------CLIENTE--------------------------------------------
	static public function mdlCliente($tabla, $datos) 
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(token, nombre, apellido, direccion, dpi) VALUES (:token, :nombre, :apellido, :direccion, :dpi)");

		$stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":dpi", $datos["dpi"], PDO::PARAM_INT);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		/*$stmt->bindParam(":FechaNacimiento", $datos["FechaNacimiento"], PDO::PARAM_INT);*/

		if($stmt->execute()) 
		{
			return "ok";
		}

		else

		{
			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();
		$stmt = null; 

	}

	/* aca es para hacer que aparescan los datos de la base de datos, por ejemplo este modelo se crea
	con el fin de que stmt ejecute la conexion y prepara la tabla ordenando por IDcliente que es como aparece el id en 
	la base de datos */
	static public function mdlSeleccionarCliente($tabla, $item, $valor) 
	{
		if($item == null && $valor == null)
		{
			/*$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");*/

			$stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fechNacimiento, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY IDcliente DESC");

			$stmt->execute();

			return $stmt -> fetchAll();
		}
		else
		{
			$stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fechNacimiento, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item ORDER BY IDcliente DESC");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
 
			$stmt->execute();

			return $stmt -> fetch();
		}

		
		$stmt->close();

		$stmt = null;
	}


		//-------------------------------------Actualizar CLIENTE UPDATE--------------------------------------------
	static public function mdlActualizarClientes($tabla, $datos) 
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET token  = :token, nombre = :nombre, apellido = :apellido, dpi = :dpi, direccion = :direccion WHERE IDcliente = :id");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":dpi", $datos["dpi"], PDO::PARAM_INT);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute())
		{
			return "ok";
		}

		else

		{
			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();
		$stmt = null; 

	}



		/*---------------
	eliminar Cliente (Modelo)
	-------------*/

	static public function mdlEliminarCliente ($tabla, $valor)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE token=:token");
		$stmt->bindParam(":token", $valor, PDO::PARAM_STR);

			if($stmt->execute())
		{
			return "ok";
		}

		else

		{
			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();
		$stmt = null; 
		
	}



	//----------------------------------------------PROVEEDOR-----------------------------------------------------

		static public function mdlProveedor($tabla, $datos) 
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nit, nombre, direccion) VALUES (:nit, :nombre, :direccion)");

		$stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		

		if($stmt->execute())
		{
			return "ok";
		}

		else

		{
			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();
		$stmt = null; 

	}

	static public function mdlSeleccionarProveedor($tabla) 
	{
		/* $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); */

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY IDproveedor DESC");
		$stmt->execute();
		return $stmt -> fetchAll();
	}

		//-------------------------------------Actualizar PROVEEDOR--------------------------------------------
	static public function mdlActualizarProveedor($tabla, $item, $valor) 
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= :$item ORDER BY IDproveedor DESC");

		$stmt->bindParam(":". $item, $valor, PDO::PARAM_STR);

		$stmt->execute();
		return $stmt -> fetch();
	}



		//-------------------------------------Actualizar PROVEEDOR UPDATE--------------------------------------------
	static public function mdlActualizarProveedorUPDATE($tabla, $datos) 
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, nit = :nit, direccion = :direccion WHERE IDproveedor = :id");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_INT);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute())
		{
			return "ok";
		}

		else

		{
			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();
		$stmt = null; 

	}


		/*---------------
	eliminar PROVEEDOR (Modelo)
	-------------*/

	static public function mdlEliminarProveedor ($tabla, $valor)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IDproveedor=:id");
		$stmt->bindParam(":id", $valor, PDO::PARAM_STR);

			if($stmt->execute())
		{
			return "ok";
		}

		else

		{
			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();
		$stmt = null; 
		
	}






		//----------------------------------------------PRODUCTO-----------------------------------------------------


		static public function mdlPrducto($tabla, $datos) 
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion, existencia, PrecioCompra, PrecioVenta, IDproveedor) VALUES (:descripcion, :existencia, :PrecioCompra, :PrecioVenta, :IDproveedor)");

		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":existencia", $datos["existencia"], PDO::PARAM_STR);
		$stmt->bindParam(":PrecioCompra", $datos["PrecioCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":PrecioVenta", $datos["PrecioVenta"], PDO::PARAM_STR);
		$stmt->bindParam(":IDproveedor", $datos["IDproveedor"], PDO::PARAM_INT);

		if($stmt->execute())
		{
			return "ok";
		}

		else

		{
			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();
		$stmt = null; 

	}

	static public function mdlSeleccionarPrducto($tabla) 
	{
		/* $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); */

		$stmt = Conexion::conectar()->prepare("SELECT IDproducto, descripcion, proveedor.nombre, PrecioCompra, PrecioVenta, existencia FROM prducto, proveedor WHERE proveedor.IDproveedor =  prducto.IDproveedor");
		$stmt->execute();
		return $stmt -> fetchAll();
	}

	//-----SELECT * FROM prducto, proveedor WHERE proveedor.IDproveedor =  prducto.IDproveedor 
	//-------SELECT * FROM $tabla ORDER BY IDproducto DESC 
	//-------SELECT prducto.IDproducto, prducto.descripcion, proveedor.nombre, prducto.PrecioCompra, prducto.PrecioVenta, prducto.existencia FROM prducto, proveedor WHERE proveedor.IDproveedor =  prducto.IDproveedor

		//-------------------------------------Actualizar Producto--------------------------------------------
	static public function mdlActualizarPrducto($tabla, $item, $valor) 
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= :$item ORDER BY IDproducto DESC");

		$stmt->bindParam(":". $item, $valor, PDO::PARAM_STR);

		$stmt->execute();
		return $stmt -> fetch();

	}



		//-------------------------------------Actualizar PRODUCTO UPDATE--------------------------------------------
	static public function mdlActualizarPrductoUPDATE($tabla, $datos) 
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion,existencia = :existencia, PrecioCompra = :PrecioCompra, PrecioVenta = :PrecioVenta WHERE IDproducto = :id");

		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":existencia", $datos["existencia"], PDO::PARAM_STR);
		$stmt->bindParam(":PrecioCompra", $datos["PrecioCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":PrecioVenta", $datos["PrecioVenta"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute())
		{
			return "ok";
		}

		else

		{
			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();
		$stmt = null; 

	}



		/*---------------
	eliminar producto (Modelo)
	-------------*/

	static public function mdlEliminarPrducto ($tabla, $valor)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IDproducto=:id");
		$stmt->bindParam(":id", $valor, PDO::PARAM_STR);

			if($stmt->execute())
		{
			return "ok";
		}

		else

		{
			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();
		$stmt = null; 
		
	}

	



}