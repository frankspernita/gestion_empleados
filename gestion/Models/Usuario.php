<?php //namespace Models;
include_once 'Conexion.php';

	class Usuario{
		private $idusuario;
        private $idlocal;
        private $us_name;
        private $us_nombre;
        private $us_apellido;
        private $us_password;
        private $us_estado;
        //private $us_codseg;
        private $us_mail;

		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function altaUsuario(){
				$datos = [];

				$con = new Conexion();

				// perfiles
				$sql = "SELECT * FROM perfil";
				$data_row = $con->consultaRetorno($sql);
				while($row = mysqli_fetch_array($data_row, MYSQLI_ASSOC)){
				    $datos['perfiles'][] = $row;
				}
				
				// locales
				$sql = "SELECT * FROM local";
				$data_rows = $con->consultaRetorno($sql);
				while($row = mysqli_fetch_array($data_rows, MYSQLI_ASSOC)){
				    $datos['locales'][] = $row;
				}

				return $datos;
		}
		
		public function agregarUsuario(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO usuario(idlocal, us_name, us_nombre, us_apellido, us_password, us_estado, us_mail, idperfil) VALUES ({$this->idlocal}, '{$this->us_name}', '{$this->us_nombre}', '{$this->us_apellido}', '{$this->us_password}', {$this->us_estado}, '{$this->us_mail}', {$this->idperfil})";
            $con->consultaSimple($sql);
            //$datos = $con->consultaRetorno($sql);
            //return $datos;
        }

			public function buscarUsuario()
			{
				$datos = [];
				
				$con = new Conexion();
				$sql = "SELECT * FROM usuario WHERE idusuario = {$this->idusuario}";
				$data_row = $con->consultaRetorno($sql);
				$datos['usuario'] = mysqli_fetch_array($data_row, MYSQLI_ASSOC);
                
                // perfiles
				$sql = "SELECT * FROM perfil";
				$data_row = $con->consultaRetorno($sql);
				while($row = mysqli_fetch_array($data_row, MYSQLI_ASSOC)){
				    $datos['perfiles'][] = $row;
				}
				
				// locales
				$sql = "SELECT * FROM local";
				$data_rows = $con->consultaRetorno($sql);
				while($row = mysqli_fetch_array($data_rows, MYSQLI_ASSOC)){
				    $datos['locales'][] = $row;
				}
				
				return $datos;
			}

		/*public function agregarUsuario(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO usuario(idlocal, us_name, us_nombre, us_apellido, us_password, us_estado, us_mail, us_codseg) VALUES ({$this->idlocal}, '{$this->us_name}', '{$this->us_nombre}', '{$this->us_apellido}', '{$this->us_password}', {$this->us_estado}, '{$this->us_mail}', {$this->us_codseg})";
            //$sql1 = "SELECT LAST_INSERT_ID() as idusuario";
            $con->consultaSimple($sql);
            //$datos = $con->consultaRetorno($sql1);
            //return $datos;
        }*/
        
        public function updateUsuario(){                            
            $con = new Conexion();
			$sql = "UPDATE usuario SET idlocal = {$this->idlocal}, idperfil = {$this->idperfil}, us_name = '{$this->us_name}', us_nombre = '{$this->us_nombre}', us_apellido = '{$this->us_apellido}', us_password = '{$this->us_password}', us_mail = '{$this->us_mail}' WHERE idusuario = {$this->idusuario}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarUsuario(){                            
            $con = new Conexion();
			$sql = "DELETE FROM usuario WHERE idusuario = {$this->idusuario}";
            $con->consultaSimple($sql);
        }
        
        public function bloquearUsuario(){                            
            $con = new Conexion();
			$sql = "UPDATE usuario SET us_estado = 0 WHERE idusuario = {$this->idusuario}";
            $con->consultaSimple($sql);
        }

        public function desbloquearUsuario(){                            
            $con = new Conexion();
			$sql = "UPDATE usuario SET us_estado = 1 WHERE idusuario = {$this->idusuario}";
            $con->consultaSimple($sql);
        }

        public function verUsuarioNombre(){                            
            $con = new Conexion();
			$sql = "SELECT usuario.idusuario, usuario.us_name, CONCAT(CONCAT(usuario.us_apellido,', '),usuario.us_nombre) as usuario, usuario.us_estado FROM usuario WHERE usuario.us_name = '{$this->us_name}'";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
        
        public function verUsuario(){                            
            $con = new Conexion();
			$sql = "SELECT * FROM usuario WHERE idusuario = {$this->idusuario}";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
        
        public function verUsuarios(){                            
            $con = new Conexion();
			$sql = "SELECT u.idusuario as idusuario, u.us_name as us_name, u.us_nombre as us_nombre, u.us_apellido as us_apellido, u.idperfil, p.per_nombre as per_nombre, u.us_estado as us_estado, u.idlocal, l.loc_nombre as loc_nombre, u.us_mail as us_mail
			        FROM usuario AS u
			        LEFT JOIN perfil AS p ON p.idperfil = u.idperfil
			        LEFT JOIN local AS l ON l.idlocal = u.idlocal
			        ORDER BY idusuario";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
	}
?>