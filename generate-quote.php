<?php
require "vendor/autoload.php";


$pdf=new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
//     require_once(dirname(__FILE__).'/lang/eng.php');
//     $pdf->setLanguageArray($l);
// }
$pdf->AddPage();

$pdf->setFontSubsetting(false);

$pdf->SetFont('helvetica', 'B', 20);

$pdf->Write(0, 'Favorite Quotes', '', 0, 'C', 1, 0, false, false, 0);

$pdf->Ln(10);

$pdf->SetFont('pdfacourier', '', 15);

$pdf->MultiCell(0, 0, "The future belongs to those who believe in the beauty of their dreams. - Shoyo Hinata\n", 0, 'J', 0, 1, '', '', true, 0);

$pdf->Ln(6);

$pdf->SetFont('kozgopromedium', '', 15);

$pdf->MultiCell(0, 0, "Even if we are not confident that we will win, even if others tell us we do not stand a chance, we must never tell ourselves that. - Daichi\n", 0, 'J', 0, 1, '', '', true, 0);

$pdf->Ln(6);

$pdf->SetFont('msungstdlight', '', 15);

$pdf->MultiCell(0, 0, "Life is a bore if you do not challenge yourself. - Nishinoya\n", 0, 'J', 0, 1, '', '', true, 0);

$pdf->Ln(2);

$pdf->Output('example_033.pdf', 'I');