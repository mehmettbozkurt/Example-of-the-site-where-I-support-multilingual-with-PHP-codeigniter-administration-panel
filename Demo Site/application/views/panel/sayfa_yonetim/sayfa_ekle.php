<div class="block-header">
    <ol class="breadcrumb breadcrumb-col-cyan">
	    <li><a href="<?php echo base_url(); ?>panel/"><i class="material-icons">home</i> Ana sayfa</a></li>
	    <li><a href="<?php echo base_url(); ?>panel/sayfa_yonetim/"><i class="material-icons">content_copy</i> Sayfalar</a></li>
	    <li class="active"><i class="material-icons">add</i>Sayfa Ekle</a></li>
	</ol>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
		    <div class="header">
		        <h2>
		            Sayfa Ekle(<span style="color: orange;">Resim Ekleme İşlemini Düzenleme Ekranından Yapınız.</span>)
		        </h2>
		    </div>
		    <div class="body">
	
			<form action="<?php echo base_url("panel/sayfa_yonetim/sayfa_ekle") ?>" method="POST" accept-charset="utf-8">

					<div class="form-group">
						<label class="control-label" >Dil</label> 
						<select class="selectpicker" name="dil">
						  <option value ="0">Türkçe</option>
						</select> 
					</div>
					
					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label" >Sayfa Başlık</label> 
							<input type="text" class="form-control" name="sayfaBaslik" placeholder="örn:Misyonumuz" required=""> 
						</div>
					</div>

					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label">Sayfa Konumu</label> 							
							<select name="ustsayfaId" class="form-control" required="" data-live-search="true">
								<option value="-1">Üst Sayfa Seçiniz</option>
								<option value="0">Anasayfa</option>
								<?php foreach ($sayfalar as $sayfa) { ?>
									<?php if($sayfa->ustsayfaId == 0){ ?>
										<option value="<?php echo $sayfa->sayfaId ?>"><?php echo $sayfa->sayfaBaslik ?></option>
									<?php } ?>
								<?php } ?>
							 </select> 
						</div>
					</div>
					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label" >Sayfa Sırası</label> 
							<input type="number" class="form-control" name="sayfaSirasi" placeholder="örn:1" required=""> 
						</div>
					</div>
					
					<div class="form-group"> 
						<label class="control-label">Sayfa Durumu</label> 
					 	<div class="switch">
                            <label>Kapalı<input type="checkbox" checked="" name="sayfaDurum"><span class="lever"></span>Açık</label>
                        </div>
					</div>
					<div class="form-group">
					 	<div class="form-line"> 
							<label class="control-label" >Sayfa Linki <font color="orange">* Link yoksa boş bırakınız !</font></label> 
							<input type="text" class="form-control" name="sayfaLink" placeholder="örn:https://www.sivasosb.com.tr" > 
						</div>
					</div>


					<div class="form-group">
							<label class="control-label">Sayfa İçerik</label> 
							<textarea id="tinymce" name="sayfaIcerik"></textarea>

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

<script type="text/javascript">
	

	$("[name = sayfaTipi]").on("change",function(argument) {
		
		if(this.value == 1){

			$("[name = ustsayfaId]").parents(".form-group").hide();
		
		}else{
			
			$("[name = ustsayfaId]").parents(".form-group").show();
		
		}

	})
	function responsive_filemanager_callback(field_id){
	console.log(field_id);
	var url=jQuery('#'+field_id).val();
	alert('update '+field_id+" with "+url);
	//your code
}

function open_popup(url){
	var w=880;
	var h=570;
	var l=Math.floor((screen.width-w)/2);
	var t=Math.floor((screen.height-h)/2);
	var win=window.open(url,'ResponsiveFilemanager',"scrollbars=1,width="+w+",height="+h+",top="+t+",left="+l);
}
</script>