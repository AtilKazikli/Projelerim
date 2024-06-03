<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Satış Listesi
            <a href="<?php echo base_url("Sales/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("Sales/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped">
                    <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th>Satış Numarası</th>
                        <th>Müşteri Numarası</th>
                        <th>Araba Numarası</th>
                        <th>Satış Günü</th>
                        <th>Satış Miktarı</th>
                        <th>Ödeme Yöntemi</th>
                        <th>Teslim Tarihi</th>
                        <th>Satış Durumu</th>
                        <th>Açıklama</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("Sales/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                                <tr id="ord-<?php echo $item->sale_id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td class="text-center"><?php echo $item->sale_id; ?></td>
                                <td class="text-center"><?php echo $item->customer_id; ?></td>
                                <td class="text-center"><?php echo $item->car_id; ?></td>
                                <td class="text-center"><?php echo $item->sale_date; ?></td>
                                <td class="text-center"><?php echo $item->sale_amount; ?></td>
                                <td><?php echo $item->payment_method; ?></td>
                                <td><?php echo $item->delivery_date; ?></td>
                                <td><?php echo $item->sale_status; ?></td>
                                <td><?php echo $item->description; ?></td>
                                <td>
                                    <button
                                        data-url="<?php echo base_url("Sales/delete/$item->sale_id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("Sales/update_form/$item->sale_id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>