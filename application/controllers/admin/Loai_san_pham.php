<?php
    class Loai_san_pham extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('loai_san_pham_model');
        }

        function index()
        {
            //-------------------------------- lay tong so--------------------------------
            $total = $this->loai_san_pham_model->get_total();
            $this->data['total_rows'] = $total;

            //--------------------------------tim kiem san pham thong qua bien get--------------------------------
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

            //--------------------------------eng search--------------------------------

            //-------------------------------- lay danh sach danh muc --------------------------------
            $loai_list = $this->loai_san_pham_model->get_list($input);
            $this->data['list'] = $loai_list;

            //-------------------------------- lay ra noi dung thong bao message --------------------------------
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            //--------------------------------load view --------------------------------
            $this->data['temp'] = 'admin/loai_san_pham/index';
            $this->load->view('admin/main', $this->data);
        }

        function add()
        {
            $this->load->library('form_validation');
            $this->load->helper('form');//2 thư viên đi chung để hiển thị lỗi

            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên bắt buộc nhập','required|min_length[4]');
                if($this->form_validation->run())
                {
                    $name = $this->input->post('name');
                    $data = array(
                        'ten' => $name,
                    );
                    // insert du lieu
                    if($this->loai_san_pham_model->create($data))
                    {
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Thêm mới thành công');
                        redirect(admin_url('loai_san_pham'));
                    }else
                    {
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi thêm');
                        redirect(admin_url('loai_san_pham'));
                    }
                }
            }
            // load view
            $this->data['temp'] = 'admin/loai_san_pham/add';
            $this->load->view('admin/main', $this->data);
        }

        function edit()
        {
            // lay ra id dan muc
            $ma_loai = $this->uri->rsegment('3');
            $loai_list = $this->loai_san_pham_model->get_info($ma_loai);
            $this->data['loai_list'] = $loai_list;
            if(!$loai_list)
            {
                // thong bao ko ton tai id nay
                $this->session->set_flashdata('message', 'Không tồn tại loại sản phẩm này');
                redirect(admin_url('loai_san_pham'));
            }
            // load ra thu vien form
            $this->load->library('form_validation');
            $this->load->helper('form');

            // kiem tra xem du lieu post len
            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên bắt buộc nhập','required|min_length[4]');
                if($this->form_validation->run())
                {
                    $name = $this->input->post('name');
                    $data = array(
                        'ten' => $name,
                    );
                    // insert du lieu
                    if($this->loai_san_pham_model->update($ma_loai, $data))
                    {
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Cập nhật thành công');
                        redirect(admin_url('loai_san_pham'));
                    }
                    else
                    {
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                        redirect(admin_url('loai_san_pham'));
                    }

                }
            }
            // load view
            $this->data['temp'] = 'admin/loai_san_pham/edit';
            $this->load->view('admin/main', $this->data);
        }

        function delete()
        {
            // lay ra id san pham
            $ma_loai = $this->uri->rsegment('3');
            $this->_del($ma_loai);
            // redriect
            $this->session->set_flashdata('message', 'Xóa thành công');
            redirect(admin_url('loai_san_pham'));
        }

        function delete_all()
        {
            $ids = $this->input->post('ids');
            foreach ($ids as $ma_loai)
            {
                $this->_del($ma_loai,false);
            }
            // thong bao xoa thanh cong
            $this->session->set_flashdata('message', 'Xóa thành công');
            redirect(admin_url('loai_san_pham'));
        }

        private function _del($ma_loai, $redirect = true)
        {
            // lay ra thong tin san pham
            $loai = $this->loai_san_pham_model->get_info($ma_loai);
            if(!$loai)
            {
                // in ra thong bao loi
                $this->session->set_flashdata('message', 'Không tồn tại loại sản phẩm này');
                if($redirect)
                {
                    redirect (admin_url('loai_san_pham'));
                }
                else
                {
                    return false;
                }
            }

            // kiem tra xem danh muc nay co san pham hay ko
            $this->load->model('san_pham_model');
            $loai_info = $this->san_pham_model->get_info_rule(array('ma_loai_san_pham' => $ma_loai), 'ma');
            if($loai_info)
            {
                $this->session->set_flashdata('message', 'Danh mục "' .$loai->ten. '" có chứa sản phẩm, bạn cần xóa hết các sản phẩm trước khi xóa danh mục');
                if($redirect) 
                {
                    redirect(admin_url('loai_san_pham'));
                }
                else
                {
                    return false;
                }
            }
            // thuc hien xoa san pham
            $this->loai_san_pham_model->delete($ma_loai);
        }
    }
?>