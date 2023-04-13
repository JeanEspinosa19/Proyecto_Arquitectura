<!DOCTYPE html>
<html lang="es">
<head>
	<title>Iniciar Sesión</title>
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
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../img/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="validate-form" action="../../controller/iniciar_sesion.php" method="POST" id="iniciarSesion">
					<span class="login100-form-logo">
                        <img src="../../img/logo.png" alt="" width="50" height="50">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Iniciar Sesión
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese el usuario o correo">
						<input class="input100" type="text" name="user" placeholder="Usuario o Correo">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingrese la contraseña">
						<input class="input100" type="password" name="pass" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" form="iniciarSesion">
							Login
						</button>
					</div>

					<div class="text-center p-t-40">
						<a class="txt1" href="#">
							¿Olvidaste tu Contraseña?
						</a><br>
                        <a class="txt1" href="registrarme.php">
							Registrarse
						</a><br>
						<a class="txt1" href="../../index.php">
						<i class="bi bi-arrow-left-circle"></i> Volver
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