<?php
 	session_start();
  	if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: login.php");
    exit;
        }

	if(empty($_GET['id_eliminar'])){
		$errors[]="Código no encontrado";
	}else {


	require_once("servidor.php");


		$conn =null;
		try {
			$par_padron= array($_GET['id_eliminar']);

			$conn =new PDO($dir_server, $username, $password);
			
			$conn->beginTransaction();

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query_in_padron= "DELETE FROM LICENCIAS_AUTORIZACIONES WHERE ID=?";
			$pst_in_alum=$conn->prepare($query_in_padron);
			$pst_in_alum->execute($par_padron);

			$conn->commit();
			$messages[] ="Licencia o Autorizacion eliminado correctamente.";
			echo("<script>window.location='gestionarLicenciasAutorizaciones.php'</script>");
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