<?php 
	
	session_start();

  	if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: interfazPrincipal.php");
    exit;
     }

     require_once("../servidor.php");
     $id=$_GET['id'];

         try {
         
      $conn = new PDO($dir_server,  $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT ID,(SELECT RAZON_SOCIAL FROM CONTRIBUYENTE WHERE ID=ID_CONTRIBUYENTE ) AS RAZON_SOCIAL ,(SELECT NOM_APELL_REPRE FROM CONTRIBUYENTE WHERE ID=ID_CONTRIBUYENTE ) AS REPRES_LEGAL,(SELECT RUC FROM CONTRIBUYENTE WHERE ID=ID_CONTRIBUYENTE ) AS RUC,DIRECCION,ACTIVIDAD_ECONOMICA,(SELECT IF(TIPO_CONTRIBUYENTE=1, NOM_APELL_REPRE, RAZON_SOCIAL) FROM CONTRIBUYENTE WHERE ID=ID_CONTRIBUYENTE ) AS CONTRIBUYENTE, ACTIVIDAD_ECONOMICA, DIRECCION, TELEFONO, ZONIFICACION, COMPATIBILIDAD_DE_USO, NRO_EXPEDIENTE, NRO_RESOLUCION, ANCHO*LARGO AS AREA ,  FLOOR((ANCHO*LARGO)/2) AS AFORO,NRO_EXPEDIENTE, DATE(NOW()) AS FECHA_INSC,NRO_RESOLUCION, F_INICIAL, F_VENCIMIENTO, IF(ESTADO=0,'Inhabilitado','Habilitado') AS ESTADO_DOC   FROM TRAMITE WHERE ID=$id;");
      $stmt->execute();
      $contador=1;
      while($row = $stmt->fetch()){
      	//$pdf->Cell(20,6,$contador,1,0,'C');     
      	//$pdf->Cell(30,6,utf8_decode($curso['COD_CURSO']),1,0,'C');
      	//$pdf->Cell(70,6,utf8_decode($curso['NOM_CURSO']),1,0,'C');
      	//$pdf->Cell(70,6,utf8_decode(''),1,1,'C');
   		
      	//i]mnclude('');
		include('../fpdf/fpdf.php');
		//include('servidor.php');
		$pdf = new FPDF('L','mm','A4');
		$pdf->AddPage();

		$pdf->Image('img/comer.jpg',10,3,25);
		$pdf->Image('img/comer.jpg',265,3,25);
		$pdf->SetFont('Arial', 'B', 14.5);

		$pdf->Cell(285, 2, utf8_decode('MUNICIPALIDAD DITRITAL DE YANACANCHA - PASCO'),0,1,'C');
		$pdf->SetFont('Arial', 'B', 13);
		$pdf->Cell(290, 6, utf8_decode('GERENCIA DE DESARROLLO ECONOMICO'),0,1,'C');
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(290, 3, utf8_decode('SUB GERENCIA DE COMERCIALIZACIÓN'),0,1,'C');

		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(290, 5, utf8_decode('"Año de lucha contra la violencia hacia las mujeres y la erradicación del feminicidio "'),0,1,'C');
		$pdf->Line(40, 26, 280-20, 26);	
		$pdf->Line(40, 27, 280-20, 27);	
		$pdf->SetFont('Arial', 'B', 15);
		$pdf->Cell(300, 20, utf8_decode('LA GERENCIA DE DESARROLLO ECONÓMICO ATRAVES DE LA SUB GERENCIA DE'),0,1,'C');
		$pdf->SetFont('Arial', 'B', 15);
		$pdf->Cell(300, -5, utf8_decode('COMERCIALIZACIÓN CONCEDE LA:'),0,1,'C');

		$pdf->SetFont('Arial', 'B', 29);
		$pdf->Cell(280, 45, utf8_decode('LICENCIA DE FUNCIONAMIENTO'),0,1,'C');
		$pdf->SetFont('Arial', 'B', 15);
		$pdf->Cell(480, -45, utf8_decode('Numero:'),0,1,'C');
		
		$pdf->SetFont('Arial', 'B', 17);
		$pdf->Cell(280, 63, utf8_decode('NOMBRE O RAZON SOCIAL:_____________________________________________________'),0,1,'C');
		$pdf->SetFont('Arial', 'B', 17);
		$pdf->Cell(280, -43, utf8_decode('REPRESENTANTE LEGAL :______________________________________________________'),0,1,'C');
		$pdf->SetFont('Arial', 'B', 17);
		$pdf->Cell(110, 63, utf8_decode('RUC N° :____________________'),0,1,'C');
		$pdf->SetFont('Arial', 'B', 17);
		$pdf->Cell(375, -63, utf8_decode('DIRECCION :_______________________________________'),0,1,'C');

		$pdf->SetFont('Arial', 'B', 17);
		$pdf->Cell(280, 85, utf8_decode('GIRO DEL ESTABLECIMIENTO :___________________________________________________'),0,1,'C');

		$pdf->SetFont('Arial', 'B', 15);
		$pdf->Cell(215, -65, utf8_decode('ÁREA DESTINADA :_________ AFORO :__________ ESTABLECIMIENTO DE: '),0,1,'C');

		$pdf->Cell(30);
		$pdf->Ln(50);
		$pdf->SetXY(220, 107);
		//$pdf->AliasPages();
		$pdf->SetFillColor(235,235,235);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(20, 6, 'HASTA 100',1,0,'C',1);
		$pdf->Cell(20, 6, utf8_decode('100 A 500'),1,0,'C',1);
		$pdf->Cell(20, 6, utf8_decode('MAYOR DE 500'),1,1,'C',1);

		$pdf->SetXY(220, 112);
		$pdf->Cell(20, 6, '',1,0,'C',1);
		$pdf->Cell(20, 6, utf8_decode(''),1,0,'C',1);
		$pdf->Cell(20, 6, utf8_decode(''),1,1,'C',1);
		

		$pdf->SetFont('Arial', 'B', 15);
		$pdf->Cell(270, 15, utf8_decode('EXPEDIENTE N° :_____________ DEL :___________________ HORARIO: ______________________'),0,1,'C');

		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(140, 5, utf8_decode('Fecha de Expedición, Cerro de Pasco __________________'),0,1,'C');

		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(470, 15, utf8_decode('RESOLUCIÓN N° :______________'),0,1,'C');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(470, 0, utf8_decode('VIGENCIA :______________'),0,1,'C');

		//$pdf->SetFont('Arial', 'B', 12);
		//$pdf->Cell(485, 15, utf8_decode('VIGENCIA :_______________'),0,1,'C');


		$pdf->SetXY(20, 170);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(200, 0, utf8_decode('GERENCIA DE DESARROLLO ECONOMICO                   SUB GERENCIA DE COMERCIALIZACIÓN'),0,1,'C');

		


		$pdf->SetXY(20, 188);

		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode('NOTA:  ESTE CERTIFICADO DEBE EXHIBIRSE EN UN LUGAR VISIBLE'),0,1,'C');
		
		$pdf->SetXY(192, 64);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode("00".$row['ID']),0,1,'C');

		$pdf->SetXY(100, 71);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode($row['RAZON_SOCIAL']),0,1,'C');

		$pdf->SetXY(100, 80);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode($row['REPRES_LEGAL']),0,1,'C');

		$pdf->SetXY(3, 92);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode($row['RUC']),0,1,'C');

		$pdf->SetXY(130, 92);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode($row['DIRECCION']),0,1,'C');

		$pdf->SetXY(120, 103);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode($row['ACTIVIDAD_ECONOMICA']),0,1,'C');

		$pdf->SetXY(4, 113);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode($row['AREA']."m2"),0,1,'C');

		$pdf->SetXY(55, 113);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode($row['AFORO']),0,1,'C');

		$pdf->SetXY(3, 125);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode($row['NRO_EXPEDIENTE']),0,1,'C');

		$pdf->SetXY(65, 125);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode($row['F_INICIAL']),0,1,'C');

		$pdf->SetXY(150, 125);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode('08:00AM-08:00PM'),0,1,'C');


		$pdf->SetXY(35, 135);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode($row['FECHA_INSC']),0,1,'C');

		$pdf->SetXY(183, 145);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode($row['NRO_RESOLUCION']),0,1,'C');

		$pdf->SetXY(177, 152);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(160, 0, utf8_decode($row['F_VENCIMIENTO']),0,1,'C');

		//$pdf->SetXY(183, 160);
		//$pdf->SetFont('Arial', 'B', 12);
		//$pdf->Cell(160, 0, utf8_decode('CAMPO14'),0,1,'C');

		//$pdf->AliasPages();
		$pdf->SetFillColor(232,232,232);

		

		$pdf->OutPut();

		















   		$contador++;
      }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }finally{
	    $conn = null;

    }

	