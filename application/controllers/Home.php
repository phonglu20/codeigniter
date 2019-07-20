<?php
    class Home extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->helper('common_helper');
            $this->load->helper('name_helper');
        }

        function index()
        {
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            //----------------------------------------Content_top--------------------------------------------
            //lay san pham giam gia
            $input = array();
            $input['where'] = array();
            $input['order']= array('ma','desc');
            $input['limit'] = array(6,0);
            $spmoi = $this->san_pham_model->get_list($input);
            $this->data['spmoi'] = $spmoi;
            //pre($spmoi_v5);

            // san pham giam gia
            $input['where']['giam_gia >'] = 0;
            $input['order']= array('giam_gia','desc');
            $input['limit'] = array(6,0);
            $spgiamgia = $this->san_pham_model->get_list($input);
            $this->data['spgiamgia'] = $spgiamgia;

            //san pham bán chạy
            $input['order']= array('so_lan_mua','desc');
            $input['limit'] = array(6,0);
            $spbanchay = $this->san_pham_model->get_list($input);
            $this->data['spbanchay'] = $spbanchay;
            //pre($spbanchay);

            //----------------------------------------Content_bot--------------------------------------------
            //---------------------------------Main board--------------------------------------------------
            //lay san pham moi
            $dieukien = 1;
            $this->db->select('loai_san_pham.ten as ten_loai,san_pham.*');
            $this->db->from('san_pham');
            $this->db->join('loai_san_pham','san_pham.ma_loai_san_pham= loai_san_pham.ma');
            $this->db->where(array('san_pham.ma_loai_san_pham ' => $dieukien));
            $this->db->limit(6,0);
            $this->db->order_by('ma','desc');
            $query = $this->db->get();
            $data = $query->result();
            $this->data['spmoi_m1'] = $data;

            //lay san pham giam gia
            $this->db->select('loai_san_pham.ten as ten_loai,san_pham.*');
            $this->db->from('san_pham');
            $this->db->join('loai_san_pham','san_pham.ma_loai_san_pham= loai_san_pham.ma');
            $this->db->limit(6,0);
            $this->db->where(array('san_pham.ma_loai_san_pham ' => $dieukien));
            $this->db->where(array('giam_gia >' => 0));
            $this->db->order_by('giam_gia','desc');
            $query = $this->db->get();
            $data = $query->result();
            $this->data['spgiamgia_m1'] = $data;
            //------------------------------------CPU------------------------------------------------
            //lay san pham moi
            $dieukien++;
            $this->db->select('loai_san_pham.ten as ten_loai,san_pham.*');
            $this->db->from('san_pham');
            $this->db->join('loai_san_pham','san_pham.ma_loai_san_pham= loai_san_pham.ma');
            $this->db->where(array('san_pham.ma_loai_san_pham ' => $dieukien));
            $this->db->limit(6,0);
            $this->db->order_by('ma','desc');
            $query = $this->db->get();
            $data = $query->result();
            $this->data['spmoi_c2'] = $data;

            //lay san pham giam gia
            $this->db->select('loai_san_pham.ten as ten_loai,san_pham.*');
            $this->db->from('san_pham');
            $this->db->join('loai_san_pham','san_pham.ma_loai_san_pham= loai_san_pham.ma');
            $this->db->limit(6,0);
            $this->db->where(array('san_pham.ma_loai_san_pham ' => $dieukien));
            $this->db->where(array('giam_gia >' => 0));
            $this->db->order_by('giam_gia','desc');
            $query = $this->db->get();
            $data = $query->result();
            $this->data['spgiamgia_c2'] = $data;
            //-------------------------------------RAM-----------------------------------------------
            //lay san pham moi
            $dieukien++;
            $this->db->select('loai_san_pham.ten as ten_loai,san_pham.*');
            $this->db->from('san_pham');
            $this->db->join('loai_san_pham','san_pham.ma_loai_san_pham= loai_san_pham.ma');
            $this->db->where(array('san_pham.ma_loai_san_pham ' => $dieukien));
            $this->db->limit(6,0);
            $this->db->order_by('ma','desc');
            $query = $this->db->get();
            $data = $query->result();
            $this->data['spmoi_r3'] = $data;
            
            //lay san pham giam gia
            $this->db->select('loai_san_pham.ten as ten_loai,san_pham.*');
            $this->db->from('san_pham');
            $this->db->join('loai_san_pham','san_pham.ma_loai_san_pham= loai_san_pham.ma');
            $this->db->limit(6,0);
            $this->db->where(array('san_pham.ma_loai_san_pham ' => $dieukien));
            $this->db->where(array('giam_gia >' => 0));
            $this->db->order_by('giam_gia','desc');
            $query = $this->db->get();
            $data = $query->result();
            $this->data['spgiamgia_r3'] = $data;
            //----------------------------------------HDD--------------------------------------------
            //lay san pham moi
            $dieukien++;
            $this->db->select('loai_san_pham.ten as ten_loai,san_pham.*');
            $this->db->from('san_pham');
            $this->db->join('loai_san_pham','san_pham.ma_loai_san_pham= loai_san_pham.ma');
            $this->db->where(array('san_pham.ma_loai_san_pham ' => $dieukien));
            $this->db->limit(6,0);
            $this->db->order_by('ma','desc');
            $query = $this->db->get();
            $data = $query->result();
            $this->data['spmoi_h4'] = $data;
            
            //lay san pham giam gia
            $this->db->select('loai_san_pham.ten as ten_loai,san_pham.*');
            $this->db->from('san_pham');
            $this->db->join('loai_san_pham','san_pham.ma_loai_san_pham= loai_san_pham.ma');
            $this->db->limit(6,0);
            $this->db->where(array('san_pham.ma_loai_san_pham ' => $dieukien));
            $this->db->where(array('giam_gia >' => 0));
            $this->db->order_by('giam_gia','desc');
            $query = $this->db->get();
            $data = $query->result();
            $this->data['spgiamgia_h4'] = $data;
            //----------------------------------------VGA--------------------------------------------
            //lay san pham moi
            $dieukien++;
            $input = array();
            $input['where'] = array();
            $input['order']= array('ma','desc');
            $input['limit'] = array(6,0);
            $input['where']['ma_loai_san_pham'] =$dieukien;
            $spmoi = $this->san_pham_model->get_list($input);
            $this->data['spmoi_v5'] = $spmoi;
            //pre($spmoi_v5);
            // san pham giam gia
            $input['where']['giam_gia >'] = 0;
            $input['order']= array('giam_gia','desc');
            $spgiamgia = $this->san_pham_model->get_list($input);
            $this->data['spgiamgia_v5'] = $spgiamgia;
            //----------------------------------------CASE--------------------------------------------
            //lay san pham moi
            $dieukien++;
            $input = array();
            $input['where'] = array();
            $input['order']= array('ma','desc');
            $input['limit'] = array(6,0);
            $input['where']['ma_loai_san_pham'] =$dieukien;
            $spmoi = $this->san_pham_model->get_list($input);
            $this->data['spmoi_c6'] = $spmoi;
            //pre($spmoi_v5);

            // san pham giam gia
            $input['where']['giam_gia >'] = 0;
            $input['order']= array('giam_gia','desc');
            $spgiamgia = $this->san_pham_model->get_list($input);
            $this->data['spgiamgia_c6'] = $spgiamgia;
            //----------------------------------------PSU--------------------------------------------
            //lay san pham moi
            $dieukien++;
            $input = array();
            $input['where'] = array();
            $input['order']= array('ma','desc');
            $input['limit'] = array(6,0);
            $input['where']['ma_loai_san_pham'] =$dieukien;
            $spmoi = $this->san_pham_model->get_list($input);
            $this->data['spmoi_p7'] = $spmoi;
            //pre($spmoi_v5);
            // san pham giam gia
            $input['where']['giam_gia >'] = 0;
            $input['order']= array('giam_gia','desc');
            $spgiamgia = $this->san_pham_model->get_list($input);
            $this->data['spgiamgia_p7'] = $spgiamgia;
            //----------------------------------------MONITOR--------------------------------------------
            //lay san pham moi
            $dieukien++;
            $input = array();
            $input['where'] = array();
            $input['order']= array('ma','desc');
            $input['limit'] = array(6,0);
            $input['where']['ma_loai_san_pham'] =$dieukien;
            $spmoi = $this->san_pham_model->get_list($input);
            $this->data['spmoi_m8'] = $spmoi;
            //pre($spmoi_v5);

            // san pham giam gia
            $input['where']['giam_gia >'] = 0;
            $input['order']= array('giam_gia','desc');
            $spgiamgia = $this->san_pham_model->get_list($input);
            $this->data['spgiamgia_m8'] = $spgiamgia;
            //----------------------------------------MOUSE--------------------------------------------
            //lay san pham moi
            $dieukien++;
            $input = array();
            $input['where'] = array();
            $input['order']= array('ma','desc');
            $input['limit'] = array(6,0);
            $input['where']['ma_loai_san_pham'] =$dieukien;
            $spmoi = $this->san_pham_model->get_list($input);
            $this->data['spmoi_m9'] = $spmoi;
            //pre($spmoi_v5);
            // san pham giam gia
            $input['where']['giam_gia >'] = 0;
            $input['order']= array('giam_gia','desc');
            $spgiamgia = $this->san_pham_model->get_list($input);
            $this->data['spgiamgia_m9'] = $spgiamgia;
            //----------------------------------------KEYBOARD--------------------------------------------
            //lay san pham moi 
            $dieukien++;
            $input = array();
            $input['where'] = array();
            $input['order']= array('ma','desc');
            $input['limit'] = array(6,0);
            $input['where']['ma_loai_san_pham'] =$dieukien;
            $spmoi = $this->san_pham_model->get_list($input);
            $this->data['spmoi_k10'] = $spmoi;
            //pre($spmoi_v5);
            // san pham giam gia
            $input['where']['giam_gia >'] = 0;
            $input['order']= array('giam_gia','desc');
            $spgiamgia = $this->san_pham_model->get_list($input);
            $this->data['spgiamgia_k10'] = $spgiamgia;
            // load view
            $this->data['temp'] = 'site/home/index';
            $this->load->view('site/layout', $this->data);
        }

    }
?>