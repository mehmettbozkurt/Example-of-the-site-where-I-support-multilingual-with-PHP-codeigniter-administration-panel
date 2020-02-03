<style>
	.kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
		margin: 0;
		padding: 0;
		border: none;
		box-shadow: none;
		text-align: center;
	}
	.kv-avatar .file-input {
		display: table-cell;
		max-width: 220px;
	}
</style>

<div class="block-header">
	<ol class="breadcrumb breadcrumb-col-cyan">
		<li><a href="<?php echo base_url(); ?>panel/"><i class="material-icons">home</i> Ana Sayfa</a></li>
		<li><a href="<?php echo base_url(); ?>panel/slayt_yonetim/"><i class="material-icons">collections</i> Slayt Listesi</a></li>
		<li class="active"><i class="material-icons">edit</i>Slayt Düzenle</a></li>
	</ol>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					Slayt Düzenle
				</h2>
			</div>
			<div class="body">
				
				<form action="<?php echo base_url("panel/slayt_yonetim/slayt_guncelle/$slayt->slaytId") ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="form-group">
						<div class="form-line"> 
							<label class="control-label" >Slide Başlık</label> 
							<input type="text" class="form-control" name="slaytBaslik" placeholder="örn:resim1" required="" value="<?php echo $slayt->slaytBaslik ?>"> 
						</div>
					</div>
					<div class="form-group">
						<div class="form-line"> 
							<label class="control-label" >Slide Başlık EN</label> 
							<input type="text" class="form-control" name="slaytBaslik_en" placeholder="örn:resim1" required="" value="<?php echo $slayt->slaytBaslik_en ?>"> 
						</div>
					</div>
					<div class="form-group"> 
						<label class="control-label">Slayt Resmi Seçiniz</label> 

						<input id="slayt" name="slaytResim" style="display: none;" value="<?php echo $slayt->slaytResim ?>">
						<div class="kv-avatar" style="width:200px">
							<div class="file-input">
								<div class="file-preview-frame">
									<img id="slaytResim" src="<?php echo base_url("public/admin/uploads/slayt/$slayt->slaytResim") ?>" style="width: 200px;height: 200px;" onerror="this.src='<?php echo base_url("public/admin/uploads/img_upload.png") ?>'" >
								</div>
							</div>
						</div>
						<a href="javascript:open_popup('<?php echo base_url('public/admin/plugins/filemanager/dialog.php?type=1&popup=1&field_id=slayt&fldr=slayt/')?>')" class="btn iframe-btn" type="button">Resim Seç</a>
					</div>
					<div class="form-group"> 
						<button type="submit" class="btn btn-oval btn-primary">Düzenle</button> 
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>public/admin/plugins/tinymce/jquery.tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/tinymce/tinymce.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/pages/forms/editors.js"></script>
<script>
	function responsive_filemanager_callback(field_id){
		
		var url=jQuery('#'+field_id).val();
		resimYol = url.split("/");
		resimAd = resimYol[resimYol.length-1];
		jQuery('#'+field_id).val(resimAd);
		jQuery('#'+field_id+'Resim').attr("src",url);
		
	}

	function open_popup(url){
		var w=880;
		var h=570;
		var l=Math.floor((screen.width-w)/2);
		var t=Math.floor((screen.height-h)/2);
		var win=window.open(url,'ResponsiveFilemanager',"scrollbars=1,width="+w+",height="+h+",top="+t+",left="+l);
	}

</script>