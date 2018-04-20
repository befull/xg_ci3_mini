<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#奖励管理控制器
class Jiangli extends JwjUser_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('pagination'); #引入分页类
		$this->load->helper('jwj_helper');
        $this->load->model('sqb_model');
	}
	#展示奖励添加页
	public function index(){
        $this->load->model('jl_model');
        $aid_get = $this->input->get('aid');

        if(isset($_POST['act_bc'])){
            $p = $this->input->post();
            #list($aid, $jz_id_arr, $zhm_arr, $kh_arr, $khh_arr, $sj_arr, $fpmx_arr, $jsxm_arr)
            $aid = $p['aid'];
            $zhm_arr = $p['zhm'];
            $kh_arr = $p['kh'];
            $khh_arr = $p['khh'];
            $sj_arr = $p['sj'];
            $fpmx_arr = $p['fpmx'];
            $jsxm_arr = $p['jsxm'];


            list($jz_info, $jl_ze) = $this->jl_model->get_js_xs_jl($aid);
            $sqb_up = ['jl_js'=>$jl_ze['js'], 'jl_xs'=>$jl_ze['xs'], 'jl_status'=>1, 'jl_jw_status'=>0, 'jl_add_time'=>date('Y-m-d H:i:s')];
            foreach($jz_info as $jz){
                $k = $jz->jz_id;

                $xsjl_ins = [];
                $xsjl_ins['xy'] = $jz->ssxy;
                $xsjl_ins['xm'] = $jz->xsxx;
                $xsjl_ins['jlje'] = $jz->xs_je;
                $xsjl_ins['zhhm'] = $zhm_arr[$k];
                $xsjl_ins['yhkh'] = $kh_arr[$k];
                $xsjl_ins['khh'] = $khh_arr[$k];
                $xsjl_ins['sjhm'] = $sj_arr[$k];
                $this->jl_model->update_xs_jl($xsjl_ins, $k);

                $js_jl_fp_arr = [];
                foreach($jsxm_arr[$k] as $kk=>$jsxm){
                    $js_jl_fp_arr[] = $fpmx_arr[$k][$kk];
                }
                $js_jl_fp = implode(',', $js_jl_fp_arr);

                #更新奖状中的总金额
                $this->db->update('jzxx', ['js_jl' => $jz->js_je, 'js_jl_fp'=>$js_jl_fp,'xs_jl' => $jz->xs_je], ['jz_id' => $k]);
            }

            #更新申请表中的总金额
            $this->db
                ->where(['aid' => $aid])
                ->update('sqb', $sqb_up);

            jwj_showsucc('保存成功！', site_url('Jiangli/my_list'));
        }


        $this->view_data['sq_arr'] = $this->sqb_model->get_my_unfin_sqb_select('jl');
        if($aid_get !== null){
            list($jz_info, $jl_ze) = $this->jl_model->get_js_xs_jl($aid_get);
            $this->view_data['jz_info'] = $jz_info;
            $this->view_data['jl_ze'] = $jl_ze;
            $this->view_data['aid'] = $aid_get;
        }

		$this->view_data['page_title']="添加奖励申请";
		$this->load->view('admin/add_edit_jl',$this->view_data);
	}

	#展示未通过的奖励信息
	public function list_wsh_jl(){
		$where=" jl_status ='1' and jl_jw_status= '0' or jl_jw_status = '-1' ";
        $where = [
            'jl_status' => 1,
            'jl_jw_status IN(0, -1)' => null
        ];
        list($search_where, $def) = get_search_where('ssmc', 'ssjb', 'ssxy', 'jsxm');
        $this->view_data['def'] = $def;
        $where = array_merge($where, $search_where);

        $page = $this->uri->segment(3,1);
        $per_page = get_app_config('admin_per_page');


        $count = $this->db
            ->from('sqb')
            ->where($where)
            ->count_all_results();
        $rs = $this->db
            ->where($where)
            ->order_by('aid DESC')
            ->get('sqb',$per_page,($page - 1)*$per_page)
            ->result();
        $this->view_data['list'] = $rs;


        $this->load->library('pagination');
        $config['base_url'] = site_url('Jiangli/list_wsh_jl');
        $config['total_rows'] = $count;
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $this->view_data['pageinfo'] = $this->pagination->create_links();
		
		
		$this->view_data['page_title']="未审核通过的奖励列表";
		$this->load->view('admin/list_sh_jl',$this->view_data);
		
	}
	#展示通过的奖励信息
	public function list_sh_jl(){
        $where = [
            'jl_status' => 1,
            'jl_jw_status >=' => 1
        ];
        list($search_where, $def) = get_search_where('ssmc', 'ssjb', 'ssxy', 'jsxm');
        $this->view_data['def'] = $def;
        $where = array_merge($where, $search_where);


		$page = $this->uri->segment(3,1);
        $per_page = get_app_config('admin_per_page');


        $count = $this->db
            ->from('sqb')
            ->where($where)
            ->count_all_results();
        $rs = $this->db
            ->where($where)
            ->order_by('aid DESC')
            ->get('sqb',$per_page,($page - 1)*$per_page)
            ->result();
        $this->view_data['list'] = $rs;


        $this->load->library('pagination');
        $config['base_url'] = site_url('Jiangli/list_sh_jl');
        $config['total_rows'] = $count;
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $this->view_data['pageinfo'] = $this->pagination->create_links();


        $this->view_data['page_title']="已审核奖励列表";
		$this->load->view('admin/list_sh_jl',$this->view_data);
		
	}

	# 教师端使用列表
	public function my_list(){
		$page = $this->uri->segment(3,1);
        $per_page = get_app_config('admin_per_page');

        $where_arr = [
            'jsgh' => $this->jwuser['id'],
            'jl_status' => 1
        ];

        $count = $this->db
            ->from('sqb')
            ->where($where_arr)
            ->count_all_results();
        $rs = $this->db
            ->where($where_arr)
            ->order_by('aid DESC')
            ->get('sqb',$per_page,($page - 1)*$per_page)
            ->result();
        $this->view_data['rs'] = $rs;


        $this->load->library('pagination');
        $config['base_url'] = site_url('Jiangli/my_list');
        $config['total_rows'] = $count;
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $this->view_data['pageinfo'] = $this->pagination->create_links();

		
		$this->view_data['page_title']="我的奖励申请";

		$this->load->view('my_list_jl',$this->view_data);	
	}

	#编辑 修改相关奖励信息
	public function edit_jl(){
        $this->load->model('jl_model');
        $aid_get = $this->input->get('aid');

        if(isset($_POST['act_bc'])){
            $p = $this->input->post();
            #list($aid, $jz_id_arr, $zhm_arr, $kh_arr, $khh_arr, $sj_arr, $fpmx_arr, $jsxm_arr)
            $aid = $aid_get;
            $zhm_arr = $p['zhm'];
            $kh_arr = $p['kh'];
            $khh_arr = $p['khh'];
            $sj_arr = $p['sj'];
            $fpmx_arr = $p['fpmx'];
            $jsxm_arr = $p['jsxm'];


            list($jz_info, $jl_ze) = $this->jl_model->get_js_xs_jl($aid);
            $sqb_up = ['jl_js'=>$jl_ze['js'], 'jl_xs'=>$jl_ze['xs'], 'jl_status'=>1, 'jl_jw_status'=>0, 'jl_add_time'=>date('Y-m-d H:i:s')];
            foreach($jz_info as $jz){
                $k = $jz->jz_id;

                $xsjl_ins = [];
                $xsjl_ins['xy'] = $jz->ssxy;
                $xsjl_ins['xm'] = $jz->xsxx;
                $xsjl_ins['jlje'] = $jz->xs_je;
                $xsjl_ins['zhhm'] = $zhm_arr[$k];
                $xsjl_ins['yhkh'] = $kh_arr[$k];
                $xsjl_ins['khh'] = $khh_arr[$k];
                $xsjl_ins['sjhm'] = $sj_arr[$k];
                $this->jl_model->update_xs_jl($xsjl_ins, $k);

                $js_jl_fp_arr = [];
                foreach($jsxm_arr[$k] as $kk=>$jsxm){
                    $js_jl_fp_arr[] = $fpmx_arr[$k][$kk];
                }
                $js_jl_fp = implode(',', $js_jl_fp_arr);

                #更新奖状中的总金额
                $this->db->update('jzxx', ['js_jl' => $jz->js_je, 'js_jl_fp'=>$js_jl_fp,'xs_jl' => $jz->xs_je], ['jz_id' => $k]);
            }

            #更新申请表中的总金额
            $this->db
                ->where(['aid' => $aid])
                ->update('sqb', $sqb_up);

            $jump_url = site_url('Jiangli/my_list');
            if($this->jwuser['js'] == 'gly') $jump_url = null;
            jwj_showsucc('保存成功！', $jump_url);
        }


        $this->view_data['sq_arr'] = $this->sqb_model->get_my_unfin_sqb_select('jl_subed');
        if($aid_get !== null){
            list($jz_info, $jl_ze) = $this->jl_model->get_js_xs_jl($aid_get);
            $this->view_data['jz_info'] = $jz_info;
            $this->view_data['jl_ze'] = $jl_ze;
            $this->view_data['aid'] = $aid_get;
            $this->view_data['sqb_str'] = $this->sqb_model->get_base_info($aid_get);
        }

        $this->view_data['is_edit']=1;
        $this->view_data['page_title']="修改奖励申请";
        $this->load->view('admin/add_edit_jl', $this->view_data);
	}


	#删除奖励信息
	public function delete_jl(){
		if(IS_GET){
			$aid=$_GET['aid'];

            $this->load->model('jl_model');
            $this->jl_model->delete($aid);


			if($_SESSION['JWJ']['js']=='gly'){
				jwj_showsucc("删除成功",site_url('Jiangli/list_sh_jl'));
			}else{
				jwj_showsucc("删除成功",site_url('Jiangli/my_list'));
			}
			
		}
	}



    #PDF 预览/打印
    public function prt(){
        if(IS_GET){
            $aid=$this->input->get('aid');

            $sqb_d = $this->db
                ->get_where('sqb', ['aid'=>$aid])
                ->row();
            $this->view_data['sqb_d'] = $sqb_d;


            $jz_d = $this->db
                ->get_where('jzxx', ['aid'=>$aid])->result();
            $js_jl_rs = $xs_jl_rs = [];
            $jz_info = [];
            foreach($jz_d as $jz){
                $tmp = $this->db
                    ->order_by('jid ASC')
                    ->get_where('jsjlb', ['jz_id'=>$jz->jz_id])
                    ->result();
                $js_jl_rs[] = $tmp;
                $tmp = $this->db
                    ->order_by('xid ASC')
                    ->get_where('xsjlb', ['jz_id'=>$jz->jz_id])
                    ->result();
                $xs_jl_rs[] = $tmp;
                $jz_info[$jz->jz_id] = $jz;
            }
            #$this->view_data['aid'] = $aid;
            $this->view_data['js_jl_rs'] = $js_jl_rs;
            $this->view_data['xs_jl_rs'] = $xs_jl_rs;
            $this->view_data['jz_info'] = $jz_info;



            $title = '[奖励申请表]';
            $TCPDF_dir = APPPATH.'third_party/TCPDF/';
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
            #todo 右侧加一个 网络审核通过的时间
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
            // create some HTML content
            $html = $this->load->view('admin/prt_jl_js',$this->view_data, true);
            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');

            // add a page
            $pdf->AddPage();
            // create some HTML content
            $html = $this->load->view('admin/prt_jl_xs',$this->view_data, true);
            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');

            //Close and output PDF document
            $pdf->Output($title.'.pdf', 'I');
        }
    }

	#预览奖励信息
	public function yl_jl(){
		if(IS_GET){
			$aid=$_GET['aid'];
			$fn=$_GET['fn'];
			$where['aid']=$aid;
			$this->view_data['jcxx']=$this->db->where('aid',$aid)->get('sqb')->result()[0];
			$this->view_data['xsjlb']=$this->db->where('aid',$aid)->get('xsjlb')->result();
			$this->view_data['xsjlb_size']=count($this->view_data['xsjlb'],1)+1;
			$this->view_data['jsjlb']=$this->db->where('aid',$aid)->get('jsjlb')->result();
			$this->view_data['jsjlb_size']=count($this->view_data['jsjlb'],1)+1;
			if($fn=='yl'){
				$this->view_data['page_title']="奖励申请预览";
				
			}else{
				$this->view_data['page_title']="奖励申请审核";
			}
			$this->view_data['fn']=$fn;

            $this->load->view('yl_jl',$this->view_data);
		
		}	
	}
	#审核相关相关奖励信息
	public function sh_jl(){
		if(IS_GET){
			$aid=$this->input->get('aid');
            $sh = $this->input->get('sh');

			//教务处审核
			if($sh=='tg'){
				$data['jl_jw_status']='1';
				$bool=$this->db->where('aid',$aid)->update('sqb',$data);
			}elseif($sh=='wtg'){
				$data['jl_jw_status']='-1';
				$bool=$this->db->where('aid',$aid)->update('sqb',$data);
			}

            $sqb_d = $this->db
                ->get_where('sqb', ['aid'=>$aid])
                ->row();
            $this->view_data['sqb_d'] = $sqb_d;


            $jz_d = $this->db
                ->get_where('jzxx', ['aid'=>$aid])->result();
            $js_jl_rs = $xs_jl_rs = [];
            $jz_info = [];
            foreach($jz_d as $jz){
                $tmp = $this->db
                    ->order_by('xid ASC')
                    ->get_where('xsjlb', ['jz_id'=>$jz->jz_id])
                    ->result();
                $xs_jl_rs[] = $tmp;
                $jz_info[$jz->jz_id] = $jz;
            }

            #$this->view_data['js_jl_rs'] = $js_jl_rs;
            $this->view_data['xs_jl_rs'] = $xs_jl_rs;
            $this->view_data['jz_info'] = $jz_info;


            $this->view_data['is_sh'] = 1;
            $this->view_data['page_title']="查看/审核奖励申请";
            $this->load->view('admin/sh_jl',$this->view_data);
			
			#jwj_showsucc("提交成功",site_url('Jiangli/list_wsh_jl'));
		}
	}


    #进行审核操作
    public function do_sh(){
        $aid = $this->input->get('aid');
        $act = $this->input->get('act');

        //教务处 管理员
        if($act=='pass'){
            $data = [
                'jl_jw_status' => 1
            ];
        }elseif($act=='fail'){
            $data = [
                'jl_jw_status' => -1
            ];
        }elseif($act=='done'){
            $data = [
                'jl_jw_status' => 2
            ];
        }
        $this->db->where('aid', $aid)->update('sqb', $data);

        jwj_showsucc('操作成功', xg_site_url('Jiangli/sh_jl', 'aid='.$aid.''));
    }

	#异步存储获奖学生的奖励情况
	public function ajax_xs_jl(){
		if(IS_AJAX){
		
			$data=$_POST['data'];
			$dt;	
			$i=0;
			$aid=$data['0']['aid'];
			$d['jltime']=date("Y-m-d h:i:s");
			$d['jl_jw_status']='0';
			$this->db->where('aid',$aid)->update('sqb',$d);
			foreach($data as $it){
				if(!array_key_exists('xid',$it)){
					//$it['sqsj']=date("Y-m-d");

					$this->db->insert('xsjlb',$it);
					$dt[$i]=$this->db->insert_id();
				}else{
					$this->db->where('xid',$it['xid'])->update('xsjlb',$it);
					$dt[$i]=$it['xid'];
				}
				
				$i++;
			}
			echo json_encode($dt);	
		}
	}

	#异步存储获奖教师的奖励情况
	public function ajax_js_jl(){
		if(IS_AJAX){
		
			$data=$_POST['data'];
			$dt;	
			$i=0;
			$d['jltime']=date("Y-m-d h:i:s");
			$aid=$data['0']['aid'];
			$d['jl_jw_status']='0';
			$this->db->where('aid',$aid)->update('sqb',$d);
			foreach($data as $it){
				if(!array_key_exists('jid',$it)){

					$this->db->insert('jsjlb',$it);
					$dt[$i]=$this->db->insert_id();
				}else{
					$this->db->where('jid',$it['jid'])->update('jsjlb',$it);
					$dt[$i]=$it['jid'];
				}
				
				$i++;
			}
			echo json_encode($dt);	
		}
	}
	#异步提交审核
	public function ajax_tj(){
		if(IS_AJAX){
			$aid=$_POST['aid'];
			//查询 数据库是否有录入奖励信息
			if(empty($this->db->where('aid',$aid)->get('jsjlb')->result())){
				echo json_encode("-1");
				return;
			}
			if(empty($this->db->where('aid',$aid)->get('xsjlb')->result())){
				echo json_encode("-1");
				return;
			}
			$data['jl_status']=1;
			$res;
			if($this->db->where('aid',$aid)->update('sqb',$data)){
				$res="1";	
			}else{
				$res="0";
			}
			echo json_encode($res);	
		}	
	}
	#下拉框改变事件 返回已添加信息
	public function ajax_aid_change(){
        $this->load->model('jl_model');

		if(IS_AJAX or 1){
            $aid= isset($_POST['aid']) ? $_POST['aid'] : $_GET['aid'];

			//查询 数据库是否有录入奖励信息
			#$data['jsjlb']=$this->db->where('aid',$aid)->get('jsjlb')->result();
			#$data['xsjlb']=$this->db->where('aid',$aid)->get('xsjlb')->result();

            #获取奖状信息
            $data = $this->db
                ->get_where('jzxx', ['aid' => $aid])
                ->result_array();
            $jjze = [
                'xs' => 0,
                'js' => 0
            ];
            foreach($data as &$d){
                $d['js_arr'] = exp_user_str($d['zdjs']);
                $d['xs_arr'] = exp_user_str($d['xsxx']);
                $d['xsxx'] = str_replace(',', '<br>', $d['xsxx']);

                $d['ttgr'] = count($d['xs_arr']) > 1 ? 'td' : 'gr';

                $jj = $this->jl_model->get_js_xs_er($d['ssjb'], $d['hdjx'], $d['ssmc']);

                #学生奖金金额
                $d['xs_jj'] = $jj['xs_je_'.$d['ttgr']];
                $jjze['xs'] += $d['xs_jj'];
                #教师奖金金额
                $d['js_jj'] = $jj['js_je_'.$d['ttgr']];
                $jjze['js'] += $d['js_jj'];
            }
            $ret = [
                $jjze, $data
            ];

            if(IS_GET) xgd($ret,1);

			echo json_encode($ret);
		}
	}
	#根据传来的xid 学生奖励信息数据
	public function ajax_delete_xid(){
		//$fyid=$_POST['fyid'];
		$xid=$this->input->post('xid');
		//echo $fyid;
		if($this->db->where('xid',$xid)->delete('xsjlb')){
			$dt['ms']=1;
			echo json_encode($dt);
		}else{
			$dt['ms']=0;
			echo json_encode($dt);
		}		
	}
	#根据传来的jid 教师奖励信息数据
	public function ajax_delete_jid(){
		//$fyid=$_POST['fyid'];
		$jid=$this->input->post('jid');
		//echo $fyid;
		if($this->db->where('jid',$jid)->delete('jsjlb')){
			$dt['ms']=1;
			echo json_encode($dt);
		}else{
			$dt['ms']=0;
			echo json_encode($dt);
		}		
	}
}