<div class="block-header">
    <ol class="breadcrumb breadcrumb-col-cyan">
        <li><a href="<?php echo base_url(); ?>panel/"><i class="material-icons">home</i> Ana Sayfa</a></li>
        <li class="active"><i class="material-icons">collections</i>  Kategori Listesi</a></li>
    </ol>
</div>
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <a href="<?php echo base_url("panel/kategori_yonetim/yeni_kategori") ?>" class="btn btn-info waves-effect">Kategori Ekle</a>
            <div class="header">
                <h2>
                    Kategori Listesi
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>Sıra</th>
                            <th>Sırası</th>
                            <th>Üst Kategori</th>
                            <th>Kategori Başlık TR</th>
                            <th>Kategori Başlık EN</th>
                            <th>Kategori Gösterilsi mi ?</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tfoot>
                       <tr>
                        <th>Sıra</th>
                        <th>Sırası</th>
                        <th>Üst Kategori Başlık</th>
                        <th>Kategori Başlık TR</th>
                        <th>Kategori Başlık EN</th>
                        <th>Kategori Gösterilsin mi ?</th>
                        <th>İşlemler</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php foreach ($kategoriler as $kategori) { 
                       $durumlar = array('0' =>"Hayır" ,'1'=>"Evet" );?>

                       <tr>
                        <td><?php echo $kategori->kategoriId ?></td>
                        <td><?php echo $kategori->kategoriSira ?></td>
                        <td><?php echo $kategori->ustKategoriAdi ?></td>
                        <td><?php echo $kategori->kategoriAdi ?></td>
                        <td><?php echo $kategori->kategoriAdi_en ?></td>
                        <td>
                            <label class="label <?php echo ($kategori->kategoriDurum== 0) ? 'label bg-blue':'label bg-green' ?> ">
                                <?php echo $durumlar[$kategori->kategoriDurum] ?>
                            </label>
                        </td>
                        <td>
                            <a href="javascript:void(0)" 
                            onclick='silOnayi("<?php echo base_url().'panel/kategori_yonetim/kategori_sil/'.$kategori->kategoriId ?>","<?php echo $kategori->kategoriAdi ?>")' class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">delete</i>
                        </a>
                        <a href="<?php echo base_url(); ?>panel/kategori_yonetim/kategori_duzenle/<?php echo $kategori->kategoriId ?>" class="btn btn-info btn-circle waves-effect waves-circle waves-float"><i class="material-icons">edit</i></a>
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