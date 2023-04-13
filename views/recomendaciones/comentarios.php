<!-- REGISTRAR RECOMENDACIÓN -->
<div class="modal fade" id="comentariosRecomendacion<?php echo $recomendacion -> id_recomendar;?>" tabindex="-1" aria-labelledby="Comentarios" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h5 class="modal-title" id="nuevaRecomendacion">Comentarios para <?php echo $recomendacion -> registro_usuario;?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
                
                $sqlDetal = "SELECT * FROM DETALLE_RECOMENDAR WHERE fk_recomendar =".$recomendacion -> id_recomendar." ORDER BY id_detalle DESC";
                $queryDetal = $conexion -> prepare($sqlDetal);
                $queryDetal -> execute();
                $comentarios = $queryDetal -> fetchAll(PDO::FETCH_OBJ);
            ?>
            <div class="modal-body">
            <form method="post" action="../../controller/registrar_comentario.php">
                <div class="mb-3 form-floating">
                    <div class="col-10 mx-auto border border-primary rounded p-3 mb-2">
                        <?php
                            foreach($comentarios as $comentario) {
                                    
                        ?>
                            
                                <div class="col-7 bg-secondary text-light rounded mb-3 pt-1 pb-1 pt-1 ps-3 pe-3">
                                    <span class='badge mb-1'>
                                        <?php echo $comentario->usuario;?>
                                    </span></br>
                                        <?php echo $comentario->respuesta;?>
                                </div>
                            
                        <?php
                                
                            }
                            
                        ?>
                    </div>
                    
                </div>
                
                <div class="mb-3 mx-auto form-floating ">
                    <input type="hidden" class="form-control" id="recomendar" name="recomendar" placeholder="Título de la Recomendación" autocomplete="off" value="<?php echo $recomendacion -> id_recomendar;?>"required>
                    <input type="hidden" class="form-control" id="regUsuario" name="regUsuario" placeholder="Título de la Recomendación" autocomplete="off" value="<?php echo $recomendacion -> registro_usuario;?>"required>

                    <div class="form-floating col-8 mx-auto d-flex justify-content-center">
                        

                        <input type="text" class="form-control me-4" id="comentario" name="comentario" placeholder="Título de la Recomendación" autocomplete="off" required>
                        <label for="comentario" class="form-label">Ingresa un Comentario</label>
                        <button type="submit" name="insertar" class="btn btn-secondary">Comentar</button>
                        
                    </div>
                                        
                    
                </div>
                
            </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Volver</button>
            </div>
        </div>
    </div>
</div>