<?php


// controllers/Home.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../models/Productos.php';
require '../views/Login.php';
require '../views/Home.php';

	if(!isset($_SESSION['logueado'])){
		$v = header("Location: Iniciar-Sesion");
		exit;
	}
	else {
		$v = new Home();
	}

$p = new Productos();
if(isset($_GET['filtro']) && $_GET['filtro'] != '')
{
	$filtro = $_GET['filtro'];
	$todos = $p->getConFiltro($filtro,$_SESSION['usuario']);
}
else {
	$todos = $p->getTodos($_SESSION['usuario']);
}


$v = new Home();
$v->productos = $todos;
$v->render();


?>