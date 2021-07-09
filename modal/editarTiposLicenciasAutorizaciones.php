<!-- Modal -->
<div class="modal-dialog modal-md modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title" style="color: #007bff; font-family: Arial narrow;"><i class="nav-icon fa fa-file-text" style="color: #007bff;"></i> Modificar Datos de Tipos Licencias o Autorizaciones</h4>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  </div>
	  <div class="modal-body">
		<form  class="form-horizontal" method="post" id="editarTipoLicencia" name="editarTipoLicencia">
			<input type="hidden" name="id11" id="id11" value="<?php echo $consulta[0]?>">
			<input type="hidden" name="id22" id="id22" value="<?php echo $consulta[1]?>">
		  	<div>
				<label for="nombre12" style="margin-bottom: 0px; margin-top: 5px">Nombre: </label>
				<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nombre12" name="nombre12" placeholder="Ingrese nombre del Tipo de Licencia o Autorizacion" value="<?php echo $consulta[2]?>">
		  	</div>
		  	<div>
				<label for="costo11" style="margin-bottom: 0px; margin-top: 5px">Costo: </label>
				<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="costo11" name="costo11" placeholder="Costo" value="<?php echo $consulta[3]?>">
		  	</div>
		  	<div id="resultados_ajaxTipoLicAut"></div>
		  	</div>
		  	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" id="guardar_datos" onclick="editarTipoLicAut();">Modificar</button>
		  	</div>
	  	</form>
	</div>
</div>


