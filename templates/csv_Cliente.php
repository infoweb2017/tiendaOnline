
<?php

$file = '../ficheros/cliente.csv';
$fp = fopen($file, 'r');
foreach ($result as $fields) {
    if( is_object($fields) )
        $fields = (array) $fields;
    fputcsv($fp, $fields);
}

fclose($fp);
header('Location: '.$file);
?>


