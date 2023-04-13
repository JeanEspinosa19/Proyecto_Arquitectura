<!-- REGISTRAR NOTICIA -->
<div class="modal fade" id="ingresarNoticia" tabindex="-1" aria-labelledby="nuevaNoticia" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevaNoticia">Nueva Noticia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post" action="controller/nuevaNoticia.php">
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control" id="noticia" name="noticia" placeholder="Noticia" autocomplete="off">
                    <label for="noticia" class="form-label">Noticia</label>
                </div>
                
                <div class="mb-3 form-floating">
                    <textarea class="form-control" placeholder="Pero que ha pasa'o?" name="detalleNoticia" id="detalleNoticia"></textarea>
                    <label for="detalleNoticia">Detalle</label>
                    
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="insertar" class="btn btn-secondary">Registrar</button>
                </div>
                
            </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

