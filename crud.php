
<?php


// Pagina Princilap index.html
// Explicar sentencia por Sentencia.

// Registro de Usuarios




require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new iniciar_sesion();
$model = new AlumnoModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('correo',                     $_REQUEST['correo']);
            $alm->__SET('contrasena',                 $_REQUEST['contrasena']);
            

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.html');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('correo ',                     $_REQUEST['correo']);
            $alm->__SET('contrasena',                 $_REQUEST['contrasena']);
          
            $model->Registrar($alm);
            echo "Guardo el Registro Exitosamente";

			//header('Location: index.html');
            //header('Location: index.html');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['correo']);
			echo "Elimino el Registro Exitosamente";
          
		   // header('Location: index.html');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['correo']);
			//header('Location: index.html');
            break;
    }
}

?>