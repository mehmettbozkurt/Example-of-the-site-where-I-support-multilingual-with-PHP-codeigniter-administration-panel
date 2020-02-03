<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css" media="screen">

a{

    text-decoration: none!important;

    cursor: pointer!important;

}    

</style>





<div class="block-header">

    <ol class="breadcrumb breadcrumb-col-cyan">

        <li class="active"><i class="material-icons">home</i> Ana Sayfa</a></li>

    </ol>

</div>

<div class="block-header">

    <h2>Site Ayarları</h2>

</div>







<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    <a href="<?php echo base_url("panel/sayfa_yonetim") ?>">

    <div class="info-box hover-zoom-effect">

        <div class="icon bg-orange">

            <i class="material-icons">content_copy</i>

        </div>

        <div class="content">

            <div class="text">Sayfalar</div>

            <div class="number count-to" data-from="0" data-to="<?php echo $sayfaSayisi->sayfaSayisi ?>" data-speed="1000" data-fresh-interval="20"><?php echo $sayfaSayisi->sayfaSayisi ?></div>

        </div>

    </div>

    </a>

</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    <a href="<?php echo base_url("panel/blog_yonetim") ?>">

    <div class="info-box hover-zoom-effect">

        <div class="icon bg-orange">

            <i class="material-icons">ballot</i>

        </div>

        <div class="content">

            <div class="text">Bloglar</div>

            <div class="number count-to" data-from="0" data-to="<?php echo $sayfaSayisi->blogSayisi ?>" data-speed="1000" data-fresh-interval="20"><?php echo $sayfaSayisi->blogSayisi ?></div>

        </div>

    </div>

    </a>

</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    <a href="<?php echo base_url("panel/slayt_yonetim") ?>">

    <div class="info-box hover-zoom-effect">

        <div class="icon bg-orange">

            <i class="material-icons">theaters</i>

        </div>

        <div class="content">

            <div class="text">Slaytlar</div>

            <div class="number count-to" data-from="0" data-to="<?php echo $sayfaSayisi->slaytSayisi ?>" data-speed="1000" data-fresh-interval="20"><?php echo $sayfaSayisi->slaytSayisi ?></div>

        </div>

    </div>

    </a>

</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    <a href="<?php echo base_url("panel/urun_yonetim") ?>">

    <div class="info-box hover-zoom-effect">

        <div class="icon bg-orange">

            <i class="material-icons">shopping_cart</i>

        </div>

        <div class="content">

            <div class="text">Ürünler</div>

            <div class="number count-to" data-from="0" data-to="<?php echo $sayfaSayisi->urunSayisi ?>" data-speed="1000" data-fresh-interval="20"><?php echo $sayfaSayisi->urunSayisi ?></div>

        </div>

    </div>

    </a>

</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    <a href="<?php echo base_url("panel/kategori_yonetim") ?>">

    <div class="info-box hover-zoom-effect">

        <div class="icon bg-orange">

            <i class="material-icons">toc</i>

        </div>

        <div class="content">

            <div class="text">Kategoriler</div>

            <div class="number count-to" data-from="0" data-to="<?php echo $sayfaSayisi->kategoriSayisi ?>" data-speed="1000" data-fresh-interval="20"><?php echo $sayfaSayisi->kategoriSayisi ?></div>

        </div>

    </div>

    </a>

</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    <a href="<?php echo base_url("panel/mesaj_yonetim") ?>">

    <div class="info-box hover-zoom-effect">

        <div class="icon bg-orange">

            <i class="material-icons">email</i>

        </div>

        <div class="content">

            <div class="text">Mesajlar</div>

            <div class="number count-to" data-from="0" data-to="<?php echo $sayfaSayisi->mesajSayisi ?>" data-speed="1000" data-fresh-interval="20"><?php echo $sayfaSayisi->mesajSayisi ?></div>

        </div>

    </div>

    </a>

</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    <a href="<?php echo base_url("panel/marka_yonetim") ?>">

    <div class="info-box hover-zoom-effect">

        <div class="icon bg-orange">

            <i class="material-icons">view_column</i>

        </div>

        <div class="content">

            <div class="text">Markalar</div>

            <div class="number count-to" data-from="0" data-to="<?php echo $sayfaSayisi->markaSayisi ?>" data-speed="1000" data-fresh-interval="20"><?php echo $sayfaSayisi->markaSayisi ?></div>

        </div>

    </div>

    </a>

</div>



<?php if($this->session->userdata("kullaniciBilgiler")->kullaniciRutbe == 1){ ?>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    <a href="<?php echo base_url() ?>panel/yonetim_ayarlar">

    <div class="info-box hover-zoom-effect">

        <div class="icon bg-orange">

            <i class="material-icons">account_circle</i>

        </div>

        <div class="content">

            <div class="text">Yöneticiler</div>

            <div class="number count-to" data-from="0" data-to="<?php echo $sayfaSayisi->kullaniciSayisi ?>" data-speed="1000" data-fresh-interval="20"><?php echo $sayfaSayisi->kullaniciSayisi ?></div>

        </div>

    </div>

    </a>

</div>

<?php } ?>