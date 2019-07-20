<!-- Header -->
<div class="header-control">
    <div class="vertical-menu-wapper">
        <div class="box-vertical-megamenus" data-items="6">
            <h4 class="title" style="background-color: #0b0b0b; color: #fff;">
                <span class="text" style="font-weight: bold;">Danh mục sản phẩm</span>
                <span class="bar">
                    <i class="fa fa-bars"></i>
                </span>
            </h4>
            <div class="verticalmenu-content">
                <ul class="kt-nav verticalmenu-list" >
                <?php foreach ($loai_list as $row): ?>
                    <li class="menu-item-has-children">
                        <a href="<?php echo base_url('san-pham/danh-muc/'.seoname($row->ten).'/'.$row->ma.'/0'); ?>">
                            <span class="menu-icon">
                                <img src="<?php echo base_url('upload'); ?>/icons/12.png" alt="">
                            </span>
                            <?php echo $row->ten; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
                <a data-closetext="ĐÓNG" data-opentext="XEM TOÀN BỘ DANH MỤC" class="viewall closed" href="#" style="font-weight: bold;">XEM TOÀN BỘ DANH MỤC</a>
            </div>
        </div>
    </div>
    <div class="main-menu-wapper">
        <a class="mobile-navigation" href="#">
                            <span class="icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
            Main Menu
        </a>
        <ul class="kt-nav main-menu clone-main-menu">
            <li class="menu-item-has-children">
                <a href="<?php echo base_url(); ?>">Trang Chủ</a>
            </li>
            
            <li class="menu-item-has-children">
                <a href="<?php echo base_url('shop/tat_ca_san_pham/0'); ?>">Tất Cả Sản Phẩm</a>
            </li>
<!--
            <li class="menu-item-has-children">
                <a href="#">Nhà sản xuất</a>
                <ul class="sub-menu">
                    <?php foreach ($nhasx_list as $row): ?>
                        <li>
                            <a href="<?php echo base_url('san-pham/nha-san-xuat/'.seoname($row->ten).'/'.$row->ma.'/0'); ?>">
                                <?php echo $row->ten; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
-->
            <li class="menu-item-has-children">
                <a href="<?php echo base_url('shop/lien_he'); ?>">Liên Hệ</a>
            </li>

            <?php if(isset($user_info) && $user_info !=  ''): ?>
                <li>
                    <a style="text-transform: capitalize;" href="<?php echo site_url('thanh_vien/index'); ?>">XIN CHÀO: <?php echo $user_info->ho_ten; ?></a>
                </li>
                <li>
                    <a style="text-transform: capitalize;" href="<?php echo site_url('thanh_vien/logout'); ?>">Đăng Xuất</a>
                </li>
            <?php else: ?>
            <li><a href="<?php echo site_url('thanh_vien/login') ?>">Đăng Nhập</a></li>
            <li><a href="<?php echo site_url('thanh_vien/register')?>">Đăng Ký</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<!-- Header -->