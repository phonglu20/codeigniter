<?php
    class Khuyen_mai extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('khuyen_mai_model');
        }

        function index()
        {
            //-------------------- lay tong so --------------------
            $total = $this->khuyen_mai_model->get_total();
            $this->data['total_rows'] = $total;

            //-------------------- tim kiem san pham thong qua bien get--------------------
            $masp = $this->input->get('ma');
            $masp = intval($masp);
            $input['where'] = array();
            if($masp > 0)
            {
                $input['where']['ma'] = $masp;
            }

            $tieu_de = $this->input->get('tieu_de');
            if($tieu_de)
            {
                $input['like']= array('tieu_de',$tieu_de);
            }
            //--------------------------------------------------------------------------------

            //-------------------- cập nhật trang thái khuyen mãi --------------------
            if($this->input->post())
            {
                //$ma_khuyen_mai = $this->uri->rsegment('3');
                //pre($ma_khuyen_mai);
                $trang_thai = $this->input->post('trangthai');
                //pre($trang_thai);
                $ma_trang_thai = substr($trang_thai,0,1);// cắt chuổi từ vị trí thứ 0 đến 1
                //pre($ma_trang_thai);
                $ma_khuyen_mai = substr($trang_thai,2); // cắt chuổi từ vị trí thứ 2 đến hết
                $data = array(
                        'trang_thai' => $trang_thai,
                    );
                // them moi vao co so du lieu
                if($this->khuyen_mai_model->update($ma_khuyen_mai,$data))
                {
                    // neu them thanh cong
                    $message = $this->session->set_flashdata('message', 'Cập nhật trạng thái thành công');
                    redirect(admin_url('khuyen_mai'));
                }
                else
                {
                    // in ra thong bao loi
                    $message = $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                    redirect(admin_url('khuyen_mai'));
                }
            }
            //-------------------------------------------------------------------------------
            //lay danh sach quảng cáo
            $list = $this->khuyen_mai_model->get_list($input);
            $this->data['list'] = $list;

            // lay ra noi dung thong bao message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            //-------------------- load view --------------------
            $this->data['temp'] = 'admin/khuyen_mai/index';
            $this->load->view('admin/main', $this->data);
        }

        function add()
        {
            $this->load->library('form_validation');
            $this->load->helper('form');  //2 thư viên đi chung để hiển thị lỗi

            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tiêu đề bắt buộc nhập','required|min_length[4]');
                $this->form_validation->set_rules('trang_thai','Trạng thái bắt buộc nhập','required');
                if($this->form_validation->run())
                {
                    $name = $this->input->post('name');
                    $trangthai = $this->input->post('trang_thai');
                    //  up anh minh hoa san pham
                    $this->load->library('upload_library');
                    $upload_path = './upload/khuyen_mai';
                    $upload_data = $this->upload_library->upload($upload_path, 'hinh');
                    $hinh = '';
                    if(isset($upload_data['file_name']))
                    {
                        $hinh = $upload_data['file_name'];
                    }

                    $data = array(
                        'tieu_de' => $name,
                        'hinh' => $hinh,
                        'trang_thai' => $trangthai,
                    );

                    // insert du lieu
                    if($this->khuyen_mai_model->create($data))
                    {
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Thêm mới thành công');      
                    }
                    else
                    {
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi thêm');        
                    }
                    redirect(admin_url('khuyen_mai'));
                }
            }
            // load view
            $this->data['temp'] = 'admin/khuyen_mai/add';
            $this->load->view('admin/main', $this->data);
        }

        function edit()
        {
            // lay ra id dan muc
            $ma = $this->uri->rsegment('3');
            $list = $this->khuyen_mai_model->get_info($ma);
            $this->data['list'] = $list;
            if(!$list)
            {
                // thong bao ko ton tai id nay
                $this->session->set_flashdata('message', 'Không tồn tại quảng cáo này');
                redirect(admin_url('khuyen_mai'));
            }
            // load ra thu vien form
            $this->load->library('form_validation');
            $this->load->helper('form');

            // kiem tra xem du lieu post len
            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên bắt buộc nhập','required|min_length[4]');
                $this->form_validation->set_rules('trang_thai','Trạng thái bắt buộc nhập','required');
                if($this->form_validation->run())
                {
                    $name = $this->input->post('name');
                    $trangthai = $this->input->post('trang_thai');

                    //  up anh minh hoa san pham
                    $this->load->library('upload_library');
                    $upload_path = './upload/san_pham';
                    $upload_data = $this->upload_library->upload($upload_path, 'hinh');
                    $hinh = '';
                    if(isset($upload_data['file_name']))
                    {
                        $hinh = $upload_data['file_name'];
                    }

                    $data = array(
                        'tieu_de' => $name,
                        //'trang_thai' => $trang_thai,
                    );

                    if($hinh != '')
                    {
                        $data['hinh'] = $hinh;
                    }

                    // insert du lieu
                    if($this->khuyen_mai_model->update($ma, $data))
                    {
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Cập nhật thành công');
                        redirect(admin_url('khuyen_mai'));
                    }

                    else
                    {
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                        redirect(admin_url('khuyen_mai'));
                    }

                }
            }
            // load view
            $this->data['temp'] = 'admin/khuyen_mai/edit';
            $this->load->view('admin/main', $this->data);
        }

        function delete()
        {
            // lay ra id san pham
            $ma_khuyen_mai = $this->uri->rsegment('3');
            $this->_del($ma_khuyen_mai);

            // thong bao xoa thanh cong
            $this->session->set_flashdata('message', 'Xóa thành công');
            redirect(admin_url('khuyen_mai'));
        }

        // xoa nhieu san pham
        function delete_all()
        {
            $ids = $this->input->post('ids');
            foreach ($ids as $ma_khuyen_mai)
            {
                $this->_del($ma_khuyen_mai);
            }
            // thong bao xoa thanh cong
            $this->session->set_flashdata('message', 'Xóa thành công');
            redirect(admin_url('khuyen_mai'));
        }

        private function _del($ma_khuyen_mai, $redirect = true)
        {
            // lay ra thong tin san pham
            $khuyen_mai_info = $this->khuyen_mai_model->get_info($ma_khuyen_mai);
            if(!$khuyen_mai_info)
            {
                // in ra thong bao loi
                $this->session->set_flashdata('message', 'Không tồn tại quảng cáo này');
                if($redirect)
                {
                    redirect (admin_url('khuyen_mai'));
                }
                else
                {
                    return false;
                }
            }
            //  xoa anh san pham
            $hinh = './upload/khuyen_mai/'.$khuyen_mai_info->hinh;
            if(file_exists($hinh))//kiểm tra file ảnh có tồn tại hay k
            {
                unlink($hinh);
            }
            
            // thuc hien xoa san pham
            $this->khuyen_mai_model->delete($ma_khuyen_mai);
        }
    }
?>