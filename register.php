 <?php
require("main/contact us/PHPMailer/PHPMailer/PHPMailer.php");
require("main/contact us/PHPMailer/PHPMailer/SMTP.php");
require("main/contact us/PHPMailer/PHPMailer/Exception.php");
require("main/contact us/PHPMailer/PHPMailer/OAuth.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 session_start();
 require_once('database.php');
//dane z formularza
$data = [
    'login' => $_POST['login'],
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    'last_login' => date("Y-m-d H:i:s", time())
];
//recaptcha
 $Key = "6LcBudsZAAAAAOL4tDZEQSejyX0W9m6Q-hOha-Gg";
 $responseKey = $_POST['g-recaptcha-response'];
 $userIP = $_SERVER['RMOTE_ADDR'];

 $url = "https://www.google.com/recaptcha/api/siteverify?secret=$Key&response=$responseKey&remoteip=$userIP";
 $response = file_get_contents($url);
 $response = json_decode($response);
 if($response->success){
    $reCh = true;
 }else{
    $reCh = false;
 }
//sprawdzenie czy taki użytkownik istnieje
try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE `login` = ?");
    $stmt->execute([$data['login']]);
    $count = $stmt->fetchColumn();
    //sprawdzenie czy hasła są takie same
    if($_POST['password']!=$_POST['re-password']){
        $chPass = false;
        $_SESSION['reg-blad-other-password'] = '<script type="text/javascript">reg()</script><div style="color:red;">the passwords are not the same </div><br>';
        header('Location: index.php');
    }else if($_POST['password']==$_POST['re-password']){
        $chPass = true;
    }
    //jeśli nie ma takieo użytkownika w bazie + jeśli hasła są takie game + jeśli zrobiono recaptche
    if(!$count){
        if($chPass){
            if($reCh){
            try{
            $pdo->prepare("INSERT INTO users VALUES (NULL, :login,:email, :password, :last_login)")->execute($data);
            }catch(PDOException $e) {
                throw new Exception($e->getMessage());
            }
            $sql = $pdo->prepare("SELECT * FROM users WHERE `login` = ?");
            $sql->execute([$data['login']]);
            $ses = $sql->fetch(PDO::FETCH_ASSOC);
            $_SESSION['zalogowany'] = true;
            $_SESSION['id'] = $ses['id'];
            $_SESSION['nazwa'] = $ses['login'];
            $_SESSION['email'] = $ses['email'];
            unset($_SESSION['blad']);
            unset($_SESSION['reBladReg']);
            unset($_SESSION['reg-blad-user-exist']);
            unset($_SESSION['reg-blad-other-password']);
            $sus = null;
            //PHPMAILER
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
                   $mail->CharSet = "UTF-8";
                   //Recipients
                   $mail->setFrom('noreply@mthw.pl', 'MTHW');
                   $mail->AddAddress ($_SESSION['email'], $_SESSION['nazwa']);     // Add a recipient
                   $mail->addReplyTo('mthw.contact@gmail.com','MTHW');
                   // Content
                   $mail->isHTML(true);                                  // Set email format to HTML
                   $mail->Subject = "Witaj na MTHW";
                   $mail->Body    = "Witaj ".  $_SESSION['nazwa'] ."\nDziękujemy za rejestrację";
                   $mail->send();
            //PHPMAILER
            header('Location: main/home/home.php');
        } 
        }
        //jeśli taki użytkownik istnieje
    }else if($count){    
        $_SESSION['reg-blad-user-exist'] = '<script type="text/javascript">reg()</script><div style="color:red;"> this user already exist </div><br>';
        header('Location: index.php');
    }
    //jeśli nie zrobiono recaptchy 
    if(!$reCh){
        $_SESSION['reBladReg']= '<script type="text/javascript">reg()</script></br><div style="color:red;"> ZROB RECAPTCHE! </div>';
        header('Location: index.php');
    }
} catch(PDOException $e) {
    throw new Exception($e->getMessage());
}

?>	