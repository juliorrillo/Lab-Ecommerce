<?php

// controllers/PantallaProducto.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../views/Home.php';

	session_start();
	if(!isset($_SESSION['logueado'])){
		header("Location: Iniciar-Sesion");
		exit;
	}

	

	$v->render();