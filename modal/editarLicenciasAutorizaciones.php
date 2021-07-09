<!-- Modal -->
<div class="modal-dialog modal-md modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title" style="color: #007bff; font-family: Arial narrow;"><i class="nav-icon fa fa-user" style="color: #007bff;"></i> Editar Datos de Licencias y Autorizaciones</h4>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  </div>
	  <div class="modal-body">
		<form  class="form-horizontal" method="post" id="editarLicenciaAutorizacion" name="editarLicenciaAutorizacion" style="margin-bottom: 0px;">
			<input type="hidden" name="id1" id="id1" value="<?php echo $consulta[0]?>">
		  	<div>
				<label for="nombre11" style="margin-bottom: 0px; margin-top: 5px">Nombre</label>
				<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nombre11" name="nombre11" placeholder="Nombre de Licencia o Autorizacion" value="<?php echo $consulta[1]?>">
		  	</div>
		  	<div id="resultados_licAut"></div>
		  	</div>
		  	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" id="modificar" onclick="editarLicAut();">Modificar</button>
		  	</div>
	  	</form>
	</div>
</div>


