<?php 

    include("../../model/conexion.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Deseo Registrarme</title>
    <link rel="shortcut icon" href="../../img/logo.png" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include("../layouts/bootstrap-templates.php");?>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<?php
        $sql = "SELECT * FROM CLASE_USUARIO WHERE id_clase not in (1)";
        $query = $conexion -> prepare($sql);
        $query -> execute();
        $clases = $query -> fetchAll(PDO::FETCH_OBJ);
    ?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../img/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="validate-form" action="../../controller/registrar_usuario.php" method="POST" id="registrarUser" enctype="multipart/form-data">
					<span class="login100-form-logo">
                        <img src="../../img/logo.png" alt="" width="50" height="50">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Registrarme
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese el usuario">
						<input class="input100" type="text" name="user" placeholder="Usuario">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Ingrese el correo">
						<input class="input100" type="email" name="email" placeholder="Correo">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingrese la contraseña">
						<input class="input100" type="password" name="pass" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Confirma la contraseña">
						<input class="input100" type="password" name="confirmpass" placeholder="Confirmar Contraseña">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

                    <div class="wrap-input100 mb-5" data-validate="Seleccione tu clase de usuario">
                        <select class="input100" name="clase" id="" data-bs-toggle="tooltip" data-bs-placement="top" title="Que Tipo de Usuario Eres?" style="border: none !important;cursor:pointer">
                            <optgroup style='background: #9152f8;' label="¿Que Tipo de Usuario Eres?">
                                <?php
                                    if($query -> rowCount() > 0) { 

                                        foreach($clases as $clase) {
                                            echo '
                                            <option value="'.$clase -> id_clase.'" style="background: #9152f8;" id=]"clase-selector">'.$clase -> clase.'</option> 
                                            ';
                                        }
                                    }
                                ?>
                            </optgroup>
                        </select>
						
						<span class="focus-input100" data-placeholder="&#xf2c1;"></span>
					</div>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate="Seleccione un usuario">
                        <label class="mb-2" style="color:#fff">En caso de que seas un especialista por favor registra un certificado para ser validado por los administradores.</label>
					</div>
                    
                    <div class="wrap-input100" data-validate="Registra un Certificado">
                        <input class="input100" type="file" style="overflow: hidden;" name="archivo" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xf1c6;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" form="registrarUser">
							Registrarme
						</button>
					</div>

					<div class="text-center p-t-40">
                        <a class="txt1" href="login.php">
							Iniciar Sesión
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>