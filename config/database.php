<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/config/config.php');
	
	class Database{
		private $conexion;
		private $db;
	
		public function conectar(){
			/* Conexión con MySQL */
			$this->conexion = mysql_connect(host, username, password);
			
			/* Para las tildes */
			mysql_query("SET NAMES 'utf8'");
			
			if ($this->conexion == 0){
				DIE("Error al conectar con MySQL: " . mysql_error());
			}
			
			/* Conexión con la BBDD */
			$this->db = mysql_select_db(dbname, $this->conexion);
			if ($this->db == 0){
				DIE("Error al conectar con la base datos: " . dbname);
			}
	 
			return true;
		}
	 
		public function desconectar(){
			if ($this->conexion) {
				mysql_close($this->conexion);
			}
		}
	}
?>



