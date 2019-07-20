<?php
    class Nha_san_xuat extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('nha_san_xuat_model');
        }

        function index()
        {
            //lay tong so
            $total = $this->nha_san_xuat_model->get_total();
            $this->data['total_rows'] = $total;

            // tim kiem san pham thong qua bien get
            $masp = $this->input->get('ma');
            $masp = intval($masp);
            $input['where'] = array();
            if($masp > 0)
            {
                $input['where']['ma'] = $masp;
            }

            $tensp = $this->input->get('ten');
            if($tensp)
            {
                $input['like']= array('ten', $tensp );
            }

            // eng search

            // lay danh sach nhà sản xuất
            $nhasx_list = $this->nha_san_xuat_model->get_list($input);
            $this->data['list'] = $nhasx_list;

            // lay ra noi dung thong bao message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            // load view
            $this->data['temp'] = 'admin/nha_san_xuat/index';
            $this->load->view('admin/main', $this->data);
        }

        function add()
        {
            $this->load->library('form_validation');
            $this->load->helper('form');

            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên bắt buộc nhập','required|min_length[2]');
                if($this->form_validation->run())
                {
                    $name = $this->input->post('name');
                    $data = array(
                        'ten' => $name,
                    );
                    // insert du lieu
                    if($this->nha_san_xuat_model->create($data))
                    {
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Thêm mới thành công');
                        redirect(admin_url('nha_san_xuat'));
                    }else
                    {
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi thêm');
                        redirect(admin_url('nha_san_xuat'));
                    }
                }
            }
            // load view
            $this->data['temp'] = 'admin/nha_san_xuat/add';
            $this->load->view('admin/main', $this->data);
        }

        function edit()
        {
            // lay ra id dan muc
            $ma_nhasx = $this->uri->rsegment('3');
            $nhasx_list = $this->nha_san_xuat_model->get_info($ma_nhasx);
            $this->data['nhasx_list'] = $nhasx_list;
            if(!$nhasx_list)
            {
                // thong bao ko ton tai id nay
                $this->session->set_flashdata('message', 'Không tồn tại nhà sản xuất này');
                redirect(admin_url('nha_san_xuat'));
            }
            // load ra thu vien form
            $this->load->library('form_validation');
            $this->load->helper('form');

            // kiem tra xem du lieu post len
            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên bắt buộc nhập','required|min_length[2]');
                if($this->form_validation->run())
                {
                    $name = $this->input->post('name');
                    $data = array(
                        'ten' => $name,
                    );
                    // insert du lieu
                    if($this->nha_san_xuat_model->update($ma_nhasx, $data))
                    {
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Cập nhật thành công');
                        redirect(admin_url('nha_san_xuat'));
                    }
                    else
                    {
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                        redirect(admin_url('nha_san_xuat'));
                    }
                }
            }
            // load view
            $this->data['temp'] = 'admin/nha_san_xuat/edit';
            $this->load->view('admin/main', $this->data);
        }

        function delete()
        {
            // lay ra id san pham
            $ma_nhasx = $this->uri->rsegment('3');
            $this->_del($ma_nhasx);
            // redriect
            $this->session->set_flashdata('message', 'Xóa thành công');
            redirect(admin_url('nha_san_xuat'));
        }

        function delete_all()
        {
            $ids = $this->input->post('ids');
            foreach ($ids as $ma_nhasx)
            {
                $this->_del($ma_nhasx,false);
            }
            // thong bao xoa thanh cong
            $this->session->set_flashdata('message', 'Xóa thành công');
            redirect(admin_url('nha_san_xuat'));
        }

        private function _del($ma_nhasx, $redirect = true)
        {
            // lay ra thong tin san pham
            $nhasx = $this->nha_san_xuat_model->get_info($ma_nhasx);
            if(!$nhasx)
            {
                // in ra thong bao loi
                $this->session->set_flashdata('message', 'Không tồn tại nhà sản xuất này');
                if($redirect)
                {
                    redirect (admin_url('nha_san_xuat'));
                }
                else
                {
                    return false;
                }
            }

            // kiem tra xem danh muc nay co san pham hay ko
            $this->load->model('san_pham_model');
            $nhasx_info = $this->san_pham_model->get_info_rule(array('ma_nha_san_xuat' => $ma_nhasx), 'ma');
            if($nhasx_info)
            {
                $this->session->set_flashdata('message', 'Nhà sản xuất "' .$nhasx->ten. '" có chứa sản phẩm, bạn cần xóa hết các sản phẩm trước khi xóa nhà sản xuất');
                if($redirect) 
                {
                    redirect(admin_url('nha_san_xuat'));
                }
                else
                {
                    return false;
                }
            }
            // thuc hien xoa san pham
            $this->nha_san_xuat_model->delete($ma_nhasx);
        }
    }
?>