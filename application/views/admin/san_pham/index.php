<?php
    // load ra file head
    $this->load->view('admin/san_pham/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <span class="titleIcon">
                <input type="checkbox" id="titleCheck" name="titleCheck" />
            </span>
            <h6>Danh sách linh kiện</h6>
            <div class="num f12">Tổng số: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead class="filter">
                <tr>
                    <td colspan="11">
                    <form method="get" action="" class="list_filter form">
                        <table width="80%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td style="width:40px;" class="label">
                                    <label for="filter_id">Mã số</label>
                                </td>
                                <td class="item">
                                    <input type="text" style="width:55px;" id="filter_id" value="<?php echo $this->input->get('ma'); ?>" name="ma">
                                </td>

                                <td style="width:40px;" class="label">
                                    <label for="filter_id">Tên</label>
                                </td>
                                <td style="width:155px;" class="item">
                                    <input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('ten'); ?>" name="ten">
                                </td>

                                <td style="width:100px;" class="label">
                                    <label for="filter_status">Thể loại</label>
                                    <p></p><p></p>
                                    <label for="filter_status">Nhà sản xuất</label>
                                </td>
                                <td class="item">
                                    <select name="ma_loai_san_pham" style="width:175px;">
                                        <option value="" style="width:155px;">--- Chọn loại linh kiện ---</option>
                                        <?php foreach ($loai_list as $row): ?>
                                        <option value="<?php echo $row->ma; ?>" <?php echo $this->input->get('ma_loai_san_pham') == $row->ma ? 'selected': '' ?> ><?php echo $row->ten; ?>
                                        </option>
                                    <?php endforeach; ?>
                                    </select>
                                    <p></p>
                                    <select name="ma_nha_san_xuat" style="width:175px;">
                                        <option value="" style="width:155px;">--- Chọn nhà sản xuất ---</option>
                                        <?php foreach ($nhasx_list as $row): ?>
                                        <option value="<?php echo $row->ma; ?>" <?php echo $this->input->get('ma_nha_san_xuat') == $row->ma ? 'selected': '' ?> ><?php echo $row->ten; ?>

                                        </option>
                                    <?php endforeach; ?>
                                    </select>
                                </td>

                                <td style="float: right;">
                                    <input type="submit" value="Lọc" class="button blueB">
                                    <input type="reset" onclick="window.location.href = '<?php echo admin_url('san_pham'); ?>'; " value="Reset" class="basic">
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </form>
                </td>
            </tr>
            </thead>

            <thead>
            <tr>
                <td style="width:10px;"><img src="<?php echo public_url(); ?>/admin/images/icons/tableArrows.png" /></td>
                <td style="width: 30px;">Mã SP</td>
                <td style="width: 100px;">Tên sản phẩm</td>
                <td style="width: 100px;">Tên loại</td>
                <td style="width: 50px;">Tên nhà sản xuất</td>
                <td style="width: 50px;">Số lượng</td>
                <td style="width: 120px;">Đơn giá</td>
                <td style="width: 50px;">Hình ảnh</td>
                <td style="width: 50px;">Bảo hành</td>
                <td style="width: 50px;">Trạng thái</td>
                <td style="width: 50px;">Chức năng</td>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="11">
                    <div class="list_action itemActions">
                        <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('san_pham/delete_all'); ?>">
                            <span style='color:white;'>Xóa hết</span>
                        </a>
                    </div>

                        <div class='pagination'>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
      
                </td>
            </tr>
            </tfoot>

            <tbody class="list_item">
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->ma; ?>">
                    <td>
                        <input type="checkbox" name="id[]" value="<?php echo $row->ma; ?>" />
                    </td>
                    <td ><?php echo $row->ma; ?></td>
                    <td ><?php echo $row->ten; ?></td>
                    <td >
                        <?php foreach ($loai_list as $rows) 
                            if($rows->ma == $row->ma_loai_san_pham)
                                echo $rows->ten;
                        ;?>
                    </td>
                    <td >
                        <?php foreach ($nhasx_list as $rowss) 
                            if($rowss->ma == $row->ma_nha_san_xuat)
                                echo $rowss->ten;
                        ;?>
                    </td>
                    <td><?php echo $row->so_luong; ?></td>

                    <?php 
                        if($row->giam_gia > 0)
                    { ?>
                        <td>
                            <div>
                                <b class="price" style="color: red; font-size: 110%">
                                    <?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
                                </b><br>
                                <b class="price" style="color: #666666;text-decoration: line-through;">
                                    <p><?php echo number_format($row->don_gia); ?> VNĐ</p>
                                </b>
                                
                            </div>
                        </td>
                    <?php 
                    }
                        else 
                    { 
                    ?>      
                        <td>
                            <div>
                                <b class="price" style="color: red; font-size: 110%">
                                    <?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
                                </b>
                            </div>
                        </td>
                    <?php 
                    }
                    ?>
                            
                    <td style="text-align: center;">
                        <img src="<?php echo  base_url('upload/san_pham/'.$row->hinh); ?>" style="width: 100px; height: 70px;">
                    </td>
                    <td><?php echo $row->bao_hanh; ?></td>
                    <td >
                        <?php 
                        if($row->trang_thai==1) 
                            echo "Còn hàng";
                        else
                        {
                            ; ?>
                            <div style="color:red">Hết hàng</div>
                        <?php } ; ?>
                    </td>

                    <td class="option">
                        <a href="<?php echo admin_url('san_pham/edit/'.$row->ma); ?>" title="Chỉnh sửa" class="tipS ">
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/edit.png" />
                        </a>

                        <a href="<?php echo admin_url('san_pham/delete/'.$row->ma); ?>" title="Xóa" class="tipS verify_action" >
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/delete.png" />
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<div class="clear mt30"></div>

