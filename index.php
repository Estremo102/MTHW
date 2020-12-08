<?php
session_start();
if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany'] == true)){
    header('Location: main/home/home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css" />
    <link href="style2.css" rel="stylesheet" type="text/css">
    <link href="style3.css" rel="stylesheet" type="text/css">
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&family=Lobster&display=swap"
      rel="stylesheet"
    />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="script.js"></script>
    <title>Slide Animation</title>
<script data-ad-client="ca-pub-7756073327628566" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  </head>
  <body>
    <main>
      <section class="landing">
        <div class="main">
          <div class="form-box">
              <div class="button-box">
                  <div id="btn"></div>
                  <button type="button" class="toggle-btn" id="login-btn">Log in</button>
                  <button type="button" class="toggle-btn" id="register-btn">Register</button>
                  <button type="button" class="toggle-btn" id="guest-btn"> &nbsp; Guest</button>
              </div>
              <form id="login" action="login.php" method="post" class="input-group">
                  <input type="text" name="login" class="input-field" placeholder="User ID" required>
                  <input type="password" name='password'class="input-field" placeholder="Enter Password" required>
                  <input type="checkbox" class="check-box"><span>Remember me</span>
                  <?php
                    if(isset($_SESSION['recaptcha'])){
                    echo $_SESSION['recaptcha'];
                    }
                    ?>
                  <button type="submit" class="submit-btn">Log in</button><br><br>
                  <div class="error-box">
                  <?php
                    if(isset($_SESSION['blad'])){
                    echo $_SESSION['blad'];
                    }
                    if(isset($_SESSION['reBlad'])){
                        echo $_SESSION['reBlad'];
                    }
                    ?>
                   </div>
              </form>
              <form id="register" action="register.php" method="post" class="input-group">
                  <input id="aaa" name="login" type="text" class="input-field" placeholder="Login" required>
                  <input name="email" type="email" class="input-field" placeholder="Enter email" required>
                  <input name="password" type="password" class="input-field" placeholder="Enter Password" required>
                  <input name="re-password" type="password" class="input-field" placeholder="Repeat Password" required>
                  <input type="checkbox" class="check-box" required><span>I agree to the terms</span>
                  <div class="g-recaptcha" data-theme="dark" data-sitekey="6LcBudsZAAAAAP_JgHrmmy3N_G57sNuHAcQwVm4A"></div></br>
                  <button type="submit" class="submit-btn">Register</button>
                  <div class="error-box">
                  <?php
                        if(isset($_SESSION['reg-blad-user-exist'])){
                          echo $_SESSION['reg-blad-user-exist'];
                        }
                        if(isset($_SESSION['reg-blad-other-password'])){
                          echo $_SESSION['reg-blad-other-password'];
                        }
                        if(isset($_SESSION['reBladReg'])){
                          echo $_SESSION['reBladReg'];
                        }
                    ?>
                  </div>
              </form>
              <form action="guest.php" method="post" id="guest" class="input-group">
                  <input name="guestnick" type="text" class="input-field" placeholder="Guest Username" required>
                  <input type="checkbox" class="check-box" required><span>I agree to the terms</span>
                  <button type="submit" class="submit-btn">Continue As Guest</button>
              </form>
          </div>
      </div>
      </section>
    </main>
    <div class="intro" id="intro">
            <div class="body">
              <div class="container">
                <div class="card">
                  <div class="container2">
                    <img class="back" src='logo/logo1.png'>
                        <img class="pad" src='logo/logo2.png' >
                          <img class="pad-buttons" src='logo/logo3.png'></img>
                          <img class="mthw" src='logo/logo4.png'></img>
                        </img>
                      </img>
                  </div>
                  <div class= info>
                    <button id='button11' class="button">
                      GET STARTED !
                    </button>
                  </div>
                  </div>
              </div>
            </div>
    </div>
    <div class="slider" id="slider"></div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
      integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
      crossorigin="anonymous"
    ></script>
    <script src="./app.js"></script>
    <script src="./app2.js"></script>
    <?php
      if(isset($_SESSION['loginfail'])||isset($_SESSION['reBlad'])||isset($_SESSION['reBladReg'])||isset($_SESSION['reg-blad-user-exist'])||isset($_SESSION['reg-blad-other-password'])){
        echo '<script type="text/javascript">
              document.querySelector("#intro").style.display = "none";
              document.getElementById("slider").style.display = "none";
              </script>';
        }
    ?>
  </body>
</html>
