<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Rezervasyon Listesi
            <a href="<?php echo base_url("reservations/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("reservations/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped">
                    <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th>Rezervasyon Numarası</th>
                        <th>Müşteri Numarası</th>
                        <th>Araba Numarası</th>
                        <th>Rezervasyon Tarihi</th>
                        <th>Başlangıç Tarihi</th>
                        <th>Bitiş Tarihi</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("reservations/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->reservation_id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td class="text-center"><?php echo $item->reservation_id; ?></td>
                                <td class="text-center"><?php echo $item->customer_id; ?></td>
                                <td class="text-center"><?php echo $item->car_id; ?></td>
                                <td class="text-center"><?php echo $item->reservation_date; ?></td>
                                <td ><?php echo $item->start_date; ?></td>
                                <td><?php echo $item->end_date; ?></td>
                                <td>
                                    <button
                                        data-url="<?php echo base_url("reservations/delete/$item->reservation_id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("reservations/update_form/$item->reservation_id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>