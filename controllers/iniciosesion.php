<?php

// controllers/iniciosesion.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../views/Login.php';
require '../views/Home.php';


if(count($_POST)> 0){
	
	$in = new Usuarios();

	if(!isset($_POST['usuario'])) throw new ValidacionUsuarios("error ini 1");
	if(!isset($_POST['pass'])) throw new ValidacionUsuarios("error ini 2");

	$in->IniciarSesion($_POST['usuario'], $_POST['pass']);

	if(!isset($_SESSION['logueado'])){
		header("Location: Iniciar-Sesion");
		exit;
	}
	else {
		header("Location: Menu");
		exit;
	}
	//$v = header("Location: PantallaProductos.php");

}else{
	$v = new Login();
}


$v->render();