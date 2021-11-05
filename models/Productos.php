<?php

// models/Productos.php

class Productos extends Model{

	public $nombre;
	public $descripcion;
	public $id;
	public $precio;
	public $cantidad;

	public function crearVenta($usuarioid, $nombre, $descripcion, $precio, $foto){

		$usuarioaux = new Usuarios();		
		if(!$usuarioaux->existeUsuario($usuarioid)) throw new ValidacionProductos("error Productos 1 - Usuario Incorrecto"); 

		if(!isset($nombre)) throw new ValidacionProductos("error en Productos 2 - Nombre");
		$nombre = substr($nombre, 0, 50);
		$nombre = $this->db->escape($nombre);

		if(!isset($descripcion)) throw new ValidacionProductos("error en Productos 3 - Descripcion");
		$descripcion = substr($descripcion, 0, 50);
		$descripcion = $this->db->escape($descripcion);
		
		if(!ctype_digit($precio)) throw new ValidacionProductos("error en Productos 4 - Precio");

		
		$revisar = getimagesize($foto["tmp_name"]);
    	if($revisar !== false){
			$imagen = $foto["tmp_name"];
			$imgContenido = addslashes(file_get_contents($imagen));

		$this->db->query("INSERT INTO productos (nombre, descripcion, precio, fotos, fecha, usuario) VALUES ('$nombre', '$descripcion', $precio, '$imgContenido', NOW(), '$usuarioid' )  ");
	    $this->insertarRegistroVentas($usuarioid, $precio);
		}
	}

	public function insertarRegistroVentas($usuarioid, $precio)
	{
		$usuarioaux = new Usuarios();
		if(!isset($precio)) throw new ValidacionProductos("error RegistroVentas 1"); 	
		if(!ctype_digit($precio)) throw new ValidacionProductos("error RegistroVentas 2 - No es un numero");

		if(!$usuarioaux->existeUsuario($usuarioid)) throw new ValidacionProductos("error RegistroVentas 2"); 
		$usuarioid = $this->db->escape($usuarioid);

		$now = date_create()->format('Y-m-d H:i:s');
		$this->db->query("SELECT MAX(id_productos) FROM productos");
		$idprod = $this->db->fetch();
		$aux = implode($idprod);	
		$this->db->query("INSERT INTO movimentos (cantidad, fecha, id_producto, id_usuario, precio, tipo_mov) VALUES (1, '$now', '$aux', '$usuarioid', '$precio', 'VENTA') ");
	}

	public function comprar($usuarioid, $precio, $idProd, $cantidad){

		$usuarioaux = new Usuarios();	
		if(!ctype_digit($precio)) throw new ValidacionProductos("error Compras 1"); 
		if(!$usuarioaux->existeUsuario($usuarioid)) throw new ValidacionProductos("error Compras 2"); 
		if(!ctype_digit($idProd)) throw new ValidacionProductos("error Compras 3");
		if(!ctype_digit($cantidad)) throw new ValidacionProductos("error Compras 4"); 

		$now = date_create()->format('Y-m-d H:i:s');
		$this->db->query("INSERT INTO movimentos (cantidad, fecha, id_producto, id_usuario, precio, tipo_mov) VALUES ($cantidad, '$now', $idProd, '$usuarioid', '$precio', 'COMPRA')  ");
		
	}

	public function getTodos($usr){
		if(!isset($usr)) throw new ValidacionProductos("error getTodos 1"); 
		$usr = $this->db->escape(($usr));	
		$this->db->query("SELECT * FROM productos WHERE usuario != '$usr'");
		return $this->db->fetchAll();
	}

	public function getConFiltro($filtro,$usr){
		if(!isset($filtro)) throw new ValidacionProductos("error getConFiltro 1");
		$filtro = $this->db->escape($filtro);
		$filtro = $this->db->escapeWildcard($filtro); 	
		if(!isset($usr)) throw new ValidacionProductos("error getConFiltro 2"); 
		$usr = $this->db->escape($usr);	
		$this->db->query("SELECT * FROM productos p INNER JOIN movimentos m on p.id_productos = m.id_producto WHERE m.id_usuario <> '$usr' AND p.nombre LIKE '%$filtro%' and m.tipo_mov = 'VENTA'");
		return $this->db->fetchAll();
	}

