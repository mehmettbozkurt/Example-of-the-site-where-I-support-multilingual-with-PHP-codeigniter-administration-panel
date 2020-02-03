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
		<li><a href="<?php echo base_url("panel"); ?>"><i class="material-icons">home</i> Ana Sayfa</a></li>
		<li><a href="<?php echo base_url("panel/hizmet_yonetim"); ?>"><i class="material-icons">notifications</i> Hizmet Listesi</a></li>
		<li class="active"><i class="material-icons">edit</i>Hizmet Düzenle</a></li>
	</ol>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					Hizmet Düzenle
				</h2>
			</div>
			<div class="body">

				<form action="<?php echo base_url("panel/hizmet_yonetim/hizmet_guncelle/$hizmet->hizmetId") ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label" >Dil</label> 
						<select class="selectpicker" name="dil">
						  <option value ="0" <?php $hizmet->dil == 0 ? "selected":"" ?> >Türkçe</option>
						  <option value ="1" <?php $hizmet->dil == 1 ? "selected":"" ?> >İngilizce</option>
						  <option value ="2" <?php $hizmet->dil == 2 ? "selected":"" ?> >Almanca</option>
						</select> 
					</div>

					<div class="form-group">
						<div class="form-line"> 
							<label class="control-label">Hizmet Başlık</label> 
							<input type="text" class="form-control" name="hizmetBaslik" placeholder="örn:Web sitemiz yayınlandı" value="<?php echo $hizmet->hizmetBaslik ?>" required=""> 
						</div>
					</div>
					<div class="form-group">
						<div class="form-line"> 
							<label class="control-label">Hizmet Sıra</label> 
							<input type="text" class="form-control" name="hizmetSira" placeholder="örn:Web sitemiz yayınlandı" value="<?php echo $hizmet->hizmetSira ?>" required=""> 
						</div>
					</div>
					<div class="form-group"> 
						<label class="control-label">Hizmet Anasayfada Gösterilsin mi ?</label> 
						<div class="switch">
							<label>Hayır<input type="checkbox" <?php echo $hizmet->hizmetDurum == 1 ?'checked':'' ?> name="hizmetDurum"><span class="lever"></span>Evet</label>
						</div>
					</div>
					<div class="form-group"> 
						<label class="control-label">Hizmet Resimlerini Seçiniz</label> 

						<input type="hidden" id="hizmet" name="hizmetResim" value="<?php echo $hizmet->hizmetResim ?>">
						<div class="kv-avatar" style="width:200px">
							<div class="file-input">
								<div class="file-preview-frame">
									<img id="hizmetResim" src="<?php echo base_url("public/admin/uploads/hizmetler/$hizmet->hizmetId/$hizmet->hizmetResim") ?>" style="width: 200px;height: 200px;"  onerror="this.src='<?php echo base_url("public/admin/images/img_upload.png") ?>';" >
								</div>
							</div>
						</div>
						<a href="javascript:open_popup('<?php echo base_url("public/admin/plugins/filemanager/dialog.php?type=1&popup=1&field_id=hizmet&fldr=hizmetler/$hizmet->hizmetId")?>')" class="btn iframe-btn" type="button">Resim Seç</a>
						<a onClick="document.getElementById('hizmet').value='';document.getElementById('hizmetResim').src='<?php echo base_url("public/admin/images/img_upload.png") ?>';return false;" title="Seçilen Resmi Kaldır" class="btn btn-danger fileinput-remove fileinput-remove-button">Resmi Kaldır</a>
					</div>

					<div class="form-group">
						<label class="control-label">Hizmet İçerik</label> 
						<textarea id="tinymce" name="hizmetIcerik"> <?php echo $hizmet->hizmetIcerik ?></textarea>

					</div>
					<div class="form-group"> 
						<button type="submit" class="btn btn-oval btn-primary">Düzenle</button> 
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url("public/admin/plugins/tinymce/jquery.tinymce.min.js"); ?>"></script>
<script src="<?php echo base_url("public/admin/plugins/tinymce/tinymce.js"); ?>"></script>
<script src="<?php echo base_url("public/admin/js/pages/forms/editors.js"); ?>"></script>

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

	$("[name = dil]").change(function() {
		var dil = $("[name = dil] option:selected").val();
		$.post('<?php echo base_url("panel/hizmet_yonetim/hizmet_dil_listele/$hizmet->hizmetId/")?>'+dil, function( data ) {
			if(data!=""){
				console.log(JSON.parse(data));
				hizmet = JSON.parse(data);
				$("[name = hizmetBaslik]").val(hizmet.hizmetBaslik);
				tinyMCE.activeEditor.setContent(hizmet.hizmetIcerik);
			}else{
				$("[name = hizmetBaslik]").val("");
				tinyMCE.activeEditor.setContent("");
			}
		 
		});
		
	})
</script>