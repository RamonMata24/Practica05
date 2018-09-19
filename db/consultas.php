<?php
     require_once('conecction.php');//se requiere el archivo conecction para que funcionen las consultas
    


/*
	function updateUsuario($id,$argNombre,$argEmail){ // funcion actualizar usuario
		    $model = new Conexion();// se declara un objeto de Conexion
            $conexion = $model->get_conexion();//se obtiene la conexion mediante el obj
            $sql = "UPDATE users SET nombre = :nombre, email = :email  WHERE id = $id";// sentencia sql para el update mediante el id 
            $stm =$conexion->prepare($sql);//se prepara la sentencia
            $stm->bindParam(':nombre',$argNombre);//parametro nombre
            $stm->bindParam(':email',$argEmail);//parametro email
            $stm->execute();//se ejecuta la sentencia 

	}

        */
       
        function count_users(){//funcion count user
            $model = new Conexion();//obj model de Conexion
            $conexion = $model->get_conexion();// se obtiene la conexion mediante el obj model
            $sql = ' SELECT COUNT(*) AS total FROM user';// sentencia sql con la funcion count 
            $stm = $conexion->prepare($sql);//se prepara la sentencia
            $stm->execute();//se ejecuta
            $results = $stm->fetchall();// traemos el resultado 
		    $getCount = $results[0]['total'];//mediante el alias el resultado total
		    return $getCount;//regresamos el valor del getCOunt
            
        }

        // funcion para contar la cantidad de tipos de usuario existente
        function count_types(){// funcion cunt types
            $model = new Conexion();// obj conxion 
            $conexion = $model->get_conexion();
            $sql = ' SELECT COUNT(*) AS total FROM user_type';// sentencia sql con la funcion count
            $stm = $conexion->prepare($sql);//se prepara la sentencia
            $stm->execute();//se ejecuta
            $results = $stm->fetchall();//traemos el resulado del count 
		    $getCount = $results[0]['total'];//mmediante el alias el resultado 'total'
		    return $getCount;//regresamos el valor del get count
        }

        // funcion para contar la cantidad de status existente
       function count_status(){//funcion count_status
        $model = new Conexion();//obj conexion
        $conexion = $model->get_conexion();//se obtiene la conexion
        $sql = ' SELECT COUNT(*) AS total FROM status';// sentencia sql con la funcion count
        $stm = $conexion->prepare($sql);//se prepara la sentencia sql
        $stm->execute();//se ejecuta la sentencia
        $results = $stm->fetchall();//traemos los valores de resultado
        $getCount = $results[0]['total'];//una vez traido lo metemos en un array con el valor de la posicion 0 donde esta el resultado 
        return $getCount;//regresmos el valor del GetCOunt

       }

       function count_access() {// funcion count acces
        $model = new Conexion();//obj conexion
        $conexion = $model->get_conexion();// se obtiene la conexion
        $sql = 'SELECT COUNT(*) AS total FROM  user_log;';// sentencia sql con la funcion count
        $stm = $conexion->prepare($sql);//se prepara la conexion 
        $stm->execute();//Se ejecta la conexion
        $results = $stm->fetchall();//se obtiene los valores del resultado del count
        $getCount = $results[0]['total'];//se acomoda en un row el valor del resultado del count
        return $getCount;//se regresa el valor del getcOUNT

       }//FIN FUNCION

        function count_active(){ // funcion count active
            $model = new Conexion();//obj conexion
            $conexion = $model->get_conexion();//se obtiene la conexion
            $sql = ' SELECT COUNT(*) AS total from status WHERE id = 1';// sentencia sql con la funcion count con un where 
            $stm = $conexion->prepare($sql);//se prepara la sentencia 
            $stm->execute();// se ejecuta la sentencia
            $results = $stm->fetchall();//se obtiene los valores del count
		    $getCount = $results[0]['total'];//se acomda el resultado en un row
		    return $getCount;// se regresa el valor del getCOUNT

        }//FIN FUNCION


        function count_inactive(){//funcion count inactive
            $model = new Conexion();// obj conexion
            $conexion = $model->get_conexion();//se obtiene la conexion 
            $sql = ' SELECT COUNT(*) AS total from status WHERE id = 2';// sentencia sql con la funcion count con un where
            $stm = $conexion->prepare($sql);//se prepara la sentencia
            $stm->execute();//se ejecuta
            $results = $stm->fetchall();//se obtiene los valores del count
		    $getCount = $results[0]['total'];//se acomda el resultado en un row
		    return $getCount;//se regresa el valor del getCount

        }//FIN FUNCION


        function selectAllFromTable($t){//funcion para selecionar X tabla
            $model = new Conexion();//obj conexion
            $conexion = $model->get_conexion();//se obtiene la conexion
            $sql = " SELECT * FROM $t";//Seentencia select para ver los datos de la tabla T
            $stm = $conexion->prepare($sql);//se prepara la sntencia 
            $stm->execute();//Se ejecuta la sentencia

            while ($result=$stm->fetch()){//los resultado se obtienen en rows
                $rows[]=$result;//se le asigna un row a cada resultado

            }

            return $rows;//regresa el valor de los rows
        }//FIN FUNCION


        function getAll($t){//funcion getAll para traer los datos de la tabla 
            $model = new Conexion();//obj conexion
            $conexion = $model->get_conexion();//Se obtiene la conecion
            $sql = " SELECT * FROM sport_team WHERE id_type = $t";//Sentencia select 
            $stm = $conexion->prepare($sql);//se prepara la conexion
            $stm->execute();//Se ejecuta la sentencia

            while ($result=$stm->fetch()){//los resultado se obtienen en rows
                $rows[]=$result;////se le asigna un row a cada resultado

            }
            return $rows;//regresa el valor de los rows

//FIN FUNCION
        }

        function addDep($id,$nombre,$posicion,$carrera,$email,$opc){//funcion para agregar un deporsitsta (REGISTER)
		    $model = new Conexion();// se declara un objeto de Conexion
            $conexion = $model->get_conexion();//se obtiene la conexion mediante el obj
            $sql = 'INSERT INTO sport_team (id,nombre,posicion,carrera,email,id_type) VALUES (:id,:nombre,:posicion,:carrera,:email,:id_type)';//sentencia de insert
            $stm=$conexion->prepare($sql);//se prepara la sentencia sql
            $stm->bindParam(':id',$id);//parametro 
            $stm->bindParam(':nombre',$nombre);//parametro 
            $stm->bindParam(':posicion',$posicion);//parametro 
            $stm->bindParam(':carrera',$carrera);//parametro 
            $stm->bindParam(':email',$email);//parametro 
            $stm->bindParam(':id_type',$opc);//parametro 
            $stm->execute();//se ejecuta la sentencia
           
        }//fin de la funcion add 
        

        

	function upDepo($id,$nombre,$posicion,$carrera,$email,$opc){ // funcion actualizar 
        $model = new Conexion();// se declara un objeto de Conexion
        $conexion = $model->get_conexion();//se obtiene la conexion mediante el obj
        $sql = " UPDATE sport_team SET nombre = :nombre , posicion = :posicion , email = :email, id_type = :id_type  WHERE id = $id ";// sentencia sql para el update mediante el id 
        $stm =$conexion->prepare($sql);//se prepara la sentencia
        $stm->bindParam(':nombre',$nombre);//parametro 
        $stm->bindParam(':posicion',$posicion);//parametro 
        $stm->bindParam(':carrera',$carrera);//parametro 
        $stm->bindParam(':email',$email);//parametro 
        $stm->bindParam(':id_type',$opc);//parametro 
        $stm->execute();//se ejecuta la sentencia 

    }


    function delDep($id){ //funcion para eliminar 
        $model = new Conexion();// se declara un objeto de Conexion
        $conexion = $model->get_conexion();//se obtiene la conexion mediante el obj
        $sql = "DELETE FROM sport_team WHERE id = $id ";// sentenica sql para eliminar
        $stm = $conexion->prepare($sql);//se prepara la sentencia
        // $stm->bindParam(':id',$id);
        $stm->execute();//se ejecuta
       
    }



    function search($id){//funcion para buscar
        $model = new Conexion();// se declara un objeto de Conexion
        $conexion = $model->get_conexion();//se obtiene la conexion mediante el obj
        $sql = "SELECT * FROM sport_team where id = $id";//sentencia sql para obtener el usuario dado un id
        $stm = $conexion->prepare($sql);//se prepara la sentencia
        $stm->execute();//se ejecuta

        while ($result=$stm->fetch()){//los resultado se obtienen en rows
            $rows[]=$result;//

        }

    }
    
?>
