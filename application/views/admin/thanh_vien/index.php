<?php
    // load ra file head
    $this->load->view('admin/thanh_vien/head', $this->data);
?>
<div class="line"></div>
    <div class="wrapper">
        <?php $this->load->view('admin/message', $this->data); ?>
        <div class="widget">
            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                <h6>Danh sách thành viên</h6>
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
                                        <label for="filter_id">Họ tên</label>
                                    </td>
                                    <td style="width:155px;" class="item">
                                        <input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('ten'); ?>" name="ten">
                                    </td>

                                    <td style="width:150px">
                                        <input type="submit" value="Lọc" class="button blueB">
                                        <input type="reset" onclick="window.location.href = '<?php echo admin_url('thanh_vien'); ?>'; " value="Reset" class="basic">
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
                        <td style="width:10px;"><img src="<?php echo public_url(); ?>admin/images/icons/tableArrows.png" /></td>
                        <td style="width: 20px;">Mã thành viên</td>
                        <td style="width: 100px;">Họ tên</td>
                        <td style="width: 100px;">Email</td>
                        <td style="width: 150px;">Địa chỉ</td>
                        <td style="width: 100px;">Điện thoại</td>
                        <td style="width: 120px;">Trạng thái</td>

                        <td style="width:50px;">Chức năng</td>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <td colspan="11">
                            <div class="list_action itemActions">
                                <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('thanh_vien/delete_all'); ?>">
                                    <span style='color:white;'>Xóa hết</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tfoot>

                <tbody>
                <?php foreach ($list as $row): ?>
                    <tr class="row_<?php echo $row->ma; ?>">
                        <td><input type="checkbox" name="id[]" value="<?php echo $row->ma; ?>" /></td>
                        <td ><?php echo $row->ma; ?></td>
                        <td ><?php echo $row->ho_ten; ?></td>
                        <td ><?php echo $row->email; ?></td>
                        <td ><?php echo $row->dia_chi; ?></td>
                        <td ><?php echo $row->dien_thoai; ?></td>

                        <td>
                            <form action="" method="post">
                                <select name="trangthai" onchange="this.form.submit();">
                                    <option value="<?php echo $row->trang_thai; ?>">
                                        <?php
                                        if($row->trang_thai == 1)
                                        {
                                        ?>
                                            <?php echo "Còn hoạt động"; ?>
                                            </option>

                                            <option value="0_<?php echo $row->ma; ?>">Khóa</option>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <?php echo "Khóa"; ?>
                                            </option>

                                            <option value="1_<?php echo $row->ma; ?>">Còn hoạt động</option>
                                        <?php
                                        }
                                        ?>          
                                </select>  
                            </form>
                        </td>

                        <td class="option">
                            <a href="<?php echo admin_url('thanh_vien/edit/'.$row->ma); ?>" title="Chỉnh sửa" class="tipS ">
                                <img src="<?php echo public_url(); ?>admin/images/icons/color/edit.png" />
                            </a>

                            <a href="<?php echo admin_url('thanh_vien/delete/'.$row->ma); ?>" title="Xóa" class="tipS verify_action" >
                                <img src="<?php echo public_url(); ?>admin/images/icons/color/delete.png" />
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<div class="clear mt30"></div>
