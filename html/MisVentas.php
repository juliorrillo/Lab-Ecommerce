<!DOCTYPE html>
<html>
<head>
	<title>Vender</title>
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
		
		<div class="container text-center">
		<h1>Mis Ventas</h1>
				<div class="row d-flex justify-content-center align-items-center">
				<?php foreach($this->productos as $p) { ?>
				<form action="Mis-Ventas" class="formEditar" method="post" enctype="multipart/form-data">

						<div class="col-sm-12 col-md-12 col-lg-12">
							<img width="100" id="fot" class="Img-thumbnail mt-3 mb-5" src="data:image/jpeg;base64,<?= base64_encode($p['fotos']) ?>">
							<label for="idProd">EDITAR</label>
							<input type="checkbox" name="idProd" id="idProd" value="<?= $p['id_productos'] ?>">

							<div class="form-group form-inline p-1">
								<label for="idnom">Nombre</label>
								<input type="text" class="form-control w-100" name="nombre-producto" id="idnom" value="<?= $p['nombre'] ?>">		
							</div>
							<div class="form-group form-inline p-1">
								<label for="desc">Descripcion</label>
								<input type="text" class="form-control w-100" name="descripcion" id="desc" value="<?= $p['descripcion'] ?>">
							</div>
							<div class="form-group form-inline p-1">
								<label for="precio">Precio</label>
								<input type="text" class="form-control w-25" name="precio" id="precio" value="<?= $p['precio'] ?>"> 
							</div>
								<label>Foto</label>
								<input type="file"  id="prd_foto1" name="prd_foto1" value="data:image/jpeg;base64,<?= base64_encode($p['fotos']) ?>">							
								<input type="hidden" name="actualiza" id="actualiza" value="0">
								<input type="hidden" name="Elimina" id="Elimina" value="0">
							 
							<div class="form-group form-inline p-1">
								<input type="submit" value="Editar" class="btn btn-primary m-4" onclick="return validoyEnvioEditarMiVenta()">
								<input type="submit" value="Borrar" name="Eliminar"class="btn btn-primary m-4" onclick="return EliminarProducto()" >
							</div>
						</div>
				</form>
				<?php } ?>

				</div>
				<div class="alert alert-danger" id="alertaFoto" style="display:none"role="alert">
  								Debe seleccionar una foto!!!
				</div>
				<div class="alert alert-success" id="Exito" style="display:none"role="alert">
  								Se ha Actualizado el producto con Éxito!!!
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
<script src="/js/funciones.js"></script>
</html>