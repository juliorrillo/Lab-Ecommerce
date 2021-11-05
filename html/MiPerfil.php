<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
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
			<h1>Mi Perfil</h1>
				<div class="row d-flex justify-content-center align-items-center">
					<?php foreach($this->usuarios as $u) { ?>
						<form action="Mi-Perfil" class="formEditarPerfil" method="post" enctype="multipart/form-data">
							
									<label for="idUsu">EDITAR</label>
									<input type="checkbox" name="idUsu" id="idUsu" value="<?= $u['id_usuario'] ?>">

									<div class="form-group form-inline p-1">
										<label for="idnom">Nombre</label>
										<input type="text" class="form-control w-100" name="nombre-usuario" id="idnom" value="<?= $u['nombre'] ?>">		
									</div>
									<div class="form-group form-inline p-1">
										<label for="desc">Apellido</label>
										<input type="text" class="form-control w-100" name="apellido" id="desc" value="<?= $u['apellido'] ?>">
									</div>
									<div class="form-group form-inline p-1">
										<label for="dni">dni</label>
										<input type="text" class="form-control w-100" name="dni" id="dni" value="<?= $u['dni'] ?>"> 
									</div>
										<div class="form-group form-inline p-1">
										<label for="telefono">telefono</label>
										<input type="text" class="form-control w-100" name="telefono" id="telefono" value="<?= $u['telefono'] ?>"> 
									</div>		
										<div class="form-group form-inline p-1">
										<label for="direccion">direccion</label>
										<input type="text" class="form-control w-100" name="direccion" id="direccion" value="<?= $u['direccion'] ?>"> 
									</div>					
										<input type="hidden" name="actualizar" id="actualiza" value="0">
										<input type="submit" value="Editar" class="btn btn-primary m-4" onclick="EditarPerfil()">				
						</form>
				</div>
					<?php } ?>
					<div class="alert alert-success" id="Exito" style="display:none"role="alert">
  								Se ha Actualizado el perfil de usuario
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