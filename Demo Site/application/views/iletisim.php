<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


    <div class="inner-banner">
        <div class="container">
            <h3><?php echo $kelimeler->bize_ulasin ?></h3>
            <ul class="breadcumb">
                <li><a href="<?php echo base_url() ?>"><?php echo $kelimeler->anasayfa ?></a></li><!--
                --><li><span class="sep"><i class="fa fa-angle-right"></i></span></li><!--
                --><li><span><?php echo $kelimeler->bize_ulasin ?></span></li>
            </ul><!-- /.breadcumb -->
        </div><!-- /.container -->
    </div><!-- /.inner-banner -->
    
    <section class="contact-page sec-pad">
        <div class="container">
            <div class="sec-title text-center">
                <h3><?php echo $kelimeler->bize_ulasin ?></h3>
            </div><!-- /.sec-title text-center -->
            <div class="row">
                <div class="col-md-6">
                    <iframe src="<?php echo $ayarlar->firmaGoogleMaps ?>" width="100%" height="500" frameborder="0" allowfullscreen></iframe>
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <form action="<?php echo base_url("iletisim/mesaj_gonder") ?>" class="contact-form">
                        <?php if($this->session->flashdata("mesaj")){?>
                            <div class="alert alert-warning" >
                                <strong>Başarısız!</strong> <?php echo $this->session->flashdata("mesaj"); ?>

                            </div>
                        <?php } ?>
                        <?php if($this->session->flashdata("basarili")){?>
                            <div class="alert alert-success" >
                                <strong>Başarılı!</strong> <?php echo $this->session->flashdata("basarili"); ?>
                            </div>
                        <?php } ?>
                        <?php if($this->session->flashdata("basarisiz")){?>
                            <div class="alert alert-danger" >
                                <strong>Hata!</strong> <?php echo $this->session->flashdata("mesaj"); ?>

                            </div>
                        <?php } ?>
                        <input type="text" placeholder="<?php echo $kelimeler->ad ?>" name="ad" />
                        <input type="text" placeholder="<?php echo $kelimeler->tel ?>" name="telNo" />
                        <input type="text" placeholder="<?php echo $kelimeler->mail ?>" name="mail" />
                        <input type="text" placeholder="<?php echo $kelimeler->konu ?>" name="konu" />
                        <input type="hidden" name="<?php echo $ayarlar->firmaMail ?>" />
                        <textarea placeholder="<?php echo $kelimeler->mesaj ?>" name="mesaj"></textarea>
                        <div class="col-md-6 col-sm-6">
                            <label><?php echo $kelimeler->guvenlik_kodu ?></label>
                            <?php echo $cap['image']; ?>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label><?php echo $kelimeler->guvenlik_kodu ?></label>
                            <input type="text" id="input_zipcode" name="captcha" />
                        </div>
                        <button type="submit" class="hvr-sweep-to-right"><?php echo $kelimeler->mesaj_gonder?></button>
                    </form>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.contact-page -->




    <section class="contact-info-style-one">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title">
                        <h3><?php echo $kelimeler->bize_ulasin ?></h3>
                        <p>Bize Mesai saatleri dahilinde iletişim numaralarımızdan ulaşabilirsiniz. </p>
                    </div><!-- /.title -->
                </div><!-- /.col-md-7 -->
                <div class="col-md-8">
                    <div class="contact-infos">
                        <div class="single-contact-infos">
                            <div class="icon-box">
                                <i class="industrio-icon-phone-call"></i>
                            </div><!-- /.icon-box -->
                            <div class="text-box">
                                <h3><?php echo $kelimeler->tel ?></h3>
                                <p><?php echo $ayarlar->firmaTel ?></p><br>
                                <p><?php echo $ayarlar->firmaCep ?></p>
                            </div><!-- /.text-box -->
                        </div><!-- /.single-contact-infos -->
                        <div class="single-contact-infos">
                            <div class="icon-box">
                                <i class="industrio-icon-envelope"></i>
                            </div><!-- /.icon-box -->
                            <div class="text-box">
                                <h3><?php echo $kelimeler->mail ?></h3>
                                <p><?php echo $ayarlar->firmaMail ?></p><br>
                                <p></p>
                            </div><!-- /.text-box -->
                        </div><!-- /.single-contact-infos -->
                    </div><!-- /.contact-infos -->
                </div><!-- /.col-md-5 -->
            </div><!-- /.row -->
        </div><!-- /.contianer -->
    </section><!-- /.contact-info-style-one -->

</div><!-- /.page-wrapper -->