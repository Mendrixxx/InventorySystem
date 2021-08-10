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
			$this->Cell(10, 15, 'Art',1,0,'C');
			$this->Cell(55, 15, 'Description',1,0,'C');
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

require 'tryPDF2.php';

$pdf->AliasNbPages();
$pdf->AddPage('L', 'Legal', 0);
		
		$pdf->SetFont('Times','',10);
		$amount = 0;
		$total = 0;
		$max = 11; 
		$i = 0;
	
		
		foreach($summary as $val){
			$pdf->Cell(10, 10, "",1,0,'L');
			$pdf->SetFont('Times','',9);
			$pdf->Cell(55, 10, "LABORATORY EQUIPMENT - ".$val['year'],1,0,'L');
			$pdf->SetFont('Times','',10);
			$pdf->Cell(35, 10, "",1,0,'L');
			$pdf->Cell(30, 10, "",1,0,'L');
			$pdf->Cell(25, 10, "",1,0,'L');
			$pdf->Cell(20, 10, "",1,0,'L');
			$pdf->Cell(30, 10, $val['total'],1,0,'L');
			$pdf->Cell(37, 10, "",1,0,'L');
			$pdf->Cell(37, 10, "",1,0,'L');
			$pdf->Cell(15, 10,"" ,1,0,'L');
			$pdf->Cell(15, 10, "",1,0,'L');
			$pdf->Cell(30, 10, "",1,0,'L');
			$pdf->Ln();
						$amount = $amount+$val['total'];
						$total = $amount;
					
		}
		
		$pdf->Cell(10, 10, '', 1, 0, 'L');
$pdf->SetFont('Times','B',10);
$pdf->Cell(55, 10, 'SUB TOTAL ', 1, 0, 'L');
		$pdf->SetFont('Times','B',10);
		
		$pdf->Cell(35, 10, '',1,0,'C');
			$pdf->Cell(30, 10, '',1,0,'C');
			$pdf->Cell(25, 10, '',1,0,'C');
			$pdf->Cell(20, 10, '',1,0,'C');
			$pdf->Cell(30, 10, $total, 1, 0, 'L');
			$pdf->Cell(37, 10, "",1,0,'C');
			$pdf->Cell(37, 10, '',1,0,'C');
			$pdf->Cell(15, 10, '',1,0,'');
			$pdf->Cell(15, 10, '',1,0,'');
			$pdf->Cell(30, 10, '',1,0,'C');
		$pdf->Ln();
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
