<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new iniciar_sesion();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('correo',              $_REQUEST['correo']);
            $alm->__SET('contrasena',          $_REQUEST['contrasena']);
            

            $model->Actualizar($alm);
            header('Location: modificar.php');
            break;

        case 'registrar':
			$alm->__SET('correo ',                     $_REQUEST['correo']);
            $alm->__SET('contrasena',                 $_REQUEST['contrasena']);
			
            $model->registrar($alm);
            header('Location: index.html');
            break;

        case 'eliminar':
            $model->eliminar($_REQUEST['correo']);
            header('Location: index.html');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['correo']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
}
body {
	background-image: url(uefa_champions_league_semi_final_2013_by_jafarjeef-d617xlr.jpg);
}
-->
</style></head>
    <body >


        <div class="pure-g">
          <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->correo > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="correo" value="<?php echo $alm->__GET('correo'); ?>" />
                    
                    <table >		                
						<tr>
                            <th >correo</th>
                            <td><input type="text" name="correo" value="<?php echo $alm->__GET('correo'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >contrasena</th>
                            <td><input type="text" name="contrasena" value="<?php echo $alm->__GET('contrasena'); ?>"  /></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
						    <th >correo</th>
                            <th >contrasena</th>
                            
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
							<td><?php echo $r->__GET('correo'); ?></td>
                            <td><?php echo $r->__GET('contrasena'); ?></td>
                            
                            <td>
                                <a href="?action=editar&coreo=<?php echo $r->correo; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&contrasena=<?php echo $r->correo; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
                <p>&nbsp;</p>
                <form name="form1" method="post" action="index.html">
                  <label>
                  <input type="submit" name="Submit" value="Pagina De Inicio">
                  </label>
                </form>
                <p>&nbsp;</p>
            </div>
        </div>

    </body>
</html>



