<?php

class AlumnoModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=jeaf', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM ingresar");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new iniciar_sesion();

                
				$alm->__SET('correo', $r->correo);
				$alm->__SET('contrasena', $r->contrasena);

                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($correo)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM ingresar WHERE correo = ?");
                      

            $stm->execute(array($correo));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new iniciar_sesion();

            $alm->__SET('correo', $r->contrasena);
			$alm->__SET('contrasena', $r->contrasena);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($correo)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM ingresar WHERE correo = ?");                      

            $stm->execute(array($constrasena));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(iniciar_sesion $data)
    {
        try 
        {
            $sql = "UPDATE ingresar SET 
                        correo          = ?, 
                        
                        												
                    WHERE correo = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                   
					$data->__GET('contrasena'),
                    $data->__GET('correo'),
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(iniciar_sesion $data)
    {
        try 
        {
        $sql = "INSERT INTO ingresar (contrasena,  correo) 
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
			    $data->__GET('correo'), 
				$data->__GET('contrasena') 
                
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>

