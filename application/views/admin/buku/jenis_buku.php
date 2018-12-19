<section class="content-header">
        <h1>
          Buku
          <small>Jenis Buku</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> beranda</a></li>
          <li class="active">buku</li>
        </ol>
      </section>

<section class="content">
<div class="row">
<div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Input Jenis Buku</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                <?php
                 echo form_open_multipart("c_jenis_buku/input");
                 ?>

                  <div class="box-body">
                    <div class="form-group">
                      <label for="jenis">Nama Jenis Buku</label>
                      <input type="text" class="form-control" id="jenis" placeholder="Nama Jenis Buk" name="nama_segmentasi">
                    </div>
                    

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                <?php echo form_close(); ?>
              </div><!-- /.box -->

</div>
<div class="col-md-6">
  <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Jenis Buku</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Jenis Buku</th>
              <th>Aksi</th>

            </tr>
            </thead>
            <tbody>
              <?php
                  $no=1;
                  foreach ($jenis_buku as $m) {
                    $id=$m->id_segmentasi;

              ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $m->nama_segmentasi;?></td>
              
                <td>
                  <button type="button" class="btn-xs btn-danger" data-toggle="modal" title="Delete Jenis Buku" data-target="#delete<?php echo $id;?>"><i class="fa fa-trash"></i></button>
                                  <?php  include('delete_jenis_modal.php'); ?>
                  <button type="button" class="btn-xs btn-success" title="Edit Jenis Buku" data-toggle="modal" data-target="#edit<?php echo $no;?>"><i class="fa fa-edit"></i></button>
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
            foreach ($jenis_buku as $m) {
              ?>
              <div class="modal fade" id="edit<?php echo $no?>" role="dialog">
                <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Data Jenis Buku</h4>
                </div>
                <div class="modal-body">
                  <div class="box-body">
                      <?php
                       echo form_open_multipart("c_jenis_buku/edit");
                       ?>
                       <div class="box-body">
                         <div class="form-group">
                           <label for="jenis">Nama Jenis Buku</label>
                           <input type="text" class="form-control" id="jenis" placeholder="Nama Jenis Buk" name="nama_segmentasi" <?php echo "value=\"".$m->nama_segmentasi."\"";?>>
                         </div>
                         <div class="form-group">
                           <label for="rak">Nomor Rak</label>
                           <input type="text" class="form-control" id="rak" placeholder="Nomor Rak" name="nomor_rak" <?php echo "value=\"".$m->nomor_rak."\"";?>>
                         </div>
                         <div class="form-group">
                           <label for="rak">Nomor Rak</label>
                           <input type="number" class="form-control" id="rak" placeholder="Nomor Rak" name="denda" <?php echo "value=\"".$m->denda."\"";?>>
                         </div>

                       </div><!-- /.box-body -->
                       <input type="hidden" name="id_segmentasi" <?php echo "value=\"".$m->id_segmentasi."\"";?>>
                       <div class="box-footer">
                         <button type="submit" class="btn btn-primary">Submit</button>
                       </div>
                    <?php echo form_close(); ?>
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
