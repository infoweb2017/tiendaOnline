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
            $stm = $this->pdo->prepare("SELECT * FROM cliente WHERE id = ?");
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

    public function RegistrarClusuario($data){
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
            $sql = "INSERT INTO cliente (dni,Nombre,Apellido,Correo,Telefono,usuario,password) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
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
        $resultSet = $this->pdo->prepare("SELECT * FROM cliente");
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
            echo json_encode($cliente);
            echo "<br>";
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function rssCl() {
        try {
            $resultSet = $this->pdo->prepare("SELECT * FROM cliente");
            $resultSet->execute();

            $rss = "<?xml version='1.0' encoding='UTF-8'?>\n";
            $rss .= "<rss version='2.0'>\n";
            $rss .= "<Clientes>\n";

            $rss .= "<title>Clientes</title>\n<description>Tabla Clientes</description>\n<language>es-ES</language>\n";
            //$cliente = array();
            $data = $resultSet->fetchAll(PDO::FETCH_OBJ);

            foreach ($data as $item) {

                $rss .= "<item>\n";
                $rss .= "<dni>" . $item->dni . "</dni>\n";
                $rss .= "<nombre>" . $item->Nombre . "</nombre>\n";
                $rss .= "<apellido>" . $item->Apellido . "</apellido>\n";
                $rss .= "<correo>" . $item->Correo . "</correo>\n";
                $rss .= "<telefono>" . $item->Telefono . "</telefono>\n";
                $rss .= "<usuario>" . $item->usuario . "</usuario>\n";
                $rss .= "<password>" . $item->password . "</password>\n";
                $rss .= "</item>\n";
            }
            $rss .= "</Clientes>\n</rss>";

            $file = '../ficheros/cliente.rss';
            $fp = fopen($file, 'r');
            fwrite($fp, $rss);

            fclose($fp);
            header('Content-Type: text/xml');
           // echo $rss;
            readfile($file);
        } catch (Exception $ex) {
            
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
                echo $datos[$columna] . "\n";
            }
        }
        fclose($archivo);
    }

}

?>