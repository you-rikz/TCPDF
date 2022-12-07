<?php
require "vendor/autoload.php";
$pdf=new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$csv_file = 'worldpopulation.csv';
$handle = fopen($csv_file, 'r');
$row_index = 0; // initialize
$headers = [];
$data = [];

while (($row_data = fgetcsv($handle, 1000, ',')) !== FALSE)
{
	if ($row_index++ < 1)
	{
		foreach ($row_data as $col)
		{
			array_push($headers, $col);
		}
		continue;
	}

	$tmp = [];
	for ($index = 0; $index < count($headers); $index++)
	{
		$tmp[$headers[$index]] = $row_data[$index];
	}
	array_push($data, $tmp);
}
	// var_dump($data);
fclose($handle);

class PDF extends TCPDF
{
// Load data
function LoadData($csv_file)
{
    // Read file lines
    $lines = file($csv_file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(',',trim($line));
    return $data;
}

function BasicTable($headers, $data)
{
    // Headers
    foreach($headers as $col)
        $this->Cell(38,10,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $country_num = array_slice($row, 1, 1,true);

        foreach($row as $col)
            $this->Cell(38,38,$col,1);
            $x = $this->GetX();
				$y = $this->GetY();
			foreach($country_num as $num)
            $bar_code = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => true,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(0,0,0),
                'bgcolor' => false, //array(255,255,255),
                'text' => true,
                'font' => 'helvetica',
                'fontsize' => 8,
                'stretchtext' => 4
            );
        
             $qr_code = array(
                'border' => 2,
                'vpadding' => 'auto',
                'hpadding' => 'auto',
                'fgcolor' => array(0,0,0),
                'bgcolor' => false, //array(255,255,255)
                'module_width' => 1, // width of a single module in points
                'module_height' => 1 // height of a single module in points
            );
            // $this->Cell(0, 0, 'CODE 93 - USS-93', 0, 1);
            $this->write1DBarcode($num, 'C93', '', '', 38 , 38, 0.4, $bar_code, '');
            $this->write2DBarcode($num, 'QRCODE,L', $x+39, $y, 38, 38, $qr_code, '');
            $this->Ln();

    }

}
}
$pdf=new PDF();
// Column headings
$headers = array('#','Country', 'Population', 'BarCode', 'QR Code');
// Data loading
$data = $pdf->LoadData('worldpopulation.csv');
$pdf->SetFont('Helvetica','',14);
$pdf->AddPage();
$pdf->BasicTable($headers, $data);
$pdf->Output();
?>
