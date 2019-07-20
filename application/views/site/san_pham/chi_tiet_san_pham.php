<style type="text/css">
.cau_hinh{
    text-overflow: ellipsis;
    overflow: hidden;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    display: -webkit-box;
}
    
.star-rating {
  font-size: 0;
  white-space: nowrap;
  display: inline-block;
  width: 100px;
  height: 20px;
  overflow: hidden;
  position: relative;
  background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
  background-size: contain;
}
.star-rating i {
  opacity: 0;
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 20%;
  z-index: 1;
  background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
  background-size: contain;
}
.star-rating input {
  -moz-appearance: none;
  -webkit-appearance: none;
  opacity: 0;
  display: inline-block;
  width: 20%;
  height: 100%;
  margin: 0;
  padding: 0;
  z-index: 2;
  position: relative;
}
.star-rating input:hover + i,
.star-rating input:checked + i {
  opacity: 1;
}
.star-rating i ~ i {
  width: 40%;
}
.star-rating i ~ i ~ i {
  width: 60%;
}
.star-rating i ~ i ~ i ~ i {
  width: 80%;
}
.star-rating i ~ i ~ i ~ i ~ i {
  width: 100%;
}
::after,
::before {
  height: 100%;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  text-align: center;
  vertical-align: middle;
}

</style>

