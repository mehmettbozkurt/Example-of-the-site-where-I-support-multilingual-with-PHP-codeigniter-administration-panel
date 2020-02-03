<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="inner-banner">
    <div class="container">
        <h3><?php echo $kelimeler->haberler ?></h3>
        <ul class="breadcumb">
            <li><a href="<?php echo base_url() ?>"><?php echo $kelimeler->anasayfa ?></a></li>
            <li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
            <li><span><?php echo $kelimeler->haberler ?></span></li>
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
                            <?php foreach ($bloglar as $blog) { 
                              $timestamp = strtotime($blog->tarih);
                              $gun = date("j",$timestamp);
                              $aylar = array(
                                'Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık');
                              $ay = $aylar[date('m',$timestamp) - 1];
                              $yil = date("Y",$timestamp); ?>
                                <li> 
                                    <a href="<?php echo base_url("bloglar/$blog->blogSeo") ?>">
                                        <?php echo $blog->blogBaslik ?>
                                    </a> 
                                </li>
                            <?php } ?>
                        </ul><!-- /.service-list -->
                    </div><!-- /.single-sidebar service-sidebar -->
                </div><!-- /.sidebar -->
            </div><!-- /.col-md-4 col-sm-12 col-xs-12 -->
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="service-item-box">
                    <div class="row masonary-layout">
                        <?php foreach ($bloglar as $blog) { ?>
                            <div class="col-md-6 col-sm-6 col-sm-12">
                                <div class="gas single-service-style-four">
                                    <div class="img-box">
                                        <img src="<?php echo base_url("public/admin/uploads/bloglar/$blog->blogId/$blog->blogResim") ?>" alt="<?php echo $blog->blogBaslik ?>"/>
                                        <div class="box">
                                            <div class="content">
                                                <h3><span><?php echo $kelimeler->haberler ?></span> <br /> <?php echo $blog->blogBaslik ?></h3>
                                                <a href="<?php echo base_url("blog/$blog->blogSeo") ?>" class="more hvr-sweep-to-right"><?php echo $kelimeler->incele ?></a>
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