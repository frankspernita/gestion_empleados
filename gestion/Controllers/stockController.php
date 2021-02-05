<?php //namespace Controllers;

/*use Models\Proveedor as Proveedor;
use Models\Producto as Producto;
use Models\Vencimiento as Vencimiento;
use Models\Calc_stock as Calc_stock;*/

require 'vendor/autoload.php';
define('__ROOT__',dirname(dirname(__FILE__)));
require_once(__ROOT__.'/Models/Proveedor.php');
require_once(__ROOT__.'/Models/Producto.php');
require_once(__ROOT__.'/Models/Local_prod.php');
require_once(__ROOT__.'/Models/Vencimiento.php');
require_once(__ROOT__.'/Models/Calc_stock.php');
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

	class stockController{            
            
        private $proveedor;
        private $producto;
        private $local_prod;
        private $vencimiento;
        private $calc_stock;

        public function __construct() {
            $this->proveedor = new Proveedor();
            $this->producto = new Producto();
            $this->local_prod = new Local_prod();
            $this->vencimiento = new Vencimiento();
            $this->calc_stock = new Calc_stock();
        }


        public function agregar_proveedor(){
            if($_POST){
                $this->proveedor->set('prov_nombre', $_POST['prov_nombre']);
                $this->proveedor->agregarProveedor();
                /*echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'principal/inicio");
                                </script>';*/
                                return;
            }
        }
        
        public function ver_proveedor(){
            if(!$_POST){
                $datos = $this->proveedor->verProveedores();
                return $datos;
            }
        }

        public function editar_proveedor($idproveedor){
            if(!$_POST){
                $this->proveedor->set("idproveedor",$idproveedor);
                $datos = $this->proveedor->verProveedor();
                return $datos;
            }else{
                $this->proveedor->set("idproveedor",$idproveedor);
                $this->proveedor->set("prov_nombre",$_POST['prov_nombre']);
                $datos = $this->proveedor->updateProveedor();
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'stock/ver_proveedor");
                                </script>';
                exit();
            }
        }

        public function agregar_producto(){
            if($_POST){
                $this->producto->set("prod_nombre",$_POST['prod_nombre']);
                $this->producto->set("prod_umedida",$_POST['prod_umedida']);
                $datos = $this->producto->agregarProducto();
                $row = mysqli_fetch_array($datos);
                $this->local_prod->set("idproducto",$row['idproducto']);
                $this->local_prod->set("idlocal",$_SESSION['localactual']);
                $this->local_prod->set("prod_stockactual",$_POST['prod_stockactual']);
                $this->local_prod->set("prod_stockrecibir",$_POST['prod_stockrecibir']);
                $this->local_prod->set("idproveedor",$_POST['idproveedor']);
                $datos = $this->local_prod->agregarLocal_prod();
                $row = mysqli_fetch_array($datos);
                for($i=0;$i<=$_POST['filas_creadas'];$i++){
                    if(isset($_POST['vto_lote'.$i]) && isset($_POST['vto_fecha'.$i])){
                        $this->vencimiento->set("idlocal_prod",$row['idlocal_prod']);
                        $this->vencimiento->set("vto_lote",$_POST['vto_lote'.$i]);
                        $this->vencimiento->set("vto_fecha",$_POST['vto_fecha'.$i]);
                        $this->vencimiento->agregarVencimiento();
                    }
                }
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'stock/ver_producto");
                                </script>';
                exit();
            }
        }

        public function ver_producto(){
            if(!$_POST){
                $this->producto->set("idlocal",$_SESSION['localactual']);
                $datos = $this->producto->verProductos();
                return $datos;
            }            
        }

        public function ver_vencimiento($idproducto){
            if(!$_POST){
                $this->vencimiento->set("idproducto",$idproducto);
                $datos = $this->vencimiento->verVencimientos();
                return $datos;
            }            
        }

        public function editar_producto($idproducto){
            if(!$_POST){
                $this->producto->set("idproducto",$idproducto);
                $datos = $this->producto->verProducto();
                return $datos;
            }else{
                $this->producto->set("idproducto",$idproducto);
                $this->producto->set("prod_nombre",$_POST['prod_nombre']);
                $this->producto->set("prod_umedida",$_POST['prod_umedida']);
                $this->producto->updateProducto();
                $this->local_prod->set("idlocal_prod",$_POST['idlocal_prod']);
                $this->local_prod->set("idproducto",$idproducto);
                $this->local_prod->set("prod_stockactual",$_POST['prod_stockactual']);
                $this->local_prod->set("prod_stockrecibir",$_POST['prod_stockrecibir']);
                $this->local_prod->set("idproveedor",$_POST['idproveedor']);
                $this->local_prod->updateLocal_prod();
                $this->vencimiento->set("idlocal_prod",$_POST['idlocal_prod']);
                $this->vencimiento->eliminarVencimiento();
                for($i=0;$i<=$_POST['filas_creadas'];$i++){
                    if(isset($_POST['vto_lote'.$i]) && isset($_POST['vto_fecha'.$i])){
                        $this->vencimiento->set("idlocal_prod",$_POST['idlocal_prod']);
                        $this->vencimiento->set("vto_lote",$_POST['vto_lote'.$i]);
                        $this->vencimiento->set("vto_fecha",$_POST['vto_fecha'.$i]);
                        $this->vencimiento->agregarVencimiento();
                    }
                }
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'stock/ver_producto");
                                </script>';
                exit();
            }
        }

        public function eliminar_producto($idlocal_prod){
            if(!$_POST){
                //$this->producto->set("idproducto",$idproducto);
                $this->vencimiento->set("idlocal_prod",$idlocal_prod);
                $this->local_prod->set("idlocal_prod",$idlocal_prod);
                //$this->producto->eliminarProducto();
                $this->local_prod->eliminarLocal_prod();
                $this->vencimiento->eliminarVencimiento();
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'stock/ver_producto");
                                </script>';
                exit();
            }
        }

        public function procesar_stock(){
            if(!$_POST){

            }else{
                if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK)
                            {
                                // detalles del archivo subido
                                $archivoTmpPath = $_FILES['archivo']['tmp_name'];
                                $archivoNombre = $_FILES['archivo']['name'];
                                $archivoTamanio = $_FILES['archivo']['size'];
                                $archivoTipo = $_FILES['archivo']['type'];
                                $archivoNombreCmp = explode(".", $archivoNombre);
                                $archivoExtension = strtolower(end($archivoNombreCmp));

                                // cambio del nombre del archivo
                                $nuevoNombreArchivo = date("Y-m-d") . $archivoNombre . '.' . $archivoExtension;

                                // extensiones permitidas
                                $extensionesPermitidas = array('xls', 'xlsx');

                                if (in_array($archivoExtension, $extensionesPermitidas))
                                {
                                    
                                // carpeta donde será subido el archivo
                                $carpeta = './tmp_excel/';
                                $dir_destino = $carpeta . $nuevoNombreArchivo;

                                move_uploaded_file($archivoTmpPath, $dir_destino);
                                $this->calc_stock->set('calc_nombre',$nuevoNombreArchivo);
                                $this->calc_stock->set('calc_fecha', date('Y-m-d'));
                                $this->calc_stock->set('calc_hora', date('H:i:s'));
                                $this->calc_stock->set('idusuario', $_SESSION['idusuario']);
                                $this->calc_stock->set('idlocal', $_SESSION['localactual']);
                                $this->calc_stock->agregarCalc_stock();
                                }
                            }
                                $nuevoArchivo = 'tmp_excel/'.$nuevoNombreArchivo;
                                $arr_file = explode('.', $nuevoArchivo);
                                $extension = end($arr_file);
                                
                                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

                                $spreadsheet = $reader->load($nuevoArchivo);
                                
                                $sheetData = $spreadsheet->getActiveSheet()->toArray();
                                //print_r($sheetData);
                                for($i=1;$i<count($sheetData);$i++){
                                    if($sheetData[$i][5] != 'Compras' && $sheetData[$i][6] != 'FALTANTE DE STOCK' && $sheetData[$i][6] != 'SOBRANTE DE STOCK'){
                                        $this->producto->set('prod_nombre', $sheetData[$i][2]);
                                        //$this->producto->set('prod_codigo', $codigo);
                                        $datos = $this->producto->buscarProducto();
                                        $row = mysqli_fetch_array($datos);
                                        $stocka = $row['prod_stockactual'] - $sheetData[$i][9];
                                        $stockr = $sheetData[$i][9] * 0.50;
                                        $this->local_prod->set('idproducto', $row['idproducto']);
                                        $this->local_prod->set('prod_stockactual', $stocka);
                                        $this->local_prod->set('prod_stockrecibir', $stockr);
                                        $this->local_prod->updateStock();
                                    }
                                }
                                echo '<script type="text/javascript">
                                        window.location.assign("'.URL.'stock/ver_producto");
                                    </script>';
                                exit();
            }
    }
}
$stock = new stockController();        
?>