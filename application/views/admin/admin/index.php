<?php
    // load ra file head
    $this->load->view('admin/admin/head', $this->data);
?>
<div class="line"></div>
    <div class="wrapper">
        <?php $this->load->view('admin/message', $this->data); ?>
        <div class="widget">
            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                <h6>Danh sách admin</h6>
                <div class="num f12">Tổng số: <b><?php echo $total_rows; ?></b></div>
            </div>

            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">

                <thead>
                    <tr>
                        <td style="width: 10px;">
                            <img src="<?php echo public_url(); ?>admin/images/icons/tableArrows.png" />
                        </td>
                        <td style="width: 100px;">Mã ID</td>
                        <td style="width: 100px;">Username</td>
                        <td style="width: 100px;">Họ tên</td>
                        <td style="width: 100px;">Chức năng</td>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($list as $row): ?>
                    <tr class="row_<?php echo $row->ma; ?>">
                        <td>
                            <input type="checkbox" name="id[]" value="<?php echo $row->ma; ?>" />
                        </td>
                        <td ><?php echo $row->ma; ?></td>
                        <td ><?php echo $row->ten_dang_nhap; ?></td>
                        <td ><?php echo $row->ho_ten; ?></td>

                        <td class="option">
                            <a href="<?php echo admin_url('admin/edit/'.$row->ma); ?>" title="Chỉnh sửa" class="tipS ">
                                <img src="<?php echo public_url(); ?>admin/images/icons/color/edit.png" />
                            </a>

                            <a href="<?php echo admin_url('admin/delete/'.$row->ma); ?>" title="Xóa" class="tipS verify_action" >
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
