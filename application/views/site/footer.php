<div class="container" style="margin-top: -106px">
    <div class="row">
        <div class="col-sm-12">

            <div class="widget widget-payment-methods">
                <h3 class="widget-title">MỘT SỐ HÃNG NỔI TIẾNG: </h3>
                <div class="methods">
                    <span><img style="width: 150px; height: 80px;" src="<?php echo base_url('upload'); ?>/payments/asus.png" alt=""></span>
                    <span><img style="width: 150px; height: 80px;" src="<?php echo base_url('upload'); ?>/payments/hp.png" alt=""></span>
                    <span><img style="width: 150px; height: 80px;" src="<?php echo base_url('upload'); ?>/payments/aserr.jpg" alt=""></span>
                    <span><img style="width: 150px; height: 80px;" src="<?php echo base_url('upload'); ?>/payments/dell.png" alt=""></span>
                    <span><img style="width: 150px; height: 80px;" src="<?php echo base_url('upload'); ?>/payments/gigabyte.png" alt=""></span>
                    <span><img style="width: 150px; height: 80px;" src="<?php echo base_url('upload'); ?>/payments/intel.png" alt=""></span>
                    <span><img style="width: 150px; height: 80px;" src="<?php echo base_url('upload'); ?>/payments/logitech.png" alt=""></span>
                </div>
            </div>

            <div class="widget widget-hot-keyword">
                <div class="list-keyword">
                    <div class="line">
                        <label>LOẠI LINH KIỆN: </label>   
                        <?php foreach ($loai_list as $row): ?>
                            <a href="<?php echo base_url('san-pham/danh-muc/'.seoname($row->ten).'/'.$row->ma.'/0'); ?>"><?php echo $row->ten; ?></a>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="line">
                        <label>NHÀ SẢN XUẤT:</label>   
                            <?php foreach ($nhasx_list as $row): ?>
                            <a href="<?php echo base_url('san-pham/nha-san-xuat/'.seoname($row->ten).'/'.$row->ma.'/0'); ?>">
                            <?php echo $row->ten; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="coppyright">Copyrights © 2016 PhongPhongShop - Trung tâm linh kiện máy tính hàng đầu Việt Nam</div>
</div>
