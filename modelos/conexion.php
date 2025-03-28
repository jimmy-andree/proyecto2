<?php
/**
 * 
 */
class Conexion
{
	
	static public function conectar()
	{

		#PDO("Nombre del servidor"; "nombre de la base de datos DBName data base name" ; "Usuario" , "contraseña")

		$link = new PDO("mysql:host=localhost;dbname=proyecto1","root","");
		$link ->exec("set names utf8");
		return $link;
	}

}