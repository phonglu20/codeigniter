<?php
    // load ra file head
    $this->load->view('admin/admin/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url(); ?>admin/images/icons/dark/add.png">
                    <h6>Thêm mới admin</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Thông tin chung</a></li>
                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1">
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Username: <span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" _autocheck="true" id="param_username" name="username" value="<?php echo set_value("username") ;?>">
                                </span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error">
                                    <?php echo form_error('username'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Password: <span class="req">*</span></label>
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
                            <label for="param_name" class="formLeft">Nhập lại Password: <span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="password" _autocheck="true" id="param_password_rp" name="password_rp">
                                </span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"><?php echo form_error('password_rp'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Họ và tên: <span class="req">*</span></label>
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

                    </div>

                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" class="redB" value="Thêm mới">
                    <input type="reset" onclick="window.location.href = '<?php echo admin_url('admin'); ?>'; " value="Hủy bỏ" class="basic">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>