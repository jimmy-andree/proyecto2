<?php

#EL INDEX: En él mostraremos la salida de las vistas al usuario y tambien a traves de el enviaremos las distintas acciones que el usuario envie al controlador. 

#require() establece que el código del archivo invocado es requerido, es decir, es obligatorio para el funcionamiento del programa. Por ello, si el archivo especificado en la funcion require() no se encuentra saltará un error "PHP Fatal Error" y el programa PHP se detendra.

#La versión require_once() funciona de la misma forma que su respectivo, solo que, al utilizar la version _once, se impide la carga de un mismo archivo mas de una vez.

#Si requerimos el mismo codigo mas de una vez, corremos el riesgo de redeclaraciones de variables, funciones o clases.

require_once "controladores/plantilla.controlador.php";
require_once "controladores/formularios.controlador.php";
require_once "modelos/formularios.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();








?>