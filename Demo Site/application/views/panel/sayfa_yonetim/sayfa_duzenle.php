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
	    <li><a href="<?php echo base_url("panel/sayfa_yonetim"); ?>"><i class="material-icons">content_copy</i> Sayfalar</a></li>
	    <li class="active"><i class="material-icons">edit</i>Sayfa Düzenle</a></li>
	</ol>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
		    <div class="header">
		        <h2>
		            Sayfa Düzenle
		        </h2>
		    </div>
		    <div class="body">
	
			<form action="<?php echo base_url("panel/Sayfa_yonetim/sayfa_guncelle/$sayfa->sayfaId") ?>" method="POST" accept-charset="utf-8">

					<div class="form-group">
						<label class="control-label" >Dil</label> 
						<select class="selectpicker" name="dil">
						  <option value ="0" <?php $sayfa->dil == 0 ? "selected":"" ?> >Türkçe</option>
						  <option value ="1" <?php $sayfa->dil == 1 ? "selected":"" ?> >İngilizce</option>
						  <option value ="2" <?php $sayfa->dil == 2 ? "selected":"" ?> >Almanca</option>
						</select> 
					</div>

					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label" >Sayfa Başlık</label> 
							<input type="text" class="form-control" name="sayfaBaslik" placeholder="Sayfa başlık" required="" value="<?php echo $sayfa->sayfaBaslik; ?>"> 
						</div>
					</div>

					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label" >Üst Sayfa Seçiniz</label> 							
							<select name="ustsayfaId" class="form-control" required="" data-live-search=true>
								<option value="0" <?php echo ($sayfa->ustSayfaId == 0) ? "selected":""?> >Anasayfa</option>
								<?php foreach ($sayfalar as $ustSayfa) { ?>
									<?php if($ustSayfa->ustsayfaId == 0 && $ustSayfa->sayfaId != $sayfa->sayfaId){ ?>
										<option value="<?php echo $ustSayfa->sayfaId ?>"<?php echo ($sayfa->ustSayfaId == $ustSayfa->sayfaId) ? "selected":""?> >
											<?php echo $ustSayfa->sayfaBaslik ?>
										</option>
									<?php } ?>
								<?php } ?>
							 </select> 
						</div>
					</div>
					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label" >Sayfa Sırası</label> 
							<input type="text" class="form-control" name="sayfaSirasi" placeholder="Sayfa Sırası" required="" value="<?php echo $sayfa->sayfaSirasi; ?>"> 
						</div>
					</div>
					
					<div class="form-group"> 
						<label class="control-label">Sayfa Durumu</label> 
					 	<div class="switch">
                            <label>Kapalı<input type="checkbox" <?php echo $sayfa->sayfaDurum == 1 ? 'checked':''?> name="sayfaDurum"><span class="lever" ></span>Açık</label>
                        </div>
					</div>
					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label" >Sayfa Linki <font color="orange">* Link yoksa boş bırakınız !</font></label> 
							<input type="text" class="form-control" name="sayfaLink" placeholder="örn:https://ofosoft.com.tr" value="<?php echo $sayfa->sayfaURL; ?>" > 
						</div>
					</div>
					<div class="form-group"> 
						<label class="control-label">Sayfa Resimlerini Seçiniz</label> 

				        <input type="hidden" id="sayfa" name="sayfaResim" value="<?php echo $sayfa->sayfaResim ?>">
			         	<div class="kv-avatar" style="width:200px">
			         		<div class="file-input">
			         			<div class="file-preview-frame">
				       				<img id="sayfaResim" src="<?php echo base_url("public/admin/uploads/sayfalar/$sayfa->sayfaId/$sayfa->sayfaResim") ?>" style="width: 200px;height: 200px;"  onerror="this.src='<?php echo base_url("public/admin/images/img_upload.png") ?>';" >
				       			</div>
				       		</div>
				       	</div>
					    <a href="javascript:open_popup('<?php echo base_url("public/admin/plugins/filemanager/dialog.php?type=1&popup=1&field_id=sayfa&fldr=sayfalar/$sayfa->sayfaId")?>')" class="btn iframe-btn" type="button">Resim Seç</a>
					    <a onClick="document.getElementById('sayfa').value='';document.getElementById('sayfaResim').src='<?php echo base_url("public/admin/images/img_upload.png") ?>';return false;" title="Seçilen Resmi Kaldır" class="btn btn-danger fileinput-remove fileinput-remove-button">Resmi Kaldır</a>
					</div>
					<div class="form-group">
							<label class="control-label">Sayfa İçerik</label> 
							<textarea id="tinymce" name="sayfaIcerik"><?php echo $sayfa->sayfaIcerik; ?></textarea>
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

$("[name = dil]").change(function() {
	var dil = $("[name = dil] option:selected").val();
	$.post('<?php echo base_url("panel/sayfa_yonetim/sayfa_dil_listele/$sayfa->sayfaId/")?>'+dil, function( data ) {
		if(data!=""){
			console.log(JSON.parse(data));
			sayfa = JSON.parse(data);
			$("[name = sayfaBaslik]").val(sayfa.sayfaBaslik);
			tinyMCE.activeEditor.setContent(sayfa.sayfaIcerik);
		}else{
			$("[name = sayfaBaslik]").val("");
			tinyMCE.activeEditor.setContent("");
		}
	 
	});
	
})

</script>