<?php ob_start()?>

<!DOCTYPE html>
<html><head> <link rel="shortcut icon" href="../web/images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../web/css/css.css">
    </head>
    <body>
        <h1 class="page-header">Clientes</h1>
  
        <a class="btn btn-primary pull-right" href="?c=cliente&a=CrudCliente">Agregar</a>
        <br><br>
        <a class="btn btn-primary pull-left" href="?c=inicio&a=Volver">Volver</a>
        <br><br><br>

        <table class="table  table-striped  table-hover" id='tabla'>
            <thead>
                <tr>
                    <th style="width:20px; background-color: #5DACCD; color:#fff">Id</th>
                    <th style="width:100px; background-color: #5DACCD; color:#fff">DNI</th>
                    <th style="width:150px; background-color: #5DACCD; color:#fff">Nombre</th>
                    <th style="width:150px; background-color: #5DACCD; color:#fff">Apellido</th>
                    <th style="width:180px; background-color: #5DACCD; color:#fff">Correo</th>
                    <th style="width:90px; background-color: #5DACCD; color:#fff">Telefono</th>
                    <th style="width:100px; background-color: #5DACCD; color:#fff">Usuario</th>   
                    <th style="width:60px; background-color: #5DACCD; color:#fff"></th>
                    <th style="width:60px; background-color: #5DACCD; color:#fff"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->model->ListarCl() as $r): ?>
                    <tr>
                        <td><?php echo $r->id; ?></td>
                        <td><?php echo $r->dni; ?></td>
                        <td><?php echo $r->Nombre; ?></td>
                        <td><?php echo $r->Apellido; ?></td>
                        <td><?php echo $r->Correo; ?></td>
                        <td><?php echo $r->Telefono; ?></td>
                        <td><?php echo $r->usuario; ?></td>
                        <td>
                            <a  class="btn btn-warning" href="?c=cliente&a=CrudCliente&id=<?php echo $r->id; ?>">Actualizar</a>
                        </td>
                        <td>
                            <a  class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=cliente&a=EliminarCliente&id=<?php echo $r->id; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table> 
        <div class="enlaces">
            <table class="table  table-striped  table-hover" id="tabla">
                <tr>
                    <td>
                        <a class="btn btn-primary pull-left" href="?c=cliente&a=verJson">JSON</a>
                        <a class="btn btn-primary pull-left" href="?c=cliente&a=verRSS">RSS</a>
                        <a class="btn btn-warning pull-left" href="?c=cliente&a=verCSV">CSV</a>
                    </td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="imagenes">
            <table style="margin-top: 15">
                <tr>
                    <td>
                        <a class="pull-left" href="?c=cliente&a=ver_jsonCliente"><img style="height: 40px; width: 40px;" src="../web/images/json.png"></a>
                        <a class="pull-left" href="?c=cliente&a=ver_rssCliente"><img style="height: 40px; width: 40px;" src="../web/images/rss.png"></a>
                        <a class="pull-left" href="?c=cliente&a=ver_csvCliente"><img style="height: 40px; width: 40px;" src="../web/images/csv.png"></a>
                    </td>
                </tr>
            </table>
        </div>
        <a class="btn btn-primary pull-right" onclick="javascript:return confirm('¿Seguro que quiere salir?');"href="?c=inicio&a=Salir">Cerrar Sesión</a>
        <br>
    </body>
    <script 
        src="../assets/js/datatable.js">
    </script>
</html>

