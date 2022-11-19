<?php
require "vendor/autoload.php";


$pdf=new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->AddPage();
$pdf->setFontSubsetting(true);
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
$pdf->setJPEGQuality(75);


$html =  <<<EOD
<br><h1 style="text-align: center;" >AUF HISTORY</h1>
<p class="indent" > Angeles University Foundation, a non-stock, non-profit educational institution, was established on May 25, 1962 by Mr. Agustin P. Angeles, Dr. Barbara Y. Angeles, and family. In less than nine years, the Institution was granted University status on April 16, 1971 by the Department of Education, Culture and Sports.
</p>
<p class="indent">On December 4, 1975, the University was converted to a non-stock, non-profit educational foundation -- the Angeles couple and their children executed a Deed of Donation relinquishing their ownership. AUF was incorporated under Republic Act No. 6055, otherwise known as the Foundation Law, and became a tax-exempt institution approved by the Philippine government. All donations and bequests given to the AUF are tax deductible.
</p>
<p class="indent">On February 14, 1978, AUF was converted to a Catholic University. As the first Catholic university in Central Luzon, AUF ensures not only professional success but total development which is anchored on Christian education that is holistic, integrated and formative. On February 20, 1990, the five-storey, 125-bed AUF Medical Center was inaugurated which now serves as a private teaching, training and research hospital, the first ever in Central Luzon.
</p>

<style>
p.indent{
    text-indent:30px;
    text-align: justify;
}
</style>
EOD;

//$pdf->setPrintHeader(false);

//$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
//$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
//$pdf->SetAutoPageBreak(false, 0);
$img_file = K_PATH_IMAGES.'auf-logo.jpg';
$pdf->Image($img_file, 65, 13, 13, 20, '', 'https://www.auf.edu.ph/modules.php?n=Articles&t=history', '', true, 300, '', false, false,0, false, false, false);
//$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
//$pdf->setPageMark();
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('generate-history.pdf', 'I');