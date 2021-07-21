<?php
	
	require "fpdf.php";
	$db = new PDO('mysql:host=localhost;dbname=inventory','root','');

class PDF_MC_Table extends FPDF{
	
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
	
	
}

$pdf = new PDF_MC_Table();

$pdf->AliasNbPages();
$pdf->AddPage('L', 'Legal', 0);
		
		$pdf->SetFont('Times','',10);
		$amount = 0;
		$total = 0;
		$max = 11; 
		$i = 0;
	
		$stmt = $db->query('SELECT * from item order by classification');
		
		while($data = $stmt->fetch(PDO::FETCH_OBJ)){
			
			if($i != $max){
		
						$pdf->Cell(25, 10, $data->item_name,1,0,'L');
						$pdf->Cell(40, 10, $data->item_desc,1,0,'L');
						$pdf->Cell(35, 10, $data->property_num,1,0,'L');
						$pdf->Cell(30, 10, $data->date_aq,1,0,'L');
						$pdf->Cell(25, 10, $data->unit_meas,1,0,'L');
						$pdf->Cell(20, 10, $data->unit_val,1,0,'L');
						$pdf->Cell(30, 10, $data->total_val,1,0,'L');
						$pdf->Cell(37, 10, $data->quant_propcar,1,0,'L');
						$pdf->Cell(37, 10, $data->quant_phycou,1,0,'L');
						$pdf->Cell(15, 10, $data->SO_quant,1,0,'L');
						$pdf->Cell(15, 10, $data->SO_val,1,0,'L');
						$pdf->Cell(30, 10, $data->remarks,1,0,'L');
						$pdf->Ln();
						$amount = $amount+$data->total_val;
						$total = $amount;
							
					}	$i += 1;
							
		}
		
		$pdf->Cell(175, 10, 'SUBTOTAL: ', 1, 0, 'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(30, 10, $total, 1, 0, 'L');
		$pdf->Ln();
		$total = 0;
		$i = 0;
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(50, 10, 'Prepared by: ', 0, 0, 'L');
		$pdf->Cell(50, 10, 'Noted by: ', 0, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(40, 25, 'AGNES R. CARO ', 0, 0, 'L');
		$pdf->Cell(40, 25, 'PRITZIE S. REY ', 0, 0, 'R');
		$pdf->Cell(90, 25, 'CHAIRMAINE GRACE H. CABIRIA ', 0, 0, 'R');
		$pdf->Cell(70, 25, 'LUIS E. CAMACHO ', 0, 0, 'R');
		$pdf->Ln();
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(40, 0, 'Supply Officer ', 0, 0, 'L');
		$pdf->Cell(50, 0, 'Chairman Inventory Committee ', 0, 0, 'C');
		$pdf->Cell(90, 0, 'Member ', 0, 0, 'C');
		$pdf->Cell(85, 0, 'Member', 0, 0, 'C');
		$pdf->Ln();
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(140, 15, 'Recommending Approval: ', 0, 0, 'R');
		$pdf->Cell(160, 15, 'Approved by: ', 0, 0, 'R');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(140, 20, 'JOCELYN E. SERRANO', 0, 0, 'R');
		$pdf->Cell(80, 20, 'ATTY JOSEPH L. BARTOLATA', 0, 0, 'R');
		$pdf->Cell(160, 20, 'DR. ARNULFO M. MARCARIÑAS', 0, 0, 'C');
		$pdf->Ln();
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(120, 0, 'Dean', 0, 0, 'R');
		$pdf->Cell(100, 0, 'VP for Administration and Finance', 0, 0, 'R');
		$pdf->Cell(160, 0, 'SUC President IV', 0, 0, 'C');
		$pdf->Ln();

$pdf->Output();
?>
