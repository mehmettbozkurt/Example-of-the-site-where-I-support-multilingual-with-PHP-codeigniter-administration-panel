<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="inner-banner">
    <div class="container">
        <h3><?php echo $kelimeler->hizmetler ?></h3>
        <ul class="breadcumb">
            <li><a href="<?php echo base_url() ?>"><?php echo $kelimeler->anasayfa ?></a></li>
            <li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
            <li><span><?php echo $kelimeler->hizmetler ?></span></li>
        </ul><!-- /.breadcumb -->
    </div><!-- /.container -->
</div><!-- /.inner-banner -->

<section class="service-page">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="single-sidebar service-sidebar">
                        <ul class="service-list">
                            <?php foreach ($hizmetler as $hizmet) { ?>
                                <li> 
                                    <?php if($this->session->userdata("dil") == 0){ ?>
                                    <a href="<?php echo base_url("hizmet/$hizmet->hizmetSeo") ?>">
                                        <?php echo $hizmet->hizmetBaslik ?>
                                    </a> 
                                    <?php }else{ ?>
                                     <a href="<?php echo base_url("hizmet/$hizmet->hizmetSeo") ?>">
                                        <?php echo $hizmet->hizmetBaslik ?>
                                     </a> 
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul><!-- /.service-list -->
                    </div><!-- /.single-sidebar service-sidebar -->
                </div><!-- /.sidebar -->
            </div><!-- /.col-md-4 col-sm-12 col-xs-12 -->
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="service-item-box">
                    <div class="row masonary-layout">
                        <?php foreach ($hizmetler as $hizmet) { ?>
                            <div class="col-md-6 col-sm-6 col-sm-12">
                                <div class="gas single-service-style-four">
                                    <div class="img-box">
                                        <img src="<?php echo base_url("public/admin/uploads/hizmetler/$hizmet->hizmetId/$hizmet->hizmetResim") ?>" alt="<?php echo $hizmet->hizmetBaslik ?>"/>
                                        <div class="box">
                                            <div class="content">
                                                <h3><span><?php echo $kelimeler->hizmetler ?></span> <br /> <?php echo $hizmet->hizmetBaslik ?></h3>
                                                <?php if($this->session->userdata("dil") == 0){ ?>
                                                <a href="<?php echo base_url("hizmet/$hizmet->hizmetSeo") ?>" class="more hvr-sweep-to-right"><?php echo $kelimeler->incele ?></a>
                                                <?php }else{ ?>
                                                    <a href="<?php echo base_url("service/$hizmet->hizmetSeo") ?>" class="more hvr-sweep-to-right"><?php echo $kelimeler->incele ?></a>
                                                <?php } ?>
                                            </div><!-- /.content -->
                                        </div><!-- /.box -->
                                    </div><!-- /.img-box -->
                                </div><!-- /.single-service-style-four -->
                            </div><!-- /.col-md-4 -->
                        <?php } ?>
                        
                    </div><!-- /.row -->
                </div><!-- /.service-item-box -->
            </div><!-- /.col-md-8 col-sm-12 col-xs-12 -->
             <div class="pull-right">
                <ul class="pagination">
                    <?php if(isset($sayfaLinkleri)){ ?>
                        <?php foreach ($sayfaLinkleri as $link) { ?>
                            <?php echo $link ?>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.service-page -->

    

</div><!-- /.page-wrapper -->