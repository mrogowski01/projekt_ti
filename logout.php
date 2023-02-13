<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
function my_autoloader($class_name) {
    include $class_name . '.php';
}

spl_autoload_register('my_autoloader');
 
$user = new Register_new;
 
echo $user->_logout() ;
header('Location: logowanie.php');
 
?>