<?php 
    session_start();
    include("../../model/conexion.php");
    //echo $prueba_conexion;
    if(isset($_SESSION["usuario"])){

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Inicio</title>
        <link rel="shortcut icon" href="../../img/logo.png" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/comentarios.css">
        <link rel="stylesheet" href="../../css/recomendaciones.css">
        <?php include("../layouts/bootstrap-templates.php");?>

    </head>
    <body>

    <?php include("../layouts/menu.php");
        include("../recomendaciones/nueva_recomendacion.php");
        
        $consulta = "SELECT *,(SELECT fk_clase FROM USUARIO where usuario=r.registro_usuario) AS id_clase,
        (SELECT cl.clase FROM CLASE_USUARIO cl INNER JOIN USUARIO u on cl.id_clase=U.fk_clase where u.usuario=r.registro_usuario) AS clase,
        (SELECT verificado FROM USUARIO where usuario=r.registro_usuario) usuario_verificado
        FROM RECOMENDAR r WHERE registro_usuario ='".$_SESSION["usuario"]."' ORDER BY r.id_recomendar DESC ";
        $query = $conexion -> prepare($consulta);
        $query -> execute();
        $listaRecomendaciones = $query -> fetchAll(PDO::FETCH_OBJ);
    ?>
        
        <div class="container">
            <?php
                if($query -> rowCount() > 0) { 

                    foreach($listaRecomendaciones as $recomendacion) {
                    include("../recomendaciones/comentarios.php");    
                    
            ?>
                <div class="row col-11 col-md-9 comentario mx-auto mt-5">
                    <div class="col-2  col-md-2 col-lg-1 ">
                        <div class="cara-usuario mt-2 mb-2 pt-2 pb-2 rounded-circle">
                            <img class="img-responsive center-block d-block mx-auto" src="../../img/logo.png" alt="" width="30" height="24">
                        </div>
                    </div>
                    <div class="col-8 col-md-10 col-lg-10">
                        <div class="titulo mt-2 mb-2 pt-2 pb-2 rounded-circle">
                            <h6>
                                Publicado por <?php echo $recomendacion -> registro_usuario;?> 
                                
                                    <?php 
                                        if($recomendacion -> id_clase>4 && $recomendacion -> usuario_verificado==0){
                                            echo "<span class='badge rounded-pill bg-danger text-wrap'>
                                                Usuario Común";
                                        }else if($recomendacion -> id_clase>=3 && $recomendacion -> id_clase<=4){
                                            echo "<span class='badge rounded-pill bg-primary text-wrap'>";
                                            echo $recomendacion -> clase;
                                        }else{
                                            echo "<span class='badge rounded-pill bg-secondary text-wrap'>";
                                            echo $recomendacion -> clase;
                                        }
                                        
                                    ?>
                                </span>
                            </h6>
                            <h3><?php echo $recomendacion -> titulo;?></h3>
                        </div>
                        
                    </div>
                    <div class="col-2  col-md-2 col-lg-1">
                        <div class="mt-2 mb-2 ">
                            <a href="../../controller/eliminar_recomendacion.php?publicacion=<?php echo $recomendacion -> id_recomendar;?>" class="col-12 btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="button" title="Eliminar Comentario" onclick='return confirm("¿Estás seguro que deseas eliminar esta publicación?")'><i class="bi bi-trash"></i></a>
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
                            <a href="#" class="col-12 btn btn-outline-secondary" title="Comentar" data-bs-toggle="modal" data-bs-target="#comentariosRecomendacion<?php echo $recomendacion -> id_recomendar;?>"><span class="badge bg-secondary"><?php echo $cant_comentarios;?></span></a>
                        </div>
                        
                    </div>
                </div>
            <?php
                    }
                }
            ?>
            
        </div>
        

        
        
        <script type="text/javascript">
            'use strict';

            ;( function ( document, window, index )
            {
                var inputs = document.querySelectorAll( '.inputfile' );
                Array.prototype.forEach.call( inputs, function( input )
                {
                    var label	 = input.nextElementSibling,
                        labelVal = label.innerHTML;

                    input.addEventListener( 'change', function( e )
                    {
                        var fileName = '';
                        if( this.files && this.files.length > 1 )
                            fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                        else
                            fileName = e.target.value.split( '\\' ).pop();

                        if( fileName )
                            label.querySelector( 'span' ).innerHTML = fileName;
                        else
                            label.innerHTML = labelVal;
                    });
                });
            }( document, window, 0 ));
        </script>
        
    </body>
</html>

<?php
    }else{
        header("location:../login/login.php");
    }
?>