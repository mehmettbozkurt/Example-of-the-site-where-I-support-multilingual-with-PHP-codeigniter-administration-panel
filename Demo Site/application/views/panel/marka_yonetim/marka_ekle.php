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
	    <li><a href="<?php echo base_url(); ?>panel/marka_yonetim/"><i class="material-icons">collections</i> Marka Listesi</a></li>
	    <li class="active"><i class="material-icons">add</i>Marka Ekle</a></li>
	</ol>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        	
		    <div class="header">
		        <h2>
		            Marka Ekle 
		        </h2>
		    </div>
		    <div class="body">
	
			<form action="<?php echo base_url("panel/marka_yonetim/marka_ekle") ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label" >Marka Adı</label> 
							<input type="text" class="form-control" name="markaAd" placeholder="örn:Marka Adı" required=""> 
						</div>
					</div>
					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label" >Marka Sıra</label> 
							<input type="number" class="form-control" name="markaSira" placeholder="örn:1" required=""> 
						</div>
					</div>
					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label" >Marka Linki</label> 
							<input type="text" class="form-control" name="markaLink" placeholder="örn:<?php echo base_url() ?>" > 
						</div>
					</div>

					<div class="form-group"> 
						<label class="control-label">Marka Logosu Seçiniz</label> 

				         <input id="marka" name="markaResim" style="display: none;">
			         	<div class="kv-avatar" style="width:200px">
			         		<div class="file-input">
			         			<div class="file-preview-frame">
				       				<img id="marka" src="<?php echo base_url("public/admin/uploads/img_upload.png") ?>" style="width: 200px;height: 200px;">
				       			</div>
				       		</div>
				       	</div>
					    <a href="javascript:open_popup('<?php echo base_url('public/admin/plugins/filemanager/dialog.php?type=1&popup=1&field_id=marka&fldr=markalar')?>')" class="btn iframe-btn" type="button">Resim Seç</a>
					    <a onClick="document.getElementById('marka').value='';document.getElementById('markaResim').src='<?php echo base_url("public/admin/images/img_upload.png") ?>';return false;" title="Seçilen Resmi Kaldır" class="btn btn-danger fileinput-remove fileinput-remove-button">Resmi Kaldır</a>
					</div>
					<div class="form-group"> 
						<button type="submit" class="btn btn-oval btn-primary">Ekle</button> 
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