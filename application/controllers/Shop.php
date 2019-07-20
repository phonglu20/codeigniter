<?php
    class Shop extends MY_Controller
    {
    	function __construct()
        {
            parent::__construct();
            $this->load->model('san_pham_model');
            $this->load->helper('name_helper');
        }

        function lien_he()
        {
            $this->data['temp'] = 'site/shop/lien_he';
            $this->load->view('site/layout',$this->data);
        }

        function tat_ca_san_pham()
        {
            //-----------------------------------lay danh sach san pham-----------------------------------
            $this->load->model('san_pham_model');
            $total_rows = $this->san_pham_model->get_total();
            $this->data['total_rows'] = $total_rows;
            
            //-----------------------------------Lọc-----------------------------------
            $input = array();
            $phan_loai = $this->input->get('phan_loai');
            //pre($phan_loai);
            if($phan_loai == 'tang_dan')
                $input['order'] = array('don_gia','asc');
            elseif($phan_loai == 'giam_dan')
                $input['order'] = array('don_gia','desc');
            elseif($phan_loai == 'a-z')
                $input['order'] = array('ten','asc');
            elseif($phan_loai == 'z-a')
                $input['order'] = array('ten','desc');
            elseif($phan_loai == 'sp_cu')
                $input['order'] = array('ma','asc');
            elseif($phan_loai == 'ban_chay')
                $input['order'] = array('so_lan_mua','desc');
            elseif($phan_loai == 'giam_gia')
                $input['order'] = array('giam_gia','desc');
            else  
                $input['order'] = array('ma','desc');

            if(isset($phan_loai))
                $this->data['phan_loai'] = $phan_loai;
            else
                $phan_loai = 'sp_moi';

            //-----------------------------------load ra thu vien phan trang-----------------------------------
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows;// tong so dong
            $config['base_url'] = base_url('shop/tat_ca_san_pham/'); // link hien thi du lieu
            $config['per_page'] = 9; // so luong san pham hien thi tren 1 trang
            $config['uri__segment'] = 4; // phan doan hien thi ra so trang tren url. !
            $config['reuse_query_string'] = TRUE; //chuỗi truy vấn kết hơp phân trang -- tim_kiem/6?ma_loai=6&ma_nhasx=0

            $config['next_link'] = 'Next »';
            $config['prev_link'] = '« Prev';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            // khoi tao cac cau hinh cua phan trang
            $this->pagination->initialize($config);
            $segment = $this->uri->segment(3);
            $segment = intval($segment);
            //pre($segment);
            $input['limit'] = array($config['per_page'], $segment);
            //-----------------------------------end phan trang-----------------------------------

            //-----------------------------------san pham bán chạy-----------------------------------
            //$input['order']= array('so_lan_mua','desc');
            $Allsp = $this->san_pham_model->get_list($input);
            $this->data['list'] = $Allsp;

            $this->data['temp'] = 'site/shop/tat_ca_san_pham';
            $this->load->view('site/layout', $this->data);
        }

    }
?>