<div class="tab-catalog" style="width: 1340px; margin: 0px auto; height: auto;">
    <div class="single-product" style="width: 877px; margin-left: 378px;">
        <div class="row" style="padding-left: 40px;">

            <div class="col-sm-6 col-md-6 col-lg-6" >
                <div class="images kt-images">
                    <div class="kt-main-image">
                        <a title="" class="zoom" href="<?php echo base_url('upload') ?>/san_pham/<?php echo $san_pham_info->hinh; ?>">
                            <img style="width: 350px; height: 400px; margin-left: 8px;" src="<?php echo base_url('upload') ?>/san_pham/<?php echo $san_pham_info->hinh; ?>" alt="<?php echo $san_pham_info->ten; ?>">
                        </a>
                    </div>

                    <div class="kt-thumbs" style="height: 80px;">
                        <div class="owl-carousel" data-items="1" data-nav="true" data-animateout="slideInUp" data-animatein="slideInUp">
                            <?php $hinh_list = json_decode($san_pham_info->list_hinh) ?>
                            <?php if(is_array($hinh_list)){ ?>
                            <div class="page-thumb">
                                <?php foreach ($hinh_list as $img): ?>
                                <a class="item-thumb zoom" href="<?php echo base_url('upload') ?>/san_pham/<?php echo $img ?>"><img style="width: 100px; height:100px;" src="<?php echo base_url('upload') ?>/san_pham/<?php echo $img ?>" alt="<?php echo $san_pham_info->ten; ?>"></a>
                                <?php endforeach; ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6"">
                <div class="summary">
                    <h1 title=""  class="product_title entry-title">
                        <h2><?php echo $san_pham_info->ten; ?></h2>
                    </h1>
                    <?php if($san_pham_info->giam_gia > 0){ ?>
                        <span class="price" style="font-size: 15px; color: red; float: left; padding-right: 8px;">
                            <b style="color: #0b0b0b;">Giá:  </b><?php echo number_format($san_pham_info->don_gia - $san_pham_info->giam_gia); ?> VNĐ
                        </span>
                        <span class="price" style="font-size: 15px;color: #666666; text-decoration: line-through;">
                            <?php echo number_format($san_pham_info->don_gia); ?> VNĐ
                        </span>
                    <?php }else{ ?>
                        <b style="color: #0b0b0b;">Giá:  </b>
                        <span class="price" style="font-size: 15px; color: red; ">
                            <?php echo number_format($san_pham_info->don_gia); ?> VNĐ
                        </span>
                    <?php }?>
                    
                    <p class="stock out-of-stock">
                        <label>Bảo hành: </label> 
                        <?php if ($san_pham_info->bao_hanh>0) {;?>
                            <i class="fa fa-check"></i> <?php echo $san_pham_info->bao_hanh; ?> Tháng 
                        <?php } else {;?>
                            <i class="fa fa-close"></i> Không bảo hành 
                        <?php } ;?> 
                    </p>

                    <p class="stock out-of-stock">
                        <label>Tình Trạng: </label><i class="fa fa-check"></i>
                        <?php if($san_pham_info->trang_thai==1) { ;?>
                            <a>Còn hàng</a>
                        <?php } else {; ?>
                            <a style="color:red">Hết hàng</a>
                        <?php } ; ?>
                    </p>

                    <?php if(isset($user_info) && $user_info !=  ''){ ;?>
                    <form action="" method="post">
                        <label>Đánh Giá:&nbsp</label>
                        <span class="star-rating">
                            <input type="radio" name="danhgia" onchange="this.form.submit();" 
                            value="1_<?php echo $san_pham_info->ma; ?>" 
                            <?php if($san_pham_info->sao >= 1){ ?> checked <?php }?> ><i></i>
                            <input type="radio" name="danhgia" onchange="this.form.submit();" 
                            value="2_<?php echo $san_pham_info->ma; ?>"
                            <?php if($san_pham_info->sao >= 2){ ?> checked <?php }?> ><i></i>
                            <input type="radio" name="danhgia" onchange="this.form.submit();" 
                            value="3_<?php echo $san_pham_info->ma; ?>"
                            <?php if($san_pham_info->sao >= 3){ ?> checked <?php }?> ><i></i>
                            <input type="radio" name="danhgia" onchange="this.form.submit();" 
                            value="4_<?php echo $san_pham_info->ma; ?>"
                            <?php if($san_pham_info->sao >= 4){ ?> checked <?php }?> ><i></i>
                            <input type="radio" name="danhgia" onchange="this.form.submit();" 
                            value="5_<?php echo $san_pham_info->ma; ?>"
                            <?php if($san_pham_info->sao >= 5){ ?> checked <?php }?> ><i></i>
                        </span>
                    </form>
                    <?php } else{ ;?>
                        <div title="Đánh giá" class="rating">
                            <label>Đánh Giá:&nbsp</label>
                            <i class=<?php if($san_pham_info->sao >= 1){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                            <i class=<?php if($san_pham_info->sao >= 2){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                            <i class=<?php if($san_pham_info->sao >= 3){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                            <i class=<?php if($san_pham_info->sao >= 4){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                            <i class=<?php if($san_pham_info->sao >= 5){ ;?>"active fa fa-star" <?php } else { ;?> "fa fa-star"<?php };?>></i>
                        </div>
                    <?php } ;?>

                    <div class="short-descript">
                        <p class="cau_hinh"><strong>Mô tả: </strong><?php echo $san_pham_info->cau_hinh; ?></p>
                    </div>

                    <form name="add_product" method="post" action="<?php echo base_url('gio_hang/add/'.$san_pham_info->ma); ?>" enctype="multipart/form-data">
                        <div class="quantity">
                            <span>Số Lượng Mua:</span>
                            <input type="number" data-step="1" data-min="1" data-max="5" name="qty" value="1" title="Qty" class="input-text qty text" size="4" min="1" max="5">
                        </div>

                        <?php if($san_pham_info->so_luong <=0 ||$san_pham_info->trang_thai == 0){ ;?>
                            <h4 style="color: red">Hết hàng</h4>
                        <?php } else{ ;?>
                            <button type="submit" class="single_add_to_cart_button button alt">Thêm Vào Giỏ Hàng</button>
                        <?php } ;?>
                    </form>

                    <div class="share" style="padding-top: 8px;">
                        <span class='st_facebook_hcount' displayText='Facebook'></span>
                        <span class='st_twitter_hcount' displayText='Tweet'></span>
                        <span class='st_googleplus_hcount' displayText='Google +'></span>
                        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                        <script type="text/javascript">stLight.options({publisher: "71bbd720-bb71-4ba5-93e5-81ec93d19019", doNotHash: true, doNotCopy: false, hashAddressBar: false});</script>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-tabs">
            <ul class="nav-tab">
                <li class="active"><a data-toggle="tab" href="#tab-1">Cấu Hình Chi Tiết</a></li>
                <li><a data-toggle="tab" href="#tab-2">Sản Phẩm Liên Quan</a></li>
                <li><a data-toggle="tab" href="#tab-3">Mô tả Chi Tiết</a></li>
                <li><a data-toggle="tab" href="#tab-4">Đánh Giá</a></li>
            </ul>

            <div class="tab-container" >

                <div id="tab-1"  class="tab-panel active">
                    <table>
                            <?php echo $san_pham_info->cau_hinh; ?>
                    </table>
                </div>

                <div id="tab-2" class="tab-panel" style="margin-bottom: 300px;">
                    <ul>
                    <?php foreach ($list as $row): ?>
                        <li class="product-item style6" style="float: left; width: 271px; height: 323px;">
                            <div class="product-inner">
                                <div class="thumb">
                                    <a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>" title="">
                                        <img style="width: 180px; height: 197px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
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
                                    <h3 class="product-name" style="height: 60px">
                                        <a href="#"><?php echo $row->ten; ?></a>
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
                                    <div style="margin-bottom: -10px;"></div>

                                </div>
                    
                            </div>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>

                <div id="tab-3"  class="tab-panel">
                    <table>
                            <?php echo $san_pham_info->mo_ta; ?>
                    </table>
                </div>

                <div id="tab-4">
                    <div class="fb-comments" data-href="<?php echo base_url('chi-tiet-san-pham/'.$san_pham_info->ma_loai_san_pham.seoname($san_pham_info->ten).'/'.$san_pham_info->ma) ?>" data-colorscheme="light" data-numposts="5" data-width="500">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>