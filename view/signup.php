
<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once('./model/database.php');

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['usuario'])) {
    $conexion = Database::conexionDB();
    $consulta = "INSERT INTO cliente (Correo,password,usuario) VALUES (:email, :password, :usuario)";
    $statment = $conexion->prepare($consulta);
    
    $statment->bindValue(':email', $_POST['email']);
    $statment->bindValue(':usuario', $_POST['usuario']);
    $statment->bindValue(':password', $_POST['password']);
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    //$statment->bindValue(':password', $password);

 
   if ($_POST['password'] == $_POST['confirm_password']) {
            
        if ($statment->execute()) {
            $message = "<p style='color:blue'>Usuario creado con éxito <h2 style='text-align: center'><b> ---> ".$_POST['usuario']." <---</b></h2></p>";
        } else {
            $message = 'Problemas al crear su cuenta';
        }
    } else {
        $message = "Contraseña no coincinden.";
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../web/css/css.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://informaticapc.com/base_js/lib.js"></script>
        <script src="https://informaticapc.com/boostrap/js/bootstrap.min.js"></script>
        <link href="https://informaticapc.com/boostrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
        <link rel="shortcut icon" href="../web/images/favicon.ico">

        <title>Registro</title>
    </head>
    <body>
        <?php require_once 'header.php'; ?>
        <?php if (!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        <!--action="?i=inicio&ac=GuardarNuevoCliente"-->
        <span class="log"><a href="?i=inicio&ac=Inicio"><h3>Login</h3></a></span>
        <table border="1" class="table  table-striped  table-hover" id="tabla" >
            <form id="frm-cliente"  action="" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend style="text-align: center"><h2>Registro de nuevo Usuario</h2></legend>
                    <label>Usuario</label>
                    <input type="text" name="usuario"  class="form-control" placeholder="Ingrese su usuario" required>
                    <label>Correo</label>
                    <input type="email" name="email"  class="form-control" placeholder="Ingrese su email" required>
                    <label>Password</label>
                    <input type="password" name="password"  class="form-control" placeholder="Ingrese su contraseña" required>
                    <label>Password</label>
                    <input type="password"  name="confirm_password"  class="form-control" placeholder="Confirme contraseña" required>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>  
                   <!--<input type="submit" name="enviar" value="Guardar"></td>-->
                    <div class="text-right">
                        <button class="btn btn-primary">Guardar</button>
                    </div>
                </fieldset>
            </form>
        </table>

    </body>
</html>

<script>
    $(document).ready(function () {
        $("#frm-cliente").submit(function () {
            return $(this).validate();
        });
    });
</script>
<script 
    src="../assets/js/datatable.js">
</script>



