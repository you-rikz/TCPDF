<?php
require "vendor/autoload.php";


$pdf=new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->AddPage();
$pdf->setFontSubsetting(true);
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


$html =  <<<EOD

<h1 style="text-align:right;" >My Information</h1>

<p style="text-align:right;">Name: Arnold Nicholas P. Lim</p>
<p style="text-align:right;">Program: BSIT</p>
<p style="text-align:right;">Email Add: lim.arnoldnicholas@auf.edu.ph</p>
<p style="text-align:right;">Student Number: 20-0813-704</p>


EOD;

$pdf->setPrintHeader(false);

$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
$img_file = K_PATH_IMAGES.'tcpdf.jpg';
$pdf->Image($img_file, 0, 0, 210, 300, '', '', '', false, 300, '', false, false, 0);
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('generate-info.pdf', 'I');