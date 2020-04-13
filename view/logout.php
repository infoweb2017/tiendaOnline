<?php

session_start();

session_unset();

if (session_destroy()) {
    header("Location:../index.php"); //Redireccion a la pagina login
}

?>

