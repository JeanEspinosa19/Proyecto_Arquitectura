<?php 
    if ($_POST) {
        session_start();
        require("../model/conexion.php");
        $user= $_POST["user"];
        $pass= $_POST["pass"];

        $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= $conexion->prepare("SELECT * FROM USUARIO WHERE (usuario=:user AND clave=:pass)OR(correo=:user AND clave=:pass)");
        $query->bindParam(":user",$user);
        $query->bindParam(":pass",$pass);
        $query->execute();

        $usuario=$query->fetch(PDO::FETCH_ASSOC);

        if($usuario){
            $_SESSION["usuario"]=$usuario["usuario"];
            header("Location:../views/homeUsuario/inicio.php");
        }else {
            echo '<script language="javascript">
                alert("Usuario o Clave Invalidos");
                window.location.href="../views/login/login.php";
            </script>';
        }
    }
?>