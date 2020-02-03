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

		<li><a href="<?php echo base_url(); ?>panel/kategori_yonetim/"><i class="material-icons">collections</i> Kategori Listesi</a></li>

		<li class="active"><i class="material-icons">add</i>Kategori Ekle</a></li>

	</ol>

</div>



<div class="row clearfix">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="card">

			<div class="header">

				<h2>

					Kategori Ekle

				</h2>

			</div>

			<div class="body">

				

				<form action="<?php echo base_url("panel/kategori_yonetim/kategori_ekle") ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label">Kategori Konumu</label> 							
							<select name="ustKategoriId" class="form-control" required="" data-live-search="true">
								<option value="-1">Üst kategori Seçiniz</option>
								<option value="0">Anakategori</option>
								<?php foreach ($kategoriler as $kategori) { ?>
									<?php if($kategori->kategoriDurum != 0){ ?>
										<option value="<?php echo $kategori->kategoriId ?>">
											<?php echo $kategori->kategoriAdi ?>
										</option>
									<?php } ?>
								<?php } ?>
							 </select> 
						</div>
					</div>

					<div class="form-group">

						<div class="form-line"> 

							<label class="control-label" >Kategori Başlık</label> 

							<input type="text" class="form-control" name="kategoriAdi" placeholder="örn:resim1" required=""> 

						</div>

					</div>

					<div class="form-group">

						<div class="form-line"> 

							<label class="control-label" >Kategori Başlık En</label> 

							<input type="text" class="form-control" name="kategoriAdi_en" placeholder="örn:resim1" required=""> 

						</div>

					</div>
					<div class="form-group">

						<div class="form-line"> 

							<label class="control-label" >Kategori Sırası</label> 

							<input type="number" min="1" class="form-control" name="kategoriSira" placeholder="örn:1" required=""> 

						</div>

					</div>
					<div class="form-group"> 
						<label class="control-label">Kategori Resmi Seçiniz</label> 
						<input id="kategori" name="kategoriResim" style="display: none;">

						<div class="kv-avatar" style="width:200px">

							<div class="file-input">

								<div class="file-preview-frame">

									<img id="kategori" src="<?php echo base_url("public/admin/uploads/img_upload.png") ?>" style="width: 200px;height: 200px;">

								</div>

							</div>

						</div>

						<a href="javascript:open_popup('<?php echo base_url('public/admin/plugins/filemanager/dialog.php?type=1&popup=1&field_id=kategori&fldr=kategori')?>')" class="btn iframe-btn" type="button">Resim Seç</a>

					</div>

					<div class="form-group"> 

						<label class="control-label">Kategori Ansayfada Gösterilsin mi?</label> 

					 	<div class="switch">

                            <label>Hayır<input type="checkbox" checked="" name="kategoriDurum"><span class="lever"></span>Evet</label>

                        </div>

					</div>



					<div class="form-group"> 
						<button type="submit" class="btn btn-oval btn-primary">Ekle</button> 

					</div>

				</form>

			</div>

		</div>

	</div>

</div>

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
