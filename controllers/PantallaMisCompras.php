<?php


// controllers/PantallaMiSCompras.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../models/Productos.php';
require '../views/Login.php';
require '../views/MisCompras.php';


	if(!isset($_SESSION['logueado'])){
		$v = header("Location: Iniciar-Sesion");
		exit;
	}
	else {
		$v = new MisCompras();
	}

	$p = new Productos();
	$usuario = $_SESSION['usuario'];
	$todosmios = $p->MisCompras($usuario);


	$v = new MisCompras();
	$v->productos = $todosmios;

 $v->render();