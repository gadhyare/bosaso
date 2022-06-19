<?php   
 
  
require_once( 'init.php');
 // Require composer autoload
require_once __DIR__ . '/lib/vendor/autoload.php';
// Create an instance of the class:
 
$ob = new App($_GET);
$controller = $ob->createController();
if($controller){
    $controller->executeAction();
    unset($_SESSION['msg']) ;
}

 


