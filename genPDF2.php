<?php
	
	require "fpdf.php";
	$db = new PDO('mysql:host=localhost;dbname=inventory','root','');
	

class myPDF extends FPDF{
	function header(){
		//$this->Image('bulogo.png',10,6);//
		$this->SetFont('Times','B',14);
		$this->Cell(335, 5, 'REPORT ON THE PHYSICAL COUNT OF PROPERTY, PLANT AND EQUIPMENT',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','B',14);
		$this->Cell(335, 5, 'IT EQUIPMENT',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(335, 5, '(Type of Property, Plant and Equipment)',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(335, 5, 'As of ________(date) at BU College of Science',0,0,'C');
		$this->Ln(20);
		$this->SetFont('Times', 'B', 12);
		$this->Cell(0,5, 'Fund Cluster : ',0,0, '');
		$this->Ln();
		$this->SetFont('Times', 'B', 12);
		$this->Cell(0,5, 'For which ____________________________,______________________, BU College of Science is accountable, having assumed such accountability on ____________(date)',0,0, '');
		$this->Ln();
		$this->Ln();
		
	}

	function footer(){

		$this->SetFont('Times','B',10);
		/**$db = new PDO('mysql:host=localhost;dbname=inventory','root','');
		$query = "SELECT SUM(total_val) AS sum FROM 'item'";
		$query_result = msqli_query($db, $query);
		while($row = msqli_fetch_assoc($query_result));{
		$output = "= "."".$row('sum');
		}**/	
		$this->Cell(175, 8, 'SUBTOTAL: ',1,0,'L');
		$this->Cell(164, 8, 'amount', 1,0, 'L');
	}

	function headerTable(){
			$this->SetFont('Times','B',10);
			$this->Cell(25, 15, 'Name',1,0,'C');
			$this->Cell(40, 15, 'Description',1,0,'C');
			$this->Cell(35, 15, 'Property Number',1,0,'C');
			$this->Cell(30, 15, 'Date Acquired',1,0,'C');
			$this->SetFont('Times', 'B', 8);
			$this->Cell(25, 15, 'Unit of Measure',1,0,'C');
			$this->SetFont('Times','B',10);
			$this->Cell(20, 15, 'Unit Value',1,0,'C');
			$this->Cell(30, 15, 'Total Value',1,0,'C');
			$this->SetFont('Times', 'B', 8);
			$this->Cell(37, 15, "Quantity per\n Property Card",1,0,'C');
			$this->Cell(37, 15, 'Quantity per Physical Count',1,0,'C');
			$this->Cell(30, 8, 'Shortage/Overage',1,0,'C');
			//$this->Cell(0, 10, 'Quantity',0,1,'C');
			//$this->Cell(20, 20, 'Value',1,0,'C');
			$this->Cell(30, 15, 'Remarks',1,0,'C');
			$this->Ln();	
	}

	function hTable(){
			$this->SetFont('Times','B',10);
			$this->Cell(25, 0, '',0,0,'C');
			$this->Cell(40, 0, '',1,0,'C');
			$this->Cell(35, 0, '',1,0,'C');
			$this->Cell(30, 0, '',1,0,'C');
			$this->Cell(25, 0, '',1,0,'C');
			$this->Cell(20, 0, '',1,0,'C');
			$this->Cell(30, 0, '',1,0,'C');
			$this->Cell(37, 0, "",1,0,'C');
			$this->Cell(37, 0, '',1,0,'C');
			$this->SetFont('Times','B',9.5);
			$this->Cell(30, -7, 'Quantity | Value',1,0,'');
			//$this->Cell(0, 10, 'Quantity',0,1,'C');
			//$this->Cell(20, 20, 'Value',1,0,'C');
			$this->Cell(30, 0, '',1,0,'C');
			$this->Ln();

	}
	
	function viewTable($db){
		$this->SetFont('Times','',10);
		$stmt = $db->query('SELECT * from item WHERE classification = "2"');
		while($data = $stmt->fetch(PDO::FETCH_OBJ)){	
			$this->Cell(25, 10, $data->item_name,1,0,'L');
			$this->Cell(40, 10, $data->item_desc,1,0,'L');
			$this->Cell(35, 10, $data->property_num,1,0,'L');
			$this->Cell(30, 10, $data->date_aq,1,0,'L');
			$this->Cell(25, 10, $data->unit_meas,1,0,'L');
			$this->Cell(20, 10, $data->unit_val,1,0,'L');
			$this->Cell(30, 10, $data->total_val,1,0,'L');
			$this->Cell(37, 10, $data->quant_propcar,1,0,'L');
			$this->Cell(37, 10, $data->quant_phycou,1,0,'L');
			$this->Cell(15, 10, $data->SO_quant,1,0,'L');
			$this->Cell(15, 10, $data->SO_val,1,0,'L');
			$this->Cell(30, 10, $data->remarks,1,0,'L');
			$this->Ln();
		}

	}

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'Legal', 0);
$pdf->headerTable();
$pdf->htable();
$pdf->viewTable($db);
$pdf->Output();
