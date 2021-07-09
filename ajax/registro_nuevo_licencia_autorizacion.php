<?php
 	session_start();
  	if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: login.php");
    exit;
        }

	if(empty($_POST['nombre'])){
		$errors[]="Nombre vacío";
	}else {


	require_once("../servidor.php");


			$conn =null;
		try {
			$par_in_tesista= array($_POST['nombre']);

			$conn =new PDO($dir_server, $username, $password);
			
			$conn->beginTransaction();

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query_in_tesista= "INSERT INTO LICENCIAS_AUTORIZACIONES(NOMBRE) VALUES (?);";
			$pst_in_alum=$conn->prepare($query_in_tesista);
			$pst_in_alum->execute($par_in_tesista);


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