
<?php
require_once 'C:/xampp/htdocs/frankriescodwsextra/model/cliente.php';
require_once 'C:/xampp/htdocs/frankriescodwsextra/model/database.php';

$cliente  = new cliente();
$result = $cliente->ListarCl();

$file = '../ficheros/cliente.csv';
$fp = fopen($file, 'w');
foreach ($result as $fields) {
    if(is_object($fields))
        $fields = (array) $fields;
    fputcsv($fp, $fields);
}
ob_clean();
fclose($fp);
header('Location: '.$file);
?>

