<?php
 	session_start();
  	if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: login.php");
    exit;
        }

	if(empty($_POST['id_cont'])){
		$errors[]="Contribuyente vacío";
	}else {


	require_once("../servidor.php");


			$conn =null;
		try {
			$id_lic_tipo_aut=$_POST['LicTipoAut'];
			$conn =new PDO($dir_server, $username, $password);
			$conn->beginTransaction();
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		/*	$query_in_tramite= "INSERT INTO TRAMITE( ID_CONTRIBUYENTE, ID_TIPOS_LICENCIAS_AUTORIZACIONES ,ACTIVIDAD_ECONOMICA, DIRECCION,TELEFONO, ZONIFICACION, COMPATIBILIDAD_DE_USO, OBSERVACIONES, NRO_BOLETA,NRO_EXPEDIENTE, NRO_RESOLUCION, 
				 UBICACION_ARCHIVO_FISICO, LARGO, ANCHO, F_INICIAL, F_VENCIMIENTO, ESTADO  ) 
				VALUES ( :ID_CONTRIBUYENTE,:ID_TIPOS_LICENCIAS_AUTORIZACIONES,:ACTIVIDAD_ECONOMICA,:DIRECCION,:TELEFONO,:ZONIFICACION, :COMPATIBILIDAD_DE_USO,:OBSERVACIONES, :NRO_BOLETA, :NRO_EXPEDIENTE, :NRO_RESOLUCION,  :UBICACION_ARCHIVO_FISICO, :LARGO, :ANCHO,:F_INICIAL, :F_VENCIMIENTO,  :ESTADO);";*/
			$query_in_tramite= "INSERT INTO TRAMITE( ID_CONTRIBUYENTE, ID_TIPOS_LICENCIAS_AUTORIZACIONES ,ACTIVIDAD_ECONOMICA, DIRECCION,TELEFONO, ZONIFICACION, COMPATIBILIDAD_DE_USO, OBSERVACIONES, NRO_BOLETA,NRO_EXPEDIENTE, NRO_RESOLUCION, 
				 UBICACION_ARCHIVO_FISICO, LARGO, ANCHO, F_INICIAL, F_VENCIMIENTO, ESTADO, COSTO  ) 
				 SELECT :ID_CONTRIBUYENTE,:ID_TIPOS_LICENCIAS_AUTORIZACIONES,:ACTIVIDAD_ECONOMICA,:DIRECCION,:TELEFONO,:ZONIFICACION, :COMPATIBILIDAD_DE_USO,:OBSERVACIONES, :NRO_BOLETA, :NRO_EXPEDIENTE, :NRO_RESOLUCION,  :UBICACION_ARCHIVO_FISICO, :LARGO, :ANCHO,:F_INICIAL, :F_VENCIMIENTO,  :ESTADO, COSTO FROM TIPOS_LICENCIAS_AUTORIZACIONES WHERE ID=$id_lic_tipo_aut;";

			$pst_in_tramite=$conn->prepare($query_in_tramite);
			 
			$pst_in_tramite->bindValue(':ID_CONTRIBUYENTE',(isset($_POST['id_cont']) && !empty($_POST['id_cont'])) ? $_POST['id_cont'] : NULL, PDO::PARAM_INT);   
			$pst_in_tramite->bindValue(':ID_TIPOS_LICENCIAS_AUTORIZACIONES',(isset($_POST['LicTipoAut']) && !empty($_POST['LicTipoAut'])) ? $_POST['LicTipoAut'] : NULL, PDO::PARAM_INT); 
			$pst_in_tramite->bindValue(':ACTIVIDAD_ECONOMICA',(isset($_POST['actividadEconomica']) && !empty($_POST['actividadEconomica'])) ? $_POST['actividadEconomica'] : NULL, PDO::PARAM_STR); 
			$pst_in_tramite->bindValue(':DIRECCION',(isset($_POST['direccion']) && !empty($_POST['direccion'])) ? $_POST['direccion'] : NULL, PDO::PARAM_STR); 
			$pst_in_tramite->bindValue(':TELEFONO',(isset($_POST['telefono']) && !empty($_POST['telefono'])) ? $_POST['telefono'] : NULL, PDO::PARAM_STR);
			$pst_in_tramite->bindValue(':ZONIFICACION',(isset($_POST['zonificacion']) && !empty($_POST['zonificacion'])) ? $_POST['zonificacion'] : NULL, PDO::PARAM_STR); 
			$pst_in_tramite->bindValue(':COMPATIBILIDAD_DE_USO',(isset($_POST['Procede']) && !empty($_POST['Procede'])) ? $_POST['Procede'] : NULL, PDO::PARAM_INT);
			$pst_in_tramite->bindValue(':OBSERVACIONES',(isset($_POST['comentario']) && !empty($_POST['comentario'])) ? $_POST['comentario'] : NULL, PDO::PARAM_STR);
			$pst_in_tramite->bindValue(':NRO_BOLETA',(isset($_POST['nBoleta']) && !empty($_POST['nBoleta'])) ? $_POST['nBoleta'] : NULL, PDO::PARAM_STR);
	
			$pst_in_tramite->bindValue(':NRO_EXPEDIENTE',(isset($_POST['nExpediente']) && !empty($_POST['nExpediente'])) ? $_POST['nExpediente'] : NULL, PDO::PARAM_STR);
			$pst_in_tramite->bindValue(':NRO_RESOLUCION',(isset($_POST['nResolucion']) && !empty($_POST['nResolucion'])) ? $_POST['nResolucion'] : NULL, PDO::PARAM_STR);

			

			$pst_in_tramite->bindValue(':UBICACION_ARCHIVO_FISICO',(isset($_POST['ubicacionArchivo']) && !empty($_POST['ubicacionArchivo'])) ? $_POST['ubicacionArchivo'] : NULL, PDO::PARAM_STR);
			$pst_in_tramite->bindValue(':LARGO',(isset($_POST['largo']) && !empty($_POST['largo'])) ? $_POST['largo'] : NULL, PDO::PARAM_INT);

			$pst_in_tramite->bindValue(':ANCHO',(isset($_POST['ancho']) && !empty($_POST['ancho'])) ? $_POST['ancho'] : NULL, PDO::PARAM_INT);

			$pst_in_tramite->bindValue(':F_INICIAL',(isset($_POST['fInicio']) && !empty($_POST['fInicio'])) ? $_POST['fInicio'] : NULL, PDO::PARAM_STR);
			$pst_in_tramite->bindValue(':F_VENCIMIENTO',(isset($_POST['fFin']) && !empty($_POST['fFin'])) ? $_POST['fFin'] : NULL, PDO::PARAM_STR);
			$pst_in_tramite->bindValue(':ESTADO',(isset($_POST['estado']) && !empty($_POST['estado'])) ? $_POST['estado'] : NULL, PDO::PARAM_INT);
			$pst_in_tramite->execute();

			$query_se_ul_id="SELECT @@IDENTITY AS ID; ";	
			$pst_se_ul_id=$conn->prepare($query_se_ul_id);
			$pst_se_ul_id->execute();
			$id_ul=-1;
			if ($row = $pst_se_ul_id->fetch()) {
				$id_ul=$row['ID'];
			}

			echo "<script> window.open('/licencia/reporte/Licencia.php?id=$id_ul', '_blank');</script>";
			//echo "<script> window.open('pagina.php?id='$id_ul,'_blank'); </script>";

			$conn->commit();
			$messages[] ="Se ha registrado correctamente.";
		} catch (Exception $e) {
			//die(print_r($e->getMessage()));

			$mensaje=$e->getMessage();

			$errors []="Lo siento algo ha salido mal intenta nuevamente. ".$mensaje;
			$conn->rollBack();
		
		}finally{
			$conn=null;
		}

	}


if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

	
?>