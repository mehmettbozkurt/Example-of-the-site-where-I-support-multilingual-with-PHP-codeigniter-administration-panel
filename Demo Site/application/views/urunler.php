<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="inner-banner">
    <div class="container">
        <h3><?php echo $kelimeler->urunler ?></h3>
        <ul class="breadcumb">
            <li><a href="<?php echo base_url() ?>"><?php echo $kelimeler->anasayfa ?></a></li>
            <li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
            <li><span><?php echo $kelimeler->urunler ?></span></li>
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
                            <?php foreach ($urun_kategoriler as $kategori) { ?>
                                <li> 
                                    <?php if($this->session->userdata("dil") == 0){ ?>    

                                    <a href="<?php echo base_url("urunler/$kategori->kategoriSeo") ?>">
                                        <?php echo $kategori->kategoriAdi ?>
                                    </a>
                                    <?php }else{ ?>
                                    <a href="<?php echo base_url("products/$kategori->kategoriSeo") ?>">
                                        <?php echo $kategori->kategoriAdi ?>
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
                        <?php foreach ($urunler as $urun) { ?>
                            <div class="col-md-6 col-sm-6 col-sm-12">
                                <div class="gas single-service-style-four">
                                    <div class="img-box">
                                        <img src="<?php echo base_url("public/admin/uploads/urunler/$urun->urunId/$urun->urunResim") ?>" alt="<?php echo $urun->urunAdi ?>" height="248px" width="400px"/>
                                        <div class="box">
                                            <div class="content">
                                                <h3><span><?php echo $kelimeler->urunler ?></span> <br /> <?php echo $urun->urunAdi ?></h3>
                                               <?php if($this->session->userdata("dil") == 0){ ?>
                                                <a href="<?php echo base_url("urun/$urun->urunSeo") ?>" class="more hvr-sweep-to-right"><?php echo $kelimeler->incele ?></a>
                                                <?php }else{ ?>
                                                    <a href="<?php echo base_url("product/$urun->urunSeo") ?>" class="more hvr-sweep-to-right"><?php echo $kelimeler->incele ?></a>
                                                <?php } ?>
                                            </div><!-- /.content -->
                                        </div><!-- /.box -->
                                    </div><!-- /.img-box -->
                                </div><!-- /.single-service-style-four -->
                            </div><!-- /.col-md-4 -->
                        <?php } ?>
                        <?php if(empty($urunler)){ ?>
                            <h4><?php echo $kelimeler->bos_urun_mesaj ?></h4>
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