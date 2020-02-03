<div class="block-header">
    <ol class="breadcrumb breadcrumb-col-cyan">
        <li><a href="<?php echo base_url(); ?>panel/"><i class="material-icons">home</i> Ana Sayfa</a></li>
        <li class="active"><i class="material-icons">notifications</i> Hizmetler</a></li>
    </ol>
</div>
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <a href="<?php echo base_url("panel/hizmet_yonetim/yeni_hizmet") ?>" class="btn btn-info waves-effect">Hizmet Ekle</a>
            <div class="header">
                <h2>
                    Hizmet Listesi
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>Sıra</th>
                            <th>Hizmet Başlık</th>
                            <th>Hizmet Sıra</th>
                            <th>Hizmet Anasayfada Gösterilsin mi?</th>
                            <th>Düzenlenme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tfoot>
                       <tr>
                            <th>Sıra</th>
                            <th>Hizmet Başlık</th>
                            <th>Hizmet Sıra</th>
                            <th>Hizmet Anasayfada Gösterilsin mi?</th>
                            <th>Düzenlenme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php $durumlar = array('0' =>"Hayır" ,'1'=>"Evet" );
                    
                    foreach ($hizmetler as $hizmet) { ?>
                                           
                        <tr>
                            <td><?php echo $hizmet->hizmetId ?></td>
                            <td><?php echo $hizmet->hizmetBaslik ?></td>
                            <td><?php echo $hizmet->hizmetSira ?></td>
                            <td>
                            <label class="label <?php echo ($hizmet->hizmetDurum == 0 ? 'label bg-red':'label bg-green') ?> ">
                                <?php echo $durumlar[$hizmet->hizmetDurum] ?>
                            </label>
                            </td>
                            <td><?php echo $hizmet->hizmetTarih ?></td>
                            <td>
                                <a href="javascript:void(0)"
                                 onclick='silOnayi("<?php echo base_url().'panel/hizmet_yonetim/hizmet_sil/'.$hizmet->hizmetId ?>","<?php echo $hizmet->hizmetBaslik ?>")' class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">delete</i>
                                </a>
                                <a href="<?php echo base_url(); ?>panel/hizmet_yonetim/hizmet_duzenle/<?php echo $hizmet->hizmetId ?>" class="btn btn-info btn-circle waves-effect waves-circle waves-float"><i class="material-icons">edit</i></a>
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
