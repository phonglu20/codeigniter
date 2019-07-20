<!--#######################################################################################################################--><!-- Tab cat ################################# Main board -->
<div class="kt-category-tabs kt-tab-fadeeffect margin-top-50" >
	<div class="tab-head">
		<h3 class="title">
			<img class="icon" src="<?php echo base_url('upload');?>/images/icons/35.png" alt="">Main board</a>
		</h3>
		<ul class="nav-tab">
            <li class="active">
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-3">MỚI NHẤT</a>
            </li>
            <li>
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-4">GIẢM GIÁ</a>
            </li>
        </ul>
        <div class="floor-elevator">
            <a class="btn-elevator up  fa fa-angle-up"></a>
            <a class="btn-elevator down fa fa-angle-down"></a>
        </div>
	</div>
	<div class="category-tab-content">
		<div class="top-banner">
			<div class="row margin-0">
				<div class="col-sm-6 padding-0" >
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/main-board-4.png" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
				<div class="col-sm-6 padding-0">
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/main-board-5.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-inner has-banner-left">
			<div class="tab-content-products">
				<div class="tab-container">
					
					<div id="tab-3" class="tab-panel active">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spmoi_m1 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 175px; height: 190px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>" title="Quick View" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="#">Yêu thích</a>
											<a class="compare button" href="#">So sánh</a>
                                    		<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng
                                    		</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                        ?>
			                        <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
									</div>

								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div id="tab-4" class="tab-panel">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spgiamgia_m1 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 160px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name" style="height: 50px">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                            <span class="price" style="color: #666666; text-decoration: line-through;">
                            				<?php echo number_format($row->don_gia); ?> VNĐ
                        				</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                        ?>
			                        <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- ./Tab cat -->
<!--#######################################################################################################################-->
<!-- Tab cat  ################################# CPU -->
<div class="kt-category-tabs kt-tab-fadeeffect margin-top-50" >
	<div class="tab-head">
		<h3 class="title">
			<img class="icon" src="<?php echo base_url('upload');?>/images/icons/35.png" alt="">CPU</a>
		</h3>
		<ul class="nav-tab">
            <li class="active">
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-5">MỚI NHẤT</a>
            </li>
            <li>
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-6">GIẢM GIÁ</a>
            </li>
        </ul>
        <div class="floor-elevator">
            <a class="btn-elevator up  fa fa-angle-up"></a>
            <a class="btn-elevator down fa fa-angle-down"></a>
        </div>
	</div>
	<div class="category-tab-content">
		<div class="top-banner">
			<div class="row margin-0">
				<div class="col-sm-6 padding-0" >
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/cpu-2.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
				<div class="col-sm-6 padding-0">
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/cpu-4.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-inner has-banner-left">
			<div class="tab-content-products">
				<div class="tab-container">

					<div id="tab-5" class="tab-panel active">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spmoi_c2 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 160px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                        ?>
			                        <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div id="tab-6" class="tab-panel">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spgiamgia_c2 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 150px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                            <span class="price" style="color: #666666; text-decoration: line-through;">
                            				<?php echo number_format($row->don_gia); ?> VNĐ
                        				</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                        ?>
			                        <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- ./Tab cat -->
<!--#######################################################################################################################-->
<!-- Tab cat  ################################# RAM -->
<div class="kt-category-tabs kt-tab-fadeeffect margin-top-50" >
	<div class="tab-head">
		<h3 class="title">
			<img class="icon" src="<?php echo base_url('upload');?>/images/icons/35.png" alt="">RAM</a>
		</h3>
		<ul class="nav-tab">
            <li class="active">
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-7">MỚI NHẤT</a>
            </li>
            <li>
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-8">GIẢM GIÁ</a>
            </li>
        </ul>
        <div class="floor-elevator">
            <a class="btn-elevator up  fa fa-angle-up"></a>
            <a class="btn-elevator down fa fa-angle-down"></a>
        </div>
	</div>
	<div class="category-tab-content">
		<div class="top-banner">
			<div class="row margin-0">
				<div class="col-sm-6 padding-0" >
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/ram-1.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
				<div class="col-sm-6 padding-0">
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/ram-2.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-inner has-banner-left">
			<div class="tab-content-products">
				<div class="tab-container">

					<div id="tab-7" class="tab-panel active">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spmoi_r3 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 160px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                        ?>
			                        <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div id="tab-8" class="tab-panel">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spgiamgia_r3 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 150px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                            <span class="price" style="color: #666666; text-decoration: line-through;">
                            				<?php echo number_format($row->don_gia); ?> VNĐ
                        				</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                        <?php }
			                        ?>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- ./Tab cat -->
