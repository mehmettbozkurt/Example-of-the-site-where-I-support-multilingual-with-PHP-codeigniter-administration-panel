<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $timestamp = strtotime($hizmet->hizmetTarih);
  $gun = date("j",$timestamp);
  $aylar = array(
    'Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık');
  $ay = $aylar[date('m',$timestamp) - 1];
  $yil = date("Y",$timestamp); ?>


<div class="inner-banner">
    <div class="container">
        <h3><?php echo $hizmet->hizmetBaslik ?></h3>
        <ul class="breadcumb">
            <li><a href="<?php echo base_url() ?>"><?php echo $kelimeler->anasayfa ?></a></li>
            <li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
            <?php if($this->session->userdata("dil") == 0){ ?>
            <li><a href="<?php echo base_url("hizmetler") ?>"><?php echo $kelimeler->hizmetler ?></a></li>
            <?php }else{ ?>
            <li><a href="<?php echo base_url("services") ?>"><?php echo $kelimeler->hizmetler ?></a></li>
            <?php } ?>
            <li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
            <li><span><?php echo $hizmet->hizmetBaslik ?></span></li>
        </ul><!-- /.breadcumb -->
    </div><!-- /.container -->
</div><!-- /.inner-banner -->
    
<section class="project-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <img src="<?php echo base_url("public/admin/uploads/hizmetler/$hizmet->hizmetId/$hizmet->hizmetResim") ?>" alt="<?php echo $hizmet->hizmetBaslik ?>" width="400px" style="border-radius: 5px"/>
            </div><!-- /.col-lg-7 -->
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="project-details-content">
                    <h3><?php echo $hizmet->hizmetBaslik ?></h3>
                    <br />
                    <?php echo $hizmet->hizmetIcerik ?>
                    
                </div><!-- /.project-details-content -->
            </div><!-- /.col-lg-7 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.project-details -->
</div><!-- /.page-wrapper -->