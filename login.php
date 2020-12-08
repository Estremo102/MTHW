<?php
session_start();
require_once('database.php');
$reCh = true;
//dane z formularza
$data=[
    'login' => $_POST['login'],
    'password' => $_POST['password'],
    'last_login' => date("Y-m-d H:i:s", time()),
];
//recaptcha
if(isset($_SESSION['recaptcha'])){
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
}
//sprawdzenie czy istnieje taki użytkownik
try{
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE `login` = ?");
    $stmt->execute([$data['login']]);
    $count = $stmt->fetchColumn();
//jeśli istnieje i zrobił recaptche
    if($count==1 && $reCh){
        $haslo = $pdo->prepare("SELECT password FROM users WHERE `login` = ?");
        $haslo->execute([$data['login']]);
        $hash = $haslo->fetch();
        //jeśli hasło się zgadza
        if(password_verify($data['password'], $hash['password'])){
           $stmt2 = $pdo->prepare("UPDATE users SET last_login=? where login=?");
           $stmt2->execute([$data['last_login'],$data['login']]);
           $sql = $pdo->prepare("SELECT * FROM users WHERE `login` = ?");
           $sql->execute([$data['login']]);
           $ses = $sql->fetch(PDO::FETCH_ASSOC);
           $_SESSION['zalogowany'] = true;
           $_SESSION['id'] = $ses['id'];
           $_SESSION['nazwa'] = $ses['login'];
           $_SESSION['email'] = $ses['email'];
           unset($_SESSION['blad']);
           unset($_SESSION['zlelog']);
           unset($_SESSION['recaptcha']);
           unset($_SESSION['loginfail']);
           unset($_SESSION['reBlad']);
           $sus = null;
           header('Location: main/home/home.php');
           //hasło się nie zgadza 
        }else{
            $_SESSION['zlelog'] = true;
        }
    }//nie istnieje taka osoba
     if(!($count==1)||$_SESSION['zlelog']){
         //liczenie ile razy ktoś źle wpisał hasło i login
        if(isset($_SESSION['loginfail'])){
            $_SESSION['loginfail'] = $_SESSION['loginfail'] + 1;
            }
            
        if(!isset($_SESSION['loginfail'])){
                $_SESSION['loginfail'] = 1;
            }
            //dodanie recaptchy do strony 
        if($_SESSION['loginfail'] == 2){
            $_SESSION['recaptcha'] = '</br><div class="g-recaptcha" data-theme="dark" data-sitekey="6LcBudsZAAAAAP_JgHrmmy3N_G57sNuHAcQwVm4A"></div></br>';
        }
        $_SESSION['blad'] = '<script type="text/javascript"></script><div style="color:red;"> zły login lub hasło! </div>';
        header('Location: index.php');
    }
    //jeśli ktoś nie zrobił recaptchy
    if(!$reCh){
        $_SESSION['reBlad']= '</br><div style="color:red;"> ZROB RECAPTCHE! </div>';
        header('Location: index.php');
    }
} catch(PDOException $e) {
    throw new Exception($e->getMessage());
}
$pdo->query('KILL CONNECTION_ID()');
$pdo = null;
?>