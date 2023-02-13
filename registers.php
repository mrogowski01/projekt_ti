<?php
  
function my_autoloader($class_name) {
    include $class_name . '.php';
}

spl_autoload_register('my_autoloader');
 
$reg = new Register_new;
$reg->_read();
$reg->_write();
// $reg->_save();
echo "<p><a href='./'> Powrot do strony glownej</a></p>";
           
if($reg->_save() == 'Dane zostaly zapisane'){
  header('Location: logowanie.php');
}
else{
  header('Location: ./rejestracja.php');
}
?>