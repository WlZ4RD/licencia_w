<!-- Modal -->
<div class="modal fade" id="modificarClave" >
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title"> Modificar Clave</h4>

		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal" method="post" id="guardarPeriodo" name="guardarPeriodo">
			
		  	<div class="form-group">
				<div class="col-sm-12">
					<label for="" class="control-label">Código</label>
				  	<input type="password" class="form-control" id="codigo" name="codigo" placeholder="Ingrese clave actual">
				</div>
		  	</div>
		  	<div class="form-group">
				<div class="col-sm-12">
					<label for="descripcion" class="control-label">Descripción</label>
				  	<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripcion">
				</div>
		  	</div>
		  	<div class="form-group">
				<div class="col-sm-12">
					<label for="estado" class="control-label">Estado</label>
				 	<select class="form-control" id="estado" name="estado">
						<option value="" selected>-- Selecciona estado --</option>
						<option value="1">Abierto</option>
						<option value="0">Cerrado</option>
					</select>
				</div>
		  	</div>
		  	<div id="resultados_ajax_periodos"></div>	
	  		</div>
		  	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		    </div>
	  	</form>
	</div>
  </div>
</div>
