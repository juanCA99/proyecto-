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
            header('Location: index.html');
            break;

        case 'Registrar':
			$alm->__SET('correo ',                     $_REQUEST['correo']);
            $alm->__SET('contrasena',                 $_REQUEST['contrasena']);

            $model->Registrar($alm);
            header('Location: index.html');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['correo']);
            header('Location: index.html');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['correo']);
			//header('Location: index.html');
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
	background-image: url(maxresdefault%20(1).jpg);
	background-image: url(1457014_w2.jpg);
}
.Estilo2 {color: #FFFFFF}
.Estilo3 {color: #000000}
-->
    </style></head>
    <body >

        <div class="pure-g">
          <div class="pure-u-1-12">
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
						    <th ><span class="Estilo3">correo	</span></th>
                            <th ><span class="Estilo3">contrasena</span></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>					    
                            <td><span class="Estilo2"><?php echo $r->__GET('correo'); ?></span></td>
							<td><span class="Estilo2"><?php echo $r->__GET('contrasena'); ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
                <p>&nbsp;</p>
                <p> <form name="form1" method="post" action="index.html">
                  <label>
                    <input type="submit" name="Submit" value="Pagina De Inicio ">
                  </label>
                </form>&nbsp;</p>
          </div>
        </div>

    </body>
</html>