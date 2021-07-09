<!-- Modal -->
<div class="modal fade" id="nuevoUsuario" >
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title"> Agregar nuevo usuario</h4>

		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal" method="post" id="guardarUsuario" name="guardarUsuario">
			
		  	<div class="form-group">
				<div class="col-sm-12">
					<label for="codigo" class="control-label">DNI</label>
				  	<input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese su DNI" pattern="[0-9]{8}">
				</div>
		  	</div>
		  	<div class="form-group">
				<div class="col-sm-12">
					<label for="descripcion" class="control-label">Nombres</label>
				  	<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese nombres">
				</div>
		  	</div>


		  	  <div class="form-group">
				<div class="col-sm-12">
					<label for="descripcion" class="control-label">Apellidos</label>
				  	<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos">
				</div>
		  	</div>

		  	  <div class="form-group">
				<div class="col-sm-12">
					<label for="descripcion" class="control-label">Clave</label>
				  	<input type="text" class="form-control" id="clave" name="clave" placeholder="Ingrese clave">
				</div>
		  	</div>
		  	<div class="form-group">
				<div class="col-sm-12">
					<label for="estado" class="control-label">Estado</label>
				 	<select class="form-control" id="rol" name="rol">
						<option value="" selected>-- Selecciona estado --</option>
						<option value="1">Administrador</option>
						<option value="2">Sub-Gerente</option>
						<option value="3">Asistente</option>
					</select>
				</div>
		  	</div>
		  	<div id="resultados_ajax_usuario"></div>	
	  		</div>
		  	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar</button>
		    </div>
	  	</form>
	</div>
  </div>
</div>
