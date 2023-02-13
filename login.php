<?php
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
function __autoload($class_name) {
    include $class_name . '.php' ;
}

$user = new Register_new;
$user->_login();
if($user->_login() == 'Uzytkownik zalogowany'){
    header('Location: strona_glowna.php');
}
else{
    header('Location: ./rejestracja.php');
}

?>
