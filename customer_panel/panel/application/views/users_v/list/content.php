<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-b-lg">
            Kullanıcı Listesi
          </h4>
        </div>
        <div class="col-sm-6 text-right">
          <a href="<?php echo base_url('Users/new_form'); ?>" class="btn btn-outline btn-primary btn-xs pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="widget p-lg">
            <?php if(empty($items)) { ?>
              <div class="alert alert-info text-center">
                <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url('Users/new_form'); ?>">tıklayınız</a></p>
              </div>
            <?php } else { ?>
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>#id</th>
                    <th>Email</th>
                    <th>İsim Soyisim</th>
                    <th>Durum</th>
                    <th>Oluşturma Tarihi</th>
                    <th>İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($items as $item) { ?>
                    <tr id="ord-<?php echo $item->id; ?>">
                      <td><i class="fa fa-reorder"></i></td>
                      <td><?php echo $item->email; ?></td>
                      <td><?php echo "$item->name $item->surname"; ?></td>
                      <td><?php echo $item->is_active == 0 ? "Pasif" : "Aktif"; ?></td>
                      <td><?php echo dateTimeFormat($item->created_at); ?></td>
                      <td>
                        <button data-url="<?php echo base_url("Users/delete/$item->id"); ?>" class="btn btn-sm btn-danger btn-outline remove-btn"><i class="fa fa-trash"></i> Sil</button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            <?php } ?>
          </div><!-- .widget -->
        </div><!-- END column -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
