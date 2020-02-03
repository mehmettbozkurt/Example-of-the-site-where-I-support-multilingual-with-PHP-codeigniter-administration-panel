<div class="block-header">
    <ol class="breadcrumb breadcrumb-col-cyan">
        <li><a href="<?php echo base_url(); ?>panel/"><i class="material-icons">home</i> Ana Sayfa</a></li>
        <li class="active"><i class="material-icons">collections</i>  Marka Listesi</a></li>
    </ol>
</div>
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <a href="<?php echo base_url("panel/marka_yonetim/yeni_marka") ?>" class="btn btn-info waves-effect">Marka Ekle</a>
            <div class="header">
                <h2>
                    Marka Listesi
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>Sıra</th>
                            <th>Marka Ad</th>
                            <th>Marka Resmi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tfoot>
                       <tr>
                            <th>Sıra</th>
                            <th>Marka Ad</th>
                            <th>Marka Resmi</th>
                            <th>İşlemler</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    
                    <?php foreach ($markalar as $marka) { ?>
                                           
                        <tr>
                            <td><?php echo $marka->markaId ?></td>
                            <td><?php echo $marka->markaAd ?></td>
                            <td><img src="<?php echo base_url()."public/admin/uploads/markalar/".$marka->markaResim ?>" style="width:100px;height:50px"/></td>

                            <td>
                                <a href="javascript:void(0)" 
                                   onclick='silOnayi("<?php echo base_url().'panel/marka_yonetim/marka_sil/'.$marka->markaId ?>","<?php echo $marka->markaAd ?>")' class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                   <i class="material-icons">delete</i>
                                </a>
                                <a href="<?php echo base_url(); ?>panel/marka_yonetim/marka_duzenle/<?php echo $marka->markaId ?>" class="btn btn-info btn-circle waves-effect waves-circle waves-float"><i class="material-icons">edit</i></a>
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