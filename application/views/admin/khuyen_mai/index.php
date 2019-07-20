<?php
    // load ra file head
    $this->load->view('admin/khuyen_mai/head', $this->data);
?>
<div class="line"></div>
    <div class="wrapper">
        <?php $this->load->view('admin/message', $this->data); ?>
        <div class="widget">
            <div class="title">
                <span class="titleIcon">
                    <input type="checkbox" id="titleCheck" name="titleCheck" />
                </span>
                <h6>Danh sách khuyến mãi</h6>
                <div class="num f12">Tổng số: <b><?php echo $total_rows; ?></b></div>
            </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead class="filter">
                <tr>
                    <td colspan="10">
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
                                    <label for="filter_id">Tiêu đề</label>
                                </td>
                                <td style="width:155px;" class="item">
                                    <input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('tieu_de'); ?>" name="tieu_de">
                                </td>

                                <td style="width:150px">
                                    <input type="submit" value="Lọc" class="button blueB">
                                    <input type="reset" onclick="window.location.href = '<?php echo admin_url('khuyen_mai'); ?>'; " value="Reset" class="basic">
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
                <td style="width:10px;">
                    <img src="<?php echo public_url(); ?>admin/images/icons/tableArrows.png" />
                </td>
                <td>Mã quảng cáo</td>
                <td>Tiêu đề</td>
                <td>Hình</td>
                <td>Trạng thái</td>
                <td>Chức năng</td>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="8">
                    <div class="list_action itemActions">
                        <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('khuyen_mai/delete_all'); ?>">
                            <span style='color:white;'>Xóa hết</span>
                        </a>
                    </div>

                    <div class='pagination'>
                    </div>
                </td>
            </tr>
            </tfoot>

            <tbody>
            <?php foreach ($list as $row): ?>
                <tr class="row_<?php echo $row->ma; ?>">
                    <td><input type="checkbox" name="id[]" value="<?php echo $row->ma; ?>" /></td>
                    <td><?php echo $row->ma; ?></td>
                    <td><?php echo $row->tieu_de; ?></td>
                    <td style="text-align: center;">
                        <img src="<?php echo  base_url('upload/khuyen_mai/'.$row->hinh); ?>" style="width: 100px; height: 70px;">
                    </td>

                    <td>
                        <form action="" method="post">
                            <select name="trangthai" onchange="this.form.submit();">
                                <option value="<?php echo $row->trang_thai; ?>">
                                    <?php
                                    if($row->trang_thai == 1)
                                    {
                                    ?>
                                        <?php echo "Đang sử dụng"; ?>
                                        </option>

                                        <option value="0_<?php echo $row->ma; ?>">Khóa</option>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <?php echo "Khóa"; ?>
                                        </option>

                                        <option value="1_<?php echo $row->ma; ?>">Đang sử dụng</option>
                                    <?php
                                    }
                                    ?>          
                            </select>  
                        </form>
                    </td>

                    <td class="option">
                        <a href="<?php echo admin_url('khuyen_mai/edit/'.$row->ma); ?>" title="Chỉnh sửa" class="tipS ">
                            <img src="<?php echo public_url(); ?>admin/images/icons/color/edit.png" />
                        </a>

                        <a href="<?php echo admin_url('khuyen_mai/delete/'.$row->ma); ?>" title="Xóa" class="tipS verify_action" >
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
