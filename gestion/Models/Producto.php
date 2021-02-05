<?php //namespace Models;
include_once 'Conexion.php';
	
	class Producto{
        private $idproducto;
        private $prod_nombre;
        private $prod_umedida;
        //idlocal solo para la consulta de ver_productos
        private $idlocal;
        
		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarProducto(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO producto(prod_nombre, prod_umedida) VALUES ('{$this->prod_nombre}', '{$this->prod_umedida}')";
            $sql1 = "SELECT LAST_INSERT_ID() as idproducto";
            $con->consultaSimple($sql);
            $datos = $con->consultaRetorno($sql1);
            return $datos;
        }
        
        public function updateProducto(){                            
            $con = new Conexion();
			$sql = "UPDATE producto SET prod_nombre = '{$this->prod_nombre}', prod_umedida = '{$this->prod_umedida}' WHERE idproducto = {$this->idproducto}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarProducto(){                            
            $con = new Conexion();
			$sql = "DELETE FROM producto WHERE idproducto = {$this->idproducto}";
            $con->consultaSimple($sql);
        }

        public function verProductos(){
            $con = new Conexion();
            $sql = "SELECT local_prod.idlocal_prod, producto.idproducto, producto.prod_nombre, local_prod.prod_stockactual, local_prod.prod_stockrecibir, vencimiento.vto_fecha, producto.prod_umedida, proveedor.prov_nombre, proveedor.idproveedor FROM producto, vencimiento, proveedor, local_prod WHERE local_prod.idlocal_prod = vencimiento.idlocal_prod AND local_prod.idproveedor = proveedor.idproveedor AND local_prod.idproducto = producto.idproducto AND local_prod.idlocal = {$this->idlocal}";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }

        public function verProducto(){
            $con = new Conexion();
            $sql = "SELECT * FROM producto, vencimiento, local_prod WHERE local_prod.idproducto = producto.idproducto AND local_prod.idlocal_prod = vencimiento.idlocal_prod AND producto.idproducto = {$this->idproducto} ORDER BY vencimiento.idvencimiento ASC";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }

        public function buscarProducto(){
            $con = new Conexion();
            $sql = "SELECT local_prod.idproducto, local_prod.prod_stockactual, local_prod.prod_stockrecibir FROM producto, local_prod WHERE producto.idproducto = local_prod.idproducto AND producto.prod_nombre = '{$this->prod_nombre}'";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
	}
?>