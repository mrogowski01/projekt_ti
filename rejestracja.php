<?php  ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">
  <title>Rejestracja</title>
  </head>
  <body>
    <div class="register">
    <form name="test" method="post" action="registers.php">
        <div class="register-box">
            <h1>Rejestracja</h1>
                
            <div class="textbox">
                <input type="text" placeholder="Imię" name="fname" required/>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Nazwisko" name="lname" required/>
            </div>
            <div class="textbox">
                <input type="email" placeholder="E-mail" name="email" required/>
            </div>
            <div class="textbox">
                <input type="password" placeholder="Hasło" name="password" required/>
            </div>
            <div>
                <input class="button" type="submit" name="register" value="Zarejestruj się">
            </div>
            <div class="rej">
                <a class="rej2" href="./logowanie.php"> Logowanie </a>
            </div>
        </div>
    </form>
    </div>
</body>
</html>