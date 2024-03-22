<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Detaylar Listesi
            <a href="<?php echo base_url("OrderDetails/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("OrderDetails/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped">
                    <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th>Sipariş Detayları Numarası</th>
                        <th>Sipariş Numarası</th>
                        <th>Menü Numarası</th>
                        <th>Miktar</th>
                        <th>Total</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("OrderDetails/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                                <tr id="ord-<?php echo $item->order_detail_id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td class="text-center"><?php echo $item->order_detail_id; ?></td>
                                <td class="text-center"><?php echo $item->order_id; ?></td>
                                <td class="text-center"><?php echo $item->menu_id; ?></td>
                                <td class="text-center"><?php echo $item->quantity; ?></td>
                                <td class="text-center"><?php echo $item->subtotal; ?></td>
                                <td>
                                    <button
                                        data-url="<?php echo base_url("OrderDetails/delete/$item->order_detail_id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("OrderDetails/update_form/$item->order_detail_id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>