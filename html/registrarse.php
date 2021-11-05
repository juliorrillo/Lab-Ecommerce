<!DOCTYPE html>
<html>
<head>
	<title>Inicio Sesion </title>
	<!-- <link rel="stylesheet" href="../css/estilo.css"> -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>



	<div id="error"></div>
	<h1 class="text-center pb-3">Registrarse </h1>
	<div id="formu" class="d-flex justify-content-center align-items-center text-center"> 
		<form action="" method="post">
			<div class="form-group">
				<label for="Nom">Nombre</label>
				<input type="text" class="form-control" name="Nombre" id="Nom">
			</div>
			<div class="form-group">
				<label for="Ape">Apellido</label>
				<input type="text" name="Apellido" class="form-control" id="Ape">	
			</div>
			<div class="form-group">
				<label for="Usu">Usuario</label>
				<input type="text" name="Usuario" class="form-control" id="Usu">	
			</div>
			<div class="form-group">
				<label for="dni">DNI</label>
				<input type="text" name="DNI" class="form-control" id="dni">	
			</div>
			<div class="form-group">
				<label for="Tel">Telefono</label>
				<input type="text" name="Telefono" class="form-control" id="Tel">	
			</div>
			<div class="form-group">
				<label for="Dir">Dirección</label>
				<input type="text" name="Direccion" class="form-control" id="Dir">	
			</div>
			<div class="form-group">
				<label for="con1">Contraseña</label>
				<input type="password" name="Contrasenia" class="form-control" id="con1">
			</div>
			<div class="form-group">
				<label for="con2">Repetir Contraseña</label>
				<input type="password" name="Contrasenia2" class="form-control" id="con2">
			</div>
			<input type="submit" value="Registrarse" class="btn btn-success">
		</form>
	</div>



</body>

<!-- <script type="text/javascript">
		document.getElementById("formu").onsubmit = function () {
			var cont = document.getElementById("con1").value;
			var cont2 = document.getElementById("con2").value;
			var Nom = document.getElementById("Nom").value;
			var Ape = document.getElementById("Ape").value;
			var Usu = document.getElementById("Usu").value;
			var dni = document.getElementById("dni").value;
			var Tel = document.getElementById("Tel").value;
			var Dir = document.getElementById("Dir").value;

			if(Nom.length < 1 || Ape.length < 1 || Usu.length < 1 || dni.length < 1 || Tel.length < 1 || Dir.length < 1){
				var cartel = document.getElementById("error");
				cartel.innerHTML = "Ingrese los datos faltantes";
				cartel.style.display = "block";
			};

			if(cont.length < 1 || cont2.length < 1){
				var cartel = document.getElementById("error");
				cartel.innerHTML = "Ingrese la  contraseña";
				cartel.style.display = "block";
			};

			
			if (cont.length < 8) {
				var cartel = document.getElementById("error");
				cartel.innerHTML = "la contraseña debe tener 8 letras";
				cartel.style.display = "block";
				return false;
			}

			if(cont != cont2){

				var cartel = document.getElementById("error");
				cartel.innerHTML = "Las contraseñas no coinciden, intente nuevamente";
				cartel.style.display = "block";
				return false;
			};
		};
	</script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>