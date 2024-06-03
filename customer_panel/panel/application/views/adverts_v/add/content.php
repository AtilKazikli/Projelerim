<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            İlan Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("adverts/save"); ?>" method="post">
                    
                    
                <div class="form-group">
                        <label>Resim</label>
                        <input type="file" name="resim" class="form-control">
                        <?php if(isset($form_error)){ ?>
                             <small class="pull-right input-form-error"> <?php echo form_error("resim"); ?></small>
                        <?php } ?>
                    </div>
                
                    <div class="form-group">
                        <label>Baslik</label>
                        <input class="form-control" placeholder="Başlık" name="baslik">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("baslik"); ?></small>
                        <?php } ?>
                    </div>
                    
                    <div class="form-group">
                        <label>Fiyat</label>
                        <input class="form-control" placeholder="Fiyat" name="fiyat">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("fiyat"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Araba Marka</label>
                        <input class="form-control" placeholder="Araba Markası" name="araba_marka">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("araba_marka"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Araba Model</label>
                        <input class="form-control" placeholder="Araba Model" name="araba_model">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("araba_model"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Yıl</label>
                        <input class="form-control" placeholder="Yıl" name="yil">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("yil"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("adverts"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>