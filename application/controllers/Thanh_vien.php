<?php
    class Thanh_vien extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('thanh_vien_model');
        }

        function index()
        {
            if(!$this->session->userdata('id_user_login'))
            {
                redirect();
            }
            $id_user = $this->session->userdata('id_user_login');
            //pre($id_user);
            $user_info = $this->thanh_vien_model->get_info($id_user);
            if(!$user_info)
            {
                redirect();
            }
            $this->data['user_info'] = $user_info;
            // load view
            $this->data['temp'] = 'site/thanh_vien/index';
            $this->load->view('site/layout', $this->data);
        }

        function edit()
        {
            $id_user = $this->session->userdata('id_user_login');
            if(!$id_user)
            {
                redirect();
            }
            $user_info = $this->thanh_vien_model->get_info($id_user);
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post())
            {
                $password = $this->input->post('password');
                if($password)
                {
                    $this->form_validation->set_rules('password', 'Nhập password ', 'required|min_length[4]' );
                }
                $this->form_validation->set_rules('ten', 'Nhập Họ tên ', 'required' );
                $this->form_validation->set_rules('dien_thoai', 'Nhập Số Điện Thoại ', 'required' );
                $this->form_validation->set_rules('dia_chi', 'Nhập Địa Chỉ', 'required' );
                if($this->form_validation->run())
                {
                    $ten = $this->input->post('ten');
                    $dien_thoai = $this->input->post('dien_thoai');
                    $dia_chi = $this->input->post('dia_chi');
                    $data = array();
                    $data = array(
                        'ho_ten' => $ten,
                        'dien_thoai' => $dien_thoai,
                        'dia_chi' => $dia_chi,
                    );
                    if($password)
                    {
                        $password = md5($password);
                        $data['mat_khau'] = $password;
                    }
                    if($this->thanh_vien_model->update($id_user, $data))
                    {
                        $this->session->set_flashdata('message_update', 'Cập nhật thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message_update', 'Có lỗi khi cập nhật');
                    }
                    redirect('thanh_vien/index');
                }
            }
            // load view
            $this->data['temp'] = 'site/thanh_vien/edit';
            $this->load->view('site/layout', $this->data);
        }

        function register()
        {
            // load ra thu vien form
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post())
            {
                $this->form_validation->set_rules('ten', 'Nhập Họ tên ', 'required' );
                $this->form_validation->set_rules('email', 'Nhập Email ', 'required|valid_email|callback_check_email' );
                $this->form_validation->set_rules('password', 'Nhập password ', 'required|min_length[4]' );
                $this->form_validation->set_rules('rpassword', 'Nhập Nhập lại Password ', 'required|matches[password]' );
                $this->form_validation->set_rules('dien_thoai', 'Nhập Số Điện Thoại ', 'required' );
                $this->form_validation->set_rules('dia_chi', 'Nhập Địa Chỉ', 'required' );
                $this->form_validation->set_rules('approved', 'Đồng Ý Với Các Điều Khoản Của Chúng Tôi', 'required' );
                if($this->form_validation->run())
                {
                    $ten = $this->input->post('ten');
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $password = md5($password);
                    $dien_thoai = $this->input->post('dien_thoai');
                    $dia_chi = $this->input->post('dia_chi');
                    $trang_thai=1;
                    $data = array(
                        'ho_ten' => $ten,
                        'email' => $email,
                        'mat_khau' => $password,
                        'dien_thoai' => $dien_thoai,
                        'dia_chi' => $dia_chi,
                        'trang_thai'=>$trang_thai,
                    );
                    if($this->thanh_vien_model->create($data))
                    {
                        $this->session->set_flashdata('message', 'Đăng Ký Tài Khoản Thành Công');
                        redirect();
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Có Lỗi Khi Thêm Mới Tài Khoản');
                    }
                }
            }
            // load view
            $this->data['temp'] = 'site/thanh_vien/register';
            $this->load->view('site/layout', $this->data);
        }

        function login()
        {
            if($this->session->userdata('id_user_login'))
            {
                redirect();
            }
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post())
            {
                $this->form_validation->set_rules('email', 'Email bắt buộc nhập', 'required');
                $this->form_validation->set_rules('password', 'Password bắt buộc nhập', 'required');
                $this->form_validation->set_rules('login', 'login', 'callback_check_login');
                if($this->form_validation->run())
                {
                    $user = $this->_get_user_info();
                    $this->session->set_userdata('id_user_login', $user->ma);
                    redirect();
                }
            }
            // load view
            $this->data['temp'] = 'site/thanh_vien/login';
            $this->load->view('site/layout', $this->data);
        }
        // ham kiem tra login
        function check_login()
        {
            $user = $this->_get_user_info();
            if($user)
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message(__FUNCTION__, 'Đăng nhập không thành công');
                return false;
            }
        }

        private function _get_user_info()
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $password = md5($password);
            $where = array(
                'email' => $email,
                'mat_khau' => $password,
                'trang_thai' => 1,
            );
            $user = $this->thanh_vien_model->get_info_rule($where);
            return $user;
        }
	
        function check_email()
        {
            $email = $this->input->post('email');
            $where = array();
            $where = array('email' => $email);
            if($this->thanh_vien_model->check_exists($where))
            {
                $this->form_validation->set_message(__FUNCTION__, 'Email Đã Tồn Tại.!');
                return false;
            }
            else
            {
                return true;
            }
        }

        function logout()
        {
            if($this->session->userdata('id_user_login'))
            {
                $this->session->unset_userdata('id_user_login');
            }
            redirect();
        }

        function hoa_don()
        {
            $id_user = $this->session->userdata('id_user_login');
            
            // lay tong so
            $this->load->model('hoa_don_model');
            $input = array();
            $input['where'] = array('ma_thanh_vien' => $id_user);
            $total_rows = $this->hoa_don_model->get_total($input);
            $this->data['total_rows'] = $total_rows;

            //lấy hóa đơn
            $input['order'] = array('ngay_tao', 'desc');
            $list = $this->hoa_don_model->get_list($input);
            $this->data['hd_info'] = $list;

            //lay chi tiết hóa đơn
            $this->db->select('chi_tiet_hoa_don.*,san_pham.hinh');
            $this->db->from('chi_tiet_hoa_don');
            $this->db->join('hoa_don','chi_tiet_hoa_don.ma_hoa_don = hoa_don.ma');
            $this->db->join('san_pham','chi_tiet_hoa_don.ma_san_pham = san_pham.ma');
            $this->db->order_by('ngay_tao','desc');
            //$this->db->group_by('ngay_tao');
            $this->db->where(array('hoa_don.ma_thanh_vien ' => $id_user));
            //$this->db->where(array('chi_tiet_hoa_don.ma ' => $list->ma));
            $query = $this->db->get();
            $list = $query->result();
            
            //pre($list);
            //$this->load->model('chi_tiet_hoa_don_model');
            //$list = $this->chi_tiet_hoa_don_model->get_list();
            //pre($list);
            $this->data['cthd_info'] = $list;
            //pre($list);
            // load view
            $this->data['temp'] = 'site/thanh_vien/hoa_don';
            $this->load->view('site/layout', $this->data);
        }

        function quen_pass()
        {
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('email', 'Nhập Email', 'required|valid_email|callback_check_email2');
                if($this->form_validation->run())
                {
                    $email = $this->input->post('email');
                    $where = array(
                        'email' => $email,
                    );
                    $info = $this->thanh_vien_model->get_info_rule($where);
                    //pre($info->ma);
                    $pass = rand_string(8);
                    $pass1 = md5($pass);
                    $data = array(
                        'mat_khau' => $pass1,
                    );
                    // update du lieu
                    if(!($this->thanh_vien_model->update($info->ma,$data)))
                    {
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                        redirect();
                    }
                    
                    //send mail
                    $this->load->library('email');
                    // thiết lập cấu hình $config
                    $config = array();
                    $config['protocol']  = 'smtp';
                    $config['smtp_host'] = 'ssl://smtp.googlemail.com'; // nếu sử dụng gmail
                    $config['smtp_port'] = '465'; // thiết lập cổng giao tiếp
                    $config['smtp_user'] = 'yokechan2911@gmail.com'; // tên đăng nhập email của bạn
                    $config['smtp_pass'] = 'ShiRaGaMi1@'; // mật khẩu đăng nhập email của bạn
                    $config['charset'] = 'utf-8'; // cấu hình định dạng unicode
                    $config['mailtype'] = 'html'; // cấu hình định dạng mail gửi
                    $config['wordwrap'] = TRUE;
                    $this->email->initialize($config);
                    // thực hiện gửi email
                    $this->email->from('yokechan2911@gmail.com','PhongPhongShop'); // thiết lập địa chỉ email và tên người gửi
                    $this->email->to($email,$info->ho_ten); // thiết lập địa chỉ email và tên người nhận email.
                    $this->email->subject('Lấy lại mật khẩu'); // thiết lập tiêu đề gửi email
                    $this->email->message('Mật khẩu mới: '.$pass); // thiết lập nội dung gửi mail
                    //$this->email->attach('/path/to/photo1.jpg'); // Gửi đính kèm theo file
                    if(!$this->email->send())
                    {
                        $this->session->set_flashdata('message', 'Gửi email thất bại'); //tạo thông báo gửi email thất bại
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Gửi email thành công');
                    }

                }
            }
            // load ra dong thong bao
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $this->data['temp'] = 'site/thanh_vien/quen_pass';
            $this->load->view('site/layout', $this->data);
        }

        function check_email2()
        {
            $email = $this->input->post('email');
            $where = array();
            $where = array('email' => $email);
            if($this->thanh_vien_model->check_exists($where))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message(__FUNCTION__, 'Email Không Tồn Tại.!');
                return false;
            }
        }

    }
?>