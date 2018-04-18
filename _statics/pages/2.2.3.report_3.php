<?php



$title = '#121233 >> Report';
$TCPDF_dir = './TCPDF/';
require_once($TCPDF_dir.'tcpdf_config_wzbc.php');
require_once($TCPDF_dir.'tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set font
#$pdf->SetFont('cid0cs', '', 13);#msungstdlight  stsongstdlight  cid0cs
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle($title);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set some language-dependent strings (optional)
if (@file_exists($TCPDF_dir.'/examples/lang/eng.php')) {
    require_once($TCPDF_dir.'/examples/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// add a page
$pdf->AddPage();
$html = '<table>
<tr>
    <td>1111</td>
    <td>2222</td>
    <td>3333</td>
</tr>
</table>';
$pdf->writeHTML($html, true, false, true, false, '');

// add a page
$pdf->AddPage();
$html = '
<table>
    <tr>
        <td>444</td>
        <td>55</td>
        <td>66</td>
    </tr>
</table>
';
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output($title.'.pdf', 'I');


?>