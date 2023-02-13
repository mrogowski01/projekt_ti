<?php

class User extends Register {

   private $ident = 'my_ident' ;
   private $auth_my1 = false ;

   function __construct () {
      parent::__construct() ;  
	  session_set_cookie_params([
            'lifetime' => 360,
            'path' => '/~0rogowski/',                
            'domain' => $_SERVER['HTTP_HOST'],
            'secure' => false,                  
            'httponly' => false,
            'samesite' => 'LAX'
        ]);	  	  
      session_start() ;
   }              

   function setSession () {
      $_SESSION["ident"] = $this->ident ;
   }

   function destroySession() {
      $_SESSION = array() ;
      if ( isset($_COOKIE[session_name()]) ) {
          setcookie( session_name(), '', time()-42000, '/') ;
       }
       session_destroy();
    }    
}

?>