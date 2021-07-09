<!-- Modal -->
<div class="modal fade" id="modificarClave" >
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title"> Modificar Clave</h4>

		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal" method="post" id="modificar_clave_1" name="modificar_clave_1">
			
		  	<div class="form-group">
				<div class="col-sm-12">
					<label for="" class="control-label">Clave actual</label>
				  	<input type="password" class="form-control" id="clave_actual" name="clave_actual" placeholder="Ingrese clave actual">
				</div>
		  	</div>
		  	<div class="form-group">
				<div class="col-sm-12">
					<label for="descripcion" class="control-label">Nueva clave</label>
				  	<input type="password" class="form-control" id="nueva_clave" name="nueva_clave" placeholder="Ingrese nueva clave">
				</div>
		  	</div>
			<div class="form-group">
				<div class="col-sm-12">
					<label for="descripcion" class="control-label">Repetir nueva clave</label>
				  	<input type="password" class="form-control" id="reptir_nueva_clave" name="reptir_nueva_clave" placeholder="Repita la nueva clave">
				</div>
		  	</div>
		  	
		  	<div id="resultados_ajax_clave"></div>	
	  		</div>
		  	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		    </div>
	  	</form>
	</div>
  </div>
</div>
