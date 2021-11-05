<?php


// controllers/PantallaVentas.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../models/Productos.php';
require '../views/Login.php';
require '../views/Vender.php';
require '../views/AltaProductoOk.php';

	if(!isset($_SESSION['logueado'])){
		$v = header("Location: Iniciar-Sesion");
		exit;
	}
	else {
		$v = new Vender();
	}


	$e = new Usuarios();

	if(count($_POST) > 0){
		if($_POST['nombre-producto'] != '')
		{
			$p = new Productos();
		
 		$usuario = $_SESSION['usuario'];

		if(!isset($_POST['nombre-producto'])) throw new ValidacionProductos("error Pantalla Producto 1");
		if(!isset($_POST['descripcion'])) throw new ValidacionProductos("error Pantalla Producto 2");
		if(!isset($_POST['precio'])) throw new ValidacionProductos("error Pantalla Producto 3");
		//if (is_uploaded_file($_FILES["prd_foto1"]["tmp_name"]))  die("error Pantalla Producto 4");
		$foto =  $_FILES['prd_foto1'];
		if(!isset($foto)) throw new ValidacionProductos("error 4");

		$p->crearVenta($usuario, $_POST['nombre-producto'], $_POST['descripcion'], $_POST['precio'], $foto );

		$v = new AltaProductoOk();
		}
	}
$v->render();


?>