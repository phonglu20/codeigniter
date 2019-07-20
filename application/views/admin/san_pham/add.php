<?php
// load ra file head
$this->load->view('admin/san_pham/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="<?php echo admin_url('san_pham/add'); ?>" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>/admin/images/icons/dark/add.png">
                    <h6>Thêm mới linh kiện</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Thông tin chung</a></li>
                    
                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1">
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Tên linh kiện:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" _autocheck="true" id="param_name" name="ten">
                                </span>
                                <span class="autocheck" name="ten_autocheck"></span>
                                <div class="clear error" name="ten_error">
                                    <?php echo form_error('ten'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_cat" class="formLeft">Loại linh kiện:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="ma_loai_san_pham">
                                    <option value="">--- Chọn loại linh kiện ---</option>
                                    <?php foreach ($loai_list as $row): ?>
                                         <option value="<?php echo $row->ma; ?>" <?php echo $this->input->get('ma_loai_san_pham') == $row->ma ? 'selected': '' ?> ><?php echo $row->ten; ?>
                                        </option>
                                    <?php endforeach; ?>
                                    </select>
                                <span class="autocheck" name="loai_autocheck"></span>
                                <div class="clear error" name="loai_error">
                                    <?php echo form_error('ma_loai_san_pham'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_cat" class="formLeft">Nhà sản xuất:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="ma_nha_san_xuat">
                                    <option value="">--- Chọn nhà sản xuất ---</option>
                                    <?php foreach ($nhasx_list as $row): ?>
                                         <option value="<?php echo $row->ma; ?>" <?php echo $this->input->get('ma_nha_san_xuat') == $row->ma ? 'selected': '' ?> ><?php echo $row->ten; ?>
                                        </option>
                                    <?php endforeach; ?>
                                    </select>
                                <span class="autocheck" name="nhasx_autocheck"></span>
                                <div class="clear error" name="nhasx_error">
                                    <?php echo form_error('ma_nha_san_xuat'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="formRow">
                            <label for="param_sale" class="formLeft">Cấu hình:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <textarea cols="" rows="10" id="param_sale" name="cau_hinh"></textarea>
                                </span>
                                <span class="autocheck" name="cauhinh_autocheck"></span>
                            </div>
                            <div class="clear"></div>
                        </div>    

                        <div class="formRow">
                            <label for="param_sale" class="formLeft">Mô tả:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <textarea cols="" rows="20" id="param_sale" name="mo_ta"></textarea>
                                </span>
                                <span class="autocheck" name="mota_autocheck"></span>

                            </div>
                            <div class="clear"></div>
                        </div>    

                        <div class="formRow">
                            <label for="param_price" class="formLeft">Giá :<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="don_gia">
                                    <img src="<?php echo public_url(); ?>/admin/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" title="Giá bán sử dụng để giao dịch" class="tipS">
                                </span>
                                <span class="autocheck" name="dongia_autocheck"></span>
                                <div class="clear error" name="dongia_error">
                                    <?php echo form_error('don_gia'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_discount" class="formLeft">Giảm giá :<span class="req">*</span></label>
                            <div class="formRight">
                                <span>
                                    <input type="text" class="format_number" id="param_discount" style="width:100px" name="giam_gia">
                                    <img src="<?php echo public_url(); ?>/admin/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" title="Số tiền giảm giá" class="tipS">
                                    <!-- original-title="% giảm giá"  -->
                                </span>
                                <span class="autocheck" name="giam_gia_autocheck"></span>
                                <div class="clear error" name="giam_gia_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <input type="file" name="hinh" id="image">
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft">Ảnh kèm theo:<span class="req">*</span></label>
                            <div class="formRight">
                                <input type="file" multiple="" name="image_list[]" id="image_list">

                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_warranty" class="formLeft">Số lượng :<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneFour">
                                    <input type="text" id="param_warranty" name="so_luong">
                                </span>
                                <span class="autocheck" name="soluong_autocheck"></span>
                                <div class="clear error" name="soluong_error">
                                    <?php echo form_error('so_luong'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_warranty" class="formLeft">Bảo hành :<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneFour">
                                    <input type="text" id="param_warranty" name="bao_hanh">
                                </span>
                                <span class="autocheck" name="baohanh_autocheck"></span>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Trạng thái:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    Còn hàng <input type="radio" name="trang_thai" value="1" checked="1"><br>
                                    Hết hàng <input type="radio" name="trang_thai" value="0">
                                </span>
                                <span class="autocheck" name="trang_thai_autocheck"></span>
                                <div class="clear error" name="trang_thai_error">
                                    <?php echo form_error('trang_thai'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" class="redB" value="Thêm mới">
                    <input type="reset" onclick="window.location.href = '<?php echo admin_url('san_pham'); ?>'; " value="Hủy bỏ" class="basic">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>