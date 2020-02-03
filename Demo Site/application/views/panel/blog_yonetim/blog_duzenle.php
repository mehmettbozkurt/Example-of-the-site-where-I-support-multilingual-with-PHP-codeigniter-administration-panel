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
		<li><a href="<?php echo base_url("panel/blog_yonetim"); ?>"><i class="material-icons">notifications</i> Blog Listesi</a></li>
		<li class="active"><i class="material-icons">edit</i>Blog Düzenle</a></li>
	</ol>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					Blog Düzenle
				</h2>
			</div>
			<div class="body">

				<form action="<?php echo base_url("panel/blog_yonetim/blog_guncelle/$blog->blogId") ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label" >Dil</label> 
						<select class="selectpicker" name="dil">
						  <option value ="0" <?php $blog->dil == 0 ? "selected":"" ?> >Türkçe</option>
						  <option value ="1" <?php $blog->dil == 1 ? "selected":"" ?> >İngilizce</option>
						  <option value ="2" <?php $blog->dil == 2 ? "selected":"" ?> >Almanca</option>
						</select> 
					</div>

					<div class="form-group">
						<div class="form-line"> 
							<label class="control-label">Blog Başlık</label> 
							<input type="text" class="form-control" name="blogBaslik" placeholder="örn:Web sitemiz yayınlandı" value="<?php echo $blog->blogBaslik ?>" required=""> 
						</div>
					</div>
					<div class="form-group"> 
						<label class="control-label">Blog Anasayfada Gösterilsin mi ?</label> 
						<div class="switch">
							<label>Hayır<input type="checkbox" <?php echo $blog->blogDurum == 1 ?'checked':'' ?> name="blogDurum"><span class="lever"></span>Evet</label>
						</div>
					</div>
					<div class="form-group"> 
						<label class="control-label">Blog Resimlerini Seçiniz <span style="color: orange;">Lütfen Resim Boyutunu (790x380) Seçiniz</span></label> 

						<input type="hidden" id="blog" name="blogResim" value="<?php echo $blog->blogResim ?>">
						<div class="kv-avatar" style="width:200px">
							<div class="file-input">
								<div class="file-preview-frame">
									<img id="blogResim" src="<?php echo base_url("public/admin/uploads/bloglar/$blog->blogId/$blog->blogResim") ?>" style="width: 200px;height: 200px;"  onerror="this.src='<?php echo base_url("public/admin/images/img_upload.png") ?>';" >
								</div>
							</div>
						</div>
						<a href="javascript:open_popup('<?php echo base_url("public/admin/plugins/filemanager/dialog.php?type=1&popup=1&field_id=blog&fldr=bloglar/$blog->blogId")?>')" class="btn iframe-btn" type="button">Resim Seç</a>
						<a onClick="document.getElementById('blog').value='';document.getElementById('blogResim').src='<?php echo base_url("public/admin/images/img_upload.png") ?>';return false;" title="Seçilen Resmi Kaldır" class="btn btn-danger fileinput-remove fileinput-remove-button">Resmi Kaldır</a>
					</div>

					<div class="form-group">
						<label class="control-label">Blog İçerik</label> 
						<textarea id="tinymce" name="blogIcerik"> <?php echo $blog->blogIcerik ?></textarea>

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
		$.post('<?php echo base_url("panel/blog_yonetim/blog_dil_listele/$blog->blogId/")?>'+dil, function( data ) {
			if(data!=""){
				console.log(JSON.parse(data));
				blog = JSON.parse(data);
				$("[name = blogBaslik]").val(blog.blogBaslik);
				tinyMCE.activeEditor.setContent(blog.blogIcerik);
			}else{
				$("[name = blogBaslik]").val("");
				tinyMCE.activeEditor.setContent("");
			}
		 
		});
		
	})

</script>