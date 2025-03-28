<?php

class ControladorPlantilla {
	/* -------------------------------
	Llamar a la plantilla
	--------------------------------*/

	public function ctrTraerPlantilla () {
		#include() se utiliza para invocar el archivo que contiene codigo html/php.
		#ctr es para saber que es un controlador.
		#mdl es modelo.
		include "vistas/plantilla.php";
	}
}

?>
