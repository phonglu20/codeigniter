<?php
    // load ra file head
    $this->load->view('admin/thanh_vien/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>admin/images/icons/dark/add.png">
                    <h6>Thêm mới thành viên</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Thông tin chung</a></li>
                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1">

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Email:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" _autocheck="true" id="param_name" name="email" value="<?php echo set_value("email") ;?>">
                                </span>
                                <span class="autocheck" name="email_autocheck"></span>
                                <div class="clear error" name="email_error">
                                    <?php echo form_error('email'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Password:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="password" _autocheck="true" id="param_password" name="password">
                                </span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error">
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Nhập lại Password:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="password" _autocheck="true" id="param_password_rp" name="password_rp">
                                </span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error">
                                    <?php echo form_error('password_rp'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Họ và tên:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" _autocheck="true" id="param_name" name="name" value="<?php echo set_value("name") ;?>">
                                </span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error">
                                    <?php echo form_error('name'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Địa chỉ:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" _autocheck="true" id="param_name" name="dia_chi" value="<?php echo set_value("dia_chi") ;?>">
                                </span>
                                <span class="autocheck" name="dia_chi_autocheck"></span>
                                <div class="clear error" name="dia_chi_error">
                                    <?php echo form_error('dia_chi'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Điện thoại:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" _autocheck="true" id="param_name" name="dien_thoai" value="<?php echo set_value("dien_thoai") ;?>">
                                </span>
                                <span class="autocheck" name="dien_thoai_autocheck"></span>
                                <div class="clear error" name="dien_thoai_error">
                                    <?php echo form_error('dien_thoai'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Trạng thái:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    Còn hoạt động <input type="radio" name="trang_thai" value="1" checked="1"><br>
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
                    <input type="reset" onclick="window.location.href = '<?php echo admin_url('thanh_vien'); ?>'; " value="Hủy bỏ" class="basic">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>