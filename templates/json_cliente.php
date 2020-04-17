
<?php
require_once 'C:/xampp/htdocs/frankriescodwsextra/model/cliente.php';
require_once 'C:/xampp/htdocs/frankriescodwsextra/model/database.php';

$cliente  = new cliente();
$result = $cliente->ListarCl();

$json_string = json_encode($result);

$file = '../ficheros/cliente.json';
$fp = fopen($file, 'w');

fwrite($fp, $json_string);
ob_clean();
fclose($fp);
header('Content-Type: application/json');
readfile($file);

?>
