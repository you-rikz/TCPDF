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
        $this->Cell(35,10,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(35,10,$col,1);
			foreach 
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
