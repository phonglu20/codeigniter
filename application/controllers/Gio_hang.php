<?php
    class Gio_hang extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            // thông tin giỏ hàng
            $carts = $this->cart->contents();
            //tổng số sản phẩm trng giỏ hàng
            $total_items = $this->cart->total_items();

            $this->data['carts'] = $carts;
            $this->data['total_items'] = $total_items;
            // load view
            $this->data['temp'] = 'site/gio_hang/index';
            $this->load->view('site/layout', $this->data);
        }

        function add()
        {
            $this->load->model('san_pham_model');
            $id_san_pham = $this->uri->rsegment('3');
            $id_san_pham = intval($id_san_pham);
            $san_pham_info = $this->san_pham_model->get_info($id_san_pham);
            if(!$san_pham_info)
            {
                redirect();
            }
            $don_gia = $san_pham_info->don_gia;
            $ma_loai = $san_pham_info->ma_loai_san_pham;
            $ten_san_pham = $san_pham_info->ten;
            if($san_pham_info->giam_gia > 0)
            {
                $don_gia = $san_pham_info->don_gia - $san_pham_info->giam_gia;
            }
            $qty = 1;
            if($this->input->post('qty'))
            {
                $qty = $this->input->post('qty');
            }
            $data = array(
                'id' => $id_san_pham,
                'qty' => $qty,
                'name' => $san_pham_info->ten,
                'price' => $don_gia,
                'image_link' => $san_pham_info->hinh,
                'name_catalog' => $ma_loai,
            );  

            // in sert du lieu vao thu vien cart
            $this->cart->insert($data);
            redirect(base_url('gio_hang/index'));
        }

        function update()
        {
            // load ra danh sach san pham trong thu vien
            $carts = $this->cart->contents();
            foreach ($carts as $key => $value)
            {
                $data['rowid'] = array();
                $data['rowid'] = $key;
                $data['qty'] = $this->input->post('qty_'.$value['id']);
                $this->cart->update($data);
            }
            redirect(base_url('gio_hang/index'));
        }

        function del()
        {
            $id_san_pham = $this->uri->rsegment('3');
            $id_san_pham = intval($id_san_pham);
            // load ra danh sach san pham
            $carts = $this->cart->contents();
            //xóa 1 sản phẩm
            if($id_san_pham > 0) 
            {
                foreach ($carts as $key => $row) 
                {
                    if ($row['id'] == $id_san_pham) 
                    {
                        $data['rowid'] = array();
                        $data['rowid'] = $key;
                        $data['qty'] = 0;
                        $this->cart->update($data);
                    }
                }
            }
            //xóa hết
            else
            {
                $this->cart->destroy();
            }
            redirect(base_url('gio_hang/index'));

        }
    }
?>