	//consulta para mis compras 
	//SELECT * FROM `productos` p INNER JOIN movimentos m on p.id_productos = m.id_producto WHERE p.usuario = 'julianorrillo' and m.tipo_mov = 'COMPRA'
	public function MisCompras($usuario){

		$usuarioaux = new Usuarios();
		//$id = $usuarioaux->getIdUsuario($usuario);
		if(!$usuarioaux->existeUsuario($usuario)) throw new ValidacionProductos("error Productos 1"); 

		$this->db->query("SELECT * FROM productos p INNER JOIN movimentos m on p.id_productos = m.id_producto WHERE m.id_usuario = '$usuario' and m.tipo_mov = 'COMPRA'");

		return $this->db->fetchAll();

	}


	/* Muestra todos los productos del usuario */
	public function MiosTodos($usuario){

		$usuarioaux = new Usuarios();

		if(!$usuarioaux->existeUsuario($usuario)) throw new ValidacionProductos("error Productos 1"); 
		
		//$this->db->query("SELECT * FROM productos p INNER JOIN movimentos m on p.id_productos = m.id_producto WHERE m.id_usuario = '$usuario' and m.tipo_mov = 'VENTA'");
		$this->db->query("SELECT p.id_productos, p.descripcion, p.fecha, fotos, p.nombre, p.precio, p.usuario FROM productos p INNER JOIN movimentos m on p.id_productos = m.id_producto WHERE m.id_usuario = '$usuario' and m.tipo_mov = 'VENTA'");
		return $this->db->fetchAll();

	}

	/* Verifica si existe el producto*/
	public function existeProducto($pid){
		if(!isset($pid)) throw new ValidacionProductos("error existeProducto 1"); 	
		if(!ctype_digit($pid)) throw new ValidacionProductos("error existeProducto 2"); 

		$this->db->query("SELECT * FROM productos WHERE id_productos = $pid");
		//$aux = $this->db->fetch();
		if($this->db->numRows() != 1) return false;

		return true;
	}

	public function ActualizacionProducto($productosid, $nombre, $descripcion, $precio, $foto){
		if(!isset($productosid)) throw new ValidacionProductos("error ActualizacionProducto 1"); 	
		if(!ctype_digit($productosid)) throw new ValidacionProductos("error ActualizacionProducto 2");
		$productosid = (int)$productosid; 
		//if($productosid < 0) return false;

		if(!isset($nombre)) throw new ValidacionProductos("error ActualizacionProducto 3"); 	
		$nombre = substr($nombre, 0, 50);
		$nombre = $this->db->escape($nombre);

		if(!isset($descripcion)) throw new ValidacionProductos("error ActualizacionProducto 4"); 	
		$descripcion = substr($descripcion, 0, 50);
		$descripcion = $this->db->escape($descripcion);

		if(!isset($precio)) throw new ValidacionProductos("error ActualizacionProducto 4"); 	
		if(!ctype_digit($precio)){
			$error = 'El precio debe ser un numero.';
			return $error;
		}
		else{
			$precio = (float)$precio;
		}

		

		$revisar = getimagesize($foto["tmp_name"]);
    	if($revisar !== false){
			$imagen = $foto["tmp_name"];
			$imgContenido = addslashes(file_get_contents($imagen));

			$this->db->query("UPDATE productos set nombre = '$nombre', descripcion = '$descripcion', precio = $precio, fotos = '$imgContenido' WHERE id_productos = $productosid");

		}
	}

		public function EliminarProducto($productosid){
			if(!isset($productosid)) throw new ValidacionProductos("error EliminarProducto 1"); 	
			if(!ctype_digit($productosid)) throw new ValidacionProductos("error EliminarProducto 2");
			$productosid = (int)$productosid; 
			//if($productosid < 0) return false;

			$this->db->query("DELETE FROM productos WHERE id_productos = $productosid");

	}

}

class ValidacionProductos extends Exception {}

