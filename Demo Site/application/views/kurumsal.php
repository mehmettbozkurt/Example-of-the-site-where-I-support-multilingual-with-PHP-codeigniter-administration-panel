<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="inner-banner">
	    <div class="container">
	        <h3><?php echo $sayfa->sayfaBaslik ?></h3>
	        <ul class="breadcumb">
	            <li><a href="<?php echo base_url() ?>"><?php echo $kelimeler->anasayfa ?></a></li>
	            <li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
	            <li><span><?php echo $sayfa->sayfaBaslik ?></span></li>
	        </ul><!-- /.breadcumb -->
	    </div><!-- /.container -->
	</div><!-- /.inner-banner -->
    
	<section class="about-style-three">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="about-img-box">
						<img src="<?php echo base_url("public/admin/uploads/sayfalar/$sayfa->sayfaId/$sayfa->sayfaResim") ?>" alt="<?php echo $sayfa->sayfaBaslik ?>" width="580px"/>
						<div class="content">
							<span><?php echo $sayfa->sayfaBaslik ?></span>
							<h3><?php echo $ayarlar->firmaAdi ?></h3>
						</div><!-- /.content -->
					</div><!-- /.about-img-box -->
				</div><!-- /.col-md-6 -->
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="about-content">
						<h3><?php echo $sayfa->sayfaBaslik ?></h3>
						<?php echo $sayfa->sayfaIcerik ?>
					</div><!-- /.about-content -->
				</div><!-- /.col-md-6 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.about-style-three -->

    <section class="contact-info-style-one">
        <div class="container">
            
        </div><!-- /.contianer -->
    </section><!-- /.contact-info-style-one -->

</div><!-- /.page-wrapper -->