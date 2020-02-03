<link rel="stylesheet" type="text/css" href="<?php echo base_url("public") ?>/admin/plugins/nestable/jquery-nestable.css">

<div class="block-header">
	<ol class="breadcrumb breadcrumb-col-cyan">
		<li><a href="<?php echo base_url(); ?>panel/"><i class="material-icons">home</i> Ana Sayfa</a></li>
		<li class="active"><i class="material-icons">content_copy</i> Sayfalar</a></li>
	</ol>
</div>
<!-- Basic Examples -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">

			<menu id="nestable-menu">
				<button type="button" class="btn btn-primary" data-action="collapse-all">Hepsini Kapat</button>
				<button type="button" class="btn btn-primary" data-action="expand-all">Hepsini Aç</button>
				<a  href="<?php echo base_url("panel/sayfa_yonetim/") ?>" class="btn btn-success" >Sayfa Listele</a>

		    </menu>

			<div class="header">
				<h2>
					Sayfa Sırası
				</h2>
			</div>

			<div class="body">
				
				
				<div class="cf nestable-lists">
					<div class="dd nested-list dd with-margins" id="nestable">
						<ol class="dd-list">
							<?php sayfaListele(menuler($sayfalar)); ?>
						</ol>
					</div>			
				</div>
				<button class="nest btn btn-primary">Düzenle</button>
			</div>
		</div>
	</div>

	<!-- #END# Basic Examples -->
	<script type="text/javascript" src="<?php echo base_url("public") ?>/admin/plugins/nestable/jquery.nestable.js"></script>
	<script type="text/javascript">
		$(function()
		{
			$('.dd').nestable();
			$('.dd').nestable('collapseAll');
			
			$('#nestable-menu').on('click', function(e)
		    {
		        var target = $(e.target),
		            action = target.data('action');
		        if (action === 'expand-all') {
		            $('.dd').nestable('expandAll');
		        }
		        if (action === 'collapse-all') {
		            $('.dd').nestable('collapseAll');
		        }
		    });
			
			$('button.nest').click(function() {
				var menuler = JSON.stringify($('.dd').nestable('serialize'));

				$.post( "<?php echo base_url("panel/sayfa_yonetim/sayfa_siralama/") ?>",{menuler:menuler}, function( data ) {
					if (data == 1)
					{
						mesaj = "Sayfa Sıralaması Başarılı";
						tip = "success";
					}
					else{
						mesaj = "Bir Hata Oluştu";
						tip = "danger";
					}

					$.notify(mesaj, {
						type: tip,
						animate: {
							enter: 'animated zoomInRight',
							exit: 'animated zoomOutRight'
						}
					});
				});
			});
		});
	</script>
	<script type="text/javascript">
		<?php if($this->session->flashdata("mesaj")!=NULL){?>
			$.notify("<?php echo $this->session->flashdata('mesaj')['icerik']; ?>", {
				type: '<?php echo $this->session->flashdata('mesaj')['tip']; ?>',
				animate: {
					enter: 'animated zoomInRight',
					exit: 'animated zoomOutRight'
				}
			});
		<?php } ?>

	</script>
