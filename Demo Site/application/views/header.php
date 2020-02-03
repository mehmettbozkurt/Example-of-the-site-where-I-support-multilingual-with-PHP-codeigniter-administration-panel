<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="<?php echo base_url() ?>">
    <meta name="description" content="<?php echo $ayarlar->siteAciklama; ?>">
    <meta name="keywords" content="<?php echo $ayarlar->siteAnahtarKelimeler; ?>">
    <meta name="author" content="<?php echo $ayarlar->firmaAdi; ?>">
    <title><?php echo $ayarlar->siteBaslik ?></title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href="<?php echo base_url("public/") ?>plugins/revolution/css/settings.css" rel="stylesheet">
    <link href="<?php echo base_url("public/") ?>plugins/revolution/css/layers.css" rel="stylesheet">
    <link href="<?php echo base_url("public/") ?>plugins/revolution/css/navigation.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url("public/") ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url("public/") ?>css/responsive.css">
</head>
<body class="_active-preloader-ovh">

<div class="preloader"><div class="spinner"></div></div> <!-- /.preloader -->

<div class="page-wrapper">
    <div class="header-top home-one clearfix">
        <div class="container">
            <div class="logo pull-left">
                <a href="<?php echo base_url() ?>">
                    <img src="<?php echo base_url("public/admin/uploads/$ayarlar->firmaLogo") ?>" alt="<?php echo $ayarlar->firmaAdi ?>"/>
                </a>
            </div><!-- /.logo -->
            
        </div><!-- /.container -->
    </div><!-- /.header-top home-one -->

    <header class="header header-home-one clearfix">
        <nav class="navbar navbar-default header-navigation stricky clearfix">
            <div class="container clearfix">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button class="side-nav-toggler side-nav-opener"><i class="fa fa-bars"></i></button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse main-navigation mainmenu " id="main-nav-bar">
                    
                    <ul class="nav navbar-nav navigation-box">
                        <li class="current"> 
                            <a href="<?php echo base_url() ?>"><?php echo $kelimeler->anasayfa ?></a>
                        </li>
                    
                        <?php menuListele(menuler($sayfalar));?>

                        <?php kategoriListele(kategoriler($kategoriler));?>
                        
                        <li>
                            <?php if($this->session->userdata("dil") == 0){ ?>            
                            <a href="<?php echo base_url("hizmetler") ?>"><?php echo $kelimeler->hizmetler ?></a>
                            <?php }else{ ?>
                            <a href="<?php echo base_url("services") ?>"><?php echo $kelimeler->hizmetler ?></a>
                            <?php } ?>
                            <ul class="sub-menu">
                                <?php foreach ($hizmetler as $hizmet) {?>
                                    <li>
                                        <?php if($this->session->userdata("dil") == 0){ ?>
                                        <a title="<?php echo $hizmet->hizmetSeo ?>" href="<?php echo base_url("hizmet/$hizmet->hizmetSeo") ?>">
                                            <?php echo $hizmet->hizmetBaslik ?>
                                        </a>
                                        <?php }else{ ?>
                                        <a title="<?php echo $hizmet->hizmetSeo ?>" href="<?php echo base_url("service/$hizmet->hizmetSeo") ?>">
                                            <?php echo $hizmet->hizmetBaslik ?>
                                        </a>
                                        <?php } ?>

                                    </li>
                                <?php } ?>
                            </ul><!-- /.sub-menu -->
                        </li>
                        <li> 
                            <?php if($this->session->userdata("dil") == 0){ ?>            

                            <a href="<?php echo base_url("markalar") ?>"><?php echo $kelimeler->markalar ?></a>
                            <?php }else{ ?>
                            <a href="<?php echo base_url("marks") ?>"><?php echo $kelimeler->markalar ?></a>
                            <?php } ?> 
                        </li>
                        <li> 
                            <a href="<?php echo base_url("bloglar") ?>"><?php echo $kelimeler->haberler ?></a> 
                            <ul class="sub-menu">
                                 <?php foreach ($bloglar as $blog) {?>
                                    <li>
                                        <a title="<?php echo $blog->blogSeo ?>" href="<?php echo base_url("blog/$blog->blogSeo") ?>">
                                            <?php echo $blog->blogBaslik ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul><!-- /.sub-menu -->
                        </li>
                         <li>
                            <?php if($this->session->userdata("dil") == 0){ ?>
                                <a href="<?php echo base_url("anasayfa/dilDegis/1") ?>">EN</a>
                            <?php }else{ ?>
                                <a href="<?php echo base_url("anasayfa/dilDegis/0") ?>">TR</a>
                            <?php } ?>
                        </li>
                    </ul>                
                </div><!-- /.navbar-collapse -->
                <div class="right-side-box">
                    <?php if($this->session->userdata("dil") == 0){ ?>            
                    <a href="<?php echo base_url("iletisim") ?>" class="rqa-btn"><span class="inner"><?php echo $kelimeler->bize_ulasin ?> <i class="fa fa-caret-right"></i></span></a>
                    <?php }else{ ?>
                    <a href="<?php echo base_url("contact") ?>" class="rqa-btn"><span class="inner"><?php echo $kelimeler->bize_ulasin ?> <i class="fa fa-caret-right"></i></span></a>
                    <?php } ?>
                </div><!-- /.right-side-box -->
            </div><!-- /.container -->
        </nav>   
    </header><!-- /.header -->


<section class="hidden-sidebar side-navigation">
    <a href="#" class="close-button side-navigation-close-btn fa fa-times"></a><!-- /.close-button -->
    <div class="sidebar-content">
        <div class="top-content">
            <a href="<?php echo base_url() ?>">
                <img src="<?php echo base_url("public/admin/uploads/$ayarlar->firmaLogo") ?>" alt="<?php echo $ayarlar->firmaAdi ?>"/>
            </a>
        </div><!-- /.top-content -->
        <nav class="nav-menu middle-content">
            <ul class="navigation-box">
                <li class="current"> 
                    <a href="<?php echo base_url() ?>"><?php echo $kelimeler->anasayfa ?> <span class="subnav-toggler fa fa-caret-down"></span></a> 
                  
                </li>
                
                <?php menuListele(menuler($sayfalar));?>
                
                <li> 
                    <?php if($this->session->userdata("dil") == 0){ ?>
                    <a href="<?php echo base_url("urunler") ?>"><?php echo $kelimeler->urunler ?> 
                        <span class="subnav-toggler fa fa-caret-down"></span>
                    </a> 
                    <?php }else{ ?>
                    <a href="<?php echo base_url("products") ?>"><?php echo $kelimeler->urunler ?> 
                        <span class="subnav-toggler fa fa-caret-down"></span>
                    </a> 
                    <?php } ?>
                   <ul class="sub-menu">
                        <?php foreach ($kategoriler as $kategori) {?>
                            <li>
                                <?php if($this->session->userdata("dil") == 0){ ?>
                                <a title="<?php echo $kategori->kategoriSeo ?>" href="<?php echo base_url("urunler/$kategori->kategoriSeo") ?>">
                                    <?php echo $kategori->kategoriAdi ?>
                                </a>
                                <?php }else{ ?>
                                    <a title="<?php echo $kategori->kategoriSeo ?>" href="<?php echo base_url("products/$kategori->kategoriSeo") ?>">
                                        <?php echo $kategori->kategoriAdi ?>
                                    </a>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul><!-- /.sub-menu -->
                </li>
                <li>
                    <?php if($this->session->userdata("dil") == 0){ ?>
                    <a href="<?php echo base_url("hizmetler") ?>"><?php echo $kelimeler->hizmetler ?> <span class="subnav-toggler fa fa-caret-down"></span></a> 
                    <?php }else{ ?>
                        <a href="<?php echo base_url("services") ?>"><?php echo $kelimeler->hizmetler ?> <span class="subnav-toggler fa fa-caret-down"></span></a> 
                    <?php } ?>
                        <ul class="sub-menu">
                         <?php foreach ($hizmetler as $hizmet) {?>
                            <li>
                                <?php if($this->session->userdata("dil") == 0){ ?>
                                <a title="<?php echo $hizmet->hizmetSeo ?>" href="<?php echo base_url("hizmet/$hizmet->hizmetSeo") ?>">
                                    <?php echo $hizmet->hizmetBaslik ?>
                                </a>
                                <?php }else{ ?>
                                    <a title="<?php echo $hizmet->hizmetSeo ?>" href="<?php echo base_url("service/$hizmet->hizmetSeo") ?>">
                                        <?php echo $hizmet->hizmetBaslik ?>
                                    </a>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul><!-- /.sub-menu -->
                </li>
                <li> 
                    <?php if($this->session->userdata("dil") == 0){ ?>            
                    <a href="<?php echo base_url("markalar") ?>"><?php echo $kelimeler->markalar ?></a>
                    <?php }else{ ?>
                    <a href="<?php echo base_url("marks") ?>"><?php echo $kelimeler->markalar ?></a>
                    <?php } ?>
                </li>
                <li> 
                    <a href="<?php base_url("bloglar") ?>"><?php echo $kelimeler->haberler ?></a> 
                    <ul class="sub-menu">
                         <?php foreach ($bloglar as $blog) {?>
                            <li>
                                <a title="<?php echo $blog->blogSeo ?>" href="<?php echo base_url("blog/$blog->blogSeo") ?>">
                                    <?php echo $blog->blogBaslik ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul><!-- /.sub-menu -->
                </li>
                <li>
                    <?php if($this->session->userdata("dil") == 0){ ?>             
                    <a href="<?php echo base_url("iletisim") ?>"><?php echo $kelimeler->bize_ulasin ?></a>
                    <?php }else{ ?>
                    <a href="<?php echo base_url("contact") ?>"><?php echo $kelimeler->bize_ulasin ?></a> 
                    <?php } ?> 
                </li>
                <li>
                    <a href="<?php echo base_url("anasayfa/dilDegis/1") ?>">EN</a>
                    <a href="<?php echo base_url("anasayfa/dilDegis/0") ?>">TR</a>
                </li>
            </ul>
        </nav><!-- /.nav-menu -->
        <div class="bottom-content">
            <div class="social">
                <a href="#" class="fab fa-facebook-f"></a><!--
                --><a href="#" class="fab fa-instagram"></a><!--
            </div><!-- /.social -->
            <p class="copy-text"><?php echo $ayarlar->firmaCopyright ?></p><!-- /.copy-text -->
        </div><!-- /.bottom-content -->
    </div><!-- /.sidebar-content -->
</section><!-- /.hidden-sidebar -->