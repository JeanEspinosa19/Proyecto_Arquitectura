<?php 
    if ($_POST) {
        session_start();
        require("../model/conexion.php");
        $user= $_POST["user"];
        $email= $_POST["email"];
        $pass= $_POST["pass"];
        $confirmpass= $_POST["confirmpass"];
        $clase= $_POST["clase"];
        $ver_archivo= $_FILES['archivo']['type'];

        if($ver_archivo!=null){
            $tamano=$_FILES['archivo']['size'];
            $type_archivo=$_FILES['archivo']['type'];
            $name_archivo=$_FILES['archivo']['name'];
            $archivo= fopen($_FILES['archivo']['tmp_name'],'r');
            $binariosArchivo= fread($archivo,$tamano);
        }else{
            $type_archivo= null;
            $binariosArchivo= null;
        }
        

        $valida_usuario = $conexion -> prepare("SELECT * FROM USUARIO WHERE usuario =:user");
        $valida_usuario->bindParam(":user",$user);
        $valida_usuario -> execute();
        $listausuarios = $valida_usuario -> fetchAll(PDO::FETCH_OBJ);

        $valida_correo = $conexion -> prepare("SELECT * FROM USUARIO WHERE correo=:email");
        $valida_correo->bindParam(":email",$email);
        $valida_correo -> execute();
        $listacorreos = $valida_correo -> fetchAll(PDO::FETCH_OBJ);

        if ($confirmpass!==$pass) {
            echo '<script language="javascript">
                alert("Las contraseñas no coinciden.");
                window.location.href="../views/login/registrarme.php";
            </script>';
        }else if ($clase>4 && $binariosArchivo==null) {
            echo '<script language="javascript">
                alert("Por favor registra un certificado para verificar que en verdad seas un especialista.");
                window.location.href="../views/login/registrarme.php";
            </script>';
        }else if(!empty($listausuarios) || !empty($listacorreos)){

            if (!empty($listausuarios)) {
                echo '<script language="javascript">
                    alert("El usuario ya se encuentra en uso por otra persona.");
                    window.location.href="../views/login/registrarme.php";
                </script>';
            } else {
                echo '<script language="javascript">
                    alert("Este correo ya está registrado en el sistema.");
                    window.location.href="../views/login/registrarme.php";
                </script>';
            }
            
        }     
        else{
            $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query= $conexion->prepare("INSERT INTO USUARIO() VALUES(NULL,:user,:email,:pass,:binariosArchivo,:type_archivo,default,:clase,1)");
            $query->bindParam(":user",$user);
            $query->bindParam(":email",$email);
            $query->bindParam(":pass",$pass);
            $query->bindParam(":clase",$clase);
            $query->bindParam(":binariosArchivo",$binariosArchivo);
            $query->bindParam(":type_archivo",$type_archivo);
            $query->execute();

            $lastInsertUser = $conexion->lastInsertId();

            if($lastInsertUser>0){
                $_SESSION["usuario"]=$user;
                
                if($clase>4){
                    echo '<script language="javascript">
                        alert("Bienvenido '.$user.' a Etereos.");
                        alert("Tu usuario será presentado como un usuario común para las demas personas hasta que el sistema certifique tu profesionalidad.");
                        window.location.href="../views/homeUsuario/inicio.php";
                    </script>';
                }else{
                    echo '<script language="javascript">
                        alert("Bienvenido '.$user.' a Etereos.");
                        window.location.href="../views/homeUsuario/inicio.php";
                    </script>';
                }
                

            }else {
                echo '<script language="javascript">
                    alert("No se pudo crear el usuario, por favor comuníquese con el administrador: '.$sql->errorInfo().'");
                    window.location.href="../views/login/registrarme.php";
                </script>';
            }
        }

    }
?>