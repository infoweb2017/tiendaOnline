
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'C:/xampp/htdocs/frankriescodwsextra/model/cliente.php';

class inicioController{
    private $model;

    public function __construct() {
        $this->model = new cliente();
    }
    public function nuevoRegistro(){
        require_once 'C:/xampp/htdocs/frankriescodwsextra/view/signup.php';
    }
    public function Index(){
        require_once 'C:/xampp/htdocs/frankriescodwsextra/view/header.php';
    }
    public function Inicio(){
        require_once 'C:/xampp/htdocs/frankriescodwsextra/view/login.php';
    }
    public function Salir(){
       // header("Location:../index.php");
        header("Location:C:/xampp/htdocs/frankriescodwsextra/controller/logout.php");
    }
    public function Volver(){
        header("Location:../web/inicio.php");
    }
    public function IniciarPage(){
        header("Location:../web/inicio.php");
    }
    public function GuardarNuevoCliente() {
        $cliente = new cliente();
        
        $cliente->usuario  = $_REQUEST['usuario'];
        $cliente->password = $_REQUEST['password'];
        
        if (isset($_REQUEST['id'])) {
            $cliente = $this->model->ObtenerCl($_REQUEST['id']);
        }
        $cliente->id > 0 ?: $this->model->RegistrarClusuario($cliente) ;
                 
        header('Location:../index.php');
    }
    
    public function documentacion(){
        //require_once '../Documentacion/bootstrap-4.pdf';
        //require __DIR__ .'../Documentacion/bootstrap-4.pdf';
        header ("Location:../Documentacion/bootstrap-4.pdf");
    }
}
?>
