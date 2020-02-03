<div class="block-header">
    <ol class="breadcrumb breadcrumb-col-cyan">
        <li><a href="<?php echo base_url(); ?>panel/"><i class="material-icons">home</i> Ana Sayfa</a></li>
        <li class="active"><i class="material-icons">collections</i>  Slayt Listesi</a></li>
    </ol>
</div>
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <a href="<?php echo base_url("panel/slayt_yonetim/yeni_slayt") ?>" class="btn btn-info waves-effect">Slayt Ekle</a>
            <div class="header">
                <h2>
                    Slayt Listesi
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>Sıra</th>
                            <th>Slayt Başlık TR</th>
                            <th>Slayt Başlık EN</th>
                            <th>Slayt Resmi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tfoot>
                       <tr>
                            <th>Sıra</th>
                            <th>Slayt Başlık TR</th>
                            <th>Slayt Başlık EN</th>
                            <th>Slayt Resmi</th>
                            <th>İşlemler</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    
                    <?php foreach ($slaytlar as $slayt) { ?>
                                           
                        <tr>
                            <td><?php echo $slayt->slaytId ?></td>
                            <td><?php echo $slayt->slaytBaslik ?></td>
                            <td><?php echo $slayt->slaytBaslik_en ?></td>
                            <td><img src="<?php echo base_url()."public/admin/uploads/slayt/".$slayt->slaytResim ?>" style="width:50px;height:50px"/></td>

                            <td>
                                <a href="javascript:void(0)" 
                                   onclick='silOnayi("<?php echo base_url().'panel/slayt_yonetim/slayt_sil/'.$slayt->slaytId ?>","<?php echo $slayt->slaytBaslik ?>")' class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                   <i class="material-icons">delete</i>
                                </a>
                                <a href="<?php echo base_url(); ?>panel/slayt_yonetim/slayt_duzenle/<?php echo $slayt->slaytId ?>" class="btn btn-info btn-circle waves-effect waves-circle waves-float"><i class="material-icons">edit</i></a>
                            </td>

                        </tr>
                    <?php  } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->
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