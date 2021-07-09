<!-- Modal -->
<div class="modal fade bd-modal-md" id="buscarContribuyente">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Buscar contribuyentes</h4>

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" id="listarDocentes" name="listarDocentes">
              
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="buscar_docente" class="control-label">Buscar:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="buscar_docente" name="buscar_docente" placeholder="Buscar Docente" required>
                    </div> 
                </div  class="card-body table-responsive p-0" id="tabla_resultado_periodo" style="height: 250px; overflow: auto;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>