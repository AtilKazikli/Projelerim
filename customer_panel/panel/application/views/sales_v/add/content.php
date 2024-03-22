<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Satış Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Sales/save"); ?>" method="post">
                    <div class="form-group">
                        <label>Satış Numarası</label>
                        <input class="form-control" placeholder="Satış Numarası" name="sale_id">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Müşteri Numarası</label>
                        <input class="form-control" placeholder="Müşteri Numarası" name="customer_id">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Araba Numarası</label>
                        <input class="form-control" placeholder="Araba Numarası" name="car_id">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Satış Günü</label>
                        <input class="form-control" placeholder="Satış Günü" name="sale_date">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Satış Miktarı</label>
                        <input class="form-control" placeholder="Satış Miktarı" name="sale_amount">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
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
                        <input class="form-control" placeholder="Teslim Tarihi" name="delivery_date">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    
                    <div class="form-group">
                        <label>Satış Durumu</label>
                        <input class="form-control" placeholder="Satış Durumu" name="sale_status">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("Sales"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>