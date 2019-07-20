<?php
    class Thanh_toan extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        // lay thong tin cua khach hang
        function check_out()
        {
            $carts = $this->cart->contents();
            $total_items = $this->cart->total_items();
            if($total_items <= 0)
            {
                redirect();
            }
            $ma_hoa_don=rand_string(8);
            // lay ra tong so tien thanh toan
            $total_amount = 0;
            foreach ($carts as $rows) 
            {
                $total_amount = $total_amount + $rows['subtotal'];
            }
            $this->data['total_amount'] = $total_amount;
            // neu thanh vien da dang nhap thi lay thong tin cua thanh vien
            $id_user = 0;
            $user_info = '';
            if(!$this->session->userdata('id_user_login'))
            {
                redirect(site_url('thanh_vien/login'));
            }
            else
            {
                $id_user = $this->session->userdata('id_user_login');
                $user_info = $this->thanh_vien_model->get_info($id_user);
                $this->data['user_info'] = $user_info;
            
                $this->load->library('form_validation');
                $this->load->helper('form');
                if($this->input->post())
                {
                    $this->form_validation->set_rules('ten', 'Họ tên bắt buộc nhập ', 'required' );
                    $this->form_validation->set_rules('dien_thoai', 'Số điện thoại bắt buộc nhập ', 'required' );
                    $this->form_validation->set_rules('dia_chi', 'Địa chỉ bắt buộc nhập', 'required');
                    if($this->form_validation->run())
                    {
                        $ten = $this->input->post('ten');
                        $dien_thoai = $this->input->post('dien_thoai');
                        $ghi_chu = $this->input->post('ghi_chu');
                        $dia_chi = $this->input->post('dia_chi');
                        $payment = $this->input->post('payment');
                        $data = array(
                            'ma' => $ma_hoa_don,
                            'ma_thanh_vien' => $id_user,
                            'ho_ten_nguoi_nhan' => $ten,
                            'dia_chi_nguoi_nhan' => $dia_chi,
                            'dien_thoai_nguoi_nhan' => $dien_thoai,
                            'ghi_chu' => $ghi_chu,
                            'tong_tien' => $total_amount,
                            'ngay_tao' => date('Y-m-d H:i:s'),
                            'trang_thai' => 1,
                        );
                    
                        
                        $this->load->model('hoa_don_model');
                        // them vao hoa don
                        $this->hoa_don_model->create($data);

                        // them vao bang thanh toán
                        $this->load->model('chi_tiet_hoa_don_model');
                        foreach ($carts as $rows)
                        {
                            $data = array(
                                'ma_hoa_don' => $ma_hoa_don,
                                'ma_san_pham' => $rows['id'],
                                'so_luong' => $rows['qty'],
                                'don_gia' => $rows['price'],
                                'thanh_tien' => $rows['subtotal'],
                                'ten_san_pham' => $rows['name'],
                            );
                            $this->chi_tiet_hoa_don_model->create($data);

                            // tăng số lần mua
                            $this->load->model('san_pham_model');
                            $san_pham = $this->san_pham_model->get_info($rows['id']);
                            $data = array();
                            $data['so_lan_mua']=$san_pham->so_lan_mua +1;
                            $data['so_luong']=$san_pham->so_luong - $rows['qty'];
                            if($data['so_luong'] <= 0)
                                $data['trang_thai']=0;
                            $this->san_pham_model->update($san_pham->ma,$data);
                        }
                        
                        // xoa toan bo gio ghang
                        $this->cart->destroy();
                        // hien thi thong bao dat hang thanh cong
                        $this->session->set_flashdata('message', 'Bạn đã đặt hàng thành công, chúng tôi sẽ kiểm tra, liên hệ và gửi hàng.');
                        redirect(site_url());
                    }
                }
                // load view
                $this->data['temp'] = 'site/thanh_toan/check_out';
                $this->load->view('site/layout', $this->data);
            }
        }

    }
?>