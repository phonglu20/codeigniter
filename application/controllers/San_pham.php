<?php
    class San_pham extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('san_pham_model');
            $this->load->helper('name_helper');
        }

        function loai_san_pham()
        {
            //  lay ra id danh muc san pham
            $id_loai = intval($this->uri->rsegment('3'));
            //lay ra thong tin cua the loai
            $this->load->model('loai_san_pham_model');
            $loai_info = $this->loai_san_pham_model->get_info($id_loai);
            if(!$loai_info)
            {
                redirect();
            }
            $input = array();
            $input['where'] = array('ma_loai_san_pham' => $id_loai);

            //-----------------------------------Lọc cấu hình -----------------------------------
            /*$this->db->select('cau_hinh');
            $this->db->from('san_pham');
            $this->db->where(array('san_pham.ma_loai_san_pham ' => $id_loai));
            $query = $this->db->get();
            $data = $query->result();
            $data = json_encode($data);
            $data = preg_replace('([\s]+)', ' ', $data);
            $data = json_decode($data);
            $key = $this->input->get('cauhinh');
            $key = trim($key);
            $this->db->like('cau_hinh',$key);
            $this->data['loc_cau_hinh'] = $data;
            */
            
            //$this->data['key'] = trim($key);

            $key = $this->input->get('cauhinh');
            if($key)
            {
                $key = trim($key);
                $input['like'] = array('cau_hinh',$key);
            }
            
            /*
            $data = implode($data);
            pre($data);
            $data = explode (' ', $data); // chuyển một chuỗi $string thành một mảng các phần tử với ký tự tách mảng
            ;*/
             
            //-----------------------------------Lọc-----------------------------------
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
            //-----------------------------------lay tổng san pham-----------------------------------
            $total_rows = $this->san_pham_model->get_total($input);
            $this->data['total_rows'] = $total_rows;

            //-----------------------------------load ra thu vien phan trang-----------------------------------
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows;// tong so dong
            $config['base_url'] = base_url('san-pham/danh-muc/'.seoname($loai_info->ten).'/'.$id_loai); // link hien thi du lieu
            $config['per_page'] = 6; // so luong san pham hien thi tren 1 trang
            $config['uri__segment'] = 5; // phan doan hien thi ra so trang tren url. 
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
            $segment = $this->uri->segment(5); # Lấy offset
            $segment = intval($segment);
            //pre($segment);
            $input['limit'] = array($config['per_page'], $segment);
            //----------------------------------------------------------------------------------
            
            $list = $this->san_pham_model->get_list($input);
            //pre($this->db->last_query($list));
            $this->data['list'] = $list;
            $this->data['temp'] = 'site/san_pham/loai_san_pham';
            $this->load->view('site/layout', $this->data);
        }

        function chi_tiet_san_pham()
        {
            $id_san_pham = $this->uri->rsegment('3');
            $id_san_pham = intval($id_san_pham);
            $sp_info = $this->san_pham_model->get_info($id_san_pham);

            $this->data['san_pham_info'] = $sp_info;
            //---------------------------------- danh sách sản phẩm liên quan ----------------------------------
            $input['where'] = array(
                'ma !=' => $id_san_pham,
                'ma_loai_san_pham' => $sp_info->ma_loai_san_pham,
            );
            $input['limit']= array(3,0);
            $input['order']= array('ma','random');
            $list = $this->san_pham_model->get_list($input);
            $this->data['list'] = $list;

            //-----------------------------------Đánh giá sao -----------------------------------
            if($this->input->post())
            {
                $sao = $this->input->post('danhgia');
                $so_sao_post = substr($sao,0,1);// cắt chuổi từ vị trí thứ 0 đến 1
                $ma_sp = substr($sao,2); // cắt chuổi từ vị trí thứ 2 đến hết
                $sp_info = $this->san_pham_model->get_info($ma_sp);
                $so_sao_moi = ($sp_info->sao + $so_sao_post)/2;
                //$so_sao_moi = intval($so_sao_moi);
                //pre($so_sao_moi);
                $data = array(
                        'sao' => $so_sao_moi,
                    );
                $this->san_pham_model->update($ma_sp,$data);
            }

            //---------------------------------- cap nhat lai luot xem cua san pham ----------------------------------
            $data = array();
            $data['luot_xem'] = $sp_info->luot_xem + 1;
            $this->san_pham_model->update($sp_info->ma, $data);

            //---------------------------------- load view ----------------------------------
            $this->data['temp'] = 'site/san_pham/chi_tiet_san_pham';
            $this->load->view('site/layout', $this->data);
        }

        function nha_san_xuat()
        {
            //lay ra id danh muc san pham
            $id_nhasx = intval($this->uri->rsegment('3'));
            //lay ra thong tin cua the loai
            $this->load->model('nha_san_xuat_model');
            $nhasx_info = $this->nha_san_xuat_model->get_info($id_nhasx);
            if(!$nhasx_info)
            {
                redirect();
            }
            $input = array();
            $input['where'] = array('ma_nha_san_xuat' => $id_nhasx);

            //----------------------------------lay danh sach san pham----------------------------------
            $this->load->model('san_pham_model');
            $total_rows = $this->san_pham_model->get_total($input);
            $this->data['total_rows'] = $total_rows;
            
            //---------------------------------- load ra thu vien phan trang ----------------------------------
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows;// tong so dong
            $config['base_url'] = base_url('san-pham/nha-san-xuat/'.seoname($nhasx_info->ten).'/'.$id_nhasx); // link hien thi du lieu
            $config['per_page'] = 6; // so luong san pham hien thi tren 1 trang
            $config['uri__segment'] = 5; // phan doan hien thi ra so trang tren url. !
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
            $segment = $this->uri->segment(5);
            $segment = intval($segment);
            //pre($segment);

            $input['limit'] = array($config['per_page'], $segment);
            //----------------------------------------------------------------------------------------------------

            $list = $this->san_pham_model->get_list($input);
            //pre($this->db->last_query($list));
            $this->data['list'] = $list;
            $this->data['temp'] = 'site/san_pham/nha_san_xuat';
            $this->load->view('site/layout', $this->data);
        }

       function tim_kiem()
       {
            if($this->uri->rsegment('3') == 1)
            {
                // lay du lieu tu auto tim kiem (autocomplete)
                $key = $this->input->get('term');
            }
            else
            {
                $key = $this->input->get('key-search');
            }
            //--------------------------------tìm kiếm theo tên--------------------------------
            $this->data['key'] = trim($key);//trim xoa khoảng trống
            $input = array();
            $input['like'] = array('ten', $key);
            
            //--------------------------------tìm kiếm theo loại--------------------------------
            $loaisp = $this->input->get('ma_loai');
            $loaisp = intval($loaisp);
            $input['where'] = array();
            if($loaisp > 0)
            {
                $input['where']['ma_loai_san_pham'] = $loaisp;
            }

            //--------------------------------tìm kiếm theo nha sản xuất--------------------------------
            $nhasx = $this->input->get('ma_nhasx');
            $nhasx = intval($nhasx);
            if($nhasx > 0)
            {
                $input['where']['ma_nha_san_xuat'] = $nhasx;
            }

            //--------------------------------tổng số sản phẩm tìm đc--------------------------------
            $total_rows = $this->san_pham_model->get_total($input);
            $this->data['total_rows'] = $total_rows;

            //---------------------------------- load ra thu vien phan trang ----------------------------------
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows;// tong so dong
            $config['base_url'] = base_url('san_pham/tim_kiem/'); // link hien thi du lieu
            $config['per_page'] = 6; // so luong san pham hien thi tren 1 trang
            $config['uri__segment'] = 3; // phan doan hien thi ra so trang tren url. !
            $config['reuse_query_string'] = TRUE; //chuỗi truy vấn kết hơp phân trang -- tim_kiem/6?ma_loai=6&ma_nhasx=0
            $config['suffix'] = ('?ma_loai='.$loaisp.'&ma_nhasx='.$nhasx.'&key-search='.$key.'&but=');
            $config['first_url'] = $config['base_url'].$config['suffix'];

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

            //$config['reuse_query_string'] = FALSE;
            //$config['use_global_url_suffix'] = TRUE;
            //$config['page_query_string'] = TRUE;
            
            //khoi tao cac cau hinh cua phan trang
            $this->pagination->initialize($config);
            $segment = $this->uri->segment(3);
            //pre($segment);
            $segment = intval($segment);
            //pre($segment);

            $input['limit'] = array($config['per_page'], $segment);
            //----------------------------------------------------------------------------------------------------
            $list = $this->san_pham_model->get_list($input);
            $this->data['list'] = $list;
            //--------------------------------auto tim kiem--------------------------------
            if($this->uri->rsegment('3') == 1)
            {
                // auto tim kiem
                $result = array();
                foreach ($list as $row)
                {
                    $item = array();
                    $item['id'] = $row->ma;
                    $item['label'] = $row->ten;
                    $item['value'] = $row->ten;
                    $result[] = $item;
                }
                // du lieu tra ve duoi dang json
                die(json_encode($result));  
            }
            else
            {
                //---------------------------------- load view ----------------------------------
                $this->data['temp'] = 'site/san_pham/tim_kiem';
                $this->load->view('site/layout', $this->data);
            }
        }

        function tim_theo_gia()
        {
            $price_from = $this->input->get('price_from');
            $price_to = $this->input->get('price_to');
           
            $input = array();
            $input['where'] = array(
                'don_gia >= ' => $price_from,
                'don_gia <= ' => $price_to,
            );
            $input['order'] = array('don_gia','asc');

            //--------------------------------tổng số sản phẩm tìm đc--------------------------------
            $total_rows = $this->san_pham_model->get_total($input);
            $this->data['total_rows'] = $total_rows;

            //---------------------------------- load ra thu vien phan trang ----------------------------------
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows;// tong so dong
            $config['base_url'] = base_url('san_pham/tim_theo_gia/'); // link hien thi du lieu
            $config['per_page'] = 6; // so luong san pham hien thi tren 1 trang
            $config['uri__segment'] = 3; // phan doan hien thi ra so trang tren url. !
            $config['reuse_query_string'] = TRUE; //chuỗi truy vấn kết hơp phân trang -- tim_kiem/6?ma_loai=6&ma_nhasx=0
            $config['suffix'] = ('?price_from='.$price_from.'&price_to='.$price_to);
            $config['first_url'] = $config['base_url'].$config['suffix'];

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

            //$config['suffix'] = ('timkiem?ma_loai='.$loaisp.'&ma_nhasx='.$nhasx.'&key-search='.$key.'&but=');
            //$config['reuse_query_string'] = FALSE;
            //$config['use_global_url_suffix'] = TRUE;
            //$config['page_query_string'] = TRUE;
            //$config['first_url'] = $config['base_url'].$config['suffix'];
            
            // khoi tao cac cau hinh cua phan trang
            $this->pagination->initialize($config);
            $segment = $this->uri->segment(3);
            //pre($segment);
            $segment = intval($segment);
            //pre($segment);

            $input['limit'] = array($config['per_page'], $segment);
            //----------------------------------------------------------------------------------------------------

            $list = $this->san_pham_model->get_list($input);
            $this->data['from'] = $price_from;
            $this->data['to'] = $price_to;
            $this->data['list'] = $list;
            //--------------------------------load view--------------------------------
            $this->data['temp'] = 'site/san_pham/tim_theo_gia';
            $this->load->view('site/layout', $this->data);
        }
  
    }
?>