<!--#######################################################################################################################-->
<!-- Tab cat  ################################# HDD -->
<div class="kt-category-tabs kt-tab-fadeeffect margin-top-50" >
	<div class="tab-head">
		<h3 class="title">
			<img class="icon" src="<?php echo base_url('upload');?>/images/icons/35.png" alt="">HDD</a>
		</h3>
		<ul class="nav-tab">
            <li class="active">
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-9">MỚI NHẤT</a>
            </li>
            <li>
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-10">GIẢM GIÁ</a>
            </li>
        </ul>
        <div class="floor-elevator">
            <a class="btn-elevator up  fa fa-angle-up"></a>
            <a class="btn-elevator down fa fa-angle-down"></a>
        </div>
	</div>
	<div class="category-tab-content">
		<div class="top-banner">
			<div class="row margin-0">
				<div class="col-sm-6 padding-0" >
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/hdd-3.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
				<div class="col-sm-6 padding-0">
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/hdd-1.jpeg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-inner has-banner-left">
			<div class="tab-content-products">
				<div class="tab-container">

					<div id="tab-9" class="tab-panel active">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spmoi_h4 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 160px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                        ?>
			                        <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div id="tab-10" class="tab-panel">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spgiamgia_h4 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 150px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                            <span class="price" style="color: #666666; text-decoration: line-through;">
                            				<?php echo number_format($row->don_gia); ?> VNĐ
                        				</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                        <?php }
			                        ?>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- ./Tab cat -->
<!--#######################################################################################################################-->
<!-- Tab cat  ################################# VGA -->
<div class="kt-category-tabs kt-tab-fadeeffect margin-top-50" >
	<div class="tab-head">
		<h3 class="title">
			<img class="icon" src="<?php echo base_url('upload');?>/images/icons/35.png" alt="">VGA</a>
		</h3>
		<ul class="nav-tab">
            <li class="active">
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-11">MỚI NHẤT</a>
            </li>
            <li>
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-12">GIẢM GIÁ</a>
            </li>
        </ul>
        <div class="floor-elevator">
            <a class="btn-elevator up  fa fa-angle-up"></a>
            <a class="btn-elevator down fa fa-angle-down"></a>
        </div>
	</div>
	<div class="category-tab-content">
		<div class="top-banner">
			<div class="row margin-0">
				<div class="col-sm-6 padding-0" >
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/vga-1.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
				<div class="col-sm-6 padding-0">
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/vga-2.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-inner has-banner-left">
			<div class="tab-content-products">
				<div class="tab-container">

					<div id="tab-11" class="tab-panel active">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spmoi_v5 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 160px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                        ?>
			                        <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div id="tab-12" class="tab-panel">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spgiamgia_v5 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 150px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                            <span class="price" style="color: #666666; text-decoration: line-through;">
                            				<?php echo number_format($row->don_gia); ?> VNĐ
                        				</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                        <?php }
			                        ?>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- ./Tab cat -->
<!--#######################################################################################################################-->
<!-- Tab cat  ################################# Case -->
<div class="kt-category-tabs kt-tab-fadeeffect margin-top-50" >
	<div class="tab-head">
		<h3 class="title"> 
			<img class="icon" src="<?php echo base_url('upload');?>/images/icons/35.png" alt="">CASE</a>
		</h3>
		<ul class="nav-tab">
            <li class="active">
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-13">MỚI NHẤT</a>
            </li>
            <li>
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-14">GIẢM GIÁ</a>
            </li>
        </ul>
        <div class="floor-elevator">
            <a class="btn-elevator up  fa fa-angle-up"></a>
            <a class="btn-elevator down fa fa-angle-down"></a>
        </div>
	</div>
	<div class="category-tab-content">
		<div class="top-banner">
			<div class="row margin-0">
				<div class="col-sm-6 padding-0" >
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/case-1.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
				<div class="col-sm-6 padding-0">
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/case-2.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-inner has-banner-left">
			<div class="tab-content-products">
				<div class="tab-container">

					<div id="tab-13" class="tab-panel active">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spmoi_c6 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 160px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                        ?>
			                        <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div id="tab-14" class="tab-panel">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spgiamgia_c6 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 150px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                            <span class="price" style="color: #666666; text-decoration: line-through;">
                            				<?php echo number_format($row->don_gia); ?> VNĐ
                        				</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                        <?php }
			                        ?>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- ./Tab cat -->
