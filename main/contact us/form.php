<form action="mail.php" method="post" id="mailForm">
            SUBJECT <br>
            <input type="text" name="subject" id="subject"><br>
            <?php
                if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany'] == true)) //zalogowany 
                {
                    echo '<input type="text" name="mail" id="mail" style="display: none;" value="' . $_SESSION['email'] . '">';
                }
                else //jako gość
                { 
                    echo 'MAIL <br>
                    <input type="text" name="mail" id="mail" required><br>';
                }
            ?>
            CACTEGORY <br>
            <select name="category" id="category">
                <option value="propozycja">propozycja</option>
                <option value="błąd">zgłoś błąd</option>
                <option value="współpraca">współpraca</option>
                <option value="reklama">reklama</option>
                <option value="inne">inne</option>
            </select><br>
            CONTENT OF THE NOTIFICATION<br>
            <textarea name="content" id="content" cols="30" rows="10"></textarea><br>
            <input type="submit" value="SEND" id="send">
        </form>