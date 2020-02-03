<div class="block-header">
    <ol class="breadcrumb breadcrumb-col-cyan">
        <li><a href="<?php echo base_url(); ?>panel/"><i class="material-icons">home</i> Ana Sayfa</a></li>
        <li class="active"><i class="material-icons">person</i> Kelimeler</a></li>
    </ol>
</div>
<!-- Basic Examples -->
<div class="row clearfix">
            
    <div class="body">
                
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Kelime Listesi
                        </h2>
                    </div>
                    <div class="body">
                        <table id="table" class="table table-striped" style="cursor: pointer;">
                            <thead>
                                <tr>
                                    <th>Kelime TR</th>
                                    <th>Kelime EN</th>
                                    <th>Kelime DEU</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i=0; ?>
                               <?php foreach ($kelimeler as $row)
                                {
                                  foreach($row as $key=>$val){
                                     if($key=="id")continue;
                                      if($i == 0){
                                        echo "<tr>";
                                      } $i++;?>
                                     <td class="<?php echo $key?>" contenteditable="true">
                                          <?php echo $val ?>
                                      </td>
                                 
                                     <?php if($i == 3){
                                        echo "</tr>"; $i=0;  
                                     }
                                  }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->
<script type="text/javascript">

$('.table-remove').click(function () {
  var kelimeId = $(this).parents('tr').find(".kelimeId").attr("kelimeId");
  var $tr = $(this).parents('tr');
  $.post("<?php echo base_url("panel/kelime_yonetim/kelime_sil/") ?>"+kelimeId,function (response) {
      if(response == "true"){
        $tr.remove();
      }
  });
});

$('td').blur(function () {
  var sutunAdi = $(this).attr("class");
  var sutunDegeri = $(this).html().trim();

  $.post("<?php echo base_url("panel/kelime_yonetim/kelime_guncelle/") ?>",
            {sutunAdi:sutunAdi,sutunDegeri:sutunDegeri},function (response) {
      if(response != "true"){
        alert("Bir hata oluştu lütfen daha sonra tekrar deneyiniz");
      }
  });
});

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