<!--#######################################################################################################################-->
<!-- Tab cat  ################################# PSU-->
<div class="kt-category-tabs kt-tab-fadeeffect margin-top-50" >
	<div class="tab-head">
		<h3 class="title"> 
			<img class="icon" src="<?php echo base_url('upload');?>/images/icons/35.png" alt="">PSU</a>
		</h3>
		<ul class="nav-tab">
            <li class="active">
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-15">MỚI NHẤT</a>
            </li>
            <li>
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-16">GIẢM GIÁ</a>
            </li>
        </ul>
        <div class="floor-elevator">
            <a class="btn-elevator up  fa fa-angle-up"></a>
            <a class="btn-elevator down fa fa-angle-down"></a>
        </div>
	</div>
	<div class="category-tab-content">
		<div class="top-banner">
			<div class="row margin-0">
				<div class="col-sm-6 padding-0" >
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/psu-1.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
				<div class="col-sm-6 padding-0">
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/psu-2.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-inner has-banner-left">
			<div class="tab-content-products">
				<div class="tab-container">

					<div id="tab-15" class="tab-panel active">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spmoi_p7 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 160px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                        ?>
			                        <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div id="tab-16" class="tab-panel">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spgiamgia_p7 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 150px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                            <span class="price" style="color: #666666; text-decoration: line-through;">
                            				<?php echo number_format($row->don_gia); ?> VNĐ
                        				</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                        <?php }
			                        ?>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- ./Tab cat -->
<!--#######################################################################################################################-->
<!-- Tab cat  ################################# Monitor-->
<div class="kt-category-tabs kt-tab-fadeeffect margin-top-50" >
	<div class="tab-head">
		<h3 class="title"> 
			<img class="icon" src="<?php echo base_url('upload');?>/images/icons/35.png" alt="">MONITOR</a>
		</h3>
		<ul class="nav-tab">
            <li class="active">
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-17">MỚI NHẤT</a>
            </li>
            <li>
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-18">GIẢM GIÁ</a>
            </li>
        </ul>
        <div class="floor-elevator">
            <a class="btn-elevator up  fa fa-angle-up"></a>
            <a class="btn-elevator down fa fa-angle-down"></a>
        </div>
	</div>
	<div class="category-tab-content">
		<div class="top-banner">
			<div class="row margin-0">
				<div class="col-sm-6 padding-0" >
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/monitor-1.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
				<div class="col-sm-6 padding-0">
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/monitor-2.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-inner has-banner-left">
			<div class="tab-content-products">
				<div class="tab-container">

					<div id="tab-17" class="tab-panel active">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spmoi_m8 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 160px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                        ?>
			                        <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div id="tab-18" class="tab-panel">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spgiamgia_m8 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 150px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                            <span class="price" style="color: #666666; text-decoration: line-through;">
                            				<?php echo number_format($row->don_gia); ?> VNĐ
                        				</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                        <?php }
			                        ?>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- ./Tab cat -->
<!--#######################################################################################################################-->
<!-- Tab cat  ################################# Mouse-->
<!-- Tab cat -->
<div class="kt-category-tabs kt-tab-fadeeffect margin-top-50" >
	<div class="tab-head">
		<h3 class="title"> 
			<img class="icon" src="<?php echo base_url('upload');?>/images/icons/35.png" alt="">MOUSE</a>
		</h3>
		<ul class="nav-tab">
            <li class="active">
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-19">MỚI NHẤT</a>
            </li>
            <li>
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-20">GIẢM GIÁ</a>
            </li>
        </ul>
        <div class="floor-elevator">
            <a class="btn-elevator up  fa fa-angle-up"></a>
            <a class="btn-elevator down fa fa-angle-down"></a>
        </div>
	</div>
	<div class="category-tab-content">
		<div class="top-banner">
			<div class="row margin-0">
				<div class="col-sm-6 padding-0" >
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/mouse-2.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
				<div class="col-sm-6 padding-0">
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/mouse-1.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-inner has-banner-left">
			<div class="tab-content-products">
				<div class="tab-container">

					<div id="tab-19" class="tab-panel active">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spmoi_m9 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 160px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                        ?>
			                        <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div id="tab-20" class="tab-panel">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spgiamgia_m9 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 150px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                            <span class="price" style="color: #666666; text-decoration: line-through;">
                            				<?php echo number_format($row->don_gia); ?> VNĐ
                        				</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                        <?php }
			                        ?>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- ./Tab cat -->
