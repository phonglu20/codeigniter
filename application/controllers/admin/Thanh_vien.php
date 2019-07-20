<?php
    class Thanh_Vien extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('thanh_vien_model');
        }

        function index()
        {
            // lay tong danh sach thanh vien
            $total_rows = $this->thanh_vien_model->get_total();
            $this->data['total_rows'] = $total_rows;

            // tim kiem san pham thong qua bien get
            $manv = $this->input->get('ma');
            $manv = intval($manv);
            $input['where'] = array();
            if($manv > 0)
            {
                $input['where']['ma'] = $manv;
            }

            $tennv = $this->input->get('ten');
            if($tennv)
            {
                $input['like']= array('ho_ten', $tennv );
            }

            // lay danh sach thanh vien
            $thanh_vien_list = $this->thanh_vien_model->get_list($input);
            $this->data['list'] = $thanh_vien_list;

            //-------------------- cập nhật trang thái hoa don --------------------
            if($this->input->post())
            {
                //$ma_thanh_vien = $this->uri->rsegment('3');
                //pre($ma_thanh_vien);
                $trang_thai = $this->input->post('trangthai');
                //pre($trang_thai);
                $ma_trang_thai = substr($trang_thai,0,1);// cắt chuổi từ vị trí thứ 0 đến 1
                //pre($ma_trang_thai);
                $ma_thanh_vien = substr($trang_thai,2); // cắt chuổi từ vị trí thứ 2 đến hết
                $data = array(
                        'trang_thai' => $trang_thai,
                    );
                // them moi vao co so du lieu
                if($this->thanh_vien_model->update($ma_thanh_vien,$data))
                {
                    // neu them thanh cong
                    $message = $this->session->set_flashdata('message', 'Cập nhật trạng thái thành công');
                    redirect(admin_url('thanh_vien'));
                }
                else
                {
                    // in ra thong bao loi
                    $message = $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                    redirect(admin_url('thanh_vien'));
                }
            }
            //-------------------------------------------------------------------------------

            // load ra dong thong bao
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            // load view
            $this->data['temp'] = 'admin/thanh_vien/index';
            $this->load->view('admin/main', $this->data);
        }

        function add()
        {
            // load form
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post())
            {
                $this->form_validation->set_rules('email','Email bắt buộc nhập','required|min_length[6]|callback_check_email');
                $this->form_validation->set_rules('password','Mật khẩu bắt buộc nhập','required|min_length[4]');
                $this->form_validation->set_rules('password_rp','Nhập lại mật khẩu không đúng ','required|matches[password]');
                $this->form_validation->set_rules('name','Họ và tên bắt buộc nhập','required|min_length[6]');
                $this->form_validation->set_rules('dia_chi','Địa chỉ bắt buộc nhập','required|min_length[6]');
                $this->form_validation->set_rules('dien_thoai','Điện thoại bắt buộc nhập','required|min_length[8]|integer');

                if($this->form_validation->run())
                {
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $password = md5($password);
                    $name = $this->input->post('name');
                    $diachi = $this->input->post('dia_chi');
                    $dienthoai = $this->input->post('dien_thoai');
                    $trangthai = $this->input->post('trang_thai');
                    $data = array(
                        'email' => $email,
                        'mat_khau' => $password,
                        'ho_ten' => $name,
                        'dia_chi' => $diachi,
                        'dien_thoai' => $dienthoai, 
                        'trang_thai' => $trangthai,
                    );
                    // insert du lieu
                    if($this->thanh_vien_model->create($data))
                    {
                        // thong bao them thanh cong
                        $this->session->set_flashdata('message', 'Thêm mới thành công');
                        redirect(admin_url('thanh_vien'));
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Có lỗi khi thêm');
                    }

                }
            }

            // load view thanh_vien
            $this->data['temp'] = 'admin/thanh_vien/add';
            $this->load->view('admin/main', $this->data);
        }

        function edit()
        {
            // lay ra id thanh vien thanh_vien
            $id_thanh_vien = $this->uri->rsegment('3');
            $id_thanh_vien = intval($id_thanh_vien);
            $thanh_vien_info = $this->thanh_vien_model->get_info($id_thanh_vien);

            if(!$thanh_vien_info)
            {
                // in ra thong bao loi
                $this->session->set_flashdata('message', 'Không tồn tại thành viên này');
                redirect(admin_url('thanh_vien'));
            }
            $this->data['thanh_vien_info'] = $thanh_vien_info;

            // load ra dong thong bao
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            // load ra thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');

            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Họ và tên bắt buộc nhập','required|min_length[6]');
                $this->form_validation->set_rules('dia_chi','Địa chỉ bắt buộc nhập','required|min_length[6]');
                $this->form_validation->set_rules('dien_thoai','Điện thoại bắt buộc nhập','required|min_length[8]|integer');
                $this->form_validation->set_rules('trang_thai','Trạng thái bắt buộc nhập','required');

                $mat_khau = $this->input->post('password');
                if($mat_khau)
                {
                    $this->form_validation->set_rules('password','Mật khẩu bắt buộc','required|min_length[4]');
                    $this->form_validation->set_rules('password_rp','Nhập lại mật khẩu không đúng ','required|matches[password]');
                }

                if($this->form_validation->run())
                {
                    $name = $this->input->post('name');
                    $diachi = $this->input->post('dia_chi');
                    $dienthoai = $this->input->post('dien_thoai');
                    $trangthai = $this->input->post('trang_thai');

                    $password = $this->input->post('password');
                    $password_rp = $this->input->post('password_rp');
                    $password_rp = md5($password_rp);
                    $password_corner = $thanh_vien_info->mat_khau;

                    $data = array();
                    if($password != '')
                    {
                        $password = md5($password);
                        if($password_corner != $password_rp)
                        {
                            // bat dau insert du lieu
                            $data = array(
                                'mat_khau' => $password,
                                'ho_ten' => $name,
                                'dia_chi' => $diachi,
                                'dien_thoai' => $dienthoai, 
                                'trang_thai' => $trangthai,
                            );
                        }
                        else
                        {
                            $data = array(
                                'ho_ten' => $name,
                                'dia_chi' => $diachi,
                                'dien_thoai' => $dienthoai, 
                                'trang_thai' => $trangthai,
                            );
                        }

                    }
                    else
                    {
                            $data = array(
                                'ho_ten' => $name,
                                'dia_chi' => $diachi,
                                'dien_thoai' => $dienthoai, 
                                'trang_thai' => $trangthai,
                            );
                    }
                    // cap nhat co so du lieu
                    if($this->thanh_vien_model->update($id_thanh_vien, $data))
                    {
                        // tao roi noi dung thong bao
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Có lỗi khi cập nhật dữ liệu');
                    }
                    // chuyen toi trang index quan tri vien
                    redirect(admin_url('thanh_vien'));
                }
            }
            // load view
            $this->data['temp'] = 'admin/thanh_vien/edit';
            $this->load->view('admin/main', $this->data);
        }

        function delete()
        {
            // lay ra id thanh_vien
            $id_thanh_vien = $this->uri->rsegment('3');
            $this->_del($id_thanh_vien);
            redirect(admin_url('thanh_vien'));

        }
        
        function delete_all()
        {
            $ids = $this->input->post('ids');
            foreach ($ids as $id_thanh_vien)
            {
                $this->_del($id_thanh_vien);
            }
        }

        function _del($id_thanh_vien, $redirect = true)
        {
            $id_thanh_vien = intval($id_thanh_vien);
            $thanh_vien_info = $this->thanh_vien_model->get_info($id_thanh_vien);
            if(!$thanh_vien_info)
            {
                // tao roi noi dung thong bao
                $this->session->set_flashdata('message', 'Không tồn tại thành viên này');
                if($redirect) 
                {
                    redirect(admin_url('thanh_vien'));
                }
                else
                {
                    return false;
                }

            }
            // xoa du lieu
            if($this->thanh_vien_model->delete($id_thanh_vien))
            {
                // tao ra noi dung xoa thanh cong
                $this->session->set_flashdata('message','Xóa thành công');
            }
        }

        function check_email()
        {
            $email = $this->input->post('email');
            $where = array('email' => $email);
            // kiem tra userame da ton tai hay chua
            if($this->thanh_vien_model->check_exists($where))
            {
                // in ra thong bao loi
                // tra ve thong bao loi
                $this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');
                return false;
            }
            else
            {
                return true;
            }
        }
    }
?>