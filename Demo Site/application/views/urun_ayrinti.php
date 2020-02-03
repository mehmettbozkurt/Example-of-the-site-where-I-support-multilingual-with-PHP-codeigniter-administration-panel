<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <div class="inner-banner">
        <div class="container">
            <h3><?php echo $kelimeler->urunler ?></h3>
            <ul class="breadcumb">
                <li><a href="<?php echo $urun->urunAdi ?>"><?php echo $kelimeler->anasayfa ?></a></li>
                <li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
                <li><span><?php echo $kelimeler->urunler ?></span></li>
            </ul><!-- /.breadcumb -->
        </div><!-- /.container -->
    </div><!-- /.inner-banner -->

    <section class="service-page service-details-page">
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
                        <div class="single-sidebar broucher-sidebar">
                            <div class="title">
                                <h3><?php echo $kelimeler->brosur ?></h3>
                            </div><!-- /.title -->
                            
                            <?php if($urun->teknik){ ?>

                            <a href="<?php echo base_url("public/admin/uploads/urunler/$urun->urunId/teknik.pdf") ?>" class="broucher-btn" target="_blank"><i class="industrio-icon-emails-interface-download-symbol"></i> 
                                <?php if($this->session->userdata("dil") == 0){ ?>
                                Teknik Broşür
                                <?php }else{ ?>
                                Technical Brochure
                                <?php } ?>
                            </a>

                            <?php } ?>

                            <?php if($urun->bilgi){ ?>

                            <a href="<?php echo base_url("public/admin/uploads/urunler/$urun->urunId/bilgi.pdf") ?>" class="broucher-btn" target="_blank"><i class="industrio-icon-pdf"></i> 
                            <?php if($this->session->userdata("dil") == 0){ ?>
                                Bilgi Broşür
                            <?php }else{ ?>
                                İnformation Brochure
                            <?php } ?>
                            </a>

                            <?php } ?>
                        </div><!-- /.single-sidebar service-sidebar -->
                    </div><!-- /.sidebar -->
                </div><!-- /.col-md-3 col-sm-12 col-xs-12 -->
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="service-item-box service-details-content">
                        <div class="img-box testimonials-style-four-carousel">
                            <?php foreach ($urun->resimler as $resim) { ?>
                                <div class="item">
                                    <div class="single-service-style-two">
                                        <div class="img-box">
                                            <img src="<?php echo base_url($resim) ?>" alt="<?php echo $urun->urunAdi ?>" style="width: 300px;height:300px;margin:0 auto;display: block"/>
                                        </div><!-- /.img-box -->
                                    </div><!-- /.single-service-style-two -->
                                </div><!-- /.item -->
                            <?php } ?>
                        </div><!-- /.img-box -->
                        <br /><br />
                        <h3><?php echo $urun->urunAdi ?></h3>
                        <br />
                        <p><?php echo $urun->urunIcerik ?></p>
                        <br /><br />
                        <div class="feature-list-box clearfix">
                            <div class="content-box">
                                <p><?php echo $urun->urunKisaIcerik ?></p>
                                <ul class="list-items">
                                    <?php foreach ( explode(",",$urun->urunAciklama) as $aciklama ){ ?>
                                      <li><i class="fa fa-arrow-circle-right"></i><?php echo $aciklama ?></li>
                                    <?php } ?>
                                </ul><!-- /.list-items -->
                            </div><!-- /.content-box -->
                            <div class="img-box">
                                <img src="<?php echo base_url("public/admin/uploads/urunler/$urun->urunId/$urun->urunResim") ?>" alt="<?php echo $urun->urunAdi ?>" width="400px">
                            </div><!-- /.img-box -->
                        </div>
                        <br><br>
                        <div class="faq-style-one">
                            <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion">
                                <?php foreach ($urun_sorular as $index => $urun_soru) { ?>
                                    <div class="accrodion <?php echo ($index == 0) ? 'active' : '' ?>">
                                        <div class="accrodion-title">
                                            <h4><?php echo $urun_soru->soru ?> </h4>
                                        </div>
                                        <div class="accrodion-content" style="display: block;">
                                            <div class="inner">
                                                <p><?php echo $urun_soru->cevap ?></p>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div><!-- /.service-item-box -->
                </div><!-- /.col-md-9 col-sm-12 col-xs-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.service-page -->

    <section class="contact-info-style-one">
        <div class="container">
            <div class="row">

            </div><!-- /.row -->
        </div><!-- /.contianer -->
    </section><!-- /.contact-info-style-one -->

</div><!-- /.page-wrapper -->