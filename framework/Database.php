<?php
// Patron Singleton
class Database{
	private $cn = false;
	private $res;
	private static $instace = false;

	private function __construct(){}

	public static function getInstance(){
		if (!self::$instace) self::$instace = new Database();
		return self::$instace;
	}

	private function connect(){
		$this->cn = mysqli_connect("localhost", "root", "", "scve");
	}

	public function query($q){
		if (!$this->cn) $this->connect(); 
		$this->res = mysqli_query($this->cn, $q);
		if(!$this->res) die(mysqli_error($this->cn) . "-- Consulta: "  . $q);
	}

	public function numRows(){
		return mysqli_num_rows($this->res);
	}

	public function fetch(){
		return mysqli_fetch_assoc($this->res);
	}

	public function fetchAll(){
		$aux = array();
		while ($fila = $this->fetch()) $aux[] = $fila; 
		return $aux;
	}

	public function escape($str){
		if(!$this->cn) $this->connect();
		return mysqli_escape_string($this->cn,$str);
	}

	public function escapeWildcard($str){
		$aux = str_replace('%', '\%', $str);
		$aux = str_replace('_', '\_', $str);
		return $str;
	}


}


