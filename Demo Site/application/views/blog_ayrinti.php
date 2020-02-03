<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $timestamp = strtotime($blog->tarih);
  $gun = date("j",$timestamp);
  $aylar = array(
    'Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık');
  $ay = $aylar[date('m',$timestamp) - 1];
  $yil = date("Y",$timestamp); ?>



    <div class="inner-banner">
        <div class="container">
            <h3><?php echo $blog->blogBaslik ?></h3>
            <ul class="breadcumb">
                <li><a href="<?php echo base_url() ?>"><?php echo $kelimeler->anasayfa ?></a></li>
                <li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
                <li><a href="<?php echo base_url("bloglar") ?>"><?php echo $kelimeler->haberler ?></a></li>
                <li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
                <li><span><?php echo $blog->blogBaslik ?></span></li>
            </ul><!-- /.breadcumb -->
        </div><!-- /.container -->
    </div><!-- /.inner-banner -->
    
    <section class="blog-listing-page blog-details-page sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="single-blog-style-two">
                        <div class="img-box">
                            <img src="<?php echo base_url("public/admin/uploads/bloglar/$blog->blogId/$blog->blogResim") ?>" alt="<?php echo $blog->blogBaslik ?>"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <a href="<?php echo base_url("blog/$blog->blogSeo") ?>"><h3><?php echo $blog->blogBaslik ?></h3></a>
                            <div class="meta-info">
                                <a href="#"><i class="fa fa-user"></i> <?php echo $ayarlar->firmaAdi ?></a>
                                <a href="#"><i class="fa fa-calendar"></i> <?php echo $gun." ".$ay." ".$yil ?></a>
                            </div><!-- /.meta-info -->
                            <p><?php echo $blog->blogIcerik ?>
                        </div><!-- /.text-box -->
                    </div><!-- /.single-blog-post-style-two -->
                    <div class="tags-share-box clearfix">
                        
                        <div class="social pull-right">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-google-plus-g"></a>
                            <a href="#" class="fab fa-dribbble"></a>
                        </div><!-- /.social pull-right -->
                    </div><!-- /.tags-share-box -->
                    
                </div><!-- /.col-md-9 -->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
                        <div class="single-sidebar recent-post-widget">
                            <div class="title">
                                <h3><?php echo $kelimeler->son_eklenenler ?></h3>
                            </div><!-- /.title -->
                            <div class="recent-post-list">
                              <?php foreach ($bloglar as $blog) { ?>
                                <div class="single-recent-post">
                                    <a href="<?php echo base_url("blog/$blog->blogSeo") ?>"><h3><?php echo $blog->blogBaslik ?></h3></a>
                                </div><!-- /.single-recent-post -->
                              <?php } ?>
                            </div><!-- /.recent-post-list -->
                        </div><!-- /.single-sidebar -->
                        <div class="single-sidebar category-widget">
                            <div class="title">
                                <h3><?php echo $kelimeler->kategoriler ?></h3>
                            </div><!-- /.title -->
                            <ul class="category-list">
                                <?php foreach ($kategoriler as $kategori) { ?>
                                    <li>
                                        <a href="<?php echo base_url("urunler/$kategori->kategoriSeo") ?>" class="clearfix">
                                            <?php echo $kategori->kategoriAdi ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul><!-- /.category-list -->
                        </div><!-- /.single-sidebar -->
                    </div><!-- /.sidebar sidebar-right -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog-listing-page -->

    <section class="contact-info-style-one">
       
    </section><!-- /.contact-info-style-one -->

</div><!-- /.page-wrapper -->