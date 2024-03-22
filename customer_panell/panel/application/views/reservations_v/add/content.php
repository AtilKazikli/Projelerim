<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Rezervasyon Yap
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("reservations/save"); ?>" method="post">
                    <div class="form-group">
                        <label>Rezervasyon Numarası</label>
                        <input class="form-control" placeholder="Rezervasyon Numarası" name="reservation_id">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Kullanıcı Numarası</label>
                        <input class="form-control" placeholder="Kullanıcı Numarası" name="user_id">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Rezervasyon Günü</label>
                        <input class="form-control" placeholder="Rezervasyon Günü" name="reservation_date">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Kişi Sayısı</label>
                        <input class="form-control" placeholder="Kişi Sayısı" name="party_size">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Özel İstekler</label>
                        <input class="form-control" placeholder="Özel İstekler" name="special_requests">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Durum</label>
                        <input class="form-control" placeholder="Durum" name="status">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("reservations"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>