
  <section class="content-header">
          <h1>
            Peminjaman
            <small>Pengembalian Buku</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> beranda</a></li>
            <li class="active">peminjaman</li>
          </ol>
        </section>

<section class="content">
<div class="row">
  <div class="col-lg-12">
    <?php echo form_open("c_pinjam/pengembalian_buku",
          "class='form-horizontal' row-border")?>
<div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width: 5px">No</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Batas</th>
                        <th>Tanggal Kembali</th>
                        <th>Denda</th>
                        <th>Status Peminjaman</th>
                        <th>Jenis Buku</th>
                        <th>Aksi</th>
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
                        <td><?php echo $m->tanggal_batas;?></td>
                        <td><?php echo $m->tanggal_kembali;?></td>
                        <td><?php echo $m->bayar_denda;?></td>
                        <td><?php echo $m->status_peminjaman;?></td>
                        <td><?php echo $m->nama_jenis_buku;?></td>
                        <td>
                          <input name="selector[]" type="checkbox" value="<?php echo $m->id_pinjam;?>">
                        </td>
                      </tr>
                      <?php
                        $no++;
                        };
                      ?>

                    </tbody>

                  </table>

                </div><!-- /.box-body -->
                <div class=row>
                  <div class="col-md-8 col-sm-4 col-xs-4">
                    <div class="btn-group">
                      <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" style="margin:20px">
                          Kembali</button>

                          <?php echo form_close();
                          ?>
                    </div>
                  </div>


                </div>
              </div><!-- /.box -->
              <?php echo form_close()?>
</div>
</div>
</section>
