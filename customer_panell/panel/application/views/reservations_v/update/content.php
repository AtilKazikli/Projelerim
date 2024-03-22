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
                        <label>Kullanıcı Numarası</label>
                        <input class="form-control" placeholder="Kullanıcı Numarası" name="user_id" value="<?php echo $item->user_id; ?>">
                    </div>

                    <div class="form-group">
                        <label>Rezervasyon Günü</label>
                        <input class="form-control" placeholder="Rezervasyon Günü" name="reservation_date" value="<?php echo $item->reservation_date; ?>">
                    </div>

                    <div class="form-group">
                        <label>Kişi Sayısı</label>
                        <input class="form-control" placeholder="Kişi Sayısı" name="party_size" value="<?php echo $item->party_size; ?>">
                    </div>

                    <div class="form-group">
                        <label>Özel İstekler</label>
                        <input class="form-control" placeholder="Özel İstekler" name="special_requests" value="<?php echo $item->special_requests; ?>">
                    </div>

                    <div class="form-group">
                        <label>Durum</label>
                        <input class="form-control" placeholder="Durum" name="status" value="<?php echo $item->status; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("reservations"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>
