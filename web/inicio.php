
<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

?>
<html>
    <head>
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
        <link rel="shortcut icon" href="../web/images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../web/css/css.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                setTimeout(function() {
                    $("#cuerpo").fadeOut(1500);
                },3000);
 
            });
        </script>
        <title>Bienvenido a nuestra Tienda</title>
        <style>
            body {
                background-color: lightblue;
                width: 100%;
            }
        </style>
    </head>
    <body>
        
        <header>
            <nav>
                <ul> 
                    <!--  <li><a href="?i=inicio&ac=cliente">Clientes</a></li>
                    <li><a href="?i=inicio&ac=documentacion">Documentación</a></li>
                    <li><a href="http://ceedcv.org/">Contacto</a></li>
                    <li><a href="?i=inicio&ac=Salir">Cerrar Sesión</a></li>-->
                    
                    <li><a href="../controller/controladorCliente.php">Clientes</a></li>
                    <li><a href="?i=inicio&ac=documentacion">Documentación</a></li>
                    <li><a href="http://ceedcv.org/">Contacto</a></li>
                    <li><a href="../view/logout.php">Cerrar Sesión</a></li>
                </ul>
            </nav>
         </header>
        <br>
        <div id="cuerpo">
            <article>
              
                <?php
                              
                if(!isset($_SESSION['usuario'])){//si hay algo lamacenado aqui
                   header("Location:../view/login.php");
                }
                ?>
                <br><font  style='color:darkmagenta'><h3>Bienvenido a nuestra tienda.<br>
                     <b><?=$_SESSION['usuario'];?>
                       
                    </b></h3></font>
            </article>
        </div>
        <div class="imagenes">
            <img src="../web/images/blur-1850082__340.webp">
            <img src="../web/images/store-984393__340.webp">
        </div>
        <div class="footer"> 
            <footer>
                <nav>
                    <ul>
                        <li><p>Copyright 2019-2020</p></li>
                        <li><a href="../Documentacion/bootstrap-4.pdf">Documentación</a></li>
                        <li><a href="http://ceedcv.org/">Contacto</a></li>
                        <li><a href="../controller/logout.php">Cerrar Sesión</a></li>
                    </ul>
               </nav>
            </footer>
        </div>
   </body>
</html>

