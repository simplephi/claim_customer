
    <section class="content-header">
            <h1>
              Peminjaman
              <small>Pinjam Buku</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> beranda</a></li>
              <li class="active">Dashboard</li>
            </ol>
          </section>

  <section class="content">
    <!-- SELECT2 EXAMPLE -->
              <div class="row">
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Peminjaman Buku</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->

                <?php echo form_open_multipart("c_pinjam/input");?>
                    <div class="box-body">

                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Buku</label>
                          <select class="form-control select2" multiple="multiple" name="id_pelanggan[]" data-placeholder="Pilih Buku" style="width: 100%;" required="required">
                            <?php
                                foreach ($buku as $b) {
                                  if($b->stok_buku!=0){
                                      echo "<option value=\"".$b->id_pelanggan."\">".$b->judul_buku."</option>";
                                  }
                                }
                              ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Minimal</label>
                          <select class="form-control select2" name="id_anggota" style="width: 100%;" data-placeholder="Nama Peminjam" required="required">
                            <?php
                              foreach ($anggota as $a) {
                                echo "<option value=\"".$a->id_anggota."\">".$a->nama_anggota."</option>";
                              }
                            ?>
                          </select>
                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
                  <?php echo form_close(); ?>


                </div><!-- /.box -->
              </div>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Tabel Peminjaman</h3>
          </div><!-- /.box-header -->
          <div class="box-body">

            <table class="table table-bordered">
              <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Batas</th>

              </tr>
              </thead>
              <tbody>
                <?php
                    $no=1;
                    foreach ($pinjam_buku as $m) {


                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $m->nama_anggota;?></td>
                  <td><?php echo $m->judul_buku;?></td>
                  <td><?php echo $m->tanggal_pinjam;?></td>
                  <td><?php echo $m->tanggal_batas;?>
                  </td>

                </tr>
                <?php
                  $no++;
                  };
                ?>
              </tbody>

            </table>
          </div><!-- /.box-body -->

        </div><!-- /.box -->
  </div>
  </div>
  </section>
