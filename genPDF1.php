<?php
	
	require "fpdf.php";
	include './backend/conn.php';

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

require 'try.php';

$pdf->AliasNbPages();
$pdf->AddPage('L', 'Legal', 0);
		
$pdf->SetFont('Times','',10);
$amount = 0;
$total = 0;
$max = 11; 
$i = 0;

$data1 = [];
	$data1 = "";
foreach($items as $val){
	

	if($data1 == $val['item_name']) {
			
		
		$pdf->Cell(100, 10, $val['comp_name'],1,0,'L');
		$pdf->Cell(30, 10, $val['c_date_aq'],1,0,'L');
		$pdf->Cell(25, 10, $val['c_unit_meas'],1,0,'L');
		$pdf->Cell(20, 10, $val['c_unit_val'],1,0,'L');
		$pdf->Cell(30, 10, $val['c_total_val'],1,0,'L');
		$pdf->Cell(37, 10, $val['c_quan_propcar'],1,0,'L');
		$pdf->Cell(37, 10, $val['c_quan_phycou'],1,0,'L');
		$pdf->Cell(15, 10,$val['c_SO_quan'] ,1,0,'L');
		$pdf->Cell(15, 10, $val['c_SO_val'],1,0,'L');
		$pdf->Cell(30, 10, "",1,0,'L');
		$pdf->Ln();
		$data1 = $val['item_name'];
	} else {
		
		$pdf->Cell(25, 10, $val['item_name'],1,0,'L');
		$pdf->Cell(40, 10, $val['item_desc'],1,0,'L');
		$pdf->Cell(35, 10, $val['property_num'],1,0,'L');
		$pdf->Cell(30, 10, $val['date_aq'],1,0,'L');
		$pdf->Cell(25, 10, $val['unit_meas'],1,0,'L');
		$pdf->Cell(20, 10, $val['unit_val'],1,0,'L');
		$pdf->Cell(30, 10, $val['total_val'],1,0,'L');
		$pdf->Cell(37, 10, $val['quant_propcar'],1,0,'L');
		$pdf->Cell(37, 10, $val['quant_phycou'],1,0,'L');
		$pdf->Cell(15, 10,$val['SO_quant'] ,1,0,'L');
		$pdf->Cell(15, 10, $val['SO_val'],1,0,'L');
		$pdf->Cell(30, 10, $val['last_name'],1,0,'L');
		$pdf->Ln();	

		$pdf->Cell(100, 10, $val['comp_name'],1,0,'L');
		$pdf->Cell(30, 10, $val['c_date_aq'],1,0,'L');
		$pdf->Cell(25, 10, $val['c_unit_meas'],1,0,'L');
		$pdf->Cell(20, 10, $val['c_unit_val'],1,0,'L');
		$pdf->Cell(30, 10, $val['c_total_val'],1,0,'L');
		$pdf->Cell(37, 10, $val['c_quan_propcar'],1,0,'L');
		$pdf->Cell(37, 10, $val['c_quan_phycou'],1,0,'L');
		$pdf->Cell(15, 10,$val['c_SO_quan'] ,1,0,'L');
		$pdf->Cell(15, 10, $val['c_SO_val'],1,0,'L');
		$pdf->Cell(30, 10, "",1,0,'L');
		$pdf->Ln();
		$data1 = $val['item_name'];
	}
				$amount = $amount+$val['total_val'];
				$total = $amount;
			
}
$pdf->Cell(175, 10, 'SUBTOTAL: ', 1, 0, 'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(30, 10, $total, 1, 0, 'L');
		$pdf->Ln();
		$total = 0;
		$i = 0;

$pdf->Output();
?>
