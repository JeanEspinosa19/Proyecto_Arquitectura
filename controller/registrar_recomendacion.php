<?php 
    if ($_POST) {
        session_start();
        require("../model/conexion.php");
        $user= $_SESSION["usuario"];
        $titulo= $_POST["titulo"];
        $comentario= $_POST["comentario"];
        $categoria= $_POST["categoria"];
        $ver_imagen=$_FILES['imagen']['type'];
        

        if($ver_imagen!=null){
            $tamano=$_FILES['imagen']['size'];
            $type_imagen=$_FILES['imagen']['type'];
            $name_imagen=$_FILES['imagen']['name'];
            $imagen= fopen($_FILES['imagen']['tmp_name'],'r');
            $binariosImagen= fread($imagen,$tamano);
        }else{
            $type_imagen= null;
            $binariosImagen= null;
        }
        

        
        $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= $conexion->prepare("INSERT INTO RECOMENDAR() VALUES(NULL,:titulo,:comentario,:binariosImagen,:type_imagen,:categoria,:user,NULL,NULL)");
        $query->bindParam(":user",$user);
        $query->bindParam(":titulo",$titulo);
        $query->bindParam(":comentario",$comentario);
        $query->bindParam(":binariosImagen",$binariosImagen);
        $query->bindParam(":type_imagen",$type_imagen);
        $query->bindParam(":categoria",$categoria);
        $query->execute();

        $lastInsert = $conexion->lastInsertId();

        if($lastInsert>0){
            echo '<script language="javascript">
                alert("Recomendación registrada correctamente");
                window.location.href="../views/homeUsuario/inicio.php";
            </script>';

        }else {
            echo '<script language="javascript">
                alert("No se pudo registrar la recomendación, intenta de nuevo y si el problema persiste por favor comuníquese con los colaboradores: '.$sql->errorInfo().'");
                window.location.href="../views/login/registrarme.php";
            </script>';
        }
    }    
?>