<!DOCTYPE html>
<html>
<head>
	<title>MisCompras</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">

</head>

<body>
		<header>
		<nav class="navbar navbar-light bg-dark">
				<a class="navbar-brand text-white" href="Menu">	
				 
				  SCVE
				</a>
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
					
        <div class="container text-center mt-3">
        <h1>Mis Compras</h1>
        <?php foreach($this->productos as $p) { ?>
				<div class="col-sm-12 col-md-12 col-lg-12 text-center p-5">

						<img width="100" class="Img-thumbnail" src="data:image/jpeg;base64,<?= base64_encode($p['fotos']) ?>">
						<p><?= $p['nombre'] ?></p>
						<p>$ <?= $p['precio'] ?></p>
						
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($p['id_productos'], COD, KEY); ?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($p['nombre'], COD, KEY); ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($p['precio'], COD, KEY); ?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">

				<?php } ?>
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