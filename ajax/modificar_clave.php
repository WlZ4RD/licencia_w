<?php
 	session_start();
  	if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: login.php");
    exit;
        }

	if(empty($_POST['clave_actual'])){
		$errors[]="Clave actual vacío";
	}if(empty($_POST['nueva_clave'])){
		$errors[]="Nueva clave vacío";
	}if(empty($_POST['reptir_nueva_clave'])){
		$errors[]="Repetir nueva clave vacío";
	}if(strcmp($_POST['reptir_nueva_clave'], $_POST['nueva_clave']) != 0 ){
		$errors[]="No coinciden las claves";
	}else {


	require_once("../servidor.php");


			$conn =null;
		try {
			$par_in_clave= array( $_SESSION['codigo'] , $_POST['clave_actual'] );

			$par_in_tesista= array($_POST['nueva_clave'], $_SESSION['codigo'] , $_POST['clave_actual'] );

			$conn =new PDO($dir_server, $username, $password);
			
			$conn->beginTransaction();

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query_in_clave= "SELECT * FROM USUARIO WHERE DNI=? AND CLAVE=?";
			$pst_in_clave=$conn->prepare($query_in_clave);
			$pst_in_clave->execute($par_in_clave);
			if($fila = $pst_in_clave->fetch()){
				$query_in_tesista= "UPDATE USUARIO SET CLAVE=? WHERE DNI =? AND CLAVE=?;";
				$pst_in_alum=$conn->prepare($query_in_tesista);
				$pst_in_alum->execute($par_in_tesista);
				$conn->commit();
				$messages[] ="Se ha modificado correctamente.";
				
			}else{
				$errors[]="La clave actual es incorrecta";
			}

			


			
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