<!-- Modal -->
<div class="modal fade bd-modal-lg" id="nuevoRegistro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title" style="color: #007bff; font-family: Arial narrow;"><i class="nav-icon fa fa-user" style="color: #007bff;"></i> Agregar Nuevo Contribuyente</h4>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		  </div>
		  <div class="modal-body">
			<form  class="form-horizontal" method="post" id="guardar" name="guardar">
			  	<div class="row">
					<div class="col-md-6">
						<label for="tipo_con" style="margin-bottom: 0px; margin-top: 5px">Tipo de Contribuyente</label>
						<select style="height: 30px; font-size: 13px;" class="form-control" id="tipo_con" name="tipo_con">
							<option value="">-- Seleccione Contribuyente --</option>
							<option value="1">Persona Natural</option>
							<option value="2">Persona Juridica</option>
						</select>
					</div>
					<div class="col-md-3">
						<label for="dni" style="margin-bottom: 0px; margin-top: 5px">N° D.N.I.:</label>
				        <input style="height: 30px; font-size: 13px;" class="form-control" id="dni" name="dni" type="text" maxlength="8" minlength="8" placeholder="N° de D.N.I.">
					</div>
					<div class="col-md-3">
						<label for="ruc" style="margin-bottom: 0px; margin-top: 5px">N° R.U.C.:</label>
				        <input style="height: 30px; font-size: 13px;" class="form-control" id="ruc" name="ruc" type="text" maxlength="11" minlength="11" placeholder="N° de R.U.C.">
					</div>
			  	</div>
			  	<div>
					<label for="nomApell" style="margin-bottom: 0px; margin-top: 5px">Nombres y Apellidos del Representante</label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nomApell" name="nomApell" placeholder="Apelidos y Nombres">
			  	</div>
			  	<div>
					<label for="razon" style="margin-bottom: 0px; margin-top: 5px">Razon Social</label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="razon" name="razon" placeholder="Razon Social">
			  	</div>
			  	<div class="row">
					<div class="col-md-8">
						<label for="direccion" style="margin-bottom: 0px; margin-top: 5px">Direccion del Representante:</label>
				        <input style="height: 30px; font-size: 13px;" class="form-control" id="direccion" name="direccion" type="text" placeholder="Direccion">
					</div>
					<div class="col-md-4">
						<label for="telefono" style="margin-bottom: 0px; margin-top: 5px">Telefono del Representante:</label>
				        <input style="height: 30px; font-size: 13px;" class="form-control" id="telefono" name="telefono" type="text" maxlength="9" minlength="9" placeholder="Telefono">
					</div>
			  	</div>
			  	<div>
					<label for="email" style="margin-bottom: 0px; margin-top: 5px">E-mail de representante:</label>
			        <input style="height: 30px; font-size: 13px;" class="form-control" id="email" name="email" type="text" placeholder="Ingrese su correo">
				</div>
			  	<div id="resultados_ajax"></div>
			  	</div>
			  	<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
			  	</div>
		  	</form>
		</div>
	</div>
</div>
