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

		<li class="active"><i class="material-icons">add</i>Ürün Ekle</a></li>

	</ol>

</div>



<div class="row clearfix">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="card">

			<div class="header">

				<h2>

					Ürün Ekle (<span style="color: orange;">Resim Ekleme İşlemini Düzenleme Ekranından Yapınız.</span>)

				</h2>

			</div>

			<div class="body">



				<form action="<?php echo base_url("panel/urun_yonetim/urun_ekle") ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="date-masked-input">
						<div class="form-group">
							<label class="control-label" >Dil</label> 
							<select class="selectpicker" name="dil">
							  <option value ="0">Türkçe</option>
							</select> 
						</div>

						<div class="form-group">
							<div class="form-line">
								<label>Ürün Kategorisi Seçiniz</label>
								<select name="kategoriId" class="form-control show-tick">
									<?php foreach ($kategoriler as $kategori) {?>
									<option value="<?php echo $kategori->kategoriId ?>"><?php echo $kategori->kategoriAdi ?></option>
									<?php } ?>
								</select>

							</div>

						</div>

						<div class="form-group">

							<div class="form-line">

								<label class="control-label" >Ürün Adı</label>

								<input type="text" class="form-control" name="urunAdi" placeholder="Örnek:Ürün Adı" required="">

							</div>

						</div>


						<div class="form-group">

							<label class="control-label">Ürün Aktif mi Pasif mi ?</label>

							<div class="switch">

								<label>Pasif<input type="checkbox" checked="" name="urunDurum"><span class="lever"></span>Aktif</label>
							</div>
						</div>
						<div class="form-group">
								<label class="control-label">Ürün İçerik</label>
								<textarea id="tinymce" name="urunIcerik"></textarea>
						</div>
						<div class="form-group">
								<label class="control-label">Ürün İçerik Devamı</label>
								<textarea id="tinymce1" name="urunKisaIcerik"></textarea>
						</div>
						<div class="form-group">
							<div class="form-line">
								<label class="control-label">Ürün Açıklamalar:</label>
								<input type="text" class="form-control"  id="keywords" name="urunAciklama" required="" value="" data-role="tagsinput" >
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-oval btn-primary">Ekle</button>
						</div>
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



</script>
