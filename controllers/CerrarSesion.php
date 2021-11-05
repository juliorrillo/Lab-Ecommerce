<?php

	session_start();
	unset($_SESSION['logueado']);
	unset($_SESSION['carrito']);
	header("Location: Iniciar-Sesion");

?>