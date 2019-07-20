<?php
    // load ra file head
    $this->load->view('admin/khuyen_mai/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>/admin/images/icons/dark/add.png">
                    <h6>Thêm mới quảng cáo</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Thông tin chung</a></li>
                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1">
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Tiêu đề quảng cáo:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" name="name"></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error">
                                    <?php echo form_error('name'); ?>  
                                </div>
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
                            <label for="param_name" class="formLeft">Trạng thái:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    Đang sử dụng <input type="radio" name="trang_thai" value="1" checked="1"><br>
                                    Khóa <input type="radio" name="trang_thai" value="0">
                                </span>
                                <span class="autocheck" name="trang_thai_autocheck"></span>
                                <div class="clear error" name="trang_thai_error">
                                    <?php echo form_error('trang_thai'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                    </div>
                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" class="redB" value="Thêm mới">
                    <input type="reset" onclick="window.location.href = '<?php echo admin_url('khuyen_mai'); ?>'; " value="Hủy bỏ" class="basic">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>