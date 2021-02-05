<?php //namespace Controllers;

//use Models\Form_item_resp as Form_item_resp;
//use Models\Formulario as Formulario;
//use Models\Item as Item;
//use Models\Form_cat as Form_cat;

define('__ROOT__',dirname(dirname(__FILE__)));
require_once(__ROOT__.'/Models/Form_item_resp.php');
require_once(__ROOT__.'/Models/Formulario.php');
require_once(__ROOT__.'/Models/Item.php');
require_once(__ROOT__.'/Models/Form_cat.php');

	class auditoriaController{            
        private $form_item_resp;
        private $formulario;
        private $item;
        private $form_cat;

        public function __construct() {
            $this->form_item_resp = new Form_item_resp();
            $this->formulario = new Formulario();            
            $this->item = new Item();
            $this->form_cat = new Form_cat();
        }
        
        public function choose_local(){
            if($_POST){
                session_start();
                $_SESSION['localactual'] = $_POST['idlocal'];
                echo '<script type="text/javascript">
                                    window.location.assign("http://havannagestion.com.ar/auditoria/asplocal");
                                </script>';
                                exit();
            }
        }

        public function asplocal(){
            if(!$_POST){
                $this->form_item_resp->set('idcategoria',1);
                $this->form_item_resp->set('idlocal',$_SESSION['localactual']);
                $datos = $this->form_item_resp->armarFormulario();
                return $datos;
            }else{
                session_start();
                $_SESSION['filas'] = $_POST['filas'];
                $_SESSION['for_horacom'] = $_POST['for_horacom'];
                $_SESSION['idlocal'] = $_SESSION['localactual'];
                for($i=0;$i<$_SESSION['filas'];$i++){
                    if(isset($_POST['asp_idrespuesta'.$i])){
                        $_SESSION['asp_idrespuesta'.$i] = $_POST['asp_idrespuesta'.$i];
                    }else{
                        $_SESSION['asp_idrespuesta'.$i] = 0;
                    }
                }
                if(isset($_FILES['asp_archivo']['name']) && $_FILES['asp_archivo']['size'] > 0)
                            {
                                 // Count total files
                                 $count = count($_FILES['asp_archivo']['name']);
                                $_SESSION['asp_count'] = $count;
                                 // Looping all files
                                 for($i=0;$i<$count;$i++){
                                    // detalles del archivo subido
                                    $archivoTmpPath = $_FILES['asp_archivo']['tmp_name'][$i];
                                    $archivoNombre = $_FILES['asp_archivo']['name'][$i];
                                    $archivoTamanio = $_FILES['asp_archivo']['size'][$i];
                                    $archivoTipo = $_FILES['asp_archivo']['type'][$i];
                                    $archivoNombreCmp = explode(".", $archivoNombre);
                                    $archivoExtension = strtolower(end($archivoNombreCmp));
    
                                    // cambio del nombre del archivo
                                    $nuevoNombreArchivo = date("Y-m-d") . $archivoNombre . '.' . $archivoExtension;
    
                                    // extensiones permitidas
                                    $extensionesPermitidas = array('jpg', 'jpeg', 'png');
    
                                    if (in_array($archivoExtension, $extensionesPermitidas))
                                    {
                                    // carpeta donde será subido el archivo
                                    $carpeta = './tmp_archivos/';
                                    $dir_destino = $carpeta . $nuevoNombreArchivo;
    
                                    move_uploaded_file($archivoTmpPath, $dir_destino);
                                    $_SESSION['asp_archivo'.$i] = $nuevoNombreArchivo;
                                    }
                                }
                            }
                            $_SESSION['asp_observacion'] = $_POST['asp_observacion'];   
                            //header("Location: ". URL ."auditoria/deposito");
                                echo '<script type="text/javascript">
                                                    window.location.assign("http://havannagestion.com.ar/auditoria/deposito");
                                                </script>';
                                                exit();
                        }
                    }
        
        public function deposito(){
            if(!$_POST){
                $this->form_item_resp->set('idcategoria',2);
                $this->form_item_resp->set('idlocal',$_SESSION['localactual']);
                $datos = $this->form_item_resp->armarFormulario();
                return $datos;
            }else{
                session_start();
                $_SESSION['filas_dep'] = $_POST['filas_dep'];
                for($i=0;$i<$_SESSION['filas_dep'];$i++){
                    if(isset($_POST['dep_idrespuesta'.$i])){
                        $_SESSION['dep_idrespuesta'.$i] = $_POST['dep_idrespuesta'.$i];
                    }else{
                        $_SESSION['dep_idrespuesta'.$i] = 0;
                    }
                }
                if(isset($_FILES['dep_archivo']['name']) && $_FILES['dep_archivo']['size'] > 0)
                            {
                                 // Count total files
                                 $count = count($_FILES['dep_archivo']['name']);
                                $_SESSION['dep_count'] = $count;
                                 // Looping all files
                                 for($i=0;$i<$count;$i++){
                                    // detalles del archivo subido
                                    $archivoTmpPath = $_FILES['dep_archivo']['tmp_name'][$i];
                                    $archivoNombre = $_FILES['dep_archivo']['name'][$i];
                                    $archivoTamanio = $_FILES['dep_archivo']['size'][$i];
                                    $archivoTipo = $_FILES['dep_archivo']['type'][$i];
                                    $archivoNombreCmp = explode(".", $archivoNombre);
                                    $archivoExtension = strtolower(end($archivoNombreCmp));
    
                                    // cambio del nombre del archivo
                                    $nuevoNombreArchivo = date("Y-m-d") . $archivoNombre . '.' . $archivoExtension;
    
                                    // extensiones permitidas
                                    $extensionesPermitidas = array('jpg', 'jpeg', 'png');
    
                                    if (in_array($archivoExtension, $extensionesPermitidas))
                                    {
                                    // carpeta donde será subido el archivo
                                    $carpeta = './tmp_archivos/';
                                    $dir_destino = $carpeta . $nuevoNombreArchivo;
    
                                    move_uploaded_file($archivoTmpPath, $dir_destino);
                                    $_SESSION['dep_archivo'.$i] = $nuevoNombreArchivo;
                                    }
                                }
                            }
                $_SESSION['dep_observacion'] = $_POST['dep_observacion'];
                //header("Location: ". URL ."auditoria/personal");
                echo '<script type="text/javascript">
                                    window.location.assign("http://havannagestion.com.ar/auditoria/personal");
                                </script>';
                                exit();
            }
        }

        public function personal(){
            if(!$_POST){
                $this->form_item_resp->set('idcategoria',3);
                $this->form_item_resp->set('idlocal',$_SESSION['localactual']);
                $datos = $this->form_item_resp->armarFormulario();
                return $datos;
            }else{
                session_start();
                $_SESSION['filas_per'] = $_POST['filas_per'];
                for($i=0;$i<$_SESSION['filas_per'];$i++){
                    if(isset($_POST['per_idrespuesta'.$i])){
                        $_SESSION['per_idrespuesta'.$i] = $_POST['per_idrespuesta'.$i];
                    }else{
                        $_SESSION['per_idrespuesta'.$i] = 0;
                    }
                }
                if(isset($_FILES['per_archivo']['name']) && $_FILES['per_archivo']['size'] > 0)
                            {
                                 // Count total files
                                 $count = count($_FILES['per_archivo']['name']);
                                $_SESSION['per_count'] = $count;
                                 // Looping all files
                                 for($i=0;$i<$count;$i++){
                                    // detalles del archivo subido
                                    $archivoTmpPath = $_FILES['per_archivo']['tmp_name'][$i];
                                    $archivoNombre = $_FILES['per_archivo']['name'][$i];
                                    $archivoTamanio = $_FILES['per_archivo']['size'][$i];
                                    $archivoTipo = $_FILES['per_archivo']['type'][$i];
                                    $archivoNombreCmp = explode(".", $archivoNombre);
                                    $archivoExtension = strtolower(end($archivoNombreCmp));
    
                                    // cambio del nombre del archivo
                                    $nuevoNombreArchivo = date("Y-m-d") . $archivoNombre . '.' . $archivoExtension;
    
                                    // extensiones permitidas
                                    $extensionesPermitidas = array('jpg', 'jpeg', 'png');
    
                                    if (in_array($archivoExtension, $extensionesPermitidas))
                                    {
                                    // carpeta donde será subido el archivo
                                    $carpeta = './tmp_archivos/';
                                    $dir_destino = $carpeta . $nuevoNombreArchivo;
    
                                    move_uploaded_file($archivoTmpPath, $dir_destino);
                                    $_SESSION['per_archivo'.$i] = $nuevoNombreArchivo;
                                    }
                                }
                            }
                $_SESSION['per_observacion'] = $_POST['per_observacion'];
                //header("Location: ". URL ."auditoria/conequipamiento");
                echo '<script type="text/javascript">
                                    window.location.assign("http://havannagestion.com.ar/auditoria/conequipamiento");
                                </script>';
                                exit();
            }
        }

        public function conequipamiento(){
            if(!$_POST){
                $this->form_item_resp->set('idcategoria',4);
                $this->form_item_resp->set('idlocal',$_SESSION['localactual']);
                $datos = $this->form_item_resp->armarFormulario();
                return $datos;
            }else{
                session_start();
                $_SESSION['filas_coneq'] = $_POST['filas_coneq'];
                for($i=0;$i<$_SESSION['filas_coneq'];$i++){
                    if(isset($_POST['coneq_idrespuesta'.$i])){
                        $_SESSION['coneq_idrespuesta'.$i] = $_POST['coneq_idrespuesta'.$i];
                    }else{
                        $_SESSION['coneq_idrespuesta'.$i] = 0;
                    }
                }
                if(isset($_FILES['coneq_archivo']['name']) && $_FILES['coneq_archivo']['size'] > 0)
                            {
                                 // Count total files
                                 $count = count($_FILES['coneq_archivo']['name']);
                                $_SESSION['coneq_count'] = $count;
                                 // Looping all files
                                 for($i=0;$i<$count;$i++){
                                    // detalles del archivo subido
                                    $archivoTmpPath = $_FILES['coneq_archivo']['tmp_name'][$i];
                                    $archivoNombre = $_FILES['coneq_archivo']['name'][$i];
                                    $archivoTamanio = $_FILES['coneq_archivo']['size'][$i];
                                    $archivoTipo = $_FILES['coneq_archivo']['type'][$i];
                                    $archivoNombreCmp = explode(".", $archivoNombre);
                                    $archivoExtension = strtolower(end($archivoNombreCmp));
    
                                    // cambio del nombre del archivo
                                    $nuevoNombreArchivo = date("Y-m-d") . $archivoNombre . '.' . $archivoExtension;
    
                                    // extensiones permitidas
                                    $extensionesPermitidas = array('jpg', 'jpeg', 'png');
    
                                    if (in_array($archivoExtension, $extensionesPermitidas))
                                    {
                                    // carpeta donde será subido el archivo
                                    $carpeta = './tmp_archivos/';
                                    $dir_destino = $carpeta . $nuevoNombreArchivo;
    
                                    move_uploaded_file($archivoTmpPath, $dir_destino);
                                    $_SESSION['coneq_archivo'.$i] = $nuevoNombreArchivo;
                                    }
                                }
                            }
                $_SESSION['coneq_observacion'] = $_POST['coneq_observacion'];
                //header("Location: ". URL ."auditoria/vajilla");
                echo '<script type="text/javascript">
                                    window.location.assign("http://havannagestion.com.ar/auditoria/vajilla");
                                </script>';
                                exit();
            }
        }

        public function vajilla(){
            if(!$_POST){
                $this->form_item_resp->set('idcategoria',5);
                $this->form_item_resp->set('idlocal',$_SESSION['localactual']);
                $datos = $this->form_item_resp->armarFormulario();
                return $datos;
            }else{
                session_start();
                $_SESSION['filas_vaj'] = $_POST['filas_vaj'];
                for($i=0;$i<$_SESSION['filas_vaj'];$i++){
                    if(isset($_POST['vaj_idrespuesta'.$i])){
                        $_SESSION['vaj_idrespuesta'.$i] = $_POST['vaj_idrespuesta'.$i];
                    }else{
                        $_SESSION['vaj_idrespuesta'.$i] = 0;
                    }
                }
                if(isset($_FILES['vaj_archivo']['name']) && $_FILES['vaj_archivo']['size'] > 0)
                            {
                                 // Count total files
                                 $count = count($_FILES['vaj_archivo']['name']);
                                $_SESSION['vaj_count'] = $count;
                                 // Looping all files
                                 for($i=0;$i<$count;$i++){
                                    // detalles del archivo subido
                                    $archivoTmpPath = $_FILES['vaj_archivo']['tmp_name'][$i];
                                    $archivoNombre = $_FILES['vaj_archivo']['name'][$i];
                                    $archivoTamanio = $_FILES['vaj_archivo']['size'][$i];
                                    $archivoTipo = $_FILES['vaj_archivo']['type'][$i];
                                    $archivoNombreCmp = explode(".", $archivoNombre);
                                    $archivoExtension = strtolower(end($archivoNombreCmp));
    
                                    // cambio del nombre del archivo
                                    $nuevoNombreArchivo = date("Y-m-d") . $archivoNombre . '.' . $archivoExtension;
    
                                    // extensiones permitidas
                                    $extensionesPermitidas = array('jpg', 'jpeg', 'png');
    
                                    if (in_array($archivoExtension, $extensionesPermitidas))
                                    {
                                    // carpeta donde será subido el archivo
                                    $carpeta = './tmp_archivos/';
                                    $dir_destino = $carpeta . $nuevoNombreArchivo;
    
                                    move_uploaded_file($archivoTmpPath, $dir_destino);
                                    $_SESSION['vaj_archivo'.$i] = $nuevoNombreArchivo;
                                    }
                                }
                            }
                $_SESSION['vaj_observacion'] = $_POST['vaj_observacion'];
                //header("Location: ". URL ."auditoria/prodinsumos");
                echo '<script type="text/javascript">
                                    window.location.assign("http://havannagestion.com.ar/auditoria/prodinsumos");
                                </script>';
                                exit();
            }
        }

        public function prodinsumos(){
            if(!$_POST){
                $this->form_item_resp->set('idcategoria',6);
                $this->form_item_resp->set('idlocal',$_SESSION['localactual']);
                $datos = $this->form_item_resp->armarFormulario();
                return $datos;
            }else{
                session_start();
                $_SESSION['filas_prod'] = $_POST['filas_prod'];
                for($i=0;$i<$_SESSION['filas_prod'];$i++){
                    if(isset($_POST['prod_idrespuesta'.$i])){
                        $_SESSION['prod_idrespuesta'.$i] = $_POST['prod_idrespuesta'.$i];
                    }else{
                        $_SESSION['prod_idrespuesta'.$i] = 0;
                    }
                }
                if(isset($_FILES['prod_archivo']['name']) && $_FILES['prod_archivo']['size'] > 0)
                            {
                                 // Count total files
                                 $count = count($_FILES['prod_archivo']['name']);
                                $_SESSION['prod_count'] = $count;
                                 // Looping all files
                                 for($i=0;$i<$count;$i++){
                                    // detalles del archivo subido
                                    $archivoTmpPath = $_FILES['prod_archivo']['tmp_name'][$i];
                                    $archivoNombre = $_FILES['prod_archivo']['name'][$i];
                                    $archivoTamanio = $_FILES['prod_archivo']['size'][$i];
                                    $archivoTipo = $_FILES['prod_archivo']['type'][$i];
                                    $archivoNombreCmp = explode(".", $archivoNombre);
                                    $archivoExtension = strtolower(end($archivoNombreCmp));
    
                                    // cambio del nombre del archivo
                                    $nuevoNombreArchivo = date("Y-m-d") . $archivoNombre . '.' . $archivoExtension;
    
                                    // extensiones permitidas
                                    $extensionesPermitidas = array('jpg', 'jpeg', 'png');
    
                                    if (in_array($archivoExtension, $extensionesPermitidas))
                                    {
                                    // carpeta donde será subido el archivo
                                    $carpeta = './tmp_archivos/';
                                    $dir_destino = $carpeta . $nuevoNombreArchivo;
    
                                    move_uploaded_file($archivoTmpPath, $dir_destino);
                                    $_SESSION['prod_archivo'.$i] = $nuevoNombreArchivo;
                                    }
                                }
                            }
                $_SESSION['prod_observacion'] = $_POST['prod_observacion'];

                $this->formulario->set('idlocal',$_SESSION['idlocal']);
                $this->formulario->set('for_fecha',date('Y-m-d'));
                $this->formulario->set('for_horacom',$_SESSION['for_horacom']);
                date_default_timezone_set('America/Buenos_Aires');
                $this->formulario->set('for_horafin',date('H:i:s'));
                $this->formulario->set('idusuario',$_SESSION['idusuario']);
                $datos = $this->formulario->agregarFormulario();
                unset($_SESSION['for_horacom']);
                unset($_SESSION['idlocal']);
                $row = mysqli_fetch_array($datos);
                for($i=0;$i<$_SESSION['filas'];$i++){
                    $this->form_item_resp->set('idformulario',$row['idformulario']);
                    $this->form_item_resp->set('iditem',$_SESSION['item_asp'][$i]);
                    $this->form_item_resp->set('idrespuesta',$_SESSION['asp_idrespuesta'.$i]);
                    $this->form_item_resp->agregarForm_item_resp();
                    unset($_SESSION['asp_idrespuesta'.$i]);
                }
                unset($_SESSION['filas']);
                for($i=0;$i<$_SESSION['asp_count'];$i++){
                    $this->form_cat->set('idformulario',$row['idformulario']);
                    $this->form_cat->set('idcategoria',1);
                    $this->form_cat->set('for_archivo',$_SESSION['asp_archivo'.$i]);
                    $this->form_cat->set('for_observacion',$_SESSION['asp_observacion']);
                    $this->form_cat->agregarForm_cat(); 
                    unset($_SESSION['asp_archivo'.$i]);  
                }
                unset($_SESSION['asp_observacion']);
                unset($_SESSION['asp_count']);
                for($i=0;$i<$_SESSION['filas_dep'];$i++){
                    $this->form_item_resp->set('idformulario',$row['idformulario']);
                    $this->form_item_resp->set('iditem',$_SESSION['item_dep'][$i]);
                    $this->form_item_resp->set('idrespuesta',$_SESSION['dep_idrespuesta'.$i]);
                    $this->form_item_resp->agregarForm_item_resp();
                    unset($_SESSION['dep_idrespuesta'.$i]);
                }
                unset($_SESSION['filas_dep']);
                for($i=0;$i<$_SESSION['dep_count'];$i++){
                    $this->form_cat->set('idformulario',$row['idformulario']);
                    $this->form_cat->set('idcategoria',2);
                    $this->form_cat->set('for_archivo',$_SESSION['dep_archivo'.$i]);
                    $this->form_cat->set('for_observacion',$_SESSION['dep_observacion']);
                    $this->form_cat->agregarForm_cat();
                    unset($_SESSION['dep_archivo'.$i]);
                }
                unset($_SESSION['dep_observacion']);
                unset($_SESSION['dep_count']);
                for($i=0;$i<$_SESSION['filas_per'];$i++){
                    $this->form_item_resp->set('idformulario',$row['idformulario']);
                    $this->form_item_resp->set('iditem',$_SESSION['item_per'][$i]);
                    $this->form_item_resp->set('idrespuesta',$_SESSION['per_idrespuesta'.$i]);
                    $this->form_item_resp->agregarForm_item_resp();
                    unset($_SESSION['per_idrespuesta'.$i]);
                }
                unset($_SESSION['filas_per']);
                for($i=0;$i<$_SESSION['per_count'];$i++){
                    $this->form_cat->set('idformulario',$row['idformulario']);
                    $this->form_cat->set('idcategoria',3);
                    $this->form_cat->set('for_archivo',$_SESSION['per_archivo'.$i]);
                    $this->form_cat->set('for_observacion',$_SESSION['per_observacion']);
                    $this->form_cat->agregarForm_cat();
                    unset($_SESSION['per_archivo'.$i]);
                }
                unset($_SESSION['per_observacion']);
                unset($_SESSION['per_count']);
                for($i=0;$i<$_SESSION['filas_coneq'];$i++){
                    $this->form_item_resp->set('idformulario',$row['idformulario']);
                    $this->form_item_resp->set('iditem',$_SESSION['item_coneq'][$i]);
                    $this->form_item_resp->set('idrespuesta',$_SESSION['coneq_idrespuesta'.$i]);
                    $this->form_item_resp->agregarForm_item_resp();
                    unset($_SESSION['coneq_idrespuesta'.$i]);
                }
                unset($_SESSION['filas_coneq']);
                for($i=0;$i<$_SESSION['coneq_count'];$i++){
                    $this->form_cat->set('idformulario',$row['idformulario']);
                    $this->form_cat->set('idcategoria',4);
                    $this->form_cat->set('for_archivo',$_SESSION['coneq_archivo'.$i]);
                    $this->form_cat->set('for_observacion',$_SESSION['coneq_observacion']);
                    $this->form_cat->agregarForm_cat();
                    unset($_SESSION['coneq_archivo'.$i]);
                }
                unset($_SESSION['coneq_observacion']);
                unset($_SESSION['coneq_count']);
                for($i=0;$i<$_SESSION['filas_vaj'];$i++){
                    $this->form_item_resp->set('idformulario',$row['idformulario']);
                    $this->form_item_resp->set('iditem',$_SESSION['item_vaj'][$i]);
                    $this->form_item_resp->set('idrespuesta',$_SESSION['vaj_idrespuesta'.$i]);
                    $this->form_item_resp->agregarForm_item_resp();
                    unset($_SESSION['vaj_idrespuesta'.$i]);
                }
                unset($_SESSION['filas_vaj']);
                for($i=0;$i<$_SESSION['vaj_count'];$i++){
                    $this->form_cat->set('idformulario',$row['idformulario']);
                    $this->form_cat->set('idcategoria',5);
                    $this->form_cat->set('for_archivo',$_SESSION['vaj_archivo'.$i]);
                    $this->form_cat->set('for_observacion',$_SESSION['vaj_observacion']);
                    $this->form_cat->agregarForm_cat();
                    unset($_SESSION['vaj_archivo'.$i]);
                }
                unset($_SESSION['vaj_observacion']);
                unset($_SESSION['vaj_count']);
                for($i=0;$i<$_SESSION['filas_prod'];$i++){
                    $this->form_item_resp->set('idformulario',$row['idformulario']);
                    $this->form_item_resp->set('iditem',$_SESSION['item_prod'][$i]);
                    $this->form_item_resp->set('idrespuesta',$_SESSION['prod_idrespuesta'.$i]);
                    $this->form_item_resp->agregarForm_item_resp();
                    unset($_SESSION['prod_idrespuesta'.$i]);
                }
                unset($_SESSION['filas_prod']);
                for($i=0;$i<$_SESSION['prod_count'];$i++){
                    $this->form_cat->set('idformulario',$row['idformulario']);
                    $this->form_cat->set('idcategoria',6);
                    $this->form_cat->set('for_archivo',$_SESSION['prod_archivo'.$i]);
                    $this->form_cat->set('for_observacion',$_SESSION['prod_observacion']);
                    $this->form_cat->agregarForm_cat();
                    unset($_SESSION['prod_archivo'.$i]);
                }
                unset($_SESSION['prod_observacion']);
                unset($_SESSION['prod_count']);
                session_start();
                $_SESSION['idformulario'] = $row['idformulario'];
                //header("Location: ". URL ."auditoria/resultado");
                echo '<script type="text/javascript">
                                    window.location.assign("http://havannagestion.com.ar/auditoria/resultado");
                                </script>';
                                exit();
            }
        }

        public function resultado(){
            if(!POST){
                
            }else{
                $this->formulario->set('idformulario', $_SESSION['idformulario']);
                $datos = $this->formulario->evaluacionFormulario();
                return $datos;
            }
        }
        
        public function eliminar($idformulario){
            $this->formulario->set('idformulario',$idformulario);
            $this->formulario->eliminarFormulario();
            echo '<script type="text/javascript">
                                    window.location.assign("http://havannagestion.com.ar/principal/inicio/");
                                </script>';
                                exit();
        }
	}
$auditoria = new auditoriaController();        
?>