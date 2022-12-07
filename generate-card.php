<?php

require "vendor/autoload.php";

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set margins
$pdf->SetMargins(35, 10, 10, true);

$pdf->setPrintFooter(false);
$pdf->setPrintHeader(false);

$pdf->SetFont('helvetica', '', 18, '', true);

$pdf->AddPage('L', 'A4');

$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));



$style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', '' => '5,10', 'color' => array(255,));


$pdf->Rect(25, 20, 250, 170, 'DF', array('all' => $style3), array(217, 136, 128));



$green = array(30, 132, 73);
$lightb = array(104, 224, 254);
$violet = array(155, 89, 182 );


$style5 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(244, 208, 63));
$style7 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(169, 50, 38));
$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => $green);


$pdf->CoonsPatchMesh(0, 0, 25.5, 189.5, $lightb, $violet, $lightb, $violet);
$pdf->CoonsPatchMesh(25.5, 0, 275, 20.5, $lightb, $violet, $lightb, $violet);
$pdf->CoonsPatchMesh(274.5, 20.5, 25.5, 195, $lightb, $violet, $lightb, $violet);
$pdf->CoonsPatchMesh(0, 189.5, 274, 25.5, $lightb, $violet, $lightb, $violet);

$pdf->SetFont('helvetica', 'BI', 41, '', false);
$pdf->SetTextColor(255);
$pdf->Cell(230, 100, 'Wishing you the happiest holidays', 0, 0, 'C', 0, '', 0);
$pdf->SetFont('pdfacourier', 'BI', 55, '', false);
$pdf->Ln(0);
$pdf->Cell(20, 160,  '                 and', 0, false, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Ln(0);
$pdf->SetFont('helvetica', 'BI', 45, '', false);
$pdf->Text(35, 115, 'a wonderful New Year in 2023!');


$pdf->SetLineStyle($style5);

$pdf->StarPolygon(190, 90, 15, 12, 5);
$pdf->StarPolygon(100, 90, 15, 12, 5);
$pdf->StarPolygon(240, 160, 20, 13, 5);
$pdf->StarPolygon(146, 160, 20, 13, 5);
$pdf->StarPolygon(60, 160, 20, 13, 5);
$pdf->StarPolygon(145, 38, 15, 5, 2, 35, 5, null, array('all' => $style5), null, null, $style6);
$pdf->StarPolygon(100,90, 7, 12, 5, 45, 0, 'DF', array('all' => $style7), array(39, 174, 96), 'F', array(255, 200, 200));
$pdf->StarPolygon(190, 90, 7, 12, 5, 45, 0, 'DF', array('all' => $style7), array(39, 174, 96), 'F', array(255, 200, 200));
$pdf->StarPolygon(240, 160, 10, 16, 5, 59, 0, 'DF', array('all' => $style7), array(39, 174, 96), 'F', array(255, 200, 200));
$pdf->StarPolygon(146, 160, 10, 16, 5, 59, 0, 'DF', array('all' => $style7), array(39, 174, 96), 'F', array(255, 200, 200));
$pdf->StarPolygon(60, 160, 10, 16, 5, 59, 0, 'DF', array('all' => $style7), array(39, 174, 96), 'F', array(255, 200, 200));


$pdf->Ln(0);


$pdf->Output('generate-card.php', 'I');