<!--#######################################################################################################################-->
<!-- Tab cat  ################################# Keyboard-->
<!-- Tab cat -->
<div class="kt-category-tabs kt-tab-fadeeffect margin-top-50" >
	<div class="tab-head">
		<h3 class="title"> 
			<img class="icon" src="<?php echo base_url('upload');?>/images/icons/35.png" alt="">KEYBOARD</a>
		</h3>
		<ul class="nav-tab">
            <li class="active">
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-21">MỚI NHẤT</a>
            </li>
            <li>
            	<a data-animated="fadeInUp" data-toggle="tab" href="#tab-22">GIẢM GIÁ</a>
            </li>
        </ul>
        <div class="floor-elevator">
            <a class="btn-elevator up  fa fa-angle-up"></a>
            <a class="btn-elevator down fa fa-angle-down"></a>
        </div>
	</div>
	<div class="category-tab-content">
		<div class="top-banner">
			<div class="row margin-0">
				<div class="col-sm-6 padding-0" >
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/keyboard-1.jpg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
				<div class="col-sm-6 padding-0">
					 <a class="bannereffect-1">
						<img src="<?php echo base_url('upload');?>/banners/keyboard-2.jpeg" alt="" style="height: 160px; width: 600px">
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-inner has-banner-left">
			<div class="tab-content-products">
				<div class="tab-container">

					<div id="tab-21" class="tab-panel active">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spmoi_k10 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 160px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price"><?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ</span>
			                        <?php }
			                        ?>
			                        <div>Lượt Xem: <?php echo $row->luot_xem; ?></div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div id="tab-22" class="tab-panel">
						<ul class="owl-carousel" data-loop="true" data-nav="false" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2,"nav":"false"},"768":{"items":3},"1000":{"items":4}}'>
							<?php foreach ($spgiamgia_k10 as $row): ?>
							<li class="product-item style10" style="margin-top: 30px; margin-bottom: -80px; ">
								<div class="product-inner">
									<div class="thumb">
										<a href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">
                        					<img style="width: 150px; height: 184px;" src="<?php echo base_url('upload'); ?>/san_pham/<?php echo $row->hinh; ?>" alt="">
                    					</a>
										<a href="#" title="Xem chi tiết" class="button quick-view yith-wcqv-button">Xem Ngay</a>
										<div class="group-button">
											<a class="wishlist" href="">Yêu Thích</a>
                                        	<a class="compare button" href="<?php echo base_url('chi-tiet-san-pham/'.$row->ma_loai_san_pham.'/'.seoname($row->ten).'/'.$row->ma) ?>">Chi Tiết</a>
											<a class="button add_to_cart_button" href="<?php echo base_url('gio_hang/add/'.$row->ma); ?>">Thêm Vào Giỏ Hàng</a>
										</div>
										
									</div>
									<div class="info">
										<h3 class="product-name short">
											<a title="" href="<?php echo base_url('chi-tiet-san-pham/'.seoname($row->ten).'/'.seoname($row->ten).'/'.$row->ma) ?>"><?php echo $row->ten; ?>
                        					</a>
										</h3>
									<?php
										if($row->giam_gia > 0){ 
			                        ?>
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                            <span class="price" style="color: #666666; text-decoration: line-through;">
                            				<?php echo number_format($row->don_gia); ?> VNĐ
                        				</span>
			                        <?php }
			                            else { 
			                        ?>      
			                            <span class="price">
			                            	<?php echo number_format($row->don_gia - $row->giam_gia); ?> VNĐ
			                            </span>
			                        <?php }
			                        ?>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- ./Tab cat -->