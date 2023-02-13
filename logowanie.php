<?php  ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">
  <title>Logowanie</title>
  </head>
  <body>
    <div class="login">
        <div class="login-box">
            <h1>Logowanie</h1>
            <form name="test" method="post" action="login.php">
            <div class="textbox">
                <input type="email" placeholder="E-mail" name="email" required/>
            </div>
            <div class="textbox">
                <input type="password" placeholder="Hasło" name="password" required/>
            </div>
            <div>
                <input class="button" type="submit" name="login" value="Zaloguj się">
            </div>
            <div class="rej">
                <a class="rej2" href="./rejestracja.php"> Rejestracja </a>
            </div>
            <div class="rej">
                <a class="rej2" href="./strona_glowna.php"> Kontynuuj bez logowania </a>
            </div>
            </form>
        </div>
    </div>
</body>
</html>