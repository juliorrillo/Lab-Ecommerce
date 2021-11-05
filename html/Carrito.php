
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
		<header>
		<nav class="navbar navbar-light bg-dark">
				<a class="navbar-brand text-white" href="Menu">			  
				  SCVE
				</a>
				<ul class "navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="Mi-Carrito">Carrito(<?php 
							echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
							?>)</a>
					</li>
				</ul>
				<div class="dropdown dropleft">
					<button class="btn btn-info dropdown-toggle" type="botton" id="dropdownBoton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Hola <?= $_SESSION['usuario'] ?>
					</button>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="Vender" class="dropdown-item">Vender</a>
						<a href="Mis-Compras" class="dropdown-item">Mis Compras</a>
						<a href="Mis-Ventas" class="dropdown-item">Mis Ventas</a>
						<a href="Mi-Perfil" class="dropdown-item">Mi Pefil</a>
						<div class="dropdown-divider"></div>
						<a href="Cerrar-Sesion" class="dropdown-item">Cerrar Sesion</a>
					</div>
				</div>	
			  </nav>						
		</header>

		<div class="container">
			
			<h1>Lista de Carrito</h1>

			<?php if(!empty($_SESSION['carrito'])) { ?>
					<table class="table table-bordered">
					    <thead>
					        <tr>
					            <th width="40%">Descripcion</th>
					            <th width="15%" class="text-center">Cantidad</th>
					            <th width="20%" class="text-center">Precio</th>
					            <th width="20%" class="text-center">Total</th>
					            <th width="5%">--</th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php $total = 0;?>
					        <?php foreach($_SESSION['carrito'] as $indice => $producto){ ?>
					        <tr>
					            <td width="40%"><?= $producto['nombre'] ?></td>
					            <td width="15%" class="text-center"><?= $producto['cantidad'] ?></td>
					            <td width="20%" class="text-center">$<?= $producto['precio'] ?></td>
					            <td width="20%" class="text-center">$<?= number_format($producto['cantidad'] * $producto['precio'], 2) ?></td>
					            <td width="5%">
					                <form action="Mi-Carrito" method="POST">
					                    <input type="hidden" name="id" id="id" value="<?= openssl_encrypt($producto['id'], COD, KEY) ?>">
					                    <button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Eliminar</button>
					                </form>
					            </td>
					        </tr>
					        <?php $total = $total + ($producto['cantidad'] * $producto['precio']);?>
					        <?php } ?>
					    </tbody>
					    <tfoot>
					        <tr>
					            <td colspan="3" align="right"><h3>Total</h3></td>
					            <td align="right"><h3>$<?php echo number_format($total, 2); ?></h3></td>
					            <td></td>
					        </tr>
					        <tr>
					            <td colspan="5">
					                <form action="Pagar" method="post">
					                    <div class="alert alert-success" role="alert">
					                        <div class="form-group">
					                            <label for="email">Correo de contacto:</label>
												<input class="form-control" type="email" name="email" id="email" placeholder="Por favor escribe tu correo." required>
												<input type="hidden" name="id" id="id" value="<?= $producto['id']?>">
												<input type="hidden" name="precio" id="precio" value="$<?= $producto['precio'] ?>">
												<input type="hidden" name="nombre" id="nombre" value="$<?= $producto['nombre'] ?>">
												<input type="hidden" name="cant" id="cant" value="$<?= $producto['cantidad'] ?>">
					                        </div>
					                        <small id="emailHelp" class="form-text text-muted">Los productos se enviaran a este correo.</small>
					                    </div>
					                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder">
					                        Proceder a pagar >>
					                    </button>
					                </form>
					            </td>
					        </tr>
					    </tfoot>
					</table>
					<?php } else { ?>
					    <div class="alert alert-success" role="alert">
					        No hay productos en el carrito...
					    </div>
					<?php } ?>
			
		</div>

		<script src="js/jquery.min.js"></script>
		<footer class="page-footer font-small blue fixed-bottom">
  			<div class="footer-copyright text-center m-3">© 2020 Copyright:
				<b> Julian Orrillo - Rozenmuter Fabricio</b>
  			</div>
		</footer>
</body>
