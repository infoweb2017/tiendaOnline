
<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

//require_once '../model/cliente.php';
require_once 'C:/xampp/htdocs/frankriescodwsextra/model/cliente.php';

class clienteController {

    private $model;

    public function __construct() {
        $this->model = new cliente();
    }

    public function IndexCliente() {
        require_once 'C:/xampp/htdocs/frankriescodwsextra/view/header.php';
        //require_once '../view/header.php';
        require_once 'C:/xampp/htdocs/frankriescodwsextra/view/cliente_mostrar.php';
    }

    public function Salir() {
        // header("Location:../index.php");
        header("Location:../view/logout.php");
    }

    public function Volver() {
        header("Location:../web/inicio.php");
    }

/* Hacemos crud de cliente tanto para cuando editemos un cliente, como agreguemos */
    public function CrudCliente() {
        $cliente = new cliente();

        if (isset($_REQUEST['id'])) {
            $cliente = $this->model->ObtenerCl($_REQUEST['id']);
        }
        require_once ('../view/header.php');
        require_once ('../view/cliente-editar.php');
    }

/* Guardar clientes */
    public function GuardarCliente() {
        $cliente = new cliente();

        $cliente->id       = $_REQUEST['id'];
        $cliente->dni      = $_REQUEST['dni'];
        $cliente->Nombre   = $_REQUEST['Nombre'];
        $cliente->Apellido = $_REQUEST['Apellido'];
        $cliente->Correo   = $_REQUEST['Correo'];
        $cliente->Telefono = $_REQUEST['Telefono'];
        $cliente->usuario  = $_REQUEST['usuario'];
        $cliente->password = $_REQUEST['password'];


        $cliente->id > 0 
                ? $this->model->ActualizarCl($cliente) 
                : $this->model->RegistrarCl($cliente);
        header('Location: controladorCliente.php');
    }

/* Eliminar Cliente */
    public function EliminarCliente() {
        $this->model->EliminarCl($_REQUEST['id']);
        header('Location: controladorCliente.php');
    }

//------------------------------------------------------------------------------    
    /* Crea el JSON y lo muestra */
    public function ver_jsonCliente() {
        $result = $this->model->jsonCl();
        require_once ('../templates/json_Cliente.php');
    }

/* Crea el RSS y lo muestra */
    public function ver_rssCliente() {
        $result = $this->model->rssCl();
        header("Location: ../templates/rss_Cliente.php");
        
    }

/* Crea el CSV y lo muestra */
    public function ver_csvCliente() {
        $result = $this->model->csvCl();
        require_once ('../templates/csv_Cliente.php');
    }

//------------------------------------------------------------------------------  

    public function verCSV(){
        $result = $this->model->csvCl();
    }
    /* Muestra el JSON creado */
    public function verJson() {
        $result = $this->model->jsonCl();
    }

    /* Muestra el RSS creado */
    public function verRSS() {
        $result = $this->model->rssCl();
        header('Location: controladorCliente.php');
    }
    
//------------------------------------------------------------------------------
    /* Cogemos en un array todos los id de los clientes. */
    public function comprobar_id_cliente() {
        $cliente = new cliente();

        $indice = [];
        if (isset($_REQUEST['id'])) {
            $cliente = $this->model->ListarCl($_REQUEST['id']);
        }
        foreach ($cliente as $value) {
            array_push($indice, $value->id);
        }
        return $indice;
    }

/* Con esta funcion leemos si el usuario está detro del archivo de usuarios */
    public function comprobar_usuario($usuario) {
        $cliente = new cliente();
        $cliente = $this->model->LeerClienteAll();
        $user = [];

        foreach ($cliente as $value) {
            array_push($user, $value->usuario);
        }
        if (in_array($usuario, $user)) {
            return "REPETIDO";
        } else {
            return "OK";
        }
        return $user;
    }

    /* Leer usuario */
    function leer_usr() {
        return $_SESSION["idCliente"];
    }

}

?>