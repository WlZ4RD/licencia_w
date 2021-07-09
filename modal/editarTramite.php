<!-- Modal -->
<div class="modal-dialog modal-lg modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title" style="color: #007bff; font-family: Arial narrow;"><i class="nav-icon fa fa-file-text" style="color: #007bff;"></i> Editar Datos de Tramite de Comercializacion</h4>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  </div>
	  <div class="modal-body">
	  	<form  class="form-horizontal" method="post" id="modificar_Tramite" name="modificar_Tramite">
	  		<div>
				<input type="hidden" name="id0" id="id0" value="<?php echo $consulta[0]?>">
			</div>

		  	<div>
				<label for="actividadEconomica0" style="margin-bottom: 0px; margin-top: 5px">Actividad Economica: </label>
				<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="actividadEconomica0" name="actividadEconomica0" placeholder="Actividad Economica" value="<?php echo $consulta[1]?>">
		  	</div>

		  	<div class="row">
				<div class="col-4">
					<label for="fInicio0" style="margin-bottom: 0px; margin-top: 5px">Fecha Inicio: </label>
					<input style="height: 30px; font-size: 13px;" type="date" class="form-control" id="fInicio0" name="fInicio0" value="<?php echo $consulta[2]?>">
				</div>
				<div class="col-4">
					<label for="fFin0" style="margin-bottom: 0px; margin-top: 5px">Fecha Fin: </label>
					<input style="height: 30px; font-size: 13px;" type="date" class="form-control" id="fFin0" name="fFin0" value="<?php echo $consulta[3]?>">
				</div>
				<div class="col-4">
					<label for="costo0" style="margin-bottom: 0px; margin-top: 5px">Costo:</label>
					<input style="height: 30px; font-size: 13px;" type="number" class="form-control" id="costo0" name="costo0" placeholder="Costo" value="<?php echo $consulta[4]?>" readOnly>
				</div>
			</div>

			<div class="row">
				<div class="col-4">
					<label for="direccion0" style="margin-bottom: 0px; margin-top: 5px">Direccion: </label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="direccion0" name="direccion0" placeholder="Direccion" value="<?php echo $consulta[5]?>">
				</div>
				<div class="col-4">
					<label for="zonificacion0" style="margin-bottom: 0px; margin-top: 5px">Zonificacion: </label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="zonificacion0" name="zonificacion0" placeholder="Zonificacion" value="<?php echo $consulta[6]?>">
				</div>
				<div class="col-4">
					<label for="telefono0" style="margin-bottom: 0px; margin-top: 5px">Telefono:</label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="telefono0" name="telefono0" placeholder="Telefono" maxlength="9" minlength="9" value="<?php echo $consulta[7]?>">
				</div>
			</div>

			<div class="row">
				<div class="col-4">
					<label for="nBoleta0" style="margin-bottom: 0px; margin-top: 5px">N° Boleta: </label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nBoleta0" name="nBoleta0" placeholder="N° boleta" value="<?php echo $consulta[8]?>">
				</div>
				<div class="col-4">
					<label for="nExpediente0" style="margin-bottom: 0px; margin-top: 5px">N° Expediente: </label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nExpediente0" name="nExpediente0" placeholder="N° de Expediente" value="<?php echo $consulta[9]?>">
				</div>
				<div class="col-4">
					<label for="nResolucion0" style="margin-bottom: 0px; margin-top: 5px">N° de Resolucion:</label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nResolucion0" name="nResolucion0" placeholder="N° de Resolucion" value="<?php echo $consulta[10]?>">
				</div>
			</div>	
			
			<div class="row">
				<div class="col-4">
					<label for="ubicacionArchivo0" style="margin-bottom: 0px; margin-top: 5px">Ubicacion de Archivo Fisico: </label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="ubicacionArchivo0" name="ubicacionArchivo0" placeholder="Ubicacion del archivo Fisico" value="<?php echo $consulta[11]?>">
				</div>
				<div class="col-4">
					<label for="largo0" style="margin-bottom: 0px; margin-top: 5px">Tamaño(Largo): </label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="largo0" name="largo0" placeholder="Ingrese Largo" value="<?php echo $consulta[12]?>">
				</div>
				<div class="col-4">
					<label for="ancho0" style="margin-bottom: 0px; margin-top: 5px">Tamaño(Ancho): </label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="ancho0" name="ancho0" placeholder="Ingrese Ancho" value="<?php echo $consulta[13]?>">
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<label for="Procede0" style="margin-bottom: 0px; margin-top: 5px">Procede: </label>
					<select style="height: 30px; font-size: 13px;" class="form-control" id="procede0" name="procede0">
						<option value="" >-- Seleccione Estado --</option>
						<option value="0" <?php echo(($consulta[14] == 0)?'selected':'');?>>No Compatible</option>
						<option value="1"  <?php echo(($consulta[14] == 1)?'selected':'');?> >Compatible</option>						
					</select>
				</div>
				<div class="col-md-6">
					<label for="estado0" style="margin-bottom: 0px; margin-top: 5px">Estado del Documento</label>
					<select style="height: 30px; font-size: 13px;" class="form-control" id="estado0" name="estado0">
						<option value="" >-- Seleccione Estado --</option>
						<option value="0" <?php echo(($consulta[15] == 0)?'selected':'');?>>Inhabilitado</option>
						<option value="1"  <?php echo(($consulta[15] == 1)?'selected':'');?> >Habilitado</option>						
					</select>
				</div>
			</div>

			<div>
				<label for="comentario0" style="margin-bottom: 0px; margin-top: 5px">Comentarios: </label><br>
				<textarea class="col-12" style="height: 50px; font-size: 13px;" name="comentario" id="comentario" cols="30" rows="10" placeholder="Ingrese Comentarios"><?php echo $consulta[16]?></textarea>
		  	</div>	

		  	<div id="resultados_ajax_modificar_tramite"></div >
		  	</div>
		  	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" id="modificar" onclick="modificarTramite()">Modificar</button>
		  	</div>
		</form>
	</div>
</div>


