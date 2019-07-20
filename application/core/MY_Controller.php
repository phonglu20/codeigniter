<?php
class MY_Controller extends CI_Controller
{
    public $data = array();
    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_get();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->helper('admin_helper');
        $this->load->helper('name_helper');
        $controller = $this->uri->segment('1');
        switch ($controller)
        {
            case 'admin':
            {
                $this->load->helper('admin');
                $this->check_login();
                break;
            }
            default:
            {
                //--------------------------------kiem tra user da dang nhap hay chua--------------------------------
                $user_id_login = $this->session->userdata('id_user_login');
                if($user_id_login)
                {
                    $this->load->model('thanh_vien_model');
                    $user_info = $this->thanh_vien_model->get_info($user_id_login);
                    $this->data['user_info'] = $user_info;
                }
                $name_description = $this->uri->segment('1');
                $this->data['name_description'] = $name_description;

                //--------------------------------lay danh sach danh muc san pham--------------------------------
                $this->load->model('loai_san_pham_model');
                $input['order'] = array('ten', 'asc');
                $loai_list = $this->loai_san_pham_model->get_list($input);

                $this->data['loai_list'] = $loai_list;

                // lay thong tin danh muc
                $loai = $this->uri->rsegment('3');
                $input = array();
                $input['where'] = array(
                    'ma' => $loai,
                );
                $loai_name = $this->loai_san_pham_model->get_list($input);
                $this->data['loai_name'] = $loai_name;
                // end danh muc

                //-------------------------------lay danh sach nha san xuat------------------------------
                $this->load->model('nha_san_xuat_model');
                $input1['order'] = array('ten', 'asc');
                $nhasx_list = $this->nha_san_xuat_model->get_list($input1);

                $this->data['nhasx_list'] = $nhasx_list;
                // lay thong tin nha san xuat
                $nhasx = $this->uri->rsegment('3');
                $input1 = array();
                $input1['where'] = array(
                    'ma' => $nhasx,
                );
                $nhasx_name = $this->nha_san_xuat_model->get_list($input1);
                $this->data['nhasx_name'] = $nhasx_name;
                // end danh muc

                //---------------------------------lay banner top------------------------------------------
                $this->load->model('khuyen_mai_model');
                $input3['like']= array('trang_thai',1);
                $khuyen_mai = $this->khuyen_mai_model->get_list($input3);
                $this->data['khuyen_mai'] = $khuyen_mai;

                //------------------------------lay thong tin san pham------------------------------------------
                $this->load->model('san_pham_model');
                $san_pham_info =  $this->san_pham_model->get_info($loai);
                $this->data['san_pham_info'] = $san_pham_info;

                //-------------------------------load ra thu vien cart------------------------------------------
                $this->load->library('cart');
                $total_items = $this->cart->total_items();
                $this->data['total_items'] = $total_items;
                $carts = $this->cart->contents();
                $this->data['carts'] = $carts;
            }
        }
    }
    
    private function check_login()
    {
        $controller = $this->uri->rsegment('1');
        // strtolower chuyển sang dạng chữ thường
        $controller = strtolower($controller);
        // kiem tra xem da ton tai session login hay chua
        $login = $this->session->userdata('login');
        if(!$login && $controller != 'login')
        {
            redirect(admin_url('login'));
        }
        if($login && $controller == 'login')
        {
            redirect(admin_url('home'));
        }
    }
}