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

		<li><a href="<?php echo base_url("panel/urun_yonetim"); ?>"><i class="material-icons">domain</i> Ürün Listesi</a></li>

		<li class="active"><i class="material-icons">edit</i>Ürün Düzenle</a></li>

	</ol>

</div>
<div class="row clearfix">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="card">

			<div class="header">

				<h2>

					Ürün Düzenle

				</h2>

			</div>

			<div class="body">

				<form action="<?php echo base_url("panel/urun_yonetim/urun_guncelle/$urun->urunId") ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
					<ul class="nav nav-tabs tab-nav-right" role="tablist">
						<li role="presentation" class="active"><a href="#urunBilgi" data-toggle="tab" aria-expanded="true">Ürün Bilgileri</a></li>
						<li role="presentation" class=""><a href="#resim" data-toggle="tab" aria-expanded="false">Ürün Resimleri</a></li>
						<li role="presentation" class=""><a href="#dokuman" data-toggle="tab" aria-expanded="false">Ürün Dökümanlar</a></li>
						<li role="presentation" class=""><a href="#soru" data-toggle="tab" aria-expanded="false">Ürün Soru Cevaplar</a></li>
					</ul>
					<div class="tab-content">
	          			<div role="tabpanel" class="tab-pane fade active in" id="urunBilgi">
	          				<div class="form-group">
								<label class="control-label" >Dil</label> 
								<select class="selectpicker" name="dil">
								  <option value ="0" <?php $urun->dil == 0 ? "selected":"" ?> >Türkçe</option>
								  <option value ="1" <?php $urun->dil == 1 ? "selected":"" ?> >İngilizce</option>
								  <option value ="2" <?php $urun->dil == 2 ? "selected":"" ?> >Almanca</option>
								</select> 
							</div>
							<div class="form-group">
								<div class="form-line">
									<label class="control-label">Ürün Kategorisi Seçiniz</label>

									<select name="kategoriId" class="form-control">

										<?php foreach ($kategoriler as $kategori) { ?>

											<option value="<?php echo $kategori->kategoriId ?>"

												<?php echo ($urun->kategoriId == $kategori->kategoriId) ? "selected":""?> >

												<?php echo $kategori->kategoriAdi ?>

											</option>

										<?php } ?>

									</select>

								</div>

							</div>
							<div class="form-group">
								<div class="form-line">
									<label class="control-label">Ürün Başlık</label>
									<input type="text" class="form-control" name="urunAdi" placeholder="örn:Web sitemiz yayınlandı" value="<?php echo $urun->urunAdi ?>" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Ürün Aktif mi Pasif mi ?</label>
								<div class="switch">
									<label>Pasif<input type="checkbox"  <?php echo $urun->urunDurum == 1 ?'checked':'' ?> name="urunDurum"><span class="lever"></span>Aktif</label>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Ürün İçerik</label>
								<textarea id="tinymce" name="urunIcerik"><?php echo $urun->urunIcerik; ?></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Ürün Kısa İçerik (Ürün Devamı)</label>
								<textarea id="tinymce1" name="urunKisaIcerik"><?php echo $urun->urunKisaIcerik; ?></textarea>
							</div>
							<div class="form-group">
								<div class="form-line">
									<label class="control-label">Ürün Açıklamalar:</label>
									<input type="text" class="form-control"  id="keywords" name="urunAciklama" required="" value="<?php echo $urun->urunAciklama; ?>" data-role="tagsinput" >
								</div>
							</div>
			          	</div>
			          	<div role="tabpanel" class="tab-pane fade" id="resim">
							<div class="form-group">
								<label class="control-label">Ürün Resimlerini Seçiniz (Yükledikten Sonra Kapak Olmasını İstediğiniz Ürünün Üstüne Tıklayınız)</label>
								<input type="hidden" id="urun" name="urunResim" value="<?php echo $urun->urunResim ?>">
								<div class="kv-avatar" style="width:200px">
									<div class="file-input">
										<div class="file-preview-frame">
											<img id="urunResim" src="<?php echo base_url("public/admin/uploads/urunler/$urun->urunId/$urun->urunResim") ?>" style="width: 200px;height: 200px;"  onerror="this.src='<?php echo base_url("public/admin/images/img_upload.png") ?>';" >
										</div>
									</div>
								</div>
								<a href="javascript:open_popup('<?php echo base_url("public/admin/plugins/filemanager/dialog.php?type=0&popup=1&field_id=urun&fldr=urunler/$urun->urunId")?>')" class="btn iframe-btn" type="button">Resim Seç</a>
								<a onClick="document.getElementById('urun').value='';document.getElementById('urunResim').src='<?php echo base_url("public/admin/images/img_upload.png") ?>';return false;" title="Seçilen Resmi Kaldır" class="btn btn-danger fileinput-remove fileinput-remove-button">Resmi Kaldır</a>
							</div>
			          	</div>
			          	<div role="tabpanel" class="tab-pane fade" id="dokuman">
							<div class="row">

								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<label class="control-label">
										Teknik Döküman Seç

										<?php if($urun->teknik){ ?>
											<a href="<?php echo base_url("public/admin/uploads/urunler/$urun->urunId/teknik.pdf") ?>" target="_blank">(Yüklü Teknik Döküman : Teknik.pdf)</a>
										<?php } ?>
									</label>
									<input type="file" name="teknik" class="btn iframe-btn" value="">
								</div>

								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<label class="control-label">
										Bilgi Broşürü Seç

										<?php if($urun->bilgi){ ?>
											<a href="<?php echo base_url("public/admin/uploads/urunler/$urun->urunId/bilgi.pdf") ?>" target="_blank">(Yüklü Bilgi Broşürü : Bilgi.pdf)</a>
										<?php } ?>
									</label>
									<input type="file" name="bilgi" class="btn iframe-btn" value="">
								</div>
							</div>
			          	</div>
			          	<div role="tabpanel" class="tab-pane fade" id="soru">
			          		<button type="button" class="btn btn-primary yeni-soru">Yeni Soru Ekle</button>
			          		<hr>
							<?php foreach ($urun_sorular as $urun_soru) { ?>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-line">
											<label class="control-label">Ürün Soru</label>
											<input type="text" class="form-control" name="soru[]" placeholder="örn:Soru" value="<?php echo $urun_soru->soru ?>">
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-line">
											<label class="control-label">Ürün Cevap</label>
											<input type="text" class="form-control" name="cevap[]" placeholder="örn:Cevap" value="<?php echo $urun_soru->cevap ?>">
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-line">
											<label class="control-label">Ürün Soru En</label>
											<input type="text" class="form-control" name="soru_en[]" placeholder="örn:Soru" value="<?php echo $urun_soru->soru_en ?>">
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-line">
											<label class="control-label">Ürün Cevap En</label>
											<input type="text" class="form-control" name="cevap_en[]" placeholder="örn:Cevap" value="<?php echo $urun_soru->cevap_en ?>">
										</div>
									</div>
								</div>
							<?php } ?>
							<div class="sorular">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-line">
											<label class="control-label">Ürün Soru</label>
											<input type="text" class="form-control" name="soru[]" placeholder="örn:Soru" value="" >
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-line">
											<label class="control-label">Ürün Cevap</label>
											<input type="text" class="form-control" name="cevap[]" placeholder="örn:Cevap" value="">
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-line">
											<label class="control-label">Ürün Soru En</label>
											<input type="text" class="form-control" name="soru_en[]" placeholder="örn:Soru" value="" >
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-line">
											<label class="control-label">Ürün Cevap En</label>
											<input type="text" class="form-control" name="cevap_en[]" placeholder="örn:Cevap" value="">
										</div>
									</div>
								</div>
							</div>
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
<script src="<?php echo base_url(); ?>public/admin/plugins/tinymce/jquery.tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/tinymce/tinymce.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/pages/forms/editors.js"></script>





<script>

	tinymce.init({
		selector: "textarea#tinymce1",theme: "modern",height: 400,
			plugins: [
					 "advlist autolink link image lists charmap print preview hr anchor pagebreak",
					 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
					 "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
		 ],
		 toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
		 toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
		 image_advtab: true ,
		 relative_urls : false,
		 remove_script_host : false,
		 convert_urls : true,
		 language :   "tr_TR",
		 external_filemanager_path:"public/admin/plugins/filemanager/",

		 filemanager_title:"Sivassoft Dosya Yöneticisi" ,
		 external_plugins: { "filemanager" : "<?php echo base_url() ?>/public/admin/plugins/filemanager/plugin.min.js"},

		file_picker_types:'file image media',file_picker_callback:function(cb,value,meta){
		var width=window.innerWidth-30;

		var height=window.innerHeight-60;
		if(width>1800)width=1800;
		if(height>1200)height=1200;
		if(width>600){
				var width_reduce=(width-20)%138;
				width=width-width_reduce+10;
		}
				var urltype=2;
				if(meta.filetype=='image'){urltype=1;
				}if(meta.filetype=='media'){urltype=3;
				}
				var title="Sivassoft Dosya Yöneticisi";
				if(typeof this.settings.filemanager_title!=="undefined"&&this.settings.filemanager_title){title=this.settings.filemanager_title;
				}
				var akey="key";
				if(typeof this.settings.filemanager_access_key!=="undefined"&&this.settings.filemanager_access_key){akey=this.settings.filemanager_access_key;
				}
				var sort_by="";
				if(typeof this.settings.filemanager_sort_by!=="undefined"&&this.settings.filemanager_sort_by){sort_by="&sort_by="+this.settings.filemanager_sort_by;
		}
		var descending="false";
				if(typeof this.settings.filemanager_descending!=="undefined"&&this.settings.filemanager_descending){descending=this.settings.filemanager_descending;
				}
				var fldr="";
				if(typeof this.settings.filemanager_subfolder!=="undefined"&&this.settings.filemanager_subfolder){fldr="&fldr="+this.settings.filemanager_subfolder;
		}
		var crossdomain="";
				if(typeof this.settings.filemanager_crossdomain!=="undefined"&&this.settings.filemanager_crossdomain){crossdomain="&crossdomain=1";
				if(window.addEventListener){window.addEventListener('message',filemanager_onMessage,false);
		}else{window.attachEvent('onmessage',filemanager_onMessage);
		}}tinymce.activeEditor.windowManager.open({title:title,file:this.settings.external_filemanager_path+'dialog.php?type='+urltype+'&descending='+descending+sort_by+fldr+crossdomain+'&lang='+this.settings.language+'&akey='+akey,width:width,height:height,resizable:true,maximizable:true,inline:1},{setUrl:function(url){cb(url);
				}});
		},
	});

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
	<?php if( $this->input->get("tip") != NULL ){ ?>

		$(document).ready(function() {
			$("[role = tablist] li").removeClass("active");
			
			$("[href='#resim']").parents("li").addClass("active");
			$("[data-toggle='tab']").attr("aria-expanded","false");
			$("[href='#resim']").attr("aria-expanded","true");

			$("[role=tabpanel]").removeClass("active in");
			$("#resim").addClass("active in");

		})

	<?php } ?>
	$(document).ready(function() {
		$(".yeni-soru").on("click",function() {
			$(".sorular").append('\
							<div class="row">\
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">\
									<div class="form-line">\
										<label class="control-label">Ürün Soru</label>\
										<input type="text" class="form-control" name="soru[]" placeholder="örn:Soru" value="" >\
									</div>\
								</div>\
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">\
									<div class="form-line">\
										<label class="control-label">Ürün Cevap</label>\
										<input type="text" class="form-control" name="cevap[]" placeholder="örn:Cevap" value="">\
									</div>\
								</div>\
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">\
									<div class="form-line">\
										<label class="control-label">Ürün Soru EN</label>\
										<input type="text" class="form-control" name="soru_en[]" placeholder="örn:Soru EN" value="" >\
									</div>\
								</div>\
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">\
									<div class="form-line">\
										<label class="control-label">Ürün Cevap EN</label>\
										<input type="text" class="form-control" name="cevap_en[]" placeholder="örn:Cevap EN" value="">\
									</div>\
								</div>\
							</div>');
		})

		$("[name = dil]").change(function() {
			var dil = $("[name = dil] option:selected").val();
			$.post('<?php echo base_url("panel/urun_yonetim/urun_dil_listele/$urun->urunId/")?>'+dil, function( data ) {
				if(data!=""){
					console.log(JSON.parse(data));
					urun = JSON.parse(data);
					$("[name = urunAdi]").val(urun.urunAdi);
					$("[name = urunAciklama]").tagsinput('removeAll');
					
					urunAciklama = urun.urunAciklama.split(",");
					for (var i = 0; i < urunAciklama.length; i++) {
						$("[name = urunAciklama]").tagsinput('add',urunAciklama[i]);
					}

					tinymce.get('tinymce').setContent(urun.urunIcerik);
					tinymce.get('tinymce1').setContent(urun.urunKisaIcerik);
					
				}else{
					$("[name = urunAdi]").val("");
					$("[name = urunAciklama]").tagsinput('removeAll');
					tinymce.get('tinymce').setContent("");
					tinymce.get('tinymce1').setContent("");
				}
			 
			});
			
		})
	})


</script>
