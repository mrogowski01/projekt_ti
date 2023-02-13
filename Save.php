<?php

class Save {
    private $dbh;
    private $dbfile = "./data_users.db" ;
    private $data;


   private $variables = array()  ;

   function __construct () { 
   }
      
   function read () {

      $this->variables['amp1'] = $_POST['amplitude_input_1'] ;
      $this->variables['freq1'] = $_POST['frequency_input_1'] ;
      $this->variables['amp2'] = $_POST['amplitude_input_2'] ;
      $this->variables['freq2']  = $_POST['frequency_input_2'] ;
   }          



   function save(){
    $logged_email =  $_SESSION['user'];
    $this->dbh = dba_open( $this->dbfile, "w");  
    $serialized_data = dba_fetch($logged_email, $this->dbh);
    $this->data = unserialize($serialized_data);
    $out = array();
    $out = array_merge($this->data, $this->variables);
    $serialize_all= serialize($out);
    dba_replace($this->data['email'], $serialize_all, $this->dbh);
    dba_close($this->dbh);
   }

}
?>