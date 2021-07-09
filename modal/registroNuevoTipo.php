<!-- Modal -->
<div class="modal fade bd-modal-md" id="nuevoTipo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md modal-dialog-centered">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title" style="color: #007bff; font-family: Arial narrow;"><i class="nav-icon fa fa-file-text" style="color: #007bff;"></i> Agregar Nuevo Tipo de Licencia o Autorizacion</h4>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		  </div>
		  <div class="modal-body">
			<form  class="form-horizontal" method="post" id="guardarTipoLicencia" name="guardarTipoLicencia">
			  	<div class="form-group">
					<label for="codLicAut" style="margin-bottom: 0px; margin-top: 5px">Licencias o Autorizacion: </label>
					<div class="input-group" id="listarselectLicAut">
							<select style="height: 30px; font-size: 13px;"  class="form-control" id="codLicAut" name="codLicAut">
								<option value="" selected="true" disabled="disabled">-- Seleccione Licencia o Autorizacion --</option>
								 <?php 

        
							   		//require_once("../servidor.php");

							        try {
							         
							            $conn = new PDO($dir_server,  $username, $password);
							            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							            $stmt = $conn->prepare("SELECT ID, NOMBRE FROM LICENCIAS_AUTORIZACIONES;"); 
							            $stmt->execute();

							            while($tesis = $stmt->fetch()){
							            ?>
							              
											<option value="<?php echo $tesis['ID']; ?>" ><?php echo $tesis['NOMBRE'];  ?></option>

							            <?php   
							            }

							        }
							        catch(PDOException $e) {
							            echo "Error: " . $e->getMessage();
							        }
							        $conn = null;


							       ?>

							</select>

						  	<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevaLicenciaAutorizacion1"><i class="nav-icon fa fa-plus"></i></button>
					</div>
			  	</div>

			  	<div>
					<label for="nombre" style="margin-bottom: 0px; margin-top: 5px">Nombre: </label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Tipo de Licencia o Autorizacion">
			  	</div>
			  	<div>
					<label for="costo" style="margin-bottom: 0px; margin-top: 5px">Costo: </label>
					<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="costo" name="costo" placeholder="Costo">
			  	</div>
			  	<div id="resultados_ajax_tipo_licencia"></div>
			  	</div>
			  	<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" id="guardar_datos">Agregar</button>
			  	</div>
		  	</form>
		</div>
	</div>
</div>
