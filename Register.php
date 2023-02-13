<?php

class Register {

   protected $data = array()  ;

   function __construct () { 
   }
      
   function _read () {
      $this->data['fname'] = $_POST['fname'] ;
      $this->data['lname'] = $_POST['lname'] ;
      $this->data['email'] = $_POST['email'] ;
      $this->data['password']  = $_POST['password'] ;
      $this->data['amp1']  = "1" ;
      $this->data['freq1']  = "0" ;
      $this->data['amp2']  = "1" ;
      $this->data['freq2']  = "0" ;
   }          

   function _write () {
      echo "Wprowadzone dane <br/>" ;
      echo "Imię: ". $this->data['fname'] ." <br/>" ;   
      echo "Nazwisko: ". $this->data['lname'] ." <br/>" ;
      echo "E-mail: ". $this->data['email'] ." <br/>" ;
      echo "Hasło: ". $this->data['password'] ." <br/>" ; 
   }  
}
?>