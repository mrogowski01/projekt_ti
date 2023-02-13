<?php
  
function __autoload($class_name) {
    include $class_name . '.php' ;
}
 
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