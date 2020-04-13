<!DOCTYPE html>

<html><head><link rel="shortcut icon" href="../web/images/favicon.ico"></head><body>
<h1 class="page-header">
    <?php echo "<b>".$cliente->id != null ? $cliente->Nombre ."</b>": 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=cliente"><b>Cliente</b></a></li>
    <li class="active"><?php echo $cliente->id != null ? $cliente->Nombre : '<h3>| Nuevo Registro</h3>'; ?></li>
</ol>
<table border="1" class="table  table-striped  table-hover" id="tabla" >
    <form id="frm-cliente" action="?c=cliente&a=GuardarCliente" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend style="text-align: center"><h2>Datos de nuevo cliente</h2></legend>
            
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $cliente->id; ?>" />
                <label>DNI</label><input type="text" maxlength="9" size="9" name="dni" value="<?php echo $cliente->dni; ?>" class="form-control" placeholder="Ingrese su dni" required>
                <br>
                <label>Nombre</label><input type="text"  size="50" name="Nombre" value="<?php echo $cliente->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre" required>
                <br>
                <label>Apellido</label><input type="text" size="50" name="Apellido" value="<?php echo $cliente->Apellido; ?>" class="form-control" placeholder="Ingrese su apellido" required>
                <br>
                <label>Correo</label><input type="text" size="50" name="Correo" value="<?php echo $cliente->Correo; ?>" class="form-control" placeholder="Ingrese su correo electrónico" required>
                <br>
                <label>Telefono</label><input type="text" size="50" name="Telefono" value="<?php echo $cliente->Telefono; ?>" class="form-control" placeholder="Ingrese su telefono" required>
                <br>
                <label>Usuario</label><input type="text" size="50" name="Telefono" value="<?php echo $cliente->usuario; ?>" class="form-control" placeholder="Ingrese su usuario" required>
                <br>
                <label>Password</label><input type="password" size="50" name="Telefono" value="<?php echo $cliente->password; ?>" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>
            <hr />

            <div class="text-right">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </fieldset>
    </form>
</table>

</body></html>

<script>
    $(document).ready(function(){
        $("#frm-cliente").submit(function(){
            return $(this).validate();
        });
    });
</script>