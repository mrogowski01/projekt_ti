<?php

// function __autoload($class_name) {
//     include $class_name . '.php';
// }

function my_autoloader($class_name) {
    include $class_name . '.php';

    $user = new Register_new;
}

spl_autoload_register('my_autoloader');

?>
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
    <form action="validate.php" method="post">
        <div class="login-box">
            <!-- <h1>Logowanie</h1> -->
            
            <div class="rej">
                <a class="rejh" href="./logowanie.php"> <h1>Logowanie</h1></a>
            </div>
    
            <div class="rej">
                <a class="rejh" href="./rejestracja.php"> <h1>Rejestracja</h1></a>
            </div>
            <div class="rej">
                <a class="rej2" href="./strona_glowna.php"> Kontynuuj bez logowania </a>
            </div>
        </div>
    </form>
    </div>
</body>
</html>