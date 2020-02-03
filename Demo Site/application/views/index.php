<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!--Main Slider-->
    <section class="main-slider">
        <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <ul>    
                    <?php foreach ($slaytlar as $index => $slayt) { ?>

                        <li class="slide-<?php echo $index ?>" data-description="<?php echo $slayt->slaytBaslik ?>" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="slotzoom-horizontal" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="<?php echo base_url("public/admin/uploads/slayt/$slayt->slaytResim") ?>" data-title="<?php echo $slayt->slaytBaslik ?>" data-transition="parallaxvertical">
                            <img alt="<?php echo $slayt->slaytBaslik ?>" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="<?php echo base_url("public/admin/uploads/slayt/$slayt->slaytResim") ?>">
                            
                            <div class="tp-caption" 
                            data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]"
                            data-paddingtop="[0,0,0,0]"
                            data-responsive_offset="on"
                            data-type="text"
                            data-height="none"
                            data-width="['650','750','700','420']"
                            data-whitespace="normal"
                            data-hoffset="['15','15','15','15']"
                            data-voffset="['-100','-80','-100','-80']"
                            data-x="['left','left','left','left']"
                            data-y="['middle','middle','middle','middle']"
                            data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                                <h2><?php echo $ayarlar->firmaAdi ?> <br /></h2>
                            </div>
                            
                            <div class="tp-caption" 
                            data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]"
                            data-paddingtop="[0,0,0,0]"
                            data-responsive_offset="on"
                            data-type="text"
                            data-height="none"
                            data-width="['550','500','500','400']"
                            data-whitespace="normal"
                            data-hoffset="['15','15','15','15']"
                            data-voffset="['20','40','15','15']"
                            data-x="['left','left','left','left']"
                            data-y="['middle','middle','middle','middle']"
                            data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                                <div class="text white-text"><?php echo $slayt->slaytBaslik ?></div>
                            </div>
                            
                            <div class="tp-caption tp-resizeme" 
                            data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]"
                            data-paddingtop="[0,0,0,0]"
                            data-responsive_offset="on"
                            data-type="text"
                            data-height="none"
                            data-width="['550','600','650','480']"
                            data-whitespace="normal"
                            data-hoffset="['15','15','15','15']"
                            data-voffset="['115','130','100','85']"
                            data-x="['left','left','left','left']"
                            data-y="['middle','middle','middle','middle']"
                            data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                                <a href="<?php echo base_url("urunler") ?>" class="theme-btn btn-style-one hvr-sweep-to-right"><?php echo $kelimeler->incele ?> <i class="fa fa-arrow-right"></i></a>
                            </div>
                            
                        </li>

                    <?php } ?>                    
                </ul>
            </div>
        </div>
    </section>
    <!--End Main Slider-->

    <section class="service-style-two">
        <div class="container">
            <div class="service-carousel-style-two owl-carousel owl-theme">
                <?php foreach ($hizmetler as $hizmet) { ?>
                    <div class="item">
                        <div class="single-service-style-two">
                            <div class="img-box">
                                <img src="<?php echo base_url("public/admin/uploads/hizmetler/$hizmet->hizmetId/$hizmet->hizmetResim") ?>" alt="<?php echo $hizmet->hizmetBaslik ?>"/>
                            </div><!-- /.img-box -->
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <div class="icon-box">
                                            <i class="industrio-icon-flasks"></i>
                                        </div><!-- /.icon-box -->
                                        <div class="text-box">
                                            <h3><?php echo $hizmet->hizmetBaslik ?></h3>
                                        </div><!-- /.text-box -->
                                    </div><!-- /.content -->
                                </div><!-- /.box -->
                            </div><!-- /.overlay -->
                            <div class="hover">
                                <div class="box">
                                    <div class="content">
                                        <div class="icon-box">
                                            <i class="industrio-icon-flasks"></i>
                                        </div><!-- /.icon-box -->
                                        <div class="text-box">
                                            <h3><?php echo $hizmet->hizmetBaslik ?></h3>
                                            <p><?php echo $hizmet->hizmetIcerik ?></p>
                                            <?php if($this->session->userdata("dil") == 0){ ?>
                                            <a href="<?php echo base_url("hizmet/$hizmet->hizmetSeo") ?>" class="more"><?php echo $kelimeler->incele ?> <i class="fa fa-angle-right"></i></a>
                                            <?php }else{ ?>
                                                <a href="<?php echo base_url("service/$hizmet->hizmetSeo") ?>" class="more"><?php echo $kelimeler->incele ?> <i class="fa fa-angle-right"></i></a>
                                            <?php } ?>
                                        </div><!-- /.text-box -->
                                    </div><!-- /.content -->
                                </div><!-- /.box -->
                            </div><!-- /.hover -->
                        </div><!-- /.single-service-style-two -->
                    </div><!-- /.item -->
                <?php } ?>
            </div><!-- /.service-carousel-style-two -->
        </div><!-- /.container -->
    </section><!-- /.service-style-two -->
</div><!-- /.page-wrapper -->

<script src="./public/js/jquery.js"></script>
<!--Revolution Slider-->
<script src="./public/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="./public/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="./public/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="./public/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="./public/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="./public/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="./public/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="./public/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="./public/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="./public/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="./public/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="./public/js/main-slider-script.js"></script>


<script src="<?php echo base_url("public/") ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url("public/") ?>js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url("public/") ?>js/jquery.validate.min.js"></script>
<script src="<?php echo base_url("public/") ?>js/owl.carousel.min.js"></script>
<script src="<?php echo base_url("public/") ?>js/isotope.js"></script>
<script src="<?php echo base_url("public/") ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url("public/") ?>js/waypoints.min.js"></script>
<script src="<?php echo base_url("public/") ?>js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url("public/") ?>js/wow.min.js"></script>
<script src="<?php echo base_url("public/") ?>js/jquery.easing.min.js"></script>
<script src="<?php echo base_url("public/") ?>js/custom.js"></script>