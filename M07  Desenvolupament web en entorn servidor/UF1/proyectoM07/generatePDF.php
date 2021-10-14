<?php
require('fpdf183/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {

        $this->SetFont('Arial', 'B', 15);
        $this->Cell(80);
        $this->Cell(40, 10, 'Statistics', 1, 0, 'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

if (isset($_POST["inform"])) {
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', '', 16);
    $pdf->Cell(0, 10, 'Results from test:', 0, 1);
    $pdf->Cell(0, 10, ' -' . $_POST["ok"], 0, 1);
    $pdf->Cell(0, 10, ' -' . $_POST["fail"], 0, 1);
    $pdf->Output();
}
