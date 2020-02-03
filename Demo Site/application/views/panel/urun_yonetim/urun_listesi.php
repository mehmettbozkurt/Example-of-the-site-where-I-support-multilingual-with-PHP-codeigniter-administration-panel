<div class="block-header">

    <ol class="breadcrumb breadcrumb-col-cyan">

        <li><a href="<?php echo base_url(); ?>panel/"><i class="material-icons">home</i> Ana Sayfa</a></li>

        <li class="active"><i class="material-icons">domain</i> Ürünler</a></li>

    </ol>

</div>

<!-- Basic Examples -->

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="card">

            <a href="<?php echo base_url("panel/urun_yonetim/yeni_urun") ?>" class="btn btn-info waves-effect">Ürün Ekle</a>

            <div class="header">

                <h2>

                    Ürün Listesi

                </h2>

            </div>

            <div class="body">

                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

                    <thead>

                        <tr>

                            <th>Sıra</th>
                            <th>Kategorgisinin Adı</th>
                            <th>Ürün Adı</th>
                            <th>Ürün Anasayfada Gösterilsin mi?</th>
                            <th>Ürün Resmi</th>
                            <th>Düzenlenme Tarihi</th>
                            <th>İşlemler</th>

                        </tr>

                    </thead>

                    <tfoot>

                     <tr>

                       <th>Sıra</th>
                       <th>Kategorgisinin Adı</th>
                       <th>Ürün Adı</th>
                       <th>Ürün Anasayfada Gösterilsin mi?</th>
                       <th>Ürün Resmi</th>
                       <th>Düzenlenme Tarihi</th>
                       <th>İşlemler</th>

                   </tr>

               </tfoot>

               <tbody>

                <?php $durumlar = array('0' =>"Hayır" ,'1'=>"Evet" );

                foreach ($urunler as $urun) { ?>
                    <tr>

                        <td><?php echo $urun->urunId ?></td>
                        <td><?php echo $urun->kategoriAdi ?></td>
                        <td><?php echo $urun->urunAdi ?></td>
                        <td>
                            <label class="label <?php echo ($urun->urunDurum == 0 ? 'label bg-red':'label bg-green') ?> ">

                                <?php echo $durumlar[$urun->urunDurum] ?>

                            </label>
                        </td>
                        <td><img src="<?php echo base_url()."public/admin/uploads/urunler/$urun->urunId/".$urun->urunResim ?>" style="width:50px;height:50px"/></td>

                        <td><?php echo $urun->urunTarih ?></td>
                        <td>
                            <a href="javascript:void(0)"

                            onclick='silOnayi("<?php echo base_url().'panel/urun_yonetim/urun_sil/'.$urun->urunId ?>","<?php echo $urun->urunAdi ?>")' class="btn btn-danger btn-circle waves-effect waves-circle waves-float">

                            <i class="material-icons">delete</i>

                        </a>

                        <a href="<?php echo base_url(); ?>panel/urun_yonetim/urun_duzenle/<?php echo $urun->urunId ?>" class="btn btn-info btn-circle waves-effect waves-circle waves-float"><i class="material-icons">edit</i></a>

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

            type: '<?php echo $this->session->flashdata('mesaj')['tipi']; ?>',

            animate: {

                enter: 'animated zoomInRight',

                exit: 'animated zoomOutRight'

            }

        });

    <?php } ?>



</script>

