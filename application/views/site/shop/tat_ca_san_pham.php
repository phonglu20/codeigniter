<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="row" style="width: 74%; float: right;">
    <div class="col-sm-12 col-md-8 col-lg-9" style="width: 100%;">
        <!-- tab product -->
        <div class="kt-tabs style4 kt-tab-fadeeffect">
            
            <div class="tab-container" style="width: 1160px; z-index: 0;">
                <div id="tab-1" class="tab-panel active">

                    <div style="margin: 10px 0px 10px 621px;">
                        <form action="" METHOD="get">
                            <span>Sắp xếp theo:</span>
                            <span>
                                <select name="phan_loai" onchange="this.form.submit();">
                                <?php if($phan_loai) { ;?>
                                    <option value="sp_moi" <?php echo $phan_loai=='sp_moi' ?'selected': '' ?> >
                                        Sản phẩm mới
                                    </option>
                                    <option value="tang_dan" <?php echo $phan_loai=='tang_dan' ? 'selected': '' ?> >
                                        Giá: Tăng dần
                                    </option>
                                    <option value="giam_dan" <?php echo $phan_loai=='giam_dan' ?'selected': '' ?> >
                                        Giá: Giảm dần
                                    </option>
                                    <option value="giam_gia" <?php echo $phan_loai=='giam_gia' ?'selected': '' ?> >
                                        Giảm giá
                                    </option>
                                    <option value="ban_chay" <?php echo $phan_loai=='ban_chay' ?'selected': '' ?> >
                                        Bán chạy nhất
                                    </option>
                                    <option value="sp_cu" <?php echo $phan_loai=='sp_cu' ?'selected': '' ?> >
                                        Cũ nhất
                                    </option>
            
                                <?php } else  { ;?>
                                    <option value="sp_moi">Sản phẩm mới</option>
                                    <option value="tang_dan">Giá: Tăng dần</option>
                                    <option value="giam_dan">Giá: Giảm dần</option>
                                    <option value="giam_gia">Giảm giá</option>
                                    <option value="ban_chay">Bán chạy nhất</option>
                                    <option value="sp_cu">Cũ nhất</option>
                                    
                                <?php };?>
         
                              </select>
                        </span>
                    </form>
                </div>

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
        <div class='pagination' style="margin-right: 86px;">
            <?php echo $this->pagination->create_links(); ?>
        </div>
</div>
</div>
<div class="clear"></div>