<?php


// controllers/Pagar.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../models/Productos.php';
require '../views/Login.php';
require '../views/Home.php';
require '../views/Pagar.php';
require '../views/PagoOk.php';

	if(!isset($_SESSION['logueado'])){
		$v = header("Location: Iniciar-Sesion");
		exit;
	}
	else {
		$v = new Home();
	}

if(isset($_POST['pagoOk'])){
    $p = new Productos();
    $u = new usuarios();
    //idusr = $u->getIdUsuario($_SESSION['usuario']);
    $idusr = $_SESSION['usuario'];
    foreach ($_SESSION['carrito'] as $indice => $producto) {
        $p->comprar($idusr,$producto['precio'],$producto['id'],$producto['cantidad']);
    }
 
    $v = new PagoOk();

    if(isset($_POST['limpio'])) //LImpio el Carrito
    {
            foreach ($_SESSION['carrito'] as $indice => $producto) {
                    unset($_SESSION['carrito'][$indice]);
                    echo '<script>console.log("Elemento eliminado...");</script>';               
            }
    }
}
else {
    if(isset($_POST['email'])){
        $v = new Pagar();
        //array_push($v->producto , new Productos());
        foreach ($_SESSION['carrito'] as $indice => $producto) {
            //unset($_SESSION['carrito'][$indice]);    
            array_push($v->producto,$_SESSION['carrito'][$indice]);   
        }
    }
}


 



$v->render();


?>