<?php
session_start();

if(!isset($_SESSION["zalogowany"])){
    header('Location:../../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="57x57" href="../../gallery/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../../gallery/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../gallery/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../gallery/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../gallery/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../gallery/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../../gallery/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../gallery/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../../gallery/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../../gallery/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../gallery/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../../gallery/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../gallery/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../../gallery/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="editprofile.css">
      <!-- MOŻECIE DODAĆ INNE PLIKI ZE STYLAMI ŻEBY TAMTEGO NIE ZAŚMIECAĆ BARDZIEJ -->
    <script src="script.js">
    </script>
    <title>Document</title>
<script data-ad-client="ca-pub-7756073327628566" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body>
      <!-- MENU GÓRNE-->
    <nav>
        <div class="logo-container">
            <div class="logo"><img src="../../gallery/logo/logo1.png" alt="aaa"></div>
        </div>
        <div class="buttons-container">
            <div class="menu-button"><a class="btnn" href="../home/home.php">HOME</a></div>
            <div class="menu-button"><a class="btnn" href="../game/game.php">GAMES</a></div>
            <div class="menu-button"><a class="btnn" href="../contact us/contactUs.php">CONTACT US</a></div>
        </div>
    </nav>
    <!--PROFIL PO LEWEJ-->
     <div class="profile-container"> You are logged in as:
        <div class="guest" id="guest">
            <div class="nick"> GUEST</div>
            <div>login</div>
            <div>or</div>
            <div>register</div>
        </div>
        <?php
        if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany'] == false)){
            echo'<div> GUEST: '.$_SESSION['name'].' </div>
            <div><a href="../../logout.php">log in or register</a></div>';
            }

            if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany'] == true)){
            echo'<div>'.$_SESSION['nazwa'].'</div>
                <div><a href="../profile/editProfile.php" class="leftPanel">Profile</a></div>
                <div><a href="../../logout.php" class="leftPanel">Log-out</a></div>';
            }
        ?>
    </div>
    <!--LEWY PANEL-->
    <aside class="left">
    </aside>
     <!-- PRAWY PANEL -->
    <aside class="right"></aside>
    <div class="main-content">
          <!-- TUTAJ WPIERDOLCIE CO CHCECIE-->
            <div class="profile">
                <table id='tabela'>
                    <tr>
                        <td>Twoj nick to : </td>
                        <td>                    <?php
                         echo $_SESSION['nazwa'];
                    ?></td>
                    </tr>
                    <tr>
                        <td id='zmiench'>Zmień hasło : </td>
                        <td>
                            <form action="chpass.php" method="post" id="formularz">
                                OLD PASSWORD <br>
                                <input type="password" name="oldpass"><br>
                                NEW PASSWORD <br>
                                <input type="password" name="npass"><br>
                                REPEAT PASSWORD <br>
                                <input type="password" name="rpass"><br>
                                <input type="submit" value="SAVE" id="send">
                            </form>
                        </td>
                    </tr>
                </table>
                <?php
                    if(isset($_SESSION['effect'])){
                    echo $_SESSION['effect'];
                    unset($_SESSION['effect']);

                    }
                ?>
            </div>
          <!-- TUTAJ NIE WPIERDALAĆ CO CHCECIE-->
    </div>
</body>
</html>	