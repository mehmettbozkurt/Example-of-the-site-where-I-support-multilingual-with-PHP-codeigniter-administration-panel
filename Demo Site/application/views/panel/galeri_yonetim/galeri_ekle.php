<div class="block-header">
    <ol class="breadcrumb breadcrumb-col-cyan">
	    <li><a href="<?php echo base_url(); ?>panel/"><i class="material-icons">home</i> Ana Sayfa</a></li>
	    <li><a href=""><i class="material-icons">home</i> Resim Listesi</a></li>
	    <li class="active"><i class="material-icons">add</i>Resim Ekle</a></li>
	</ol>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
		    <div class="header">
		        <h2>
		            Resim Ekle
		        </h2>
		    </div>
		    <div class="body">
	
			<div class="form-group">
			 	<div class="form-line"> 
					<label class="control-label" >Galeriyi Açarak <?php echo $galeriAd ?> Resimleriniz Ekleyebilirsiniz.</label> 
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label">Galeri Resmi Seçiniz (800*450)</label> 

				<a href="javascript:open_popup('<?php echo base_url('public/admin/plugins/filemanager/dialog.php?type=1&popup=1&field_id=duyuru&fldr=').$galeriAd?>')" class="btn btn-oval btn-primary" type="button"><?php echo $galeriAd ?> Resimlerini Aç</a>
			</div>

			</div>
		</div>
	</div>
</div>

<script>


function open_popup(url){
	var w=880;
	var h=570;
	var l=Math.floor((screen.width-w)/2);
	var t=Math.floor((screen.height-h)/2);
	var win=window.open(url,'ResponsiveFilemanager',"scrollbars=1,width="+w+",height="+h+",top="+t+",left="+l);
}

</script>