<?php
 	session_start();
  	if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: login.php");
    exit;
        }

	if(empty($_POST['tipo_con'])){
		$errors[]="El tipo de contribuyente vacío";
	}if(empty($_POST['dni'])){
		$errors[]="DNI vacío";
	}if(empty($_POST['ruc'])){
		$errors[]="RUC vacío";
	}if(empty($_POST['nomApell'])){
		$errors[]="Nombres y apellidos del contribuyente vacío";
	}else if(empty($_POST['direccion'])){
		$errors[]="Direccion vació";
	}else if(empty($_POST['telefono'])){
		$errors[]="Telefono vacío";
	}else {


	require_once("../servidor.php");


			$conn =null;
		try {
			

			$conn =new PDO($dir_server, $username, $password);
			
			$conn->beginTransaction();

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$par_in_contri=null;
			if($_POST['tipo_con']==1){
				$par_in_contri= array($_POST['tipo_con'], $_POST['dni'], $_POST['ruc'], $_POST['nomApell'], $_POST['telefono'], $_POST['email'], $_POST['direccion']);
				$query_in_contri= "INSERT INTO CONTRIBUYENTE(TIPO_CONTRIBUYENTE, DNI, RUC, NOM_APELL_REPRE, TELEFONO, EMAIL, DIRECCION) VALUES (?,?,?,?,?,?,?);";
			}else if ($_POST['tipo_con']==2) {
				$par_in_contri= array($_POST['tipo_con'], $_POST['dni'], $_POST['ruc'], $_POST['nomApell'], $_POST['telefono'], $_POST['razon'], $_POST['email'], $_POST['direccion']);
				$query_in_contri= "INSERT INTO CONTRIBUYENTE(TIPO_CONTRIBUYENTE, DNI, RUC, NOM_APELL_REPRE, TELEFONO, RAZON_SOCIAL, EMAIL, DIRECCION) VALUES (?,?,?,?,?,?,?, ?);";
			}
				
			$pst_in_contri=$conn->prepare($query_in_contri);
			$pst_in_contri->execute($par_in_contri);


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