<style>
    div.form-login p{
        margin-bottom: 10px;
    }
    div.form-login i{
        color: red;
    }
</style>
<div style="font-size: 15px; color: red;"><?php $this->load->view('site/message', $this->data); ?></div>
<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="container">
        <div class="row" style="margin-left: 492px;">
            <div class="form-login" style="margin-top: 20px;">
                <form action="<?php echo base_url('thanh_vien/quen_pass'); ?>" name="login" method="post" enctype="multipart/form-data">
                    <h3 class="title">Quên Mật Khẩu</h3>
                    <label style="color: red;">
                        <?php echo form_error('login'); ?>
                    </label>
                    <p>
                        <input type="email" name="email" placeholder="Email Của Bạn">
                    </p>
                    <i>
                        <?php echo form_error('email'); ?>
                    </i>

                    <button class="button primary" type="submit">Lấy lại mật khẩu</button>
                </form>
            </div>

        </div>
    </div>
</div>
