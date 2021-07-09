<!-- Modal -->
<div class="modal-dialog modal-lg modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title" style="color: #007bff; font-family: Arial narrow;"><i class="nav-icon fa fa-user" style="color: #007bff;"></i> Editar Datos del Contribuyente</h4>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  </div>
	  <div class="modal-body">
		<form  class="form-horizontal" method="post" id="editar1" name="editar1">
			<div>
				<input type="hidden" name="id" id="id" value="<?php echo $consulta[0]?>">
				<input type="hidden" name="id_tipo" id="id_tipo" value="<?php echo $consulta[1]?>">
			</div>
		  	<div class="row">
				<div class="col-md-6">
					<label for="tipo_con1" style="margin-bottom: 0px; margin-top: 5px">Tipo de Contribuyente</label>
					<select style="height: 30px; font-size: 13px;" class="form-control" id="tipo_con1" name="tipo_con1" disabled="">
						<option value="" >-- Seleccione Contribuyente --</option>
						<option value="1" <?php echo(($consulta[1] == 1)?'selected':'');?>>Persona Natural</option>
						<option value="2"  <?php echo(($consulta[1] == 2)?'selected':'');?> >Persona Juridica</option>
												
					</select>
					<?php echo "<script>actualizar(); actualizar1();</script>" ?>
				</div>
				<div class="col-md-3">
					<label for="dni1" style="margin-bottom: 0px; margin-top: 5px">N° D.N.I.:</label>
			        <input style="height: 30px; font-size: 13px;" class="form-control" id="dni1" name="dni1" type="text" maxlength="8" minlength="8" placeholder="N° de D.N.I." value="<?php echo $consulta[2]?>">
				</div>
				<div class="col-md-3">
					<label for="ruc1" style="margin-bottom: 0px; margin-top: 5px">N° R.U.C.:</label>
			        <input style="height: 30px; font-size: 13px;" class="form-control" id="ruc1" name="ruc1" type="text" maxlength="11" minlength="11" placeholder="N° de R.U.C." value="<?php echo $consulta[3]?>">
				</div>
		  	</div>
		  	<div>
				<label for="nomApell1" style="margin-bottom: 0px; margin-top: 5px">Nombres y Apellidos del Representante</label>
				<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="nomApell1" name="nomApell1" placeholder="Apelidos y Nombres" value="<?php echo $consulta[4]?>">
		  	</div>
		  	<div>
				<label for="razon1" style="margin-bottom: 0px; margin-top: 5px">Razon Social</label>
				<input style="height: 30px; font-size: 13px;" type="text" class="form-control" id="razon1" name="razon1" placeholder="Razon Social" value="<?php echo $consulta[5]?>">
		  	</div>
		  	<div class="row">
				<div class="col-md-8">
					<label for="direccion1" style="margin-bottom: 0px; margin-top: 5px">Direccion:</label>
			        <input style="height: 30px; font-size: 13px;" class="form-control" id="direccion1" name="direccion1" type="text" placeholder="Direccion" value="<?php echo $consulta[6]?>">
				</div>
				<div class="col-md-4">
					<label for="telefono1" style="margin-bottom: 0px; margin-top: 5px">Telefono:</label>
			        <input style="height: 30px; font-size: 13px;" class="form-control" id="telefono1" name="telefono1" type="text" maxlength="9" minlength="9" placeholder="Telefono" value="<?php echo $consulta[8]?>">
				</div>
		  	</div>
		  	<div>
				<label for="email1" style="margin-bottom: 0px; margin-top: 5px">E-mail o Correo Electronico:</label>
		        <input style="height: 30px; font-size: 13px;" class="form-control" id="email1" name="email1" type="text" placeholder="Ingrese su correo" value="<?php echo $consulta[7]?>">
			</div>
		  	<div id="resultado_modificacion"></div>
		  	</div>
		  	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" id="modificar_datos" onclick="editar();">Modificar Datos</button>
		  	</div>
	  	</form>
	</div>
</div>

<script>
	function editar(){
		var url = 'ajax/modificar_registro_contribuyente.php';
        $.ajax({
           type: "POST",
           url: url,
           data: $("#editar1").serialize(), 
           success: function(data)
           {
            $("#resultado_modificacion").html(data);
              //alert(data); 
              load(1);
           }
         });
	}
</script>


