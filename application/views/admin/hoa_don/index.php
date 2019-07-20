<?php
    // load ra file head
    $this->load->view('admin/hoa_don/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <span class="titleIcon">
                <input type="checkbox" id="titleCheck" name="titleCheck" />
            </span>
            <h6>Danh sách hóa đơn</h6>
            <div class="num f12">Tổng số: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead class="filter">
                <tr><td colspan="11">
                    <form method="get" action="" class="list_filter form">
                        <table width="80%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td style="width:90px;" class="label">
                                    <label for="filter_id">Mã hóa đơn</label>
                                </td>
                                <td class="item">
                                    <input type="text" style="width:55px;" id="filter_id" value="<?php echo $this->input->get('ma'); ?>" name="ma">
                                </td>
                                <td style="width:90px;" class="label">
                                    <label for="filter_id">Mã thành viên</label>
                                </td>
                                <td class="item">
                                    <input type="text" style="width:55px;" id="filter_id" value="<?php echo $this->input->get('ma_thanh_vien'); ?>" name="matv">
                                </td>

                                <td style="width:40px;" class="label">
                                    <label for="filter_id">Trạng thái</label>
                                </td>
                                <td class="item">
                                    <select name="trang_thai" style="width:155px;">
                                        <option value="" style="width:155px;">--- Chọn trạng thái ---</option>
                                        <option value="1">Chờ xử lý</option>
                                        <option value="2">Đã xác nhận</option>
                                        <option value="3">Đang xử lý</option>
                                        <option value="4">Đã giao hàng</option>
                                        <option value="5">Hủy đơn hàng</option>
                                </td>

                                <td style="width:100px">
                                    <input type="submit" value="Lọc" class="button blueB">
                                    <input type="reset" onclick="window.location.href = '<?php echo admin_url('hoa_don'); ?>'; " value="Reset" class="basic">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </td></tr>
            </thead>

            <thead>
            <tr>
                <td style="width:10px;">
                    <img src="<?php echo public_url(); ?>/admin/images/icons/tableArrows.png" />
                </td>
                <td style="width: 50px;">Mã hóa đơn</td>
                <td style="width: 50px;">Mã thành viên</td>
                <td style="width: 100px;">Tên người nhận</td>
                <td style="width: 100px;">Địa chỉ người nhận</td>
                <td style="width: 80px;">Điện thoại người nhận</td>
                <td style="width: 100px;">Tổng tiền</td>
                <td style="width: 50px;">Ngày Tạo</td>
                <td style="width: 50px;">Trạng Thái</td>
                <td style="width: 50px;">Ghi chú</td>
                <td style="width: 100px;">Chức năng</td>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="11">
                    <!--
                    <div class="list_action itemActions">
                        <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('hoa_don/delete_all'); ?>">
                            <span style='color:white;'>Xóa hết</span>
                        </a>
                    </div>
                    -->

                    <?php   $a= $this->input->get('ma');
                            $b= $this->input->get('matv');
                            $c= $this->input->get('trang_thai');
                        if(!($a||$b||$c))  
                        {
                    ;?>
                        <div class='pagination'>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    <?php }    ;?>
                </td>
            </tr>
            </tfoot>

            <tbody>
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->ma; ?>">
                    <td>
                        <input type="checkbox" name="id[]" value="<?php echo $row->ma; ?>" />
                    </td>
                    <td><?php echo $row->ma; ?></td>
                    <td><?php echo $row->ma_thanh_vien; ?></td>
                    <td><?php echo $row->ho_ten_nguoi_nhan; ?></td>
                    <td><?php echo $row->dia_chi_nguoi_nhan; ?></td>
                    <td><?php echo $row->dien_thoai_nguoi_nhan; ?></td>
                    <td>
                        <b style="color: red; font-weight: bold;font-size: 110%">
                            <?php echo number_format($row->tong_tien); ?> VNĐ
                        </b>
                    </td>
                    <td><?php echo $row->ngay_tao; ?></td>

                    <td>
                        <form action="" method="post">
                            <select name="trangthai" onchange="this.form.submit();">
                                <option value="<?php echo $row->trang_thai; ?>">
                                    <?php
                                    if($row->trang_thai == 1)
                                    {
                                    ?>
                                        <?php echo "Chờ xử lý"; ?>
                                        </option>

                                        <option value="2_<?php echo $row->ma; ?>">Đã xác nhận</option>
                                        <option value="3_<?php echo $row->ma; ?>">Đang xử lý</option>
                                        <option value="4_<?php echo $row->ma; ?>">Đã giao hàng</option>
                                        <option value="5_<?php echo $row->ma; ?>">Hủy đơn hàng</option>
                                    <?php
                                    }
                                    elseif($row->trang_thai == 2)
                                    {
                                    ?>
                                        <?php echo "Đã xác nhận"; ?>
                                        </option>

                                        <option value="1_<?php echo $row->ma; ?>">Chờ xử lý</option>
                                        <option value="3_<?php echo $row->ma; ?>">Đang xử lý</option>
                                        <option value="4_<?php echo $row->ma; ?>">Đã giao hàng</option>
                                        <option value="5_<?php echo $row->ma; ?>">Hủy đơn hàng</option>
                                    <?php
                                    }
                                    elseif($row->trang_thai == 3)
                                    {
                                    ?>
                                        <?php echo "Đang xử lý"; ?>
                                        </option>

                                        <option value="1_<?php echo $row->ma; ?>">Chờ xử lý</option>
                                        <option value="2_<?php echo $row->ma; ?>">Đã xác nhận</option>
                                        <option value="4_<?php echo $row->ma; ?>">Đã giao hàng</option>
                                        <option value="5_<?php echo $row->ma; ?>">Hủy đơn hàng</option>
                                    <?php
                                    }
                                    elseif($row->trang_thai == 4)
                                    {
                                    ?>
                                        <?php echo "Đã giao hàng"; ?>
                                        </option>

                                    <?php              
                                    }
                                    else
                                    {
                                    ?>
                                        <?php echo "Hủy đơn hàng"; ?>
                                        </option>
                                    
                                    <?php
                                    }
                                    ?>          
                            </select>  
                        </form>
                    </td>
                    <td><?php echo $row->ghi_chu; ?></td>

                    <td class="option textC">
                        <a title="Xem chi tiết giao dịch" class="tipS lightbox" target="_blank" href="<?php echo admin_url('hoa_don/chi_tiet_hoa_don/'.$row->ma) ?>">
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/view.png" />
                        </a>

                    <!--
                        <a href="<?php echo admin_url('hoa_don/delete/'.$row->ma); ?>" title="Xóa" class="tipS verify_action" >
                            <img src="<?php echo public_url(); ?>/admin/images/icons/color/delete.png" />
                        </a>
                    -->

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<div class="clear mt30"></div>
