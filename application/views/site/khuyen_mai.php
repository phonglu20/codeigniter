<!-- Home slide-->
<div class="container">
    <div style="font-size: 15px; color: red;"><?php $this->load->view('site/message', $this->data); ?></div>
    <div class="row margin-0">
        <div class="col-sm-12 col-md-12 col-lg-3 padding-0 hidden-md hidden-sm hidden-xs"></div>
        <div class="col-sm-12 col-md-12 col-lg-9 padding-0">
            <div class="kt_home_slide slide-home5 nav-center" data-nav="true"  data-autoplay="true" data-loop="true" data-responsive='{"0":{"items":"1"},"768":{"items":"1","nav":false},"992":{"items":"1"}}'>
                <?php foreach ($khuyen_mai as $row): ?>
                    <div class="item-slide" data-background="<?php echo base_url('upload').'/khuyen_mai/'.$row->hinh;?>" data-height="465" data-reponsive='{"320":280,"400":480,"768":400,"1024":465}'> 
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!--./ Home slide -->