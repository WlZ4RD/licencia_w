<!-- Modal -->
<div class="modal fade bd-modal-lg" id="seleccionarContribuyente">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Lista de Contribuyentes</h4>

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">   
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="buscar_periodo" class="control-label">Buscar:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="buscar_periodo" name="buscar_periodo" placeholder="Buscar Curso" onkeyup='cargarAyudaPeriodo(1);'>
                </div> 
            </div>
            <div class="card-body table-responsive p-0" id="tabla_resultado_periodo" style="height: 250px; overflow: auto;">
            </div>   
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>