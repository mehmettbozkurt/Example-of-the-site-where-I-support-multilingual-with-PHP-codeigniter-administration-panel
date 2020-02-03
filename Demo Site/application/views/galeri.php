<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Page Banner -->
    <div id="page-banner" class="page-banner">
        <img src="<?php echo base_url("public/images/banner.jpg") ?>" alt="page-banner" />
        <!-- container -->
        <div class="page-detail">
            <div class="container">
                <h3 class="page-title">GALERİ</h3>
                <div class="page-breadcrumb pull-right">    
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">ANASAYFA</a></li>
                        <li>GALERİ</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- container /- -->
    </div><!-- Page Banner /- -->
        
    <!-- Portfolio Section -->
    <div id="portfolio-section" class="portfolio-section ow-section">
        <!-- Section Header -->
        <div class="section-header">
            <h3>FİRMAMIZ ve çalışmalarımızdan kareler</h3>
            <img src="<?php echo base_url("public/") ?>images/portfolio/portfolio-heading-bg.png" alt="<?php echo $ayarlar->firmaAdi ?>" />
        </div><!-- Section Header /- -->
        <!-- Portfolio Content -->
        <div class="portfolio-content">
            <ul class="portfolio-list no-space">
                <!-- col-md-3 -->
                <?php foreach ($resimler as $index => $resim) { ?>
                <li class="col-md-3 col-sm-4 col-xs-6" data-type="house" data-id="house-1">
                    <div class="portfolio-image-block">
                        <a  href=".html#"><img height="250" src="<?php echo base_url($resim) ?>" alt="<?php $resimAd = explode("/", $resim);  echo $resimAd[count($resimAd)-1] ?>"></a>
                        <div class="portfolio-block-hover">
                            <div class="zoom-link">
                                <a title="Büyüt" href="<?php echo base_url($resim) ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                    </div>
                </li><!-- col-md-3 /- -->
            <?php } ?>
                
               
            </ul><!-- Portfolio List -->
        </div><!-- Portfolio Content /- -->
    </div><!-- Portfolio Section /- -->