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
    <link rel="manifest" href="../../gallery/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../../gallery/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="game-style.css">
    <link rel="stylesheet" href="game-style2.css">
      <!-- MOŻECIE DODAĆ INNE PLIKI ZE STYLAMI ŻEBY TAMTEGO NIE ZAŚMIECAĆ BARDZIEJ -->
      <script type="text/javascript" src="game-script.js"></script>
    <title>MTHW-Games</title>
</head>
<body id="body">
      <!-- MENU GÓRNE-->
    <nav>
        <div class="logo-container">
            <div class="logo"><a class="btnn" href="../home/home.php"><img src="../../gallery/logo/logo1.png" alt="aaa"></a></div>
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
          <section>
            <header class="games">
                Games
            </header>
        </section>
        <section class="features">
            <figure>
                <a class="modal-button" target="_blank" id="milionerzy"><img src="gallery/Mil.jpg" alt="Milionerzy"></a>
                <figcaption>
                    <a class="modal-button" target="_blank" id="milionerzy">Milionerzy</a>
                </figcaption>
                
            </figure>

            <figure>
                <a class="modal-button" target="_blank" id="ms"><img src="gallery/mar.jpeg" alt="Marcin Strama"></a>
                <figcaption>
                    <a class="modal-button" target="_blank" id="ms">Marcin Strama</a>
                </figcaption>
            </figure>

            <figure>
                <a class="modal-button" target="_blank"><img src="gallery/ff.jpg" alt="Full Focus" id="fullfocus"></a>
                <figcaption>
                        <a class="modal-button" target="_blank" id="fullfocus">Full Focus</a>
                </figcaption>
            </figure>
        </section>
        <section class="features">
            <figure>
                <a  target="_blank"><img src="gallery/coming-soon.jpg" alt="coming-soon"></a>
                <figcaption>
                    <a  target="_blank">Coming Soon</a>
                </figcaption>
            </figure>

            <figure>
                <a  target="_blank"><img src="gallery/coming-soon.jpg" alt="coming-soon"></a>
                <figcaption>
                    <a  target="_blank">Coming Soon</a>
                </figcaption>
            </figure>

            <figure>
                <a  target="_blank"><img src="gallery/coming-soon.jpg" alt="coming-soon"></a>
                <figcaption>
                        <a  target="_blank">Coming Soon</a>
                </figcaption>
            </figure>
        </section>
        
       
          <!-- TUTAJ NIE WPIERDALAĆ CO CHCECIE-->
    </div>
    <!--- Modale --->
    <div class="bg-modal" id="bg-modal">
        <div class="modal-content">
            <div id="modal-content">
                <div class="close" id="close">+</div>
                <div class="bg-btn"><a target="_blank" id="link">PLAY</a></div>
                <div class="bg-btn"  target="_blank"><a class="rul-modal-button" target="_blank" id="rul-btn">RULES</a></div>
            </div>
        </div>
    </div>
    <div class="rul-bg-modal" id="rul-bg-modal">
        <div class="modal-content">
            <div class="close" id="close">+</div>
            <div class="rules"><a class="rul-text" id="rul-txt"></a></div>
        </div>
    </div>
    
</body>
</html>