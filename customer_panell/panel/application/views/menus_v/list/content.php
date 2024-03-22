<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Menü Listesi
            <a href="<?php echo base_url("menus/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("menus/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped">
                    <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th>Menü Numarası</th>
                        <th>İtem Numarası</th>
                        <th>Fiyat</th>
                        <th>Kategori</th>
                        <th>Vejeteryan</th>
                        <th>Açıklama</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("menus/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->menu_id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td><?php echo $item->menu_id; ?></td>
                                <td><?php echo $item->item_name; ?></td>
                                <td><?php echo $item->price; ?></td>
                                <td><?php echo $item->category; ?></td>
                                <td>
                                    <input
                                        data-url="<?php echo base_url("menus/isActiveSetter/$item->menu_id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td><?php echo $item->description; ?></td>
                                <td>
                                    <button
                                        data-url="<?php echo base_url("menus/delete/$item->menu_id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("menus/update_form/$item->menu_id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>