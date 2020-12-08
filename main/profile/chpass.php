<?php
 session_start();
 require_once('../../database.php');
    $data = [
        'login' => $_SESSION['nazwa'],
        'password' => $_POST['oldpass'],
        'newpassword' => password_hash($_POST['npass'], PASSWORD_DEFAULT)  
    ];

    $zlehalo = false;
    try{
        $haslo = $pdo->prepare("SELECT password FROM users WHERE `login` = ?");
            $haslo->execute([$data['login']]);
            $hash = $haslo->fetch();
        }catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }
    if($_POST['npass']==$_POST['rpass']){
        if(password_verify($data['password'], $hash['password'])){
            try{
               $prosze= $pdo->prepare("UPDATE users SET password = ? where login = ?");
               $prosze->execute([$data['newpassword'],$data['login']]);
               header('Location: editProfile.php');
                }catch(PDOException $e) {
                    throw new Exception($e->getMessage());
                }
                $_SESSION['effect'] = '<div style="color:green;"> Ustawiono nowe hasło </div>';
                header('Location: editProfile.php');
        }else{
            $_SESSION['effect'] = '<div style="color:red;"> Stare hasło jest niepoprawne </div>';
            header('Location: editProfile.php');
        }  
    }else{
        $_SESSION['effect'] = '<div style="color:red;"> Hasła się nie zgadzają </div>';
        header('Location: editProfile.php');
    }
?>