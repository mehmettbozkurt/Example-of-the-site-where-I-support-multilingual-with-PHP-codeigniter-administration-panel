<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<footer class="site-footer fixed-footer">
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget about-widget">
                        <h3><?php echo $ayarlar->firmaAdi ?></h3>
                        <p><?php echo $ayarlar->firmaGenelBilgi ?></p>
                    </div><!-- /.footer-widget about-widget -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget links-widget">
                        <div class="title">
                            <h3><?php echo $kelimeler->hizmetler ?></h3>
                        </div><!-- /.title -->
                        <ul class="links-list">
                          <?php foreach ($bloglar as $blog) {?>
                            <li>
                                <a title="<?php echo $blog->blogBaslik ?>" href="<?php echo base_url("blog/$blog->blogSeo") ?>">
                                    <?php echo $blog->blogBaslik ?>
                                </a>
                            </li>
                          <?php } ?>
                        </ul><!-- /.links-list -->
                    </div><!-- /.footer-widget links-widget -->
                </div><!-- /.col-md-2 -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget services-widget">
                        <div class="title">
                            <h3><?php echo $kelimeler->urunler ?></h3>
                        </div><!-- /.title -->
                        <ul class="links-list">
                          <?php foreach ($kategoriler as $kategori) {?>
                              <li>
                                <?php if($this->session->userdata("dil") == 0){ ?>
                                  <a title="<?php echo $kategori->kategoriAdi ?>" href="<?php echo base_url("urunler/$kategori->kategoriSeo") ?>">
                                      <?php echo $kategori->kategoriAdi ?>
                                  </a>
                                <?php }else{ ?>
                                  <a title="<?php echo $kategori->kategoriAdi ?>" href="<?php echo base_url("products/$kategori->kategoriSeo") ?>">
                                      <?php echo $kategori->kategoriAdi ?>
                                  </a>
                                <?php } ?>

                              </li>
                          <?php } ?>
                        </ul><!-- /.links-list -->
                    </div><!-- /.footer-widget services-widget -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget services-widget social">
                        <div class="title">
                            <h3><?php echo $kelimeler->hizli_baglantilar ?></h3>
                        </div><!-- /.title -->
                        <ul class="links-list">
                          <li>
                            <?php if($this->session->userdata("dil") == 0){ ?>
                            <a href="<?php echo base_url("urunler") ?>">
                              <?php echo $kelimeler->urunler ?>
                            </a>
                            <?php }else{ ?>
                            <a href="<?php echo base_url("products") ?>">
                              <?php echo $kelimeler->urunler ?>
                            </a>
                            <?php } ?>
                          </li>

                          <li>
                            <?php if($this->session->userdata("dil") == 0){ ?>
                            <a href="<?php echo base_url("hizmetler") ?>">
                              <?php echo $kelimeler->hizmetler ?>
                            </a>
                            <?php }else{ ?>
                            <a href="<?php echo base_url("services") ?>">
                              <?php echo $kelimeler->hizmetler ?>
                            </a>
                            <?php } ?>
                          </li>

                          <li>
                            <?php if($this->session->userdata("dil") == 0){ ?>
                            <a href="<?php echo base_url("markalar") ?>">
                              <?php echo $kelimeler->markalar ?>
                            </a>
                            <?php }else{ ?>
                            <a href="<?php echo base_url("marks") ?>">
                              <?php echo $kelimeler->markalar ?>
                            </a>
                            <?php } ?>
                          </li>

                          <li>
                            <a href="<?php echo base_url("bloglar") ?>">
                              <?php echo $kelimeler->haberler ?>
                            </a>
                          </li>

                           <li>
                            <?php if($this->session->userdata("dil") == 0){ ?>
                            <a href="<?php echo base_url("iletisim") ?>">
                              <?php echo $kelimeler->iletisim ?>
                            </a>
                            <?php }else{ ?>
                            <a href="<?php echo base_url("contact") ?>">
                              <?php echo $kelimeler->iletisim ?>
                            </a>
                            <?php } ?>
                          </li>
                          
                        </ul><!-- /.links-list -->
                    </div><!-- /.footer-widget services-widget -->
                </div><!-- /.col-md-4 --
            </div> <!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main-footer -->
    <div class="bottom-footer">
        <div class="container">
            <div class="left-text pull-left"><p><?php echo $ayarlar->firmaCopyright ?></p></div><!-- /.left-text -->
            
        </div><!-- /.container -->
    </div><!-- /.bottom-footer -->
</footer><!-- /.site-footer -->

<div class="scroll-to-top scroll-to-target" data-target="html"><i class="fa fa-angle-up"></i></div>                    

<script src="<?php echo base_url("public/") ?>js/jquery.js"></script>

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


</body>
</html>