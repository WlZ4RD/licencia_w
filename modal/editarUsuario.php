<!-- Modal -->
<div class="modal-dialog modal-md modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title" style="color: #007bff; font-family: Arial narrow;"><i class="nav-icon fa fa-user" style="color: #007bff;"></i> Editar Datos del Usuario</h4>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  </div>
	  <div class="modal-body">
		<form  class="form-horizontal" method="post" id="modificar1" name="modificar1">
		  	<div>
				<label for="dni2" style="margin-bottom: 0px; margin-top: 5px">Ingrese D.N.I. :</label>
				<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="dni2" name="dni2" placeholder="Ingrese D.N.I" value="<?php echo $consulta[0]?>" readOnly>
		  	</div>
		  	<div>
				<label for="nombres2" style="margin-bottom: 0px; margin-top: 5px">Nombres: </label>
				<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nombres2" name="nombres2" placeholder="Ingrese Nombres" value="<?php echo $consulta[1]?>">
		  	</div>
		  	<div>
				<label for="apellidos2" style="margin-bottom: 0px; margin-top: 5px">Apellidos:</label>
		        <input style="height: 30px; font-size: 13px;" class="form-control" id="apellidos2" name="apellidos2" type="text" placeholder="Ingrese Apellidos" value="<?php echo $consulta[2]?>">
			</div>
			<div>
				<label for="clave2" style="margin-bottom: 0px; margin-top: 5px">Clave:</label>
		        <input style="height: 30px; font-size: 13px;" class="form-control" id="clave2" name="clave2" type="text" placeholder="Ingrese Clave" value="">
			</div>
			<div>
				<label for="rol2" style="margin-bottom: 0px; margin-top: 5px">Rol:</label>
				<select style="height: 30px; font-size: 13px;" class="form-control" id="rol2" name="rol2">
					<option value="" >-- Seleccione Rol --</option>
					<option value="1" <?php echo(($consulta[3] == 1)?'selected':'');?>>Administrador</option>
					<option value="2"  <?php echo(($consulta[3] == 2)?'selected':'');?>>Sub-Gerente</option>
					<option value="3"  <?php echo(($consulta[3] == 3)?'selected':'');?>>Asistente</option>						
				</select>
			</div>
		  	<div id="resultado_modificacion2"></div>
		  	</div>
		  	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" id="modificar_datos" onclick="editar2();">Modificar</button>
		  	</div>
	  	</form>
	</div>
</div>


