<!-- Modal -->
<div class="modal fade bd-modal-lg" id="nuevoTramite" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title" style="color: #007bff; font-family: Arial narrow;"><i class="nav-icon fa fa-file-text" style="color: #007bff;"></i> Realizar Nuevo Tramite de Comercializacion</h4>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="limpiarcampos()">&times;</button>
		  </div>
		  <div class="modal-body">
			<form  class="form-horizontal" method="post" id="guardarTramite" name="guardarTramite">
			  	<div class="row">
		        	<div class="col-md-4">
				            <label for="dni_nuevo" style="margin-bottom: 0px; margin-top: 5px">N° D.N.I.:</label>
				            <div class="d-flex">
				            	<input type="hidden" name="id_cont" id="id_cont">
				            	<input style="height: 30px; font-size: 13px;" type="text"  class="col-md-10" id="dni_nuevo" name="dni_nuevo" placeholder="DNI del Contribuyente" onkeyup='buscar_contribuyente_asignado(1);'>
					            <button style="border-radius: 0px 4px 4px 0px; height: 30px; font-size: 13px;" type='button' class="btn btn-primary" data-toggle="modal" data-target="#seleccionarContribuyente"><i class="nav-icon">⁞</i></button>

					        </div>
		  			</div>

		  			<div class="col-md-8" id="listaContribuyentesAsignados">
						<label for="dni_nuevo" style="margin-bottom: 0px; margin-top: 5px">Nombres y Apellidos del Contribuyente: </label>
						<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nom_razon1" name="nom_razon1" placeholder="Nombres y Apellidos">
				  	</div>
		        </div>

		        <div class="">
					<label for="LicAut" style="margin-bottom: 0px; margin-top: 5px">Seleccione Licencias o Autorizacion: </label>
					<div class="input-group" id="listarselectLicAut">
							<select style="height: 30px; font-size: 13px;"  class="form-control" id="LicAut" name="LicAut" onchange="getTiposLA(this.value);">
								<option value="" selected="true" disabled="disabled">-- Seleccione Licencia o Autorizacion --</option>
								<?php 

        
							   		//require_once("../servidor.php");

							        try {
							         
							            $conn = new PDO($dir_server,  $username, $password);
							            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							            $stmt = $conn->prepare("SELECT ID, NOMBRE FROM LICENCIAS_AUTORIZACIONES;"); 
							            $stmt->execute();

							            while($row = $stmt->fetch()){
							            ?>
							              
											<option value="<?php echo $row['ID']; ?>" ><?php echo $row['NOMBRE'];  ?></option>

							            <?php   
							            }

							        }
							        catch(PDOException $e) {
							            echo "Error: " . $e->getMessage();
							        }
							        $conn = null;


							       ?>
							</select>
					</div>
			  	</div>
		       	
		       	<div class="">
					<label for="listarselectLicAut" style="margin-bottom: 0px; margin-top: 5px">Seleccione Tipo Licencias o Autorizacion: </label>
					<div class="input-group" id="listarselectLicAut">
							<select style="height: 30px; font-size: 13px;"  class="form-control" id="LicTipoAut" name="LicTipoAut" onchange="getCostoTipoLA(this.value);">
								
								<div id="divLicTipoAut" name="divLicTipoAut"></div>
							</select>
					</div>
			  	</div>

			  	<div>
					<label for="actividadEconomica" style="margin-bottom: 0px; margin-top: 5px">Actividad Economica: </label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="actividadEconomica" name="actividadEconomica" placeholder="Actividad Economica">
			  	</div>

			  	<div class="row">
					<div class="col-4">
						<label for="fInicio" style="margin-bottom: 0px; margin-top: 5px">Fecha Inicio: </label>
						<input style="height: 30px; font-size: 13px;" type="date" class="form-control" id="fInicio" name="fInicio">
					</div>
					<div class="col-4">
						<label for="fFin" style="margin-bottom: 0px; margin-top: 5px">Fecha Fin: </label>
						<input style="height: 30px; font-size: 13px;" type="date" class="form-control" id="fFin" name="fFin">
					</div>
					<div class="col-4">
						<label for="costo" style="margin-bottom: 0px; margin-top: 5px">Costo:</label>
						<input style="height: 30px; font-size: 13px;" type="number" class="form-control" id="costo" name="costo" placeholder="Costo">
					</div>
				</div>

				<div class="row">
					<div class="col-4">
						<label for="direccion" style="margin-bottom: 0px; margin-top: 5px">Direccion: </label>
						<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
					</div>
					<div class="col-4">
						<label for="zonificacion" style="margin-bottom: 0px; margin-top: 5px">Zonificacion: </label>
						<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="zonificacion" name="zonificacion" placeholder="Zonificacion">
					</div>
					<div class="col-4">
						<label for="telefono" style="margin-bottom: 0px; margin-top: 5px">Telefono:</label>
						<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" maxlength="9" minlength="9">
					</div>
				</div>

				<div class="row">
					<div class="col-4">
						<label for="nBoleta" style="margin-bottom: 0px; margin-top: 5px">N° Boleta: </label>
						<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nBoleta" name="nBoleta" placeholder="N° boleta">
					</div>
					<div class="col-4">
						<label for="nExpediente" style="margin-bottom: 0px; margin-top: 5px">N° Expediente: </label>
						<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nExpediente" name="nExpediente" placeholder="N° de Expediente">
					</div>
					<div class="col-4">
						<label for="nResolucion" style="margin-bottom: 0px; margin-top: 5px">N° de Resolucion:</label>
						<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nResolucion" name="nResolucion" placeholder="N° de Resolucion">
					</div>
				</div>	
				
				<div class="row">
					<div class="col-4">
						<label for="ubicacionArchivo" style="margin-bottom: 0px; margin-top: 5px">Ubicacion de Archivo Fisico: </label>
						<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="ubicacionArchivo" name="ubicacionArchivo" placeholder="Ubicacion del archivo Fisico">
					</div>
					<div class="col-4">
						<label for="largo" style="margin-bottom: 0px; margin-top: 5px">Tamaño(Largo): </label>
						<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="largo" name="largo" placeholder="Ingrese Largo">
					</div>
					<div class="col-4">
						<label for="ancho" style="margin-bottom: 0px; margin-top: 5px">Tamaño(Ancho): </label>
						<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="ancho" name="ancho" placeholder="Ingrese Ancho">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<label for="Procede" style="margin-bottom: 0px; margin-top: 5px">Procede: </label>
						<select style="height: 30px; font-size: 13px;" class="form-control" id="Procede" name="Procede">
							<option value="">-- Seleccione opcion --</option>
							<option value="0">No Compatible</option>
							<option value="1">Compatible</option>
						</select>
					</div>
					<div class="col-md-6">
						<label for="estado" style="margin-bottom: 0px; margin-top: 5px">Estado del Documento</label>
						<select style="height: 30px; font-size: 13px;" class="form-control" id="estado" name="estado">
							<option value="">-- Seleccione Opcion --</option>
							<option value="0">Inhabilitado</option>
							<option value="1" selected="">Habilitado</option>
						</select>
					</div>
				</div>

				<div>
					<label for="comentario" style="margin-bottom: 0px; margin-top: 5px">Comentarios: </label><br>
					<textarea class="col-12" style="height: 50px; font-size: 13px;" name="comentario" id="comentario" cols="30" rows="10" placeholder="Ingrese Comentarios"></textarea>
			  	</div>	

			  	<div id="resultados_ajax_guardar_tramite"></div>
			  	</div>
			  	<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" onclick="limpiarcampos()">Cerrar</button>
					<button type="submit" class="btn btn-primary" id="guardar_datos">Imprimir</button>
			  	</div>
		  	</form>
		</div>
	</div>
</div>

<script>
function limpiarcampos(){
	document.getElementById("id_cont").value="";
	document.getElementById("nom_razon1").value="";
	document.getElementById("actividadEconomica").value="";
	document.getElementById("fInicio").value="";
	document.getElementById("fFin").value="";
	document.getElementById("costo").value="";
	document.getElementById("direccion").value="";
	document.getElementById("zonificacion").value="";
	document.getElementById("telefono").value="";
	document.getElementById("nBoleta").value="";
	document.getElementById("nExpediente").value="";
	document.getElementById("nResolucion").value="";
	document.getElementById("ubicacionArchivo").value="";
	document.getElementById("largo").value="";
	document.getElementById("ancho").value="";
	document.getElementById("Procede").value="";
	document.getElementById("resultados_ajax_guardar_tramite").value="";
	document.getElementById("comentario").value="";
}
</script>
