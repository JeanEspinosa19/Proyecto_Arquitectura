<!-- REGISTRAR RECOMENDACIÓN -->
<div class="modal fade" id="ingresarRecomendacion" tabindex="-1" aria-labelledby="nuevaRecomendacion" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h5 class="modal-title" id="nuevaRecomendacion">Compartir Recomendación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
                $sql = "SELECT * FROM CATEGORIA WHERE fk_estado_categoria =1";
                $query = $conexion -> prepare($sql);
                $query -> execute();
                $categorias = $query -> fetchAll(PDO::FETCH_OBJ);
            ?>
            <div class="modal-body">
            <form method="post" action="../../controller/registrar_recomendacion.php" enctype="multipart/form-data">
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título de la Recomendación" autocomplete="off" required>
                    <label for="titulo" class="form-label">Ingresa un Título</label>
                </div>
                
                <div class="mb-3 form-floating">
                    <textarea class="form-control" placeholder="Pero que ha pasa'o?" name="comentario" id="comentario" style="height:150px"></textarea>
                    <label for="comentario">Comentario</label>
                    
                </div>
                <div class="mb-3 form-floating">
                     <select class="form-select" name="categoria" id="categoria">
                        
                            <?php
                                if($query -> rowCount() > 0) { 

                                    foreach($categorias as $categoria) {
                                        echo '
                                            <option value="'.$categoria -> id_categoria.'">'.$categoria -> categoria.'</option> 
                                        ';
                                    }
                                }
                            ?>
                        
                        </select>
                    <label for="categoria">Selecciona una categoria</label>
                    
                </div>
                <div class="mb-3 form-floating">
                    <input type="file" class="form-control inputfile inputfile-1" id="file-1" name="imagen" placeholder="Imagen" autocomplete="off">
                    <label for="imagen" class="">Cargar Imagen (Opcional)
                    <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                    <span class="iborrainputfile">Seleccionar archivo</span>
                    </label>
                    
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="insertar" class="btn btn-secondary"><i class="bi bi-stickies-fill"></i> Compartir</button>
                </div>
                
            </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>