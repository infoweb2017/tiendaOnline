<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'C:/xampp/htdocs/frankriescodwsextra/model/cliente.php';
require_once 'C:/xampp/htdocs/frankriescodwsextra/model/database.php';

$cliente  = new cliente();
$result = $cliente->rss();

$rss.="<?xml version='1.0' encoding='UTF-8'?>\n";
$rss.="<rss version='2.0'>\n";
    $rss.= "<channel>\n";
    $rss.="<Clientes>\n";

        $rss.= "<title>Clientes</title>\n";
        $rss.= "<description>Tabla Clientes</description>\n";
        $rss.= "<language>es-ES</language>\n";
        $rss.= "<copyright>CEEDCV.es</copyright>\n";
        
        foreach ($result as $item) {
            $rss.="--------------'<cliente'>$item->Nombre'</cliente>'----------------\n";
            $rss.="<item>\n";
            $rss.= "<id>".$item->id."</id>\n";
            $rss.= "<dni>".$item->dni."</dni>\n";
            $rss.= "<nombre>".$item->Nombre."</nombre>\n";
            $rss.= "<apellido>".$item->Apellido."</apellido>\n";
            $rss.= "<correo>".$item->Correo."</correo>\n";
            $rss.= "<telefono>".$item->Telefono."</telefono>\n";
            $rss.= "<usuario>".$item->usuario."</usuario>\n";
            $rss.= "<password>".$item->password."</password>\n";
            $rss.="</item>\n";
        }


$rss.="</Clientes>\n</channel>\n</rss>";
        
$file = '../ficheros/cliente.rss';

$fp = fopen($file, 'w');
fwrite($fp, $rss);
ob_clean();
fclose($fp);
header('Content-Type: text/xml');
//echo $rss;
readfile($file);




?>
