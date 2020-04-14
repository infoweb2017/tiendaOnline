<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


// Si han aceptado la política
if (isset($_REQUEST['politica-cookies'])) {
    // Calculamos la caducidad, en este caso un año
    $caducidad = time() + (60 * 2);
    // Crea una cookie con la caducidad
    setcookie('politica', '1', $caducidad);
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./web/css/css.css">
        <link rel="shortcut icon" href="../web/images/favicon.ico">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://informaticapc.com/base_js/lib.js"></script>
        <script src="https://informaticapc.com/boostrap/js/bootstrap.min.js"></script>
        <link href="https://informaticapc.com/boostrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="styleSheet" href="https://informaticapc.com/base_css/estilos.css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
        <script type="text/javascript" id="cookieinfo"
                src="//cookieinfoscript.com/js/cookieinfo.min.js">
        </script>
        <title>Login</title>
        <style>
            body {
                background:lightskyblue;
                width: 100%;
            }
        </style>
    </head>
    <body>


        <div id="loginForm">
            <form action="../../frankriescodwsextra/view/comprobar_login.php" method="POST" enctype="multipart/form-data">
                <label>E-mail:</label>
                <input type="email" name="email" placeholder="Introduce tu email" ><br>
                <label>Contraseña:</label>
                <input type="password" name="password" placeholder="Introduce tu contraseña"><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                <a class="btn pull-left" href="?i=inicio&ac=nuevoRegistro">Registrarse</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br><br>  
                <input type="submit" name="enviar" class="btn" value="Enviar"></td>
                <input type="reset"  name="borrar" class="btn" value="Borrar"></td>
            </form>
        </div>

<?php if (!isset($_REQUEST['politica-cookies']) && !isset($_COOKIE['politica'])): ?>
            <!-- Mensaje de cookies -->
            <div class="cookies">
                <h2>Cookies</h2>
                <span>¿Aceptas nuestras cookies?</span>
                <table border="1" border-collapse="separate" border-spacing="10px 5px">
                    <tr>
                        <td>
                            <a style='color:blue' href='?politica-cookies=1' class="button">Aceptar</a>
                        </td>
                    </tr>
                </table>
            </div>
<?php endif; ?>
    </body>
</html>

<!----------------------------------------------------------------------------->

