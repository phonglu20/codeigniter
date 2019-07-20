<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Bảng điều khiển</h5>
            <span>Trang quản lý hệ thống</span>
        </div>

        <div class="clear"></div>
    </div>
</div>

<div class="line"></div>

<div class="wrapper">

    <div class="widgets">
        <!-- Stats -->

        <!-- Doanh số -->
        <div class="oneTwo">
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>/admin/images/icons/dark/money.png">
                    <h6>Sản phẩm bán chạy</h6>
                </div>

                <table width="100%" cellspacing="0" cellpadding="0" class="sTable myTable">
                    <tbody>
                    <tr>
                        <td class="fontB blue f13" style="width: 83px ;text-align: center;">Mã sản phẩm</td>
                        <td class="fontB blue f13" style="text-align: center;">Tên sản phẩm</td>
                    </tr>
                    <?php foreach ($spmoi as $row): ?>
                    <tr>
                        <td><?php echo $row->ma; ?></td>
                        <td><?php echo $row->ten; ?></td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Thống kê dữ liệu -->
        <div class="oneTwo">
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>/admin/images/icons/dark/users.png">
                    <h6>Thống kê dữ liệu</h6>
                </div>

                <table width="100%" cellspacing="0" cellpadding="0" class="sTable myTable">
                    <tbody>

                        <tr>
                            <td>
                                <div class="left">Tổng số hóa đơn</div>
                                <div class="right f11">
                                    <a href="admin/tran.html">Chi tiết</a>
                                </div>
                            </td>
                            <td class="textC webStatsLink">
                                <?php echo $total_hoa_don; ?>					
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="left">Tổng số sản phẩm</div>
                                <div class="right f11">
                                    <a href="<?php echo admin_url('san_pham');?>">Chi tiết</a>
                                </div>
                            </td>
                            <td class="textC webStatsLink">
                                <?php echo $total_san_pham; ?>				
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="left">Tổng số thành viên</div>
                                <div class="right f11">
                                    <a href="<?php echo admin_url('thanh_vien');?>">Chi tiết</a>
                                </div>
                            </td>
                            <td class="textC webStatsLink">
                                <?php echo $total_thanh_vien; ?>  					
                            </td>
                        </tr>
     
                    </tbody>
                </table>
            </div>
        </div>

        <div class="clear"></div>
    </div>
</div>

<!-- Giao dich thanh cong gan day nhat -->
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <span class="titleIcon">
                <input type="checkbox" id="titleCheck" name="titleCheck" />
            </span>
            <h6>Danh sách hóa đơn đã giao</h6>
        </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
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
            <!--
            <tfoot>
            <tr>
                <td colspan="11">
                    <div class="list_action itemActions">
                        <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('hoa_don/delete_all'); ?>">
                            <span style='color:white;'>Xóa hết</span>
                        </a>
                    </div>

                </td>
            </tr>
            </tfoot>
            -->
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
                        <scan style="color: green;">
                            <?php echo "Đã giao hàng"; ?>
                        </scan>
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
