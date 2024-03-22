<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Kullanıcı Listesi
            <a href="<?php echo base_url("users/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("users/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped">
                    <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th>Kullanıcı numarası</th>
                        <th>Kullanıcı ismi</th>
                        <th>Şifre</th>
                        <th>Email</th>
                        <th>Telefon Numarası</th>
                        <th>Adres</th>
                        <th>Kayıt Tarihi</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("users/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->user_id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td>#<?php echo $item->user_id; ?></td>
                                <td><?php echo $item->username; ?></td>
                                <td><?php echo $item->password; ?></td>
                                <td><?php echo $item->email; ?></td>
                                <td><?php echo $item->phone; ?></td>
                                <td><?php echo $item->address; ?></td>
                                <td><?php echo $item->registration_date; ?></td>
                                <td>
                                    <button
                                        data-url="<?php echo base_url("users/delete/$item->user_id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("users/update_form/$item->user_id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>