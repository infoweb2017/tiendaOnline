<?php

session_start();

unset($_SESSION['id_usuario']);

if (session_destroy()) {
    header("Location:../index.php"); //Redireccion a la pagina login
}

?>

