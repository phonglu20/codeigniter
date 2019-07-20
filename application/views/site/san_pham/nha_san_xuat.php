<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="row" style="width: 74%; float: right;">
    <div class="col-sm-12 col-md-8 col-lg-9" style="width: 100%;">
        <!-- tab product -->
        <div class="kt-tabs style4 kt-tab-fadeeffect">
            
            <div class="tab-container" style="width: 1160px; z-index: 0;">
                <div id="tab-1" class="tab-panel active">
                    <ul style="float: left;">
                    <?php foreach ($list as $row): ?>
                        <li class="product-item style6" style="float: left; width: 292px; height: 345px;">
                            <div class="product-inner">
                                <div class="thumb">
                                    <a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>" title="">
                                        <img style="width: 180px; height: 200px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                                    </a>
                                    <div class="group-button">
                                        <a class="wishlist" href="">Yêu Thích</a>
                                        <a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>" title="">
                                        Chi Tiết
                                        </a>
                                        <a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ</a>
                                    </div>

                                </div>
                                <div class="info">

                                    <h3 class="product-name" style="height: 45px">
                                            <a title="" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                                            </a>
                                        </h3>

									<span class="price">
                                    <?php if($row->giam_gia > 0){ ?>
                                        <ins><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</ins>
										<del><?php echo number_format($row->don_gia); ?> VNĐ</del>
                                    <?php }else{ ?>
                                        <ins><?php echo number_format($row->don_gia); ?> VNĐ</ins>
                                    <?php }?>
									</span>

                                    <div title="Đánh giá" class="rating">
                                        <i class=<?php if($row->sao >= 1){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                        <i class=<?php if($row->sao >= 2){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                        <i class=<?php if($row->sao >= 3){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                        <i class=<?php if($row->sao >= 4){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                        <i class=<?php if($row->sao >= 5){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                                    </div>
                                    
                                    <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    </ul>

                </div>

            </div>
        </div>
        <!-- .tab product -->
    </div>
        <div class='pagination' style="margin-right: 75px;">
            <?php echo $this->pagination->create_links(); ?>
        </div>
</div>
</div>
<div class="clear"></div>