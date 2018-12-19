<section class="content-header">
        <h1>
          <i class="fa fa-briefcase"></i> Transaksi
          <small>Pembayaran Denda</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> beranda</a></li>
          <li class="active">transaksi</li>
        </ol>
      </section>

<section class="content">
<div class="row">

  <div class="col-md-12">
    <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tabel Daftar Denda</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Nama Anggota</th>
                <th>Status</th>
                <th>Nomor Telepon</th>
                <th>Denda</th>
                <th>action</th>

              </tr>
              </thead>
              <tbody>
                <?php
                    $no=1;
                    foreach ($denda as $m) {


                ?>
                <tr>
                  <td><?php echo $no; $id=$no;?></td>
                  <td><?php echo $m->nama_anggota;?></td>
                  <td><?php echo $m->status;?></td>
                  <td><?php echo $m->telepon_anggota;?></td>
                  <td><?php echo $m->total_denda;?></td>
                  <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $id;?>"><i class="fa fa-edit"></i>Bayar</button>
                  </td>



                </tr>
                <?php
                  $no++;
                  };
                ?>
              </tbody>

            </table>
          </div><!-- /.box-body -->
          <?php
              $no=1;
              foreach ($denda as $m) {
                ?>
                <div class="modal fade" id="edit<?php echo $no?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pembayaran</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <h3>Total Denda</h3>
                            <h3 style="float:right">Rp.<?PHP echo $m->total_denda;?>,-</h3>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">

                            <?php echo form_open("c_pinjam/pembayaran_denda")?>
                              <div class="box-body">
                                <div class="input-group">
                                  <span class="input-group-addon">Rp.</span>
                                  <input type="number" focus="focus" class="form-control" id="pembayaran" placeholder="Pembayaran" name="pembayaran">
                                  <input type="hidden" focus="focus" class="form-control" id="id_denda" value="<?php echo $m->id_denda;?>" name="id_denda">
                                  <input type="hidden" focus="focus" class="form-control" id="id_denda" value="<?php echo $m->total_denda;?>" name="total_denda">
                                </div>

                              <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                              <?php echo form_close();?>

                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            <?php
            $no++;
            };
          ?>
        </div><!-- /.box -->
  </div>

</div>
</section>
