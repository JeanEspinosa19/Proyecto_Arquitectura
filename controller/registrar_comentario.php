<?php 
    if ($_POST) {
        session_start();
        require("../model/conexion.php");
        $user= $_SESSION["usuario"];
        $comentario= $_POST["comentario"];
        $id_recomendacion= $_POST["recomendar"];
        $regUsuario= $_POST["regUsuario"];
        $id_usuario= null;
        

        $consultaUsuario = "SELECT id_usuario FROM USUARIO WHERE usuario=:regUsuario";
        $query = $conexion -> prepare($consultaUsuario);
        $query->bindParam(":regUsuario",$regUsuario);
        $query -> execute();
        $listaUsuarios = $query -> fetchAll(PDO::FETCH_OBJ);

        foreach ($listaUsuarios as $usuarioPrincipal) {
            $id_usuario= $usuarioPrincipal->id_usuario;
        }

        
        

        
        $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= $conexion->prepare("INSERT INTO DETALLE_RECOMENDAR() VALUES(NULL,:id_recomendacion,:id_usuario,:user,:comentario)");
        $query->bindParam(":user",$user);
        $query->bindParam(":id_recomendacion",$id_recomendacion);
        $query->bindParam(":id_usuario",$id_usuario);
        $query->bindParam(":comentario",$comentario);
        $query->execute();

        $lastInsert = $conexion->lastInsertId();

        try{
            echo '<script language="javascript">
                //alert("Tu publicación se ha eliminado correctamente");
                window.history.back();
                window.location.reload();
            </script>';
            
        }
        catch(PDOException $e){
            echo '<script language="javascript">
                alert("No se pudo registrar el comentario, intenta de nuevo y si el problema persiste por favor comuníquese con los colaboradores: '.$sql->errorInfo().'");

                window.history.back();
            </script>';
            echo $e->getMessage();

        }
    }    
?>