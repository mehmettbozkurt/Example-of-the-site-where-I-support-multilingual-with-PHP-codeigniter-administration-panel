<!-- Overlay For Sidebars -->

<div class="overlay"></div>

<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->

<nav class="navbar">

    <div class="container-fluid">

        <div class="navbar-header">

            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>

            <a href="javascript:void(0);" class="bars"></a>

            <a class="navbar-brand" href="<?php echo base_url() ?>panel">İntermed - Yönetim Paneli</a>

        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">

                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                        <i class="material-icons">more_vert</i>

                    </a>

                    <ul class="dropdown-menu pull-right">

                        <li><a href="<?php echo base_url() ?>" target="_blank"><i class="material-icons">open_in_new</i>Siteye Git</a></li>

                        <li role="seperator" class="divider"></li>

                        <li><a href="<?php echo base_url("/panel/giris_yonetim/cikis") ?>"><i class="material-icons">input</i>Çıkış</a></li>

                    </ul>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- #Top Bar -->



<section>

    <aside id="leftsidebar" class="sidebar">

        <div class="user-img-background user-info" style="background: #0798da;">

           <img src="<?php echo base_url("public/admin/uploads/logo.png") ?>">

       </div>

       <div class="menu">

        <ul class="list">

            <li class="header">Menü</li>

            <li>

                <a href="<?php echo base_url("panel"); ?>">

                    <i class="material-icons">home</i>

                    <span>Anasayfa</span>

                </a>

            </li>

            <li>

                <a href="<?php echo base_url("panel/site_ayarlar"); ?>">

                    <i class="material-icons">settings</i>

                    <span>Site Yönetimi</span>

                </a>

            </li>

            <?php if($this->session->userdata("kullaniciBilgiler")->kullaniciRutbe == 1){ ?>

                <li>

                    <a href="javascript:void(0);" class="menu-toggle">

                        <i class="material-icons">account_circle</i>

                        <span>Yönetici Ayarları</span>

                    </a>

                    <ul class="ml-menu">

                        <li>

                            <a href="<?php echo base_url("panel/yonetim_ayarlar/yeni_yonetici"); ?>">

                                <i class="material-icons">add</i>

                                <span class="sub-menu">Yönetici Ekle</span>

                            </a>

                        </li>

                        <li>

                            <a href="<?php echo base_url("panel/yonetim_ayarlar/"); ?>">

                                <i class="material-icons">format_list_bulleted</i>

                                <span class="sub-menu">Yönetici Listesi</span>

                            </a>

                        </li>

                    </ul>

                </li>

            <?php } ?>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">toc</i>
                    <span>Kategori Yönetimi</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="<?php echo base_url("panel/kategori_yonetim/yeni_kategori"); ?>">
                            <i class="material-icons">add</i>
                            <span>Kategori Ekle</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("panel/kategori_yonetim/"); ?>">
                            <i class="material-icons">format_list_bulleted</i>
                            <span>Kategori Listele</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>

                <a href="javascript:void(0);" class="menu-toggle">

                    <i class="material-icons">shopping_cart</i>

                    <span>Ürün Yönetimi</span>

                </a>

                <ul class="ml-menu">

                    <li>

                        <a href="<?php echo base_url("panel/urun_yonetim/yeni_urun") ?>">

                            <i class="material-icons">add</i>

                            <span>Ürün Ekle</span>

                        </a>

                    </li>

                    <li>

                        <a href="<?php echo base_url("panel/urun_yonetim") ?>">

                            <i class="material-icons">format_list_bulleted</i>

                            <span>Ürün Listele</span>

                        </a>

                    </li>

                </ul>

            </li>


            <li>

                <a href="javascript:void(0);" class="menu-toggle">

                    <i class="material-icons">theaters</i>

                    <span>Slayt Yönetimi</span>

                </a>

                <ul class="ml-menu">

                    <li>

                        <a href="<?php echo base_url("panel/slayt_yonetim/yeni_slayt") ?>">

                            <i class="material-icons">add</i>

                            <span>Slayt Ekle</span>

                        </a>

                    </li>

                    <li>

                        <a href="<?php echo base_url("panel/slayt_yonetim") ?>">

                            <i class="material-icons">format_list_bulleted</i>

                            <span>Slayt Listele</span>

                        </a>

                    </li>

                </ul>

            </li>


            <li>

                <a href="javascript:void(0);" class="menu-toggle">

                    <i class="material-icons">content_copy</i>

                    <span>Sayfa Yönetimi</span>

                </a>

                <ul class="ml-menu">

                    <li>

                        <a href="<?php echo base_url("panel/sayfa_yonetim/yeni_sayfa"); ?>">

                            <i class="material-icons">add</i>

                            <span>Sayfa Ekle</span>

                        </a>

                    </li>

                    <li>

                        <a href="<?php echo base_url("panel/sayfa_yonetim/sayfa_sirala"); ?>">

                            <i class="material-icons">clear_all</i>

                            <span>Sayfa Sıralama</span>

                        </a>

                    </li>

                    <li>

                        <a href="<?php echo base_url("panel/sayfa_yonetim/"); ?>">

                            <i class="material-icons">format_list_bulleted</i>

                            <span>Sayfa Listele</span>

                        </a>

                    </li>

                </ul>

            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">event_note</i>
                    <span>Hizmet Yönetimi</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="<?php echo base_url("panel/hizmet_yonetim/yeni_hizmet"); ?>">
                            <i class="material-icons">add</i>
                            <span>Hizmet Ekle</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("panel/hizmet_yonetim/"); ?>">
                            <i class="material-icons">format_list_bulleted</i>
                            <span>Hizmet Listele</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>

                <a href="<?php echo base_url("panel/mesaj_yonetim"); ?>">

                    <i class="material-icons">email</i>

                    <span>Mesaj Yönetimi</span>

                </a>

            </li>


            <li>

                <a href="javascript:void(0);" class="menu-toggle">

                    <i class="material-icons">ballot</i>

                    <span>Blog Yönetimi</span>

                </a>

                <ul class="ml-menu">

                    <li>

                        <a href="<?php echo base_url("panel/blog_yonetim/yeni_blog") ?>">

                            <i class="material-icons">add</i>

                            <span>Blog Ekle</span>

                        </a>

                    </li>

                    <li>

                        <a href="<?php echo base_url("panel/blog_yonetim") ?>">

                            <i class="material-icons">format_list_bulleted</i>

                            <span>Blog Listele</span>

                        </a>

                    </li>

                </ul>

            </li>
             <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">question_answer</i>
                    <span>Galeri Yönetimi</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="<?php echo base_url("panel/galeri_yonetim/galeriler/galeri") ?>">
                            <span>Galeri Listele</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>

                <a href="javascript:void(0);" class="menu-toggle">

                    <i class="material-icons">view_column</i>

                    <span>Marka Yönetimi</span>

                </a>

                <ul class="ml-menu">

                    <li>

                        <a href="<?php echo base_url("panel/marka_yonetim/yeni_marka") ?>">

                            <i class="material-icons">add</i>

                            <span>Marka Ekle</span>

                        </a>

                    </li>

                    <li>

                        <a href="<?php echo base_url("panel/marka_yonetim") ?>">

                            <i class="material-icons">format_list_bulleted</i>

                            <span>Marka Listele</span>

                        </a>

                    </li>

                </ul>

            </li>

            <li>

                <a href="javascript:void(0);" class="menu-toggle">

                    <i class="material-icons">spellcheck</i>

                    <span>Kelime Yönetimi</span>

                </a>

                <ul class="ml-menu">

                    <li>

                        <a href="<?php echo base_url("panel/kelime_yonetim") ?>">

                            <i class="material-icons">format_list_bulleted</i>

                            <span>Kelime Listele</span>

                        </a>

                    </li>

                </ul>

            </li>
        </ul>

    </div>

    <!-- #Menu -->



</aside>

<!-- #END# Left Sidebar -->



</section>



<section class="content">

    <div class="container-fluid">