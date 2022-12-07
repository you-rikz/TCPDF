<?php
require "vendor/autoload.php";


$pdf=new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

// $pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('kozgopromedium', '', 8);

// NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="1" cellpadding="10" cellspacing="2" nobr="true">
 <tr>
  <th colspan="7" align="left" style="font-size:20px; background-color:#EAEDD5">JANUARY 2023</th>
 </tr>
 <tr align="center" style="font-size:15px; background-color:#E8F682;">
  <td>SUN</td>
  <td>MON</td>
  <td>TUE</td>
  <td>WED</td>
  <td>THU</td>
  <td>FRI</td>
  <td>SAT</td>
 </tr>
 <tr align="right"  style="font-size:17px; margin-bottom:20px;">
 <td style="height: 70px; vertical-align: top; background-color:#BB2649">1<p align="left"style="font-size:8px;">New Year's Day</p>
</td>

 <td style="height: 70px; vertical-align: top; background-color:#BB2649">2<p align="left"style="font-size:8px;">Special non-working day</p></td>
 <td>3</td>
 <td>4</td>
 <td>5</td>
 <td>6</td>
 <td style="color:red;">7</td>
 </tr>
 <tr align="right"  style="font-size:17px; margin-bottom:20px;">
 <td style="height: 70px; vertical-align: top; color:red;">8</td>
  <td>9</td>
  <td>10</td>
  <td>11</td>
  <td>12</td>
  <td>13</td>
  <td style="color:red;">14</td>
 </tr>
 <tr align="right"  style="font-size:17px; margin-bottom:20px;">
 <td style="height: 70px; vertical-align: top; color:red;">15</td>
 <td>16</td>
 <td>17</td>
 <td>18</td>
 <td>19</td>
 <td>20</td>
 <td style="color:red;">21</td>
 </tr>
 <tr align="right"  style="font-size:17px; margin-bottom:20px;">
 <td style="height: 70px; vertical-align: top; background-color:#BB2649;">22<p align="left"style="font-size:8px;">Lunar New Year's Day</p></td>
 <td>23</td>
 <td>24</td>
 <td>25</td>
 <td>26</td>
 <td>27</td>
 <td style="color:red;">28</td>
 </tr>
 <tr align="right"  style="font-size:17px; margin-bottom:20px;">
 <td style="height: 70px; vertical-align: top; color:red;">29</td>
 <td>30</td>
 <td>31</td>
 <td></td>
 <td></td>
 <td></td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->Output('example_048.pdf', 'I');