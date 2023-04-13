<?php 
    session_start();
    include("model/conexion.php");
    //echo $prueba_conexion;
    if(!isset($_SESSION["usuario"])){
        
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Inicio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="css/comentarios.css">
        <link rel="stylesheet" href="css/recomendaciones.css">
        <?php include("views/layouts/bootstrap-templates.php");?>

    </head>
    <body>

    <?php 
        include("views/layouts/menu.php");
        $consulta = "SELECT *,(SELECT fk_clase FROM USUARIO where usuario=r.registro_usuario) AS id_clase,
        (SELECT cl.clase FROM CLASE_USUARIO cl INNER JOIN USUARIO u on cl.id_clase=U.fk_clase where u.usuario=r.registro_usuario) AS clase,
        (SELECT verificado FROM USUARIO where usuario=r.registro_usuario) usuario_verificado
        FROM RECOMENDAR r ORDER BY r.id_recomendar DESC LIMIT 3 ";
        $query = $conexion -> prepare($consulta);
        $query -> execute();
        $listaRecomendaciones = $query -> fetchAll(PDO::FETCH_OBJ);
    ?>
        
        <div class="container">
            <?php
                if($query -> rowCount() > 0) { 

                    foreach($listaRecomendaciones as $recomendacion) {
                        include("views/recomendaciones/comentarios.php");  
                    
            ?>
                <div class="row col-11 col-md-9 comentario mx-auto mt-5">
                    <div class="col-2  col-md-2 col-lg-1 ">
                        <div class="cara-usuario mt-2 mb-2 pt-2 pb-2 rounded-circle">
                            <img class="img-responsive center-block d-block mx-auto" src="img/logo.png" alt="" width="30" height="24">
                        </div>
                    </div>
                    <div class="col-8 col-md-10 col-lg-11">
                        <div class="titulo mt-2 mb-2 pt-2 pb-2 rounded-circle">
                            <h6>
                                Publicado por <?php echo $recomendacion -> registro_usuario;?> 
                                <span class="badge bg-success text-wrap"><?php echo $recomendacion -> clase;?></span></h6>
                            <h3><?php echo $recomendacion -> titulo;?></h3>
                        </div>
                        
                    </div>
                    <div class="col-12 mb-2">
                        <?php echo $recomendacion -> comentario;?>
                    </div>

                    <?php
                        if ($recomendacion -> imagen!=null) {                        
                    ?>
                    <div class="col-12 mb-2">
                        
                        <img class="col-12" src="data:<?php echo ($recomendacion -> tipo_imagen);?>;base64,<?php echo base64_encode($recomendacion -> imagen);?>">
                        
                    </div>
                    <?php
                        }
                        
                        $consultaComentarios = "SELECT count(*) AS comentarios FROM DETALLE_RECOMENDAR WHERE fk_recomendar =".$recomendacion -> id_recomendar;
                        $verificarCantidad = $conexion -> prepare($consultaComentarios);
                        $verificarCantidad -> execute();
                        $cantidades = $verificarCantidad -> fetchAll(PDO::FETCH_OBJ);

                        foreach ($cantidades as $cantidad) {
                            $cant_comentarios= $cantidad->comentarios;
                        }
                    ?>

                    <div class="opciones col-12 mb-2 d-flex">
                        
                        <div class="col-4">
                            <a href="#" class="col-12 btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Recomendar"><i class="bi bi-hand-thumbs-up"></i></a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="col-12 btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="No Recomendar"><i class="bi bi-hand-thumbs-down"></i></a>
                        </div>
                        <div class="col-4">
                            <a href="views/login/login.php" class="col-12 btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Comentar"><span class="badge bg-secondary"><?php echo $cant_comentarios;?></span></a>
                        </div>
                        
                    </div>
                </div>
            <?php
                    }
                }
            ?>
            
        </div>
        

        
        

        
    </body>
</html>
<?php 
    
    }else{
    echo"aaa";
    header("location:views/homeUsuario/inicio.php");
    }
?>