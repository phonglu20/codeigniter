<div id="leftSide" style="padding-top:30px;">
    <!-- Account panel -->
    <div class="sideProfile">
        <a href="<?php echo admin_url('home'); ?>" title="" class="profileFace">
            <img src="<?php echo public_url(); ?>admin/images/user.png" width="45">
        </a>
            <?php if($this->session->userdata('login') && $this->session->userdata('login')!=  ''): ?>
                <span style="font-size: 14px;" href="<?php echo admin_url('home'); ?>">
                    Xin chào: Admin !
                </span>
                <span style="font-weight: bold; font-size: 18px;">
                    <?php echo $this->session->userdata('login'); ?>
                </span>
            <?php endif ;?>
        <div class="clear"></div>
    </div>
    <div class="sidebarSep"></div>
    <!-- Left navigation -->

    <?php $this->load->helper('admin'); ?>

    <ul id="menu" class="nav" >
        <li class="home">
            <a href="<?php echo admin_url(); ?>" id="current">
                <span>Bảng điều khiển</span>
            </a>
        </li>

        <li class="tran">
            <a href="<?php echo admin_url('hoa_don'); ?>">
                <span>Hóa đơn</span>
            </a>
        </li>

        </li>

        <li class="product">
            <a href="#" class=" exp">
                <span>Danh mục</span>
                <strong>3</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('san_pham');?>">
                        Linh kiện							
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('loai_san_pham'); ?>">
                        Loại linh kiện							
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('nha_san_xuat'); ?>">
                        Nhà sản xuất                      
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="account">
            <a href="" class=" exp">
                <span>Tài khoản</span>
                <strong>2</strong>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('admin')?>">
                        Ban quản trị							
                    </a>
                </li>  
                <li>
                    <a href="<?php echo admin_url('thanh_vien')?>">
                        Thành viên                           
                    </a>
                </li>
            </ul>
        </li>

        <li class="support">
            <a href="<?php echo admin_url('khuyen_mai'); ?>" >
                <span>Khuyến mãi</span>
            </a>
        </li>

    </ul>

</div>
<div class="clear"></div>
