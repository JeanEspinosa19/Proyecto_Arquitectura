<?php 
    if (!isset($_SESSION["usuario"])) {     
             
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/etereos-logo-blanco.png" alt="" width="30" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>

            </ul>
            
            <form class="d-flex me-5" method="POST" action="views/login/login.php" id="log-in">
                <input class="form-control me-2" type="search" placeholder="Consultar" aria-label="Search">
                <button class="btn btn-outline-light" type="submit" form="log-in">Buscar</button>
            </form>

            <div class="d-flex mt-1">
                <a class="btn btn-success" type="submit" href="views/login/login.php">Iniciar Sesión/Registrarse</a>
            </div>
            
        </div>
        
    </div>
</nav>
<?php 
    }else{
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="inicio.php">
            <img src="../../img/etereos-logo-blanco.png" alt="" width="50" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <label for="" class="nav-link active"><?php echo $_SESSION["usuario"];?></label>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#ingresarRecomendacion"><i class="bi bi-plus-circle"></i> Nueva Recomendación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mis_recomendaciones.php">Mis Recomendaciones</a>
                </li>
            </ul>
            
            <form class="d-flex me-5">
                <input class="form-control me-2" type="search" placeholder="Consultar" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>

            <div class="d-flex mt-1">
                <a class="btn btn-danger" type="submit" href="../../controller/cerrar_sesion.php">Cerrar Sesión</a>
            </div>
            
        </div>
        
    </div>
</nav>
<?php
    }
?>