<?php
    class Hoa_don extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('hoa_don_model');
        }

        function index()
        {
            //lay tong so
            $total_rows =  $this->hoa_don_model->get_total();
            $this->data['total_rows'] = $total_rows;

            //-------------------- load ra thu vien phan trang --------------------
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows;// tong so dong
            $config['base_url'] = admin_url('hoa_don/index'); // link hien thi du lieu
            $config['per_page'] = 10; // so luong san pham hien thi tren 1 trang
            $config['uri__segment'] = 4; // phan doan hien thi ra so trang tren url. !
            $config['next_link'] = 'Next »';
            $config['prev_link'] = '« Prev';
            
            //khoi tao cac cau hinh cua phan trang
            $this->pagination->initialize($config);
            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            $input = array();
            $input['limit'] = array($config['per_page'], $segment);
            //-------------------- kết thúc phân trang --------------------

            //-------------------- tim kiem hoa don thong qua bien get --------------------

            //Lọc theo mã hóa đơn
            $mahd = $this->input->get('ma');
            $input['where'] = array();
            if($mahd)
            {
                $input['like']= array('ma', $mahd );
            }

            //Lọc theo mã thành viên
            $matv = $this->input->get('matv');
            $matv = intval($matv);
            if($matv > 0)
            {
                $input['where']['ma_thanh_vien'] = $matv;
            }

            //Lọc theo trạng thái
            $trang_thai = $this->input->get('trang_thai');
            $trang_thai = intval($trang_thai);
            if($trang_thai)
            {
                $input['where']['trang_thai'] = $trang_thai;
            }

            //-------------------- kết thúc tìm kiếm --------------------

            // lay hóa đơn
            $input['order'] = array('ngay_tao', 'desc');
            $list = $this->hoa_don_model->get_list($input);
            $this->data['list'] = $list;

            //-------------------- cập nhật trang thái hoa don --------------------
            if($this->input->post())
            {
                //$ma_hoa_don = $this->uri->rsegment('3');
                //pre($ma_hoa_don);
                $trang_thai = $this->input->post('trangthai');
                //pre($trang_thai);
                $ma_trang_thai = substr($trang_thai,0,1);// cắt chuổi từ vị trí thứ 0 đến 1
                //pre($ma_trang_thai);
                $ma_hoa_don = substr($trang_thai,2); // cắt chuổi từ vị trí thứ 2 đến hết
                $data = array(
                        'trang_thai' => $trang_thai,
                    );
                // them moi vao co so du lieu
                if($this->hoa_don_model->update($ma_hoa_don,$data))
                {
                    // neu them thanh cong
                    $message = $this->session->set_flashdata('message', 'Cập nhật trạng thái thành công');
                    redirect(admin_url('hoa_don'));
                }
                else
                {
                    // in ra thong bao loi
                    $message = $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                    redirect(admin_url('hoa_don'));
                }
            }
            //-------------------------------------------------------------------------------

            // lay ra noi dung thong bao message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            // load view
            $this->data['temp'] = 'admin/hoa_don/index';
            $this->load->view('admin/main', $this->data);
        }

        //-------------------- Chi tiết hóa đơn --------------------
        function chi_tiet_hoa_don()
        {
            //lay id cua giao dịch ma ta muon xoa
            $id = $this->uri->rsegment('3');
            //lay thong tin cua giao dịch
            $info = $this->hoa_don_model->get_info($id);
            if(!$info)
            {
                return false;
            }
            
            //lấy danh sách đơn hàng  của giao dịch này
            $this->load->model('chi_tiet_hoa_don_model');
            $input = array();
            $input['where'] = array('ma_hoa_don' => $id);
            $cthd = $this->chi_tiet_hoa_don_model->get_list($input);
            if(!$cthd)
            {
                return false;
            }
            $this->data['listcthd'] = $cthd;

            // lay ra noi dung thong bao message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            //Load 
            $this->load->view('admin/hoa_don/chi_tiet_hoa_don', $this->data);
        }
        //-------------------- Kết thúc chi tiết hóa đơn --------------------

        /*
        //-------------------- Xoa hoa don-------------------- 
        function delete()
        {
            // lay ra id hoa_don
            $id_hoa_don = $this->uri->rsegment('3');
            //pre($id_hoa_don);
            $this->_del($id_hoa_don);
            redirect(admin_url('hoa_don'));

        }
        
        function delete_all()
        {
            $ids = $this->input->post('ids');
            foreach ($ids as $id_hoa_don)
            {
                $this->_del($id_hoa_don);
            }
        }

        function _del($id_hoa_don, $redirect = true)
        {
            $hoa_don_info = $this->hoa_don_model->get_info($id_hoa_don);
            if(!$hoa_don_info)
            {
                // tao roi noi dung thong bao
                $this->session->set_flashdata('message', 'Không tồn tại hóa đơn này');
                if($redirect) 
                {
                    redirect(admin_url('hoa_don'));
                }
                else
                {
                    return false;
                }

            }
            // xoa du lieu
            if($this->hoa_don_model->delete($id_hoa_don))
            {
                //xoa chi tiết hóa đơn
                $this->load->model('chi_tiet_hoa_don_model');
                $this->chi_tiet_hoa_don_model->delete($id_hoa_don);
                // tao ra noi dung xoa thanh cong
                $this->session->set_flashdata('message','Xóa thành công');
            }
        }
        */
    }
?>