<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


require_once ('../model/database.php');

$clienteController= 'cliente';

if (!isset($_REQUEST['c'])) {
    require_once "../controller/$clienteController.controller.php";
    $clienteController = ucwords($clienteController) . 'Controller';
    $clienteController = new $clienteController;
    $clienteController->IndexCliente();
}else{
    $clienteController = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'IndexCliente';
    
    require_once "../controller/$clienteController.controller.php";
    $clienteController = ucwords($clienteController).'Controller';
    $clienteController = new $clienteController;       
    
     call_user_func(array($clienteController, $accion));
}
?>

