<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require(APPPATH.'vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Init extends CI_Controller {

	#前端默认首页
	public function index()
	{
		$this->load->view('front/init_index');
	}


    public function pdf(){
        $id = $this->input->get('id');


        $title = 'Demo';
        $TCPDF_dir = APPPATH . 'third_party/TCPDF/';
        require_once($TCPDF_dir . 'tcpdf_config_wzbc.php');
        require_once($TCPDF_dir . 'tcpdf.php');

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set font
        $pdf->SetFont('msyh', '', 12);#msungstdlight  stsongstdlight  cid0cs msyh
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
        if (@file_exists($TCPDF_dir . '/examples/lang/eng.php')) {
            require_once($TCPDF_dir . '/examples/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // add a page
        $pdf->AddPage();
        $html = $this->load->view('pdf', '', true);
        $pdf->writeHTML($html, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output($title . '.pdf', 'I');

    }

    public function test(){

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');

        $writer = new Xlsx($spreadsheet);
        $writer->save(APPPATH.'/hello world.xlsx');
    }
}
