<?php //namespace Controllers;

//use Models\Log as Log;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

define('__ROOT__',dirname(dirname(__FILE__)));
require_once(__ROOT__.'/Models/Log.php');
require (__ROOT__.'/PHPMailer/Exception.php');
require (__ROOT__.'/PHPMailer/PHPMailer.php');
require (__ROOT__.'/PHPMailer/SMTP.php');


	class logController{
            
            private $log;
            private $mail;

            
            public function __construct() {
                $this->log = new Log();
                $this->mail = new PHPMailer(true);
            }

            public function validar(){
                if(!$_POST){

                }else{
                    $codseg = $_POST['codigoseguridad'];
                    $this->log->set('us_codseg',$codseg);
                    $this->log->validarCuenta();
                    header("Location: " . URL . "principal/inicio/");
                }
            }
                
                public function verificar(){
                    if(!$_POST){

                        }else{      
                                    session_start();
                                    $this->log->set('us_name',$_POST['us_name']);
                                    $this->log->set('us_password',$_POST['us_password']);
                                    $datos= $this->log->verLog();
                                    if(strtolower($_POST['us_name'])==$datos['us_name']){
                                                  if($_POST['us_password']==$datos['us_password']){
                                                    $_SESSION['us_name'] = $_POST['us_name'];
                                                    $_SESSION['us_password'] = $_POST['us_password'];
                                                    $_SESSION['idusuario'] = $datos['idusuario'];
                                                    $_SESSION['us_nombre'] = $datos['us_nombre'];
                                                    $_SESSION['us_apellido'] = $datos['us_apellido'];
                                                    $_SESSION['idperfil'] = $datos['idperfil'];
                                                    $_SESSION['localactual'] = $datos['idlocal'];
                                                    if($datos['us_estado'] == 0){
                                                        header("Location: " . URL . "log/validar");
                                                    }else{
                                                        header("Location: " . URL . "principal/inicio/");
                                                    }
                                                  }else{
                                                    echo "<b>alert('Contraseña incorrecta!')</b>";
                                                  }
                                    }
                                    else{
                                        echo "<script>alert('Usuario incorrecto!')</script>";
                                    }
                        }
                }

                public function restablecer(){
                    if(!$_POST){

                    }else{
                        
                        $codigo = date('YmdHis');
                        $this->log->set('us_mail', $_POST['us_mail']);
                        $this->log->set('us_codseg', $codigo);
                        $this->log->bloquear();
                        echo 'si entra aqui';
                        //exit();
                        $us_mail = $_POST['us_mail'];
                            try {
                                    //Server settings
                                    $this->mail->SMTPDebug = 3;                      // Enable verbose debug output
                                    $this->mail->isSMTP();                                            // Send using SMTP
                                    $this->mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                                    $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                    $this->mail->Username   = 'intranetflash@gmail.com';                     // SMTP username
                                    $this->mail->Password   = 'Abcd1234!';                               // SMTP password
                                    $this->mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                                    $this->mail->Port       = 587;                                    // TCP port to connect to

                                    //Recipients
                                    $this->mail->setFrom('intranetflash@gmail.com', 'Intranet Correo Flash');
                                    $this->mail->addAddress($us_mail);     // Add a recipient

                                    // Content
                                    $this->mail->isHTML(true);                                  // Set email format to HTML
                                    $this->mail->Subject = 'Activar cuenta';
                                    $this->mail->Body    = 'Estimado/a: <br>Su usuario fue bloqueado por razones de seguridad, para poder acceder a la intranet deberá restablecer su contraseña. Con el siguiente código de seguridad podrá reactivar su cuenta y establecer una nueva contraseña para su cuenta.<br><br>Código: '. $codigo. '<br><br>Saludos cordiales<br><br><em>Correo Flash</em><br><em>Área de Sistemas</em>';
                                    $this->mail->send();
                                    //echo 'Message has been sent';
                                } catch (Exception $e) {
                                    // error_reporting(0); // esto se controla por php.ini o .user.ini , los errores de php van a errors.log
                                    /*
                                        
                                        date.timezone = 'America/Argentina/Tucuman'
                                        
                                        log_errors = on
                                        error_reporting = E_ALL & ~E_WARNING & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED   <- evita loggear warnings o mensajes que no sean errores
                                        error_log = errors.log
                                        
                                        si queres ver los errores en pantalla deberias habilitar
                                        display_errors = On
                                    
                                    */
                                    //echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
                                }
                                echo '<script type="text/javascript">
                                    window.location.assign("http://localhost/intranet/log/cambiar_password");
                                </script>';
                    }
                }
                

                public function cambiar_password(){
                    if(!$_POST){

                    }else{
                        $codigo = $_POST['us_codseg'];
                        if($_POST['us_codseg'] && !$_POST['us_password']){
                            $this->log->set('us_codseg', $_POST['us_codseg']);
                            $this->log->validarCuenta();
                            $datos = 1;
                            return $datos;
                        }
                        if($_POST['us_password']){
                            $this->log->set('us_password',$_POST['us_password']);
                            $this->log->set('us_codseg',$codigo);
                            $this->log->cambiarPass();
                            echo '<script type="text/javascript">
                                        window.location.assign("http://localhost/intranet/");
                                    </script>';
                        }
                    }
                }
                
                
                public function logout(){
                    if(!$_POST){
                               session_start();

                               session_destroy();

                               //header("Location: " . URL);
                               echo '<script type="text/javascript">
                                    window.location.assign("http://havannagestion.com.ar/");
                                </script>';
                            }
                }
            }   	
    $log = new logController();       
?>