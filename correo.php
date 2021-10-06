<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.mifacturalegal.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'no-responder@mifacturalegal.com';                     // SMTP username
    $mail->Password   = 'M49bx3kk!!';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 26;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('no-responder@mifacturalegal.com', 'Soporte IplanetColombia');
    $mail->addAddress('soporte@mifacturalegal.com', 'Soporte IplanetColombia');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Registro de Empresa  nueva - desde el portal mifacturalegal.com';
    $mail->Body    = 'Nombre empresa:'.$_POST["nempresa"].'<br> nit empresa:'.$_POST['nit'].'<br> Tipo Documento:'.$_POST['tdocumento'].'<br> Número Documento:'.$_POST['documento'].'<br> Representante legal:'.$_POST['rl'].'<br> Correo:'.$_POST['email'].'<br> Direccion:'.$_POST['direccion'].'<br> Observaciones:'.$_POST["observaciones"];
    $mail->AltBody = 'Nombre empresa:'.$_POST["nempresa"].'<br> nit empresa:'.$_POST['nit'].'<br> Tipo Documento:'.$_POST['tdocumento'].'<br> Número Documento:'.$_POST['documento'].'<br> Representante legal:'.$_POST['rl'].'<br> Correo:'.$_POST['email'].'<br> Direccion:'.$_POST['direccion'].'<br> Observaciones:'.$_POST["observaciones"];


    if( $mail->send()) {
            $_SESSION['correo']='Sus datos fueron enviados, recibirá un correo con la documentación necesaria. Gracias.';
            header('Location: /#home');
        } else {
            $_SESSION['error']='Error al enviar registro';
        }  
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>