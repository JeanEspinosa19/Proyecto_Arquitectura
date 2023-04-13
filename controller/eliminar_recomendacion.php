<?php 
    if (isset($_GET["publicacion"])) {
        session_start();
        require("../model/conexion.php");

        $id_recomendacion=$_GET["publicacion"];
                

                
        $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $queryDetalle= $conexion->prepare("DELETE FROM DETALLE_RECOMENDAR WHERE fk_recomendar= :id_recomendacion");
        $queryDetalle->bindParam(":id_recomendacion",$id_recomendacion);
        $queryDetalle->execute();

        $queryRecomendacion= $conexion->prepare("DELETE FROM RECOMENDAR WHERE id_recomendar= :id_recomendacion");
        $queryRecomendacion->bindParam(":id_recomendacion",$id_recomendacion);
        $queryRecomendacion->execute();

        try{
            echo '<script language="javascript">
                alert("Tu publicación se ha eliminado correctamente");
                window.location.href="../views/homeUsuario/mis_recomendaciones.php";
            </script>';
            
        }
        catch(PDOException $e){
            echo '<script language="javascript">
                alert("No se pudo registrar la recomendación, intenta de nuevo y si el problema persiste por favor comuníquese con los colaboradores: '.$sql->errorInfo().'");
                window.location.href="../views/homeUsuario/mis_recomendaciones.php";
            </script>';
            echo $e->getMessage();

        }

    }    
?>