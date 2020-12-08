<?php
session_start();
if(!isset($_SESSION["zalogowany"])){
    header('Location:../../index.php');
    exit();
}


require("PHPMailer/PHPMailer/PHPMailer.php");
require("PHPMailer/PHPMailer/SMTP.php");
require("PHPMailer/PHPMailer/Exception.php");
require("PHPMailer/PHPMailer/OAuth.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

        if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany'] == false)){
            echo'<div> GUEST: '.$_SESSION['name'].' </div>
            <div><a href="../../logout.php">log in or register</a></div>';
            }

            if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany'] == true)){
            echo'<div>'.$_SESSION['nazwa'].'</div>
                <div>Profile</div>
                <div><a href="../../logout.php">Log-out</a></div>';
            }
        
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

// Load Composer's autoloader
//require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.cba.pl';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'noreply@mthw.pl';                     // SMTP username
    $mail->Password   = 'Langosz1';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('noreply@mthw.pl', $_session['name']);
    $mail->addAddress('mthw.contact@gmail.com', 'MTHW');     // Add a recipient
    $mail->addReplyTo($_POST['mail'],$_session['name']);

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['category'] . ' ' . $_POST['subject'];
    $mail->Body    = 'przyjeliśmy twoje zgłoszenie:
                ' . $_POST['content'];
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->CharSet = "UTF-8";
    $mail->send();
    echo 'Message has been sent';

    $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'mail.cba.pl';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'noreply@mthw.pl';                     // SMTP username
        $mail->Password   = 'Langosz1';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('noreply@mthw.pl', $_SESSION['name']);
        $mail->addAddress($_POST['mail'], $_SESSION['nazwa']);     // Add a recipient
        $mail->addReplyTo('mthw.contact@gmail.com',$_session['name']);
    $mail->CharSet = "UTF-8";
        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $_POST['category'] . ' ' . $_POST['subject'];
        $mail->Body    = 'przyjeliśmy twoje zgłoszenie:
                    ' . $_POST['content'];
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        $_SESSION['mailSend'] = '<div style="color:green;"> Dziękujemy za zgłoszenie </div>';
    header('Location:contactUs.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}?>