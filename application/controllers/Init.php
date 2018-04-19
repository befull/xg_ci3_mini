<?php
defined('BASEPATH') OR exit('No direct script access allowed');


#require(APPPATH.'vendor/autoload.php');
#use PhpOffice\PhpSpreadsheet\Spreadsheet;
#use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Init extends CI_Controller {

	#前端默认首页
	public function index()
	{
        if($_POST){

            $meta_data = $this->input->post();
            $this->session->set_userdata('meta_data', $meta_data);
            redirect('init/report_step2');
            return true;
        }
		$this->load->view('admin/report_1');
	}


    public function ajax_get_base_info(){
        $po_num = $this->input->get('po_num');

        $ret = $this->db->get_where('metadata', ['Po_Num'=>$po_num])->row();
        if($ret){
            unset($ret->Po_Num);
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($ret));
    }


    public function report_step2(){
        $meta_data = $this->session->userdata('meta_data');
        $this->view_data['md'] = $meta_data;


        #checklist
        $ck_rs = $this->db->get_where('checklist')->result();
        $ck_data = [];
        foreach($ck_rs as $v){
            $ck_data[$v->type][$v->id] = $v->name;
        }
        $this->view_data['ck_data'] = $ck_data;


        #is post
        if($_POST){
            $inp_Problem = $this->input->post('Problem');
            $inp_Measurement = $this->input->post('Measurement');
            $inp_Defect_QTY = $this->input->post('Defect_QTY');
            $base = $this->input->post('base');


            $ins_base = [
                'Po_Num' => $meta_data['Po_Num'],
                'metadata_id' =>$meta_data['id']
            ];
            $ins_base = array_merge($ins_base, $base);
            $this->db->insert('report', $ins_base);
            $report_id = $this->db->insert_id();
            $this->session->set_userdata('report_id', $report_id);

            foreach($inp_Problem as $k=>$pro){
                if(empty($pro)) continue;

                $ins_rep = [
                    'report_id' => $report_id,
                    'checklist_id' => $pro,
                    # 'checklist_name' => $report_id, # 这个冗余是否可以不用
                    'measurement' => $inp_Measurement[$k],
                    'defect_QTY' => $inp_Defect_QTY[$k]
                ];

                $this->db->insert('report_check', $ins_rep);
            }

            echo 'success!';
            return true;
        }



        $this->load->view('admin/report_2', $this->view_data);
    }

    public function view_pdf(){
        $report_id = $this->session->userdata('report_id');
        $this->view_data['report_id'] = $report_id;


        $this->load->view('admin/view_pdf', $this->view_data);
    }


    public function pdf(){
        $report_id = $this->input->get('id');

        $report = $this->db->get_where('report', ['id'=>$report_id])->row();
        $meta_data  = $this->db->get_where('metadata', ['id'=>$report->metadata_id])->row_array();
        $report_check_obj = $this->db->get_where('report_check', ['report_id'=>$report_id]);
        $report_check_rs = $report_check_obj->result();
        $checklist_ids = $report_check_obj->result_array_col('checklist_id');
        $checklist_rs = $this->db->where_in('id', $checklist_ids)->get('checklist')->result_key('id');

        $this->view_data['report'] = $report;
        $meta_data['QC_member'] = 'Joy';
        $this->view_data['md'] = $meta_data;
        $this->view_data['rc_rs'] = $report_check_rs;
        $this->view_data['c_rs'] = $checklist_rs;


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
        $html = $this->load->view('admin/report_pdf', $this->view_data, true);
        #echo $html;
        #return true;

        $pdf->writeHTML($html, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output($title . '.pdf', 'I');

    }

    public function down_excel(){
        
    }

    public function test(){

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');

        $writer = new Xlsx($spreadsheet);
        $writer->save(APPPATH.'/hello world.xlsx');
    }
}
