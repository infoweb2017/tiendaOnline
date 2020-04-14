

<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


require_once ('C:/xampp/htdocs/frankriescodwsextra/model/database.php');


$inicioController = 'inicio';


//Accion es 'ac' cliente 'c' articulo 'a'
// Todo esta lógica hara el papel de un FrontController

if (!isset($_REQUEST['i'])) {
    require_once "./controller/$inicioController.controller.php";
    $inicioController = ucwords($inicioController) . 'Controller';
    $inicioController = new $inicioController;
    
   // $inicioController->Index();
    $inicioController->Inicio();
} else {
    // Obtenemos el controlador que queremos cargar
    $inicioController = strtolower($_REQUEST['i']);
    $accion = isset($_REQUEST['ac']) ? $_REQUEST['ac'] : 'Inicio';
    // Instanciamos el controlador
    require_once "./controller/$inicioController.controller.php";
    $inicioController = ucwords($inicioController) . 'Controller';
    $inicioController = new $inicioController;
    
    // Llama la accion cliente
    call_user_func(array($inicioController, $accion));
   
    
}
?>

