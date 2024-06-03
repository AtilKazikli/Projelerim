<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->brand</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("vehicles/update/$item->id"); ?>" method="post">
                    <div class="form-group">
                        <label>Marka</label>
                        <input class="form-control" placeholder="Marka" name="brand" value="<?php echo $item->brand; ?>">
                    </div>

                    <div class="form-group">
                        <label>Model</label>
                        <input class="form-control" placeholder="Model" name="model" value="<?php echo $item->model; ?>">
                    </div>

                    <div class="form-group">
                        <label>Araç Yılı</label>
                        <input class="form-control" placeholder="Araç Yılı" name="year" value="<?php echo $item->year; ?>">
                    </div>

                    <div class="form-group">
                        <label>Plaka No</label>
                        <input class="form-control" placeholder="Plaka No" name="plate_number" value="<?php echo $item->plate_number; ?>">
                    </div>

                    <div class="form-group">
                        <label>Renk</label>
                        <input class="form-control" placeholder="Renk" name="color" value="<?php echo $item->color; ?>">
                    </div>

                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("vehicles"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>
