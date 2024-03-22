<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->order_detail_id</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
            <form action="<?php echo base_url("OrderDetails/update/{$item->order_detail_id}"); ?>" method="post">
                    <div class="form-group">
                        <label>Sipariş Detayları Numarası</label>
                        <input class="form-control" placeholder="Sipariş Detayları Numarası" name="order_detail_id" value="<?php echo $item->order_detail_id; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Sipariş Numarası</label>
                        <input class="form-control" placeholder="Sipariş Numarası" name="order_id" value="<?php echo $item->order_id; ?>">
                    </div>

                    <div class="form-group">
                        <label>Menü Numarası</label>
                        <input class="form-control" placeholder="Menü Numarası" name="menu_id" value="<?php echo $item->menu_id; ?>">
                    </div>

                    <div class="form-group">
                        <label>Miktar</label>
                        <input class="form-control" placeholder="Miktar" name="quantity" value="<?php echo $item->quantity; ?>">
                    </div>

                    <div class="form-group">
                        <label>Total</label>
                        <input class="form-control" placeholder="Total" name="subtotal" value="<?php echo $item->subtotal; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("OrderDetails"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>