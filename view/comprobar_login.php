<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
}

require_once('C:/xampp/htdocs/frankriescodwsextra/model/database.php');

try {
    $conexion = Database::conexionDB();
    $registro = $conexion->prepare('SELECT Correo,password FROM cliente WHERE Correo= :email AND password= :password');

    $email = htmlentities(addslashes($_POST['email']));
    $password = htmlentities(addslashes($_POST['password']));

    $registro->bindValue(':email', $email);
    $registro->bindValue(':password', $password);
    $registro->execute();

    $numero_registro = $registro->rowCount();

    $menssage = '';

    if ($_POST['email'] == " ") {
        $message = "<p style='color:red'>Campo de usuario vacio. Volvera Intentarlo </p><br>";
    } elseif ($_POST['password'] == " ") {
        $message = "<p style='color:red'>Campo de password vacio. Volvera Intentarlo</p><br>";
    } elseif ($numero_registro != 0) {
        session_start();

        $_SESSION['usuario'] = $_POST['email'];
        header("Location: ../web/inicio.php");
    } else {
        header("Location:../index.php");
    }
} catch (Exception $ex) {
    die("ERRROR: " . $ex->getMessage());
}
?> 