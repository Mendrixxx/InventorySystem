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
	
		$stmt = $db->query('SELECT
		*
	FROM
		item AS i
		LEFT JOIN employee AS e ON (i.remarks = e.id)
	LEFT JOIN component AS c ON (i.item_id=c.item_id) order by i.item_id asc
	');
		
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
						$pdf->Cell(30, 10, $data->last_name,1,0,'L');
						$pdf->Ln();
						$pdf->Cell(25, 10, $data->comp_name, 1,0, 'L');
						$pdf->Cell(40, 10, '', 1,0, 'L');
						$pdf->Cell(35, 10, '', 1, 0, 'L');
						$pdf->Cell(30, 10, $data->c_date_aq, 1, 0, 'L');
						$pdf->Cell(25, 10, $data->c_unit_meas, 1, 0, 'L');
						$pdf->Cell(20, 10, $data->c_unit_val, 1, 0, 'L');
						$pdf->Cell(30, 10, $data->c_total_val, 1, 0, 'L');
						$pdf->Cell(37, 10, $data->c_quan_propcar, 1, 0, 'L');
						$pdf->Cell(37, 10, $data->c_quan_phycou,1,0,'L');
						$pdf->Cell(15, 10, $data->c_SO_quan,1,0,'L');
						$pdf->Cell(15, 10, $data->c_SO_val,1,0,'L');
						$pdf->Cell(30, 10, $data->last_name,1,0,'L');
						$pdf->Ln();
						$amount = $amount+$data->total_val;
						$total = $amount;
							
					}	$i += 1;
							
		}
		
		$pdf->Cell(175, 10, 'SUBTOTAL: ', 1, 0, 'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(30, 10, $total, 1, 0, 'L');
		$total = 0;
		$i = 0;

$pdf->Output();
?>
