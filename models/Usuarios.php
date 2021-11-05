<?php

// models/Usuarios.php

class Usuarios extends Model{

	public $id;
	public $nombre;
	public $apellido;
	public $dni;
	public $telefono;
	public $direccion;

	public function crearUsuario ($nombre, $apellido, $usuario, $dni, $telefono, $direccion, $contrasenia, $Contrasenia2){

		if(!isset($nombre)) throw new ValidacionUsuarios("Error en CrearUsuario - Nombre");
		$nombre = substr($nombre, 0, 50);
		$nombre = $this->db->escape($nombre);

		if(!isset($apellido)) throw new ValidacionUsuarios("Error en CrearUsuario - Apellido");
		$apellido = substr($apellido, 0, 50);
		$apellido = $this->db->escape($apellido);

		if(!isset($usuario)) throw new ValidacionUsuarios("Error en CrearUsuario - Usuario");
		$usuario = substr($usuario, 0, 50);
		$usuario = $this->db->escape($usuario);

		if(!isset($dni)) throw new ValidacionUsuarios("Error en CrearUsuario - Dni");
		if(!ctype_digit($dni)){
			$error = 'El DNI debe ser un numero.';
			return $error;
		}

		if(strlen($dni) != 8){
			$error = 'El DNI debe tener 8 digitos';
			return $error;
		}

		if(!isset($telefono)) throw new ValidacionUsuarios("Error en CrearUsuario - Telefono");
		if(!ctype_digit($telefono)){
			$error = 'El telefono debe ser un numero';
			return $error;
		}

		if(strlen($telefono) < 7 ){
			$error = 'El telefono tiene que tener mas de 7 digitos ';
			return $error;
		}

		if(strlen($telefono) > 13 ){
			$error = 'El telefono tiene que tener menos de 13 digitos';
			return $error;
		}

		if(!isset($direccion)) throw new ValidacionUsuarios("Error en CrearUsuario - Direccion");
		$direccion = substr($direccion, 0, 50);
		$direccion = $this->db->escape($direccion);

		if(!isset($contrasenia)) throw new ValidacionUsuarios("Error en CrearUsuario - Password");
		$contrasenia = substr($contrasenia, 0, 50);
		$contrasenia = $this->db->escape($contrasenia);

		$contra = md5($contrasenia);

		$Contrasenia2 = substr($Contrasenia2, 0, 50);
		$Contrasenia2 = $this->db->escape($Contrasenia2);

		$contra2 = md5($Contrasenia2);

		if($contra == $contra2){

			$this->db->query("INSERT INTO usuario (nombre, apellido, usuario, dni, telefono, direccion, password) 
											VALUES ('$nombre', '$apellido', '$usuario', $dni, $telefono, '$direccion', '$contra')");
		}else{
			echo "las contraseñas no coinciden ";
		}	
	}

	public function IniciarSesion ($usuario, $password){

		session_start();
		
		if(!isset($usuario)) throw new ValidacionUsuarios("Error en IniciarSesion - Usuario");
		$usuario = substr($usuario, 0, 50);
		$usuario = $this->db->escape($usuario);

		if(!isset($password)) throw new ValidacionUsuarios("Error en IniciarSesion - password");
		$password = substr($password, 0, 50);
		$password = $this->db->escape($password);

		$pass = md5($password);

		$this->db->query("SELECT * FROM usuario WHERE usuario = '$usuario' and password = '$pass' LIMIT 1");

			if($this->db->numRows() == 1 ){
			$_SESSION['logueado'] = true;
			$fila = $this->db->fetch();
			$_SESSION['usuario'] = $fila['usuario'];
			//header("Location: PantallaProductos.php");
			//exit;
		}

	}

		public function existeUsuario($uid){
		if(!isset($uid)) throw new ValidacionUsuarios('Error en existeUsuario - El usuario no es válido');

		$this->db->query("SELECT * FROM usuario WHERE usuario = '$uid'");

		if($this->db->numRows() != 1) return false;

		return true;
	}

	public function getIdUsuario($nombreUsuario){
		
		if(!isset($nombreUsuario)) throw new ValidacionUsuarios("Error en getIdUsuario - Usuario");
		$this->db->query("SELECT id_usuario FROM usuario WHERE  usuario = '$nombreUsuario'");
		$aux = $this->db->fetch();
		return $aux['id_usuario'];
	}

		/* Muestra todos los datos del usuario */
	public function MisDatos($usuario){

		$usuarioaux = new Usuarios();

		if(!$usuarioaux->existeUsuario($usuario)) throw new ValidacionUsuarios("Error en MisDatos - Usuario"); 

		$this->db->query("SELECT * FROM usuario WHERE usuario = '$usuario'");

		return $this->db->fetchAll();

	}


	public function ActualizarPerfil($usuarioid, $nombre, $apellido, $dni, $telefono, $direccion){ 

		if(!isset($usuarioid)) throw new ValidacionUsuarios("Error en Actualizar Perfil - IdUsuario");
		if(!ctype_digit($usuarioid)) throw new ValidacionUsuarios("Error en Actualizar Perfil - IdUsuario No Numerico");;
		if($usuarioid < 0) return false;

		if(!isset($nombre)) throw new ValidacionUsuarios("Error en Actualizar Perfil - Nombre");
		$nombre = substr($nombre, 0, 50);
		$nombre = $this->db->escape($nombre);

		if(!isset($apellido)) throw new ValidacionUsuarios("Error en Actualizar Perfil - Apellido");
		$apellido = substr($apellido, 0, 50);
		$apellido = $this->db->escape($apellido);

		if(!isset($dni)) throw new ValidacionUsuarios("EError en Actualizar Perfil - Apellido");
		if(!ctype_digit($dni)){
			throw new ValidacionUsuarios('El DNI debe ser un numero.');
		}

		if(strlen($dni) != 8){
			throw new ValidacionUsuarios('El DNI debe tener 8 digitos');
		}

		if(!isset($telefono)) throw new ValidacionUsuarios("EError en Actualizar Perfil - Telefono");
		if(!ctype_digit($telefono)){
			throw new ValidacionUsuarios('El telefono debe ser un numero');
		}

		if(strlen($telefono) < 7 ){
			throw new ValidacionUsuarios('El telefono tiene que tener mas de 7 digitos ');
		}

		if(strlen($telefono) > 13 ){
			throw new ValidacionUsuarios('El telefono tiene que tener menos de 13 digitos');
		}

		if(!isset($direccion)) throw new ValidacionUsuarios("EError en Actualizar Perfil - Direccion");
		$direccion = substr($direccion, 0, 50);
		$direccion = $this->db->escape($direccion);

		$this->db->query("UPDATE usuario set nombre = '$nombre', apellido = '$apellido', dni = $dni, telefono = $telefono, direccion = 'direccion' WHERE id_usuario = $usuarioid ");

	}
}

class ValidacionUsuarios extends Exception {}