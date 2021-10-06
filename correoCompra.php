<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
include('conexion.php');
if($_POST['registrado'] == 'si'){

$solicitud = mysqli_query($conection, "SELECT * FROM applicant WHERE nit='".$_POST['nit']."'");
$solicitante = mysqli_fetch_object($solicitud);
if(!$solicitante->num_rows > 0){
    
    $nuevafecha = strtotime ( '+1 year' , strtotime ( $_POST['fecha']) ) ;
    $nuevafecha = date ( 'Y-m-d' , $nuevafecha ); 
    if($_POST['plan'] == 'emprendedor'){
        $plan = 1;
    }elseif ($_POST['plan'] == 'empresarial') {
        $plan = 2;
    }elseif($_POST['plan'] == 'premium'){
        $plan = 3;
    }
    $datos="INSERT INTO `applicant_subscriptions` (`id`, `applicant_id`, `packages_id`, `start_date`, `end_date`, `status`, `date_due_certificate`, `sopport_invoice`, `ref_epayco`, `price`, `seller`, `seller_tip`) VALUES (NULL, '$solicitante->id', '$plan', '".$_POST['fecha']."', '$nuevafecha', 'Activo', '$nuevafecha', '".$_POST['referencia']."', '".$_POST['ref_epayco']."', '".$_POST['precio']."', NULL, NULL);";
    $resultado=mysqli_query($conection,$datos);
    $pago="INSERT INTO `applicant_documents` (`id`, `applicant_id`, `documento`, `archivo`, `status`) VALUES (NULL, '$solicitante->id', 'Comprobante de pago', NULL, 'Aprobado');";
    $rpago=mysqli_query($conection,$pago);
}

}


//

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.mifacturalegal.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '_mainaccount@mifacturalegal.com';                     // SMTP username
    $mail->Password   = 'M49bx3kk!!';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 26;                                       // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('soporte@mifacturalegal.com', 'Soporte IplanetColombia');
    $mail->addAddress('soporte@mifacturalegal.com', 'Soporte IplanetColombia');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Compra de plan  '.$_POST["plan"].'';
    $mail->Body    = 'Nombre:  '.$_POST["nombre"].'<br> Nit:  '.$_POST['nit']. '<br> Telefono:  '.$_POST['telefono'].'<br> Correo:  '.$_POST['correo'].'<br> Plan:  '.$_POST['plan'].'<br> Fecha transacci籀n:  '.$_POST['fecha'].'<br> Precio:  '.$_POST['precio'].'<br> Estado transaccion:  '.$_POST['estado'].'<br> Ref_epayco:  '.$_POST['ref_epayco'].'<br> Referencia:  '.$_POST['referencia'];
    $mail->AltBody = 'Nombre:  '.$_POST["nombre"].'<br> Nit:  '.$_POST['nit']. '<br> Telefono:  '.$_POST['telefono'].'<br> Correo:  '.$_POST['correo'].'<br> Plan:  '.$_POST['plan'].'<br> Fecha transacci籀n:  '.$_POST['fecha'].'<br> Precio:  '.$_POST['precio'].'<br> Estado transaccion:  '.$_POST['estado'].'<br> Ref_epayco:  '.$_POST['ref_epayco'].'<br> Referencia:  '.$_POST['referencia'];


 if( $mail->send()) {
        if(!$solicitud->num_rows > 0){

        }else{
            if($_POST['estado'] == 'Rechazada'){
                $_SESSION['notransaccion']= 'Transacci車n Rechazada';

            }elseif($_POST['estado'] == 'Pendiente'){
                $_SESSION['t_pendiente']='La transacci車n quedo en estado pendiente';

            }elseif ($_POST['estado'] == 'Fallido') {
                $_SESSION['notransaccion']= 'Transacci車n Fallida';
            }else{
                $_SESSION['t_exito']='La transacci車n fue realizada con exito';
            }
        }
            
        } else {
            $_SESSION['notransaccion']='Error al realizar la transacci車n';
        }  
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>