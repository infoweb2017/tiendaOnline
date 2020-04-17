<?php

class ficheros {

//funcion para limpar el texto y la secuencia de escape
    function limpia($texto) {
        if (get_magic_quotes_gpc()) {
            $texto = stripcslashes($texto); //quito barras \ de un string
        }
        if (!is_numeric($texto)) {
            //Quita secuencias de escape peligrosas
            echo $texto . " es numerico";
        } else {
            echo $texto . " no es numerico";
        }
        return $texto;
    }

//funcion para validar nombre
    function validarNombre($nombre) {
        $nombre = $_REQUEST["Nombre"];

        $patronNom = "/^[aA-zZ]{3,29}$/";

        if (preg_match($patronNom, $nombre)) {
           if ($nombre == "") {
            echo "ERROR!!.Debe introducir un nombre válido.";
           }
        }
    }

//funciones para validar el Email 
    function validarEmail($email) {
        return(false !== filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
    }

//Function verificar email
    function verificarEmail($email) {
        $email = $_REQUEST["Correo"];

        $patronEmail = '/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})+$/';

        if (preg_math($patronEmail, $email)) {
           if ($email == "") {
            echo "<p class=\"aviso\">ERROR!!.Debe introducir un email</p>\n";
           }
        } 
    }

//funcion validar telefono
    function validarTelefono($telefono) {
        $telefono = $_REQUEST['Telefono'];

        //$telefono = $tele('000 000 000');
        $expresion = '/^[9|6|7][0-9]{8}$/';

        if (preg_match($expresion, $telefono)) {
           if ($telefono == "") {
            echo "<p class=\"aviso\">ERROR!!.Debe introducir un número de teléfono</p>\n";
           }
        } 
    }

//funcion para recuperar password
    function restartPass() {

        $pass1 = $_REQUEST['password'];
        $pass2 = $_REQUEST['confirmar_password'];

        $pass1 = recoger("password");
        $pass2 = recoger("confirmar_password");

        if ($pass1 == "" || $pass2) {
            print "<p class=\"aviso\">Error, debera introducir dos veces la contraseña</p>\n";
        }
        if (!($pass1 == $pass2)) {
            print "<p class=\"aviso\">Error,la contraeña no coinciden</p>\n";
        }
    }

//Funcion para validar DNI
    function validarDni($dni) {
        $dni = $_REQUEST['dni'];

        if (strlen($dni) < 9) {
            return "DNI demasiado corto.";
        }

        $nDni = strtoupper($dni);
        $letra = substr($dni, -1, 1);
        $num = substr($dni, 0, 8);

        // Si es un NIE hay que cambiar la primera letra por 0, 1 ó 2 dependiendo de si es X, Y o Z.
        $num = str_replace(array('X', 'Y', 'Z'), array(0, 1, 2), $num);

        $modulo = $num % 23;
        $letrasValidas = "TRWAGMYFPDXBNJZSQVHLCKE";
        $letraCorrecta = substr($letrasValidas, $modulo, 1);

        if ($letraCorrecta != $letra) {
            return "Letra incorrecta, la letra deber&iacute;a ser la $letraCorrecta.";
        } else {
            return "OK";
        }
    }

//Esta funcion genera una clave aleatorioa de 9 caracteres
    function genera_clave_alea() {
        $chars = "abcdefghijklmnñopqrstuvwxyz012356789";

        $llave = "";

        for ($i = 0; $i < 9; $i++) {
            $llave = $chars[rand(0, 32)];
        }
        return $llave;
    }

}
?>

