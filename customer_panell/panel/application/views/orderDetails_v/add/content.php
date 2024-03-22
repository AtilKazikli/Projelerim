<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Sipariş Detayları Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("OrderDetails/save"); ?>" method="post">
                    <div class="form-group">
                        <label>Sipariş Detayları Numarası</label>
                        <input class="form-control" placeholder="Sipariş Detayları Numarası" name="order_detail_id">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Sipariş Numarası</label>
                        <input class="form-control" placeholder="Sipariş Numarası" name="order_id">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Menü Numarası</label>
                        <input class="form-control" placeholder="Menü Numarası" name="menu_id">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Miktar</label>
                        <input class="form-control" placeholder="Miktar" name="quantity">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Total</label>
                        <input class="form-control" placeholder="Total" name="subtotal">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("OrderDetails"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>