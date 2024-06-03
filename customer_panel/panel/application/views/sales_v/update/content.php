<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->sale_id</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
            <form action="<?php echo base_url("Sales/update/{$item->sale_id}"); ?>" method="post">
                    <div class="form-group">
                        <label>Satış Numarası</label>
                        <input class="form-control" placeholder="Satış Numarası" name="sale_id" value="<?php echo $item->sale_id; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Müşteri Numarası</label>
                        <input class="form-control" placeholder="Müşteri Numarası" name="customer_id" value="<?php echo $item->customer_id; ?>">
                    </div>

                    <div class="form-group">
                        <label>Araba Numarası</label>
                        <input class="form-control" placeholder="Araba Numarası" name="car_id" value="<?php echo $item->car_id; ?>">
                    </div>

                    <div class="form-group">
                        <label>Satış Günü</label>
                        <input class="form-control" placeholder="Satış Günü" name="sale_date" value="<?php echo $item->sale_date; ?>">
                    </div>

                    <div class="form-group">
                        <label>Satış Miktarı</label>
                        <input class="form-control" placeholder="Satış Miktarı" name="sale_amount" value="<?php echo $item->sale_amount; ?>">
                    </div>

                        <div class="form-group">
                        <label>Ödeme Yöntemi</label><br><br>
                        <label>
                        <input type="radio" name="payment_method" value="online">
                        Online Kredi Kartı
                        </label><br>
                        <label>
                        <input type="radio" name="payment_method" value="cash">
                        Elden Teslim
                        <br><br>
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Teslim Tarihi</label>
                        <input class="form-control" placeholder="Teslim Tarihi" name="delivery_date" value="<?php echo $item->delivery_date; ?>">
                    </div>

                    <div class="form-group">
                        <label>Satış Durumu</label>
                        <input class="form-control" placeholder="Satış Durumu" name="sale_status" value="<?php echo $item->sale_status; ?>">
                    </div>

                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("Sales"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>