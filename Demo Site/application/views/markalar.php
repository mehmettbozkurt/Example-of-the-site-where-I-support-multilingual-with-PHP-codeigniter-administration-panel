<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
    
    <div class="inner-banner">
        <div class="container">
            <h3><?php echo $kelimeler->markalar ?></h3>
            <ul class="breadcumb">
                <li><a href="<?php echo base_url() ?>"><?php echo $kelimeler->anasayfa ?></a></li>
                <li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
                <li><span><?php echo $kelimeler->markalar ?></span></li>
            </ul><!-- /.breadcumb -->
        </div><!-- /.container -->
    </div><!-- /.inner-banner -->
    
    <section class="portfolio-style-two sec-pad">
        <div class="container">
            <div class="gallery-filter">
                <ul class="post-filter masonary text-center">
                    <li class="filter active" data-filter=".masonary-item"><span><i class="industrio-icon-layers"></i><?php echo $kelimeler->markalar ?></span>
                </ul><!-- /.post-filter -->
            </div><!-- /.gallery-filter -->
            <div class="row masonary-layout filter-layout" data-filter-class="filter">
                <?php foreach ($markalar as $marka) { ?>
                    <div class="col-md-3 col-sm-6 col-xs-12 masonary-item single-filter-item oil ">
                        <div class="single-portfolio-style-two">
                            <div class="img-box">
                            <img src="<?php echo base_url("public/admin/uploads/markalar/$marka->markaResim") ?>" alt="<?php echo $marka->markaAd ?>"/>
                                <div class="overlay">
                                    <div class="box">
                                        <div class="content">
                                            <span><?php echo $ayarlar->firmaAdi ?></span>
                                            <a href="<?php echo $marka->markaLink ?>" target="_blank">
                                                <h3><?php echo $marka->markaAd ?></h3>
                                            </a>
                                            <a href="<?php echo base_url("public/admin/uploads/markalar/$marka->markaResim") ?>" class="img-popup industrio-icon-next"></a>
                                        </div><!-- /.content -->
                                    
                                    </div><!-- /.box -->
                                </div><!-- /.overlay -->
                            </div><!-- /.img-box -->
                        </div><!-- /.single-portfolio-style-two -->
                    </div>
                <?php } ?>
            </div>
        </div><!-- /.container -->                
    </section><!-- /.project-style-one -->

    <section class="contact-info-style-two">
        <div class="container-fluid">
            <div class="col-md-6">
                <div class="left-content">
                    <div class="inner">
                        <p><?php echo $ayarlar->firmaGenelBilgi ?></p>
                        <div class="social">
                          <?php if (!empty($ayarlar->firmaFacebook)) {?>
                            <a href="<?php echo $ayarlar->firmaFacebook ?>" target="_blank"  class="fab fa-facebook"></a>
                          <?php } if (!empty($ayarlar->firmaTwitter)) { ?>
                           <a href="<?php echo $ayarlar->firmaTwitter ?>" target="_blank" class="fab fa-twitter"></a> 
                         <?php }if (!empty($ayarlar->firmaGplus)) { ?>
                           <a href="<?php echo $ayarlar->firmaGplus ?>" target="_blank" class="fab fa-google-plus"></a>
                         <?php }if (!empty($ayarlar->firmaYoutube)) { ?> 
                           <a href="<?php echo $ayarlar->firmaYoutube ?>" target="_blank" class="fab fa-youtube"></a> 
                         <?php }if (!empty($ayarlar->firmaInstagram)) { ?>
                          <a href="<?php echo $ayarlar->firmaInstagram ?>" target="_blank" class="fab fa-instagram"></a>
                        <?php } ?> 
                        </div><!-- /.social -->
                    </div><!-- /.inner -->
                </div><!-- /.left-content -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.container-fluid -->
    </section><!-- /.video-box-style-one -->

    <section class="contact-info-style-one">
        <div class="container">
            
        </div><!-- /.contianer -->
    </section><!-- /.contact-info-style-one -->

</div><!-- /.page-wrapper -->