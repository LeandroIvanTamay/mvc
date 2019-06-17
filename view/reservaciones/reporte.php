<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	// Title
	$this->SetFont('Times','BI',18);
	$this->Cell(0,8,'Listado de Reservaciones',2,2,'C');
	$this->Ln(10);
	// Ensure table header is printed
	parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','root','','rest');
$pdf = new PDF();
$pdf->AddPage("L");
// First table: output all columns
$pdf->Table($link,'SELECT * FROM tamay');
$pdf->Image('logo1.png',10,2,-200);
$pdf->Output();
?>
