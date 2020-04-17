<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

class cliente {

    private $pdo;
    public $id;
    public $dni;
    public $Nombre;
    public $Apellido;
    public $Correo;
    public $Telefono;
    public $usuario;
    public $password;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::conexionDB();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

//Listamos tdos los clientes
    public function ListarCl() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM cliente");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

//Obtenemos los clientes por id
    public function ObtenerCl($id) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM cliente WHERE id= ? ORDER BY DESC");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

// Leemos todos los clientes
    function LeerClienteAll() {
        try {
            $resultSet = $this->pdo->prepare("SELECT * FROM cliente");
            $resultSet->execute();

            $clientes = [];
            $line_cliente = [];
            $i = 0;

            foreach ($resultSet as $valor) {
                $line_cliente = $valor;
                $clientes[$i] = new cliente($line_cliente['dni'], $line_cliente['Nombre'], $line_cliente['Apellido'], $line_cliente['Correo'], $line_cliente['Telefono']);
                $i++;
            }
            return $clientes;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    //Leer el usuario a partir del id del usuario
    function ClienteLeerUser($user) {
        try {
            $arry = array($user);
            $resultSet = $this->pdo->prepare("SELECT * FROM cliente WHERE id=?", $arry);
            $resultSet->execute();

            $ret = $resultSet[0]['usuario'];
            if ($resultSet) {
                return $ret;
            } else {
                return "NO EXISTE";
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

//Comprobamos el usuario y contraseña de la página login
    function login_usuario($usuario, $password) {
        try {
            $arr = array($usuario, $password);

            $consulta = "SELECT id,usuario,password FROM cliente WHERE usuario=? AND password=?;";
            $ret = $this->pdo->prepare($consulta, $arr);
            //var_dump($ret);
            if ($ret) {
                return $ret[0]['id'];
            } else {
                return "El usuario " . $usuario . " no existe";
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function EliminarCl($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM cliente WHERE id= ?");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ActualizarCl($data) {
        try {
            $sql = "UPDATE cliente SET 
                        
			dni        = ?,
			Nombre     = ?, 
			Apellido   = ?,
                        Correo     = ?,
                        Telefono   = ?,
                        usuario    = ?,
                        password   = ?,
						
		    WHERE id = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->id,
                                $data->dni,
                                $data->Nombre,
                                $data->Apellido,
                                $data->Correo,
                                $data->Telefono,
                                $data->usuario,
                                $data->password,
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarClusuario($data) {
        try {
            $sql = "INSERT INTO cliente (usuario,password) 
		        VALUES (?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->usuario,
                                $data->password,
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarCl(cliente $data) {
        try {
            $sql = "INSERT INTO cliente (id,dni,Nombre,Apellido,Correo,Telefono,usuario,password) 
		        VALUES (?,?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->id,
                                $data->dni,
                                $data->Nombre,
                                $data->Apellido,
                                $data->Correo,
                                $data->Telefono,
                                $data->usuario,
                                $data->password,
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener() {
        $resultSet = $this->pdo->prepare("SELECT * FROM cliente ORDER BY id DESC");
        $resultSet->execute();

        $cliente = array();

        while ($data = $resultSet->fetchAll(PDO::FETCH_OBJ)) {
            $cliente[] = $data;
        }
        return $cliente;
    }

    public function jsonCl() {
        try {

            $resultSet = $this->pdo->prepare("SELECT * FROM cliente");
            $resultSet->execute();

            $cliente = array();

            while ($data = $resultSet->fetchAll(PDO::FETCH_OBJ)) {
                $cliente[] = $data;
            }
            //Creamos json
            $cliente['cliente'] = $cliente;
            $json_string = json_encode($cliente);
            echo "<br>";
            echo $json_string;
            
            //crear archivo json
            $file = '../ficheros/cliente.json';
            file_put_contents($file, $json_string);
            echo "<br>";
            
            
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function rssCl (){
        try {
            $resultSet = $this->pdo->prepare("SELECT * FROM cliente");
            $resultSet->execute();
            
            while ($data = $resultSet->fetchAll(PDO::FETCH_OBJ)) {
                $cliente[] = $data;
            }
            
            $cliente['Cliente'] = $cliente;
           
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function csvCl() {
        $resultSet = $this->pdo->prepare("SELECT * FROM cliente");
        $resultSet->execute();

        $datos = $resultSet->fetchAll(PDO::FETCH_OBJ);

        $file = '../ficheros/cliente.csv';
        $linea = 0;

        $archivo = fopen($file, 'r');

        while (($datos = fgetcsv($archivo, ",")) == true) {
            $num = count($datos);
            $linea++;

            for ($columna = 0; $columna < $num; $columna++) {
                echo $datos[$columna] . "<br>";
            }
        }
        fclose($archivo);
    }
    public function rss() {
        include_once '../templates/rss_Cliente.php';
        //$cliente = simplexml_load_file(file_get_contents("C:/xampp/htdocs/frankriescodwsextra/ficheros/cliente.rss"));
        $resultSet = $this->pdo->prepare("SELECT * FROM cliente");
        $resultSet->execute();

        $cliente = $resultSet->fetchAll(PDO::FETCH_OBJ);
        
        $num_noticia = 1;
        $max_noticias = 50;
        
        echo "<h2>{$cliente->channel->title}</h2>";
        
        foreach ($cliente->channel->Cliente->item as $noticia){
            
            echo "<article>";
                $fecha = date("d/m/Y - H:i", strtotime($noticia->pubDate));
                echo "<a href='$noticia->copyright'></a>";
                echo $noticia->title;
                echo $noticia->descripcion;
                echo "----------------------------------------------";
                echo $noticia->id;
                echo $noticia->dni;
                echo $noticia->nombre;
                echo $noticia->apellido;
                echo $noticia->correo;
                echo $noticia->telefono;
                echo $noticia->usuario;
                echo $noticia->password;
            echo "</article>";
            $num_noticia++;
            
            if($num_noticia > $max_noticias){
                break;
            }
        }
    }

}

?>