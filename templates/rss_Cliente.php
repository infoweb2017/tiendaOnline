<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'C:/xampp/htdocs/alumno_2019/frankriescodwsextra/model/cliente.php';

// Elimina caracteres extraños que me pueden molestar en las cadenas que meto en los item de los RSS
function clrAll($str) {
    $str = str_replace("&", "&amp;", $str);
    $str = str_replace("\"", "&quot;", $str);
    $str = str_replace("'", "&apos;", $str);
    $str = str_replace(">", "&gt;", $str);
    $str = str_replace("<", "&lt;", $str);
    return $str;
}

//creo cabeceras desde PHP para decir que devuelvo un XML
header("Content-type: text/xml");

//coneccion a la BD
$cliente = new cliente();

$result = $cliente->obtener();

echo "<?xml version='1.0' encoding='UTF-8'?>";
echo "<rss version='2.0'>";
//Datos generales del Canal
echo "<channel>";
echo "<Clientes> ";
echo "<title>Tabla Clientes</title>";
echo "<description>Clientes</description>";
echo "<language>es-ES</language><br>";
echo "<copyright>CEEDCV.es</copyright>";

while ($data = $result->fetchAll(PDO::FETCH_OBJ)){

    $id = clrAll($data["id"]);
    $dni = clrAll($data['dni']);
    $nombre = clrAll($data['Nombre']);
    $apellido = clrAll($data['Apellido']);
    $correo = clrAll($data['Correo']);
    $telefono = clrAll($data['Telefono']);
    $usuario = clrAll($data['usuario']);
    $pass = clrAll($data['password']);

   
    
    echo "<item>\n";
    echo "<title></title>\n";
    echo "<description>";
        echo "<id>" . $id . "</id>\n";
        echo "<dni>" . $dni . "</dni>\n";
        echo "<nombre>" . $nombre . "</nombre>\n";
        echo "<apellido>" . $apellido . "</apellido>\n";
        echo "<correo>" . $correo . "</correo>\n";
        echo "<telefono>" . $telefono . "</telefono>\n";
        echo "<usuario>" . $usuario . "</usuario>\n";
        echo "<password>" . $pass . "</password>\n";
    echo "</description>";
    echo "</item>";
}


echo "</Clientes></rss></channel>";

echo "<a href='../controller/controladorCliente.php'>Volver</a>";
?>
