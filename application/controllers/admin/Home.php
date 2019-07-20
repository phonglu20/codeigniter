<?php
class Home extends MY_Controller
{
	function __construct()
    {
        parent::__construct();
    }

    function index()
    {   
        //----------------------------------bảng bên trái----------------------------------
        $this->load->model('san_pham_model');
        $input1['order']= array('so_lan_mua','desc');
        $input1['limit']= array(3,0);
        $spmoi = $this->san_pham_model->get_list($input1);
        $this->data['spmoi'] = $spmoi;

    	//----------------------------------bảng bên phải----------------------------------
    	//lay tong so sản phẩm
    	$this->load->model('san_pham_model');
        $total_san_pham =  $this->san_pham_model->get_total();
        $this->data['total_san_pham'] = $total_san_pham;

        // lay tong danh sach thanh vien
        $this->load->model('thanh_vien_model');
        $total_thanh_vien = $this->thanh_vien_model->get_total();
        $this->data['total_thanh_vien'] = $total_thanh_vien;

        //lay tong so hóa đơn và tổng doanh số
        $this->load->model('hoa_don_model');
        //$total_tien =  $this->hoa_don_model->get_sum('tong_tien');
        $total_hoa_don =  $this->hoa_don_model->get_total();
        //$this->data['total_tien'] = $total_tien;
        $this->data['total_hoa_don'] = $total_hoa_don;

        //----------------------------------bảng dưới----------------------------------
        // lay hoa đơn
        $this->load->model('hoa_don_model');
        $input['where']= array('trang_thai' => 4);
        $list = $this->hoa_don_model->get_list($input);
        $this->data['list'] = $list;

        // lay ra noi dung thong bao message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }
}
?>