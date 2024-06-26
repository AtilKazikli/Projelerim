<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            İlan Listesi
            <a href="<?php echo base_url("adverts/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("adverts/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped">
                    <thead>
                        
                        <th><i class="fa fa-reorder"></i></th>
                        <th>#id</th>
                        <th>Resim</th>
                        <th>Baslik</th>
                        <th>Fiyat</th>
                        <th>Araba Marka</th>
                        <th>Araba Model</th>
                        <th>Yıl</th>
                        <th>Açıklama</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("adverts/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td><?php echo $item->id; ?></td>
                                <td><?php echo $item->resim; ?></td>
                                <td><?php echo $item->baslik; ?></td>
                                <td><?php echo $item->fiyat; ?></td>
                                <td><?php echo $item->araba_marka; ?></td>
                                <td><?php echo $item->araba_model; ?></td>
                                <td><?php echo $item->yil; ?></td>
                                <td><?php echo $item->description; ?></td>
                                <td>
                                    <button
                                        data-url="<?php echo base_url("adverts/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("adverts/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>