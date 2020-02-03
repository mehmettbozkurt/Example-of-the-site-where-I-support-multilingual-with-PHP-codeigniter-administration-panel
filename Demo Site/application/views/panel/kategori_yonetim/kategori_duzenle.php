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

		<li class="active"><i class="material-icons">edit</i>Kategori Düzenle</a></li>

	</ol>

</div>





<div class="row clearfix">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="card">

			<div class="header">

				<h2>

					Kategori Düzenle

				</h2>

			</div>

			<div class="body">



				<form action="<?php echo base_url("panel/kategori_yonetim/kategori_guncelle/$kategori->kategoriId") ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label" >Üst Kategori Seçiniz</label> 							
							<select name="ustKategoriId" class="form-control" required="" data-live-search=true>
								<option value="0" <?php echo ($kategori->ustKategoriId == 0) ? "selected":""?> >AnaKategori</option>
								<?php foreach ($kategoriler as $ustKategori) { ?>
									<?php if($ustKategori->kategoriDurum != 0 && $ustKategori->kategoriId != $kategori->kategoriId){ ?>
										<option value="<?php echo $ustKategori->kategoriId ?>"<?php echo ($kategori->ustKategoriId == $ustKategori->kategoriId) ? "selected":""?> >
											<?php echo $ustKategori->kategoriAdi ?>
										</option>
									<?php } ?>
								<?php } ?>
							 </select> 
						</div>
					</div>


					<div class="form-group">

						<div class="form-line"> 

							<label class="control-label" >Kategori Adı</label> 

							<input type="text" class="form-control" name="kategoriAdi" value="<?php echo $kategori->kategoriAdi ?>" placeholder="örn:resim1" required="">

						</div>

					</div>

					<div class="form-group">

						<div class="form-line"> 

							<label class="control-label" >Kategori Adı En</label> 

							<input type="text" class="form-control" name="kategoriAdi_en" value="<?php echo $kategori->kategoriAdi_en ?>" placeholder="örn:resim1" required="">

						</div>

					</div>		

					<div class="form-group">

						<div class="form-line"> 

							<label class="control-label" >Kategori Sırası</label> 

							<input type="number" min="1" class="form-control " name="kategoriSira" value="<?php echo $kategori->kategoriSira ?>" placeholder="örn:1" required=""> 

						</div>

					</div>

					<div class="form-group"> 

						<label class="control-label">Kategori Resmi Seçiniz</label> 



						<input id="kategori" name="kategoriResim" style="display: none;" value="<?php echo $kategori->kategoriResim ?>">

						<div class="kv-avatar" style="width:200px">

							<div class="file-input">

								<div class="file-preview-frame">

									<img id="kategoriResim" src="<?php echo base_url("public/admin/uploads/kategori/$kategori->kategoriResim") ?>" style="width: 200px;height: 200px;" onerror="this.src='<?php echo base_url("public/admin/uploads/img_upload.png") ?>'" >

								</div>

							</div>

						</div>

						<a href="javascript:open_popup('<?php echo base_url('public/admin/plugins/filemanager/dialog.php?type=1&popup=1&field_id=kategori&fldr=kategori/')?>')" class="btn iframe-btn" type="button">Resim Seç</a>

					</div>

					<div class="form-group"> 

						<label class="control-label">kategori Anasayfada Gösterilsin mi ?</label> 

						<div class="switch">

							<label>Hayır<input type="checkbox" <?php echo $kategori->kategoriDurum == 1 ? 'checked':''?> name="kategoriDurum"><span class="lever" ></span>Evet</label>

						</div>

					</div>

					<div class="form-group"> 

						<button type="submit" class="btn btn-oval btn-primary">Düzenle</button> 

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

