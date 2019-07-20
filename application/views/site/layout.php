<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('site/head'); ?>
    </head>
    
    <body class="">
        <div id="box-mobile-menu" class="full-height full-width box-mobile-menu">
            <div class="box-inner">
                <a href="#" class="close-menu">
                    <span class="icon fa fa-times"></span>
                </a>
            </div>
        </div>
        <div id="header-ontop" class="is-sticky"></div>
        <!-- Header -->
        <div id="header" class="header style2 style9">
            <?php $this->load->view('site/header'); ?>
        </div>
        <!-- Header -->
        
        <div id="price_content" style="width: 1170px; margin: 0px auto;">
            <?php $this->load->view('site/tim_theo_gia'); ?>
        </div>

        <?php $this->load->view($temp, $this->data); ?>
      
        <footer class="footer style4">
            <?php $this->load->view('site/footer'); ?>
        </footer>
            
        <a href="#" class="scroll_top" title="Scroll to Top">
            <i class="fa fa-arrow-up"></i>
        </a>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/Modernizr.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/jquery.plugin.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/jquery.countdown.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/wow.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/jquery.actual.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/easyzoom.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/jquery.hoverdir.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/masonry.js"></script>
        <script type="text/javascript" src="<?php echo public_url('site') ?>/js/functions.js"></script>
    </body>
</html>