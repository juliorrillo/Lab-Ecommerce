
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
		
		<form action="Menu" method="GET" class="d-flex justify-content-center align-items-center form form-inline mb-5 p-2">
			<input type="text" class="form-control w-25" name="filtro" placeholder="Ingrese la descripcion del Artículo a buscar">
			<button class="btn btn-info ml-3" id="btnBuscador">Buscar</button>
			<button class="btn btn-warning ml-3" id="btnRestablecer">Restablecer Filtro</button>
		</form>
		
		<div class="row">
						<?php foreach($this->productos as $p) { ?>
							<div class="col-sm-12 col-md-12 col-lg-4 text-center p-3">
						<img width="100" class="Img-thumbnail" src="data:image/jpeg;base64,<?= base64_encode($p['fotos']) ?>">
						<p><?= $p['nombre'] ?></p>
						<p>$ <?= $p['precio'] ?></p>
						
						 <form action="Mi-Carrito" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($p['id_productos'], COD, KEY); ?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($p['nombre'], COD, KEY); ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($p['precio'], COD, KEY); ?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                                <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar el carrito</button>
                            </form>
				</div>
				<?php } ?>
				</div>
		</div>


		<footer class="page-footer font-small blue fixed-bottom">
  			<div class="footer-copyright text-center m-3">© 2020 Copyright:
				<b> Julian Orrillo - Rozenmuter Fabricio</b>
  			</div>
		</footer>
</body>








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>