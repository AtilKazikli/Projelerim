<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->reservation_id</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("reservations/update/$item->reservation_id"); ?>" method="post">
                    <div class="form-group">
                        <label>Rezervasyon Numarası</label>
                        <input class="form-control" placeholder="Rezervasyon Numarası" name="reservation_id" value="<?php echo $item->reservation_id; ?>" readonly>
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
                        <label>Rezervasyon Tarihi</label>
                        <input class="form-control" placeholder="Rezervasyon Tarihi" name="reservation_date" value="<?php echo $item->reservation_date; ?>">
                    </div>

                    <div class="form-group">
                        <label>Başlangıç Tarihi</label>
                        <input class="form-control" placeholder="Başlangıç Tarihi" name="start_date" value="<?php echo $item->start_date; ?>">
                    </div>

                    <div class="form-group">
                        <label>Bitiş Tarihi</label>
                        <input class="form-control" placeholder="Bitiş Tarihi" name="end_date" value="<?php echo $item->end_date; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("reservations"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>
