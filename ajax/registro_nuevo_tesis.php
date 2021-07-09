<?php
 	session_start();
  	if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: login.php");
    exit;
        }

	if(empty($_POST['dni'])){
		$errors[]="DNI del bachiller vacío";
	}if(empty($_POST['codigo'])){
		$errors[]="Código del bachiller vacío";
	}if(empty($_POST['nombres'])){
		$errors[]="Nombres del bachiller vacío";
	}if(empty($_POST['apellidos'])){
		$errors[]="Apellidos del bachiller vacío";
	}else if(empty($_POST['titulo'])){
		$errors[]="Título de la tesis vacío";
	}else if(empty($_POST['escuela'])){
		$errors[]="Seleccione una escuela";
	}else if(empty($_POST['ciudad'])){
		$errors[]="Ciudad vacío";
	}else if(empty($_POST['fecha_sustentacion'])){
		$errors[]="Fecha de sustentación vacío";
	}else if (empty($_POST['presidente'])) {
		$errors[]="Nombres y apellidos del jurado presidente vacío";
	}else if (empty($_POST['miembro_1'])) {
		$errors[]="Nombres y apellidos del primer miembro vacío";
	}else if (empty($_POST['miembro_2'])) {
		$errors[]="Nombres y apellidos del segundo miembro vacío";
	}else if (empty($_POST['secretario'])) {
		$errors[]="Nombres y apellidos del secretario vacío";
	}else if (empty($_POST['asesor'])) {
		$errors[]="Nombres y apellidos del asesor vacío";
	}else {


	require_once("../servidor.php");


			$conn =null;
		try {
			$par_in_tesista= array($_POST['dni'], $_POST['codigo'], $_POST['nombres'], $_POST['apellidos'], $_POST['escuela'], $_SESSION['codigo'], $_SESSION['codigo']);

			$conn =new PDO($dir_server, $username, $password);
			
			$conn->beginTransaction();

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query_in_tesista= "INSERT INTO TESISTA(DNI, CODIGO, NOMBRES,APELLIDOS, ID_ESCUELA,CREADO_POR, MODIFICADO_POR ) VALUES (?,?,?,?,?,?,?);";
			$pst_in_alum=$conn->prepare($query_in_tesista);
			$pst_in_alum->execute($par_in_tesista);

			$query_se_ul_id_tesista="SELECT @@IDENTITY AS ID; ";
			//$query_se_ul_id_alum="SELECT MAX(COD_ALUMNO) AS COD_ALUMNO FROM T_ALUMNO; ";
			//$query_se_ul_id_alum="SELECT SCOPE_IDENTITY()  AS COD_ALUMNO"; 
			$pst_se_ul_id_tesista=$conn->prepare($query_se_ul_id_tesista);
			$pst_se_ul_id_tesista->execute();
			$nuev_cod_tesista=-1;
			if ($row = $pst_se_ul_id_tesista->fetch()) {
				$nuev_cod_tesista=$row['ID'];
			}

			$query_create_ses_tesis="INSERT INTO TESIS(ID_TESISTA, FECHA_SUST, TITULO,CIUDAD, NOM_APELL_JUR_P,NOM_APELL_JUR_M1, NOM_APELL_JUR_M2 , NOM_APELL_SECRE, NOM_APELL_ASESOR, CREADO_POR, MODIFICADO_POR ) VALUES (?,?,?,?,?,?,?,?,?,?,?);";

			$par_in_tesis= array($nuev_cod_tesista, $_POST['fecha_sustentacion'], $_POST['titulo'], $_POST['ciudad'], $_POST['presidente'],$_POST['miembro_1'],$_POST['miembro_2'],$_POST['secretario'],$_POST['asesor'], $_SESSION['codigo'], $_SESSION['codigo']);
			$pst_create_ses_tesis=$conn->prepare($query_create_ses_tesis);

			$pst_create_ses_tesis->execute($par_in_tesis);

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