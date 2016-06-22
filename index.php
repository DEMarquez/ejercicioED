<?php

include_once"DB.php";
include_once"formAnyadirPeli.html";
include_once"formAnyadirUser.html";
include_once"fromAlquiler.html";

$datos=new DataBase;

if (isset($_POST['titulo']) && // insertar una pelicula
	isset($_POST['director']) &&
	isset($_POST['duracion']) &&
	isset($_POST['genero'])) {

	$datos->insertarPeliculas($_POST['titulo'], $_POST['director'], $_POST['duracion'], $_POST['genero']);

}else if (isset($_POST['nombre']) && // insertar un usuario
		  isset($_POST['apellido']) &&
		  isset($_POST['dni']) &&
		  isset($_POST['saldo'])) {

	$datos->insertarUsuario($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['saldo']);

}else if (isset($_POST['tituloPelicula']) &&//insertar un alquiler
		  isset($_POST['dniUsuario'])) {

	$datos->insertarAlquiler($_POST['tituloPelicula'], $_POST['dniUsuario']);

}else if (isset($_POST['dniUsuario'])) {
	
	$datos->selectDatos();

}else if (isset($_POST['actualizarSaldo'])){//actualizar saldo usuario

	$datos->insertarAlquiler($_POST['dni']);
}


?>