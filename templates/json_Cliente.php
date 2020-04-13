<?php
  $result = new cliente();

  
  $json_string = json_encode($result);
  $file = file_get_contents('../ficheros/cliente.json') ;
  //$V = json_decode($json_string,TRUE);

  $fp = fopen($file, 'w');
  fwrite($fp, $json_string);
  fclose($fp);
  header('Content-Type: application/json');
  readfile($file);
  //header('Location: '.$file); 
?>
