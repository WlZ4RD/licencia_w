<!-- Modal -->
<div class="modal fade bd-modal-md" id="nuevaLicenciaAutorizacion1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md modal-dialog-centered">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title" style="color: #007bff; font-family: Arial narrow;"><i class="nav-icon fa fa-user" style="color: #007bff;"></i> Agregar Nueva Licencia y Autorizacion</h4>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		  </div>
		  <div class="modal-body">
			<form  class="form-horizontal" method="post" id="guardarLicenciaAutorizacion" name="guardarLicenciaAutorizacion">
			  	<div>
					<label for="nomApell" style="margin-bottom: 0px; margin-top: 5px">Nombre</label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nomApell" name="nomApell" placeholder="Nombre de Licencia o Autorizacion">
			  	</div>
			  	<div id="resultados_ajax"></div>
			  	</div>
			  	<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" id="agregar">Agregar</button>
			  	</div>
		  	</form>
		</div>
	</div>
</div>
