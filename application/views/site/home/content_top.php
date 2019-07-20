<div class="kt-product-tab kt-tab-fadeeffect margin-top-5">
    <ul class="nav-tab">
        <li class="active">
            <a data-animated="fadeInUp" data-toggle="tab" href="#tab-123" style="font-size: 17px;">Bán Chạy</a>
        </li>
        <li class="">
            <a data-animated="fadeInUp" data-toggle="tab" href="#tab-1" style="font-size: 17px;">Mới Nhất</a>
        </li>
        <li>
            <a data-animated="fadeInUp" data-toggle="tab" href="#tab-2" style="font-size: 17px;">Giảm Giá</a>
        </li>
    </ul>
    <div class="tab-container">
        <div id="tab-123" class="tab-panel active">
            <div class="owl-carousel nav-center nav-style-1">
                <ul style="width: 1450px;">
                <?php foreach ($spbanchay as $row): ?>
                    <li class="product-item style9" style="float: left; width: 28%;">
                        <div class="product-inner">
                            <div class="thumb col-sm-5">
                                <a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                                    <img style="margin-top: 30px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                                </a>
                            </div>

                            <div class="info col-sm-7">
                                <h3 class="product-name short">
                                    <a title="" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                                        <?php echo $row->ten; ?>
                                    </a>
                                </h3>
                                <div title="Đánh giá" class="rating">
                                    <i class=<?php if($row->sao >= 1){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    <i class=<?php if($row->sao >= 2){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    <i class=<?php if($row->sao >= 3){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    <i class=<?php if($row->sao >= 4){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    <i class=<?php if($row->sao >= 5){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                </div>

                            <?php 
                            if($row->giam_gia > 0){ 
                            ?>
                                <div style="width:100%;height: 85px">
                                    <i class="price" style="color: #666666; float: left; text-decoration: line-through;">
                                        <?php echo number_format($row->don_gia); ?> VNĐ
                                    </i>
                                    <i class="price" style="font-size: 20px; color: #800000; float: left; padding-right: 8px; margin-top: -35px">
                                        <?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
                                    </i>
                                </div>
                            <?php }
                                else { 
                            ?>      
                                <div style="width:100%; height: 85px">
                                    <i class="price" style="font-size: 20px; color: #800000; float: left; padding-right: 8px;">
                                        <?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
                                    </i>
                                </div>
                            <?php }
                            ?>
                                <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
                                <div class="group-buttons">
                                    <a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
                                </div>
                            </div>

                        </div>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div id="tab-1" class="tab-panel">
            <div class="owl-carousel nav-center nav-style-1">
                <ul style="width: 1450px;">
                <?php foreach ($spmoi as $row): ?>
                    <li class="product-item style9" style="float: left; width: 28%;">
                        <div class="product-inner">
                            <div class="thumb col-sm-5">
                                <a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                                    <img style="margin-top: 30px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                                </a>
                            </div>

                            <div class="info col-sm-7">
                                <h3 class="product-name short">
                                    <a title="" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                                        <?php echo $row->ten; ?>
                                    </a>
                                </h3>

                                <div title="Đánh giá" class="rating">
                                    <i class=<?php if($row->sao >= 1){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    <i class=<?php if($row->sao >= 2){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    <i class=<?php if($row->sao >= 3){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    <i class=<?php if($row->sao >= 4){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    <i class=<?php if($row->sao >= 5){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                </div>

                            <?php 
                            if($row->giam_gia > 0){ 
                            ?>
                                <div style="width:100%;height: 85px">
                                    <i class="price" style="color: #666666; float: left; text-decoration: line-through;">
                                        <?php echo number_format($row->don_gia); ?> VNĐ
                                    </i>
                                    <i class="price" style="font-size: 20px; color: #800000; float: left; padding-right: 8px; margin-top: -35px">
                                        <?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
                                    </i>
                                </div>
                            <?php }
                                else { 
                            ?>      
                                <div style="width:100%; height: 85px">
                                    <i class="price" style="font-size: 20px; color: #800000; float: left; padding-right: 8px;">
                                        <?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
                                    </i>
                                </div>
                            <?php }
                            ?>
                                <div class="group-buttons">
                                    <a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
                                </div>
                            </div>

                        </div>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div id="tab-2" class="tab-panel">
            <div class="owl-carousel nav-center nav-style-1">
                <ul style="width: 1450px;">
                <?php foreach ($spgiamgia as $row): ?>
                    <li class="product-item style9" style="float: left; width: 28%;">
                        <div class="product-inner">
                            <div class="thumb col-sm-5">
                                <a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                                    <img style="margin-top: 30px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                                </a>
                            </div>

                            <div class="info col-sm-7">
                                <h3 class="product-name short">
                                    <a title="" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                                        <?php echo $row->ten; ?>
                                    </a>
                                </h3>
                                
                                <div title="Đánh giá" class="rating">
                                    <i class=<?php if($row->sao >= 1){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    <i class=<?php if($row->sao >= 2){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    <i class=<?php if($row->sao >= 3){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    <i class=<?php if($row->sao >= 4){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    <i class=<?php if($row->sao >= 5){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                </div>

                            <?php 
                            if($row->giam_gia > 0){ 
                            ?>
                                <div style="width:100%;height: 85px">
                                    <i class="price" style="color: #666666; float: left; text-decoration: line-through;">
                                        <?php echo number_format($row->don_gia); ?> VNĐ
                                    </i>
                                    <i class="price" style="font-size: 20px; color: #800000; float: left; padding-right: 8px; margin-top: -35px">
                                        <?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
                                    </i>
                                </div>
                            <?php }
                                else { 
                            ?>      
                                <div style="width:100%; height: 85px">
                                    <i class="price" style="font-size: 20px; color: #800000; float: left; padding-right: 8px;">
                                        <?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
                                    </i>
                                </div>
                            <?php }
                            ?>
                                <div class="group-buttons">
                                    <a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
                                </div>
                            </div>

                        </div>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
</div>
