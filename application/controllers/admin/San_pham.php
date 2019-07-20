<?php
    class San_pham extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('san_pham_model');
		}

        function index()
        {
            //lay tong so
            $total_rows =  $this->san_pham_model->get_total();
            $this->data['total_rows'] = $total_rows;

            //-------------------- load ra thu vien phan trang --------------------
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows;// tong so dong
            $config['base_url'] = admin_url('san_pham/index'); // link hien thi du lieu
            $config['per_page'] = 10; // so luong san pham hien thi tren 1 trang
            $config['uri__segment'] = 4; // phan doan hien thi ra so trang tren url. !
            $config['next_link'] = 'Next »';
            $config['prev_link'] = '« Prev';
            $config['reuse_query_string'] = TRUE; //chuỗi truy vấn kết hơp phân trang -- tim_kiem/6?ma_loai=6&ma_nhasx=0
            // khoi tao cac cau hinh cua phan trang
            $this->pagination->initialize($config);

            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            $input = array();
            $input['limit'] = array($config['per_page'], $segment);
            //-------------------- kết thúc phân trang --------------------

            //-------------------- Tim kiem san pham thong qua bien get --------------------
            //Lọc theo mã sản phẩm
            $masp = $this->input->get('ma');
            $masp = intval($masp);
            $input['where'] = array();
            if($masp > 0)
            {
                $input['where']['ma'] = $masp;
            }
            
            //Lọc theo tên sản phẩm
            $tensp = $this->input->get('ten');
            if($tensp)
            {
                $input['like']= array('ten', $tensp );
            }

            //Lọc theo loại sản phẩm
            $loaisp = $this->input->get('ma_loai_san_pham');
            $loaisp = intval($loaisp);
            if($loaisp > 0)
            {
                $input['where']['ma_loai_san_pham'] = $loaisp;
            }

            //Lọc theo nhà sản xuất sản phẩm
            $nhasx = $this->input->get('ma_nha_san_xuat');
            $nhasx = intval($nhasx);
            if($nhasx > 0)
            {
                $input['where']['ma_nha_san_xuat'] = $nhasx;
            }
            ////-------------------- kết thúc tìm kiếm --------------------
            // lay dong san pham
            $this->load->model('san_pham_model');
            $san_pham_list = $this->san_pham_model->get_list($input);
            $this->data['list'] = $san_pham_list;

            // lay loai san pham
            $this->load->model('loai_san_pham_model');
            $input1['order'] = array('ten', 'asc');
            $loai_list = $this->loai_san_pham_model->get_list($input1);
            $this->data['loai_list'] = $loai_list;

            // lay danh sach nhà sản xuất
            $this->load->model('nha_san_xuat_model');
            $input2['order'] = array('ten', 'asc');
            $nhasx_list = $this->nha_san_xuat_model->get_list($input2);
            $this->data['nhasx_list'] = $nhasx_list;

            // lay ra noi dung thong bao message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            // load view
            $this->data['temp'] = 'admin/san_pham/index';
            $this->load->view('admin/main', $this->data);
        }

        function add()
        {
            // load thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');//2 thư viên đi chung để hiển thị lỗi

            // lay loai san pham
            $this->load->model('loai_san_pham_model');
            $input['order'] = array('ten', 'asc');
            $loai_list = $this->loai_san_pham_model->get_list($input);
            $this->data['loai_list'] = $loai_list;

            // lay nha san xuat
            $this->load->model('nha_san_xuat_model');
            $input1['order'] = array('ten', 'asc');
            $nhasx_list = $this->nha_san_xuat_model->get_list($input1);
            $this->data['nhasx_list'] = $nhasx_list;

            // kiem tra xem co du lieu post len
            if($this->input->post())
            {
                $this->form_validation->set_rules('ten','Tên sản phẩm bắt buộc nhập','required');
                $this->form_validation->set_rules('don_gia','Giá bắt buộc nhập','required|max_length[10]');
                $this->form_validation->set_rules('ma_loai_san_pham','Mã loại sản phẩm bắt buộc nhập','required');
                $this->form_validation->set_rules('ma_nha_san_xuat','Mã nhà sản xuất bắt buộc nhập','required');
                $this->form_validation->set_rules('so_luong','Số lượng bắt buộc nhập','required');
                
                if($this->form_validation->run())
                {
                    // bat dau insert du lieu
                    $ten = $this->input->post('ten');
                    $don_gia = $this->input->post('don_gia');
                    $don_gia = str_replace(',', '', $don_gia);// xóa dấu phẩy của jquery
                    $giam_gia = $this->input->post('giam_gia');
                    $giam_gia = str_replace(',','',$giam_gia);
                    $ma_loai_san_pham = $this->input->post('ma_loai_san_pham');
                    $ma_nha_san_xuat = $this->input->post('ma_nha_san_xuat');
                    $loai_info = $this->loai_san_pham_model->get_info($ma_loai_san_pham);
                    $cau_hinh = $this->input->post('cau_hinh');
                    $mo_ta = $this->input->post('mo_ta');
                    $so_luong = $this->input->post('so_luong');
                    $bao_hanh = $this->input->post('bao_hanh');
                    $trang_thai = $this->input->post('trang_thai');

                    //  up anh minh hoa san pham
                    $this->load->library('upload_library');
                    $upload_path = './upload/san_pham';
                    $upload_data = $this->upload_library->upload($upload_path, 'hinh');
                    $hinh = '';
                    if(isset($upload_data['file_name']))
                    {
                        $hinh = $upload_data['file_name'];
                    }

                    // up load nhieu file anh cho san pham
                    $image_list = array();
                    $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                    $image_list= json_encode($image_list); //trong csdl k thể lưu 1 mảng vì v sẽ chuyển 1 mảng thành chuỗi json 

                    $data = array(
                        'ten' => $ten,
                        'ma_loai_san_pham' => $ma_loai_san_pham,
                        'ma_nha_san_xuat' => $ma_nha_san_xuat,
                        'cau_hinh' => $cau_hinh,
                        'mo_ta' => $mo_ta,
                        'don_gia' => $don_gia,
                        'giam_gia' => $giam_gia,
                        'hinh' => $hinh,
                        'list_hinh' => $image_list,
                        'so_luong' => $so_luong,
                        'bao_hanh' => $bao_hanh,
                        'trang_thai' => $trang_thai,
                    );

                    // them moi vao co so du lieu
                    if($this->san_pham_model->create($data))
                    {
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Thêm mới thành công sản phẩm');
                        
                    }
                    else
                    {
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi thêm sản phẩm');
                        
                    }
                    //chuyển tới danh sách
                    redirect(admin_url('san_pham'));
                }
            }
            // load view
            $this->data['temp'] = 'admin/san_pham/add';
            $this->load->view('admin/main', $this->data);
        }

        // chinh sua san pham
        function edit()
        {
            // load ra id san pham
            $ma_san_pham = $this->uri->rsegment('3');
            $san_pham_info = $this->san_pham_model->get_info($ma_san_pham);
            $this->data['san_pham_info'] = $san_pham_info;
            if(!$san_pham_info)
            {
                // thong bao ko ton tai id nay
                $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
                redirect(admin_url('san_pham'));
            }
            // load thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');

            // lay loai san pham
            $this->load->model('loai_san_pham_model');
            $input['order'] = array('ten', 'asc');
            $loai_list = $this->loai_san_pham_model->get_list($input);
            $this->data['loai_list'] = $loai_list;

            // lay loai san pham
            $this->load->model('nha_san_xuat_model');
            $input1['order'] = array('ten', 'asc');
            $nhasx_list = $this->nha_san_xuat_model->get_list($input1);
            $this->data['nhasx_list'] = $nhasx_list;

           // kiem tra xem co du lieu post len
            if($this->input->post())
            {
                $this->form_validation->set_rules('ten','Tên sản phẩm bắt buộc nhập','required');
                $this->form_validation->set_rules('don_gia','Giá bắt buộc nhập','required|max_length[10]');
                $this->form_validation->set_rules('ma_loai_san_pham','Loại sản phẩm bắt buộc nhập','required');
                $this->form_validation->set_rules('ma_nha_san_xuat','Nhà sản xuất bắt buộc nhập','required');
                $this->form_validation->set_rules('so_luong','Số lượng bắt buộc nhập','required');
                
                if($this->form_validation->run())
                {
                    // bat dau insert du lieu
                    $ten = $this->input->post('ten');
                    $don_gia = $this->input->post('don_gia');
                    $don_gia = str_replace(',', '', $don_gia);// xóa dấu phẩy của trên đơn giá (jquery)
                    $giam_gia = $this->input->post('giam_gia');
                    $giam_gia = $giam_gia = str_replace(',','',$giam_gia);
                    $ma_loai_san_pham = $this->input->post('ma_loai_san_pham');
                    $ma_nha_san_xuat = $this->input->post('ma_nha_san_xuat');
                    $loai_info = $this->loai_san_pham_model->get_info($ma_loai_san_pham);
                    $cau_hinh = $this->input->post('cau_hinh');
                    $mo_ta = $this->input->post('mo_ta');
                    $so_luong = $this->input->post('so_luong');
                    $bao_hanh = $this->input->post('bao_hanh');
                    $trang_thai = $this->input->post('trang_thai');

                    //  up anh minh hoa san pham
                    $this->load->library('upload_library');
                    $upload_path = './upload/san_pham';
                    $upload_data = $this->upload_library->upload($upload_path, 'hinh');
                    $hinh = '';
                    if(isset($upload_data['file_name']))
                    {
                        $hinh = $upload_data['file_name'];
                    }

                    // up load nhieu file anh cho san pham
                    $image_list = array();
                    $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                    $image_list_json = json_encode($image_list); //trong csdl k thể lưu 1 mảng vì v sẽ chuyển 1 mảng thành chuỗi json 

                    $data = array(
                        'ten' => $ten,
                        'ma_loai_san_pham' => $ma_loai_san_pham,
                        'ma_nha_san_xuat' => $ma_nha_san_xuat,
                        'cau_hinh' => $cau_hinh,
                        'mo_ta' => $mo_ta,
                        'don_gia' => $don_gia,
                        'giam_gia' => $giam_gia,
                        'so_luong' => $so_luong,
                        'bao_hanh' => $bao_hanh,
                        'trang_thai' => $trang_thai,
                    );

                    if($hinh != '')
                    {
                        $data['hinh'] = $hinh;
                    }
                    if(!empty($image_list))
                    {
                        $data['list_hinh'] = $image_list_json;
                    }

                    // them moi vao co so du lieu
                    if($this->san_pham_model->update($san_pham_info->ma,$data))
                    {
                        // neu them thanh cong
                        $message = $this->session->set_flashdata('message', 'Cập nhật mới thành công ');
                        redirect(admin_url('san_pham'));
                    }
                    else
                    {
                        // in ra thong bao loi
                        $message = $this->session->set_flashdata('message', 'Có lỗi khi cập nhật sản phẩm');
                        redirect(admin_url('san_pham'));
                    }
                }
            }
            // load view
            $this->data['temp'] = 'admin/san_pham/edit';
            $this->load->view('admin/main', $this->data);
        }

        function delete()
        {
            // lay ra id san pham
            $ma_san_pham = $this->uri->rsegment('3');
            $this->_del($ma_san_pham);

            // thong bao xoa thanh cong
            $this->session->set_flashdata('message', 'Xóa thành công sản phẩm này');
            redirect(admin_url('san_pham'));
        }

        // xoa nhieu san pham
        function delete_all()
        {
            $ids = $this->input->post('ids');
            foreach ($ids as $ma_san_pham)
            {
                $this->_del($ma_san_pham);
            }
            // thong bao xoa thanh cong
            $this->session->set_flashdata('message', 'Xóa thành công sản phẩm này');
            redirect(admin_url('san_pham'));
        }

        private function _del($ma_san_pham, $redirect = true)
        {
            // lay ra thong tin san pham
            $san_pham_info = $this->san_pham_model->get_info($ma_san_pham);
            if(!$san_pham_info)
            {
                // in ra thong bao loi
                $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
                if($redirect)
                {
                    redirect (admin_url('san_pham'));
                }
                else
                {
                    return false;
                }
            }
            //  xoa anh san pham
            $hinh = './upload/san_pham/'.$san_pham_info->hinh;
            if(file_exists($hinh))//kiểm tra file ảnh có tồn tại hay k
            {
                unlink($hinh);
            }
            // xoa anh minh hoa kem theo cua san pham
            $image_list = json_decode($san_pham_info->list_hinh);

            if(is_array($image_list))
            {
                foreach ($image_list as $img)
                {
                    $image_list = './upload/san_pham/'.$img;
                    if(file_exists($image_list))
                    {
                        unlink($image_list);
                    }
                }
            }
            // thuc hien xoa san pham
            $this->san_pham_model->delete($ma_san_pham);
        }
    }
?>
