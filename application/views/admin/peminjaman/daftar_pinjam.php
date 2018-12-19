
  <section class="content-header">
          <h1>
            Peminjaman
            <small>Daftar Buku Yang Di Pinjam</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> beranda</a></li>
            <li class="active">Peminjaman</li>
          </ol>
        </section>

<section class="content">
  <div class="col-sm-1">
    <div class="box">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Pinjam Buku</button>

  <!-- Modal -->
         <div class="modal fade" id="myModal" role="dialog">
           <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Tambah Buku</h4>
               </div>
               <div class="modal-body">
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
                           <label>Nama Peninjam</label>
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

               <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
             </div>

           </div>
         </div>
    </div>
  </div>
<div class="row">
  <div class="col-lg-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar </h3>
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
                        <th>Denda/Hari</th>
                        <th>Jenis Buku</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $no=1;
                          foreach ($pinjam_buku as $m) {
                          $id=$m->id_pinjam;

                      ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $m->nama_anggota;?></td>
                        <td><?php echo $m->judul_buku;?></td>
                        <td><?php echo $m->tanggal_pinjam;?></td>
                        <td><?php echo $m->tanggal_batas;?></td>
                        <td><?php echo $m->tanggal_kembali;?></td>
                        <td>Rp. <?php echo $m->denda;?></td>
                        <td><?php echo $m->nama_jenis_buku;?></td>
                        <td>
                          <button type="button" class="btn-xs btn-danger" data-toggle="modal" title="Delete Peminjaman" data-target="#delete<?php echo $id;?>"><i class="fa fa-times"></i></button>
                            <?php include('delete_peminjaman_modal.php');?>
                            <button type="button" class="btn-xs btn-success" title="Edit Peminjaman" data-toggle="modal" data-target="#edit<?php echo $no;?>"><i class="fa fa-edit"></i></button>


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
                    foreach ($pinjam_buku as $m) {
                      ?>
                      <div class="modal fade" id="edit<?php echo $no?>" role="dialog">
                        <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Data Buku</h4>
                        </div>
                        <div class="modal-body">
                          <div class="box-body">
                              <?php
                               echo form_open_multipart("c_pinjam/edit");
                               ?>
                               <div class="box-body">
                                <input type="hidden" value="<?php echo $m->id_pelanggan;?>" name="id_lama">

                                 <div class="col-md-12">
                                   <div class="form-group">
                                     <label>Buku</label>
                                     <select class="form-control select2" name="id_pelanggan" style="width: 100%;" required="required">
                                       <?php
                                           foreach ($buku as $b) {
                                             if($b->stok_buku!=0){
                                                 echo "<option ";
                                                 if($m->id_pelanggan==$b->id_pelanggan){
                                                   echo "selected=\"selected\"";
                                                 }
                                                 echo "value=\"".$b->id_pelanggan."\">".$b->judul_buku."</option>";
                                             }
                                           }
                                         ?>
                                     </select>
                                   </div>
                                   <div class="form-group">
                                     <label>Tanggal Pinjam</label>
                                     <input type="date" class="form-control" name="tanggal_pinjam" value="<?php echo $m->tanggal_pinjam?>">
                                   </div>
                                   <div class="form-group">
                                     <label>Tanggal Batas</label>
                                     <input type="date" class="form-control" name="tanggal_batas" value="<?php echo $m->tanggal_batas?>">
                                   </div>
                                   <div class="form-group">
                                     <label>Nama Peninjam</label>
                                     <select class="form-control select2" name="id_anggota" style="width: 100%;" data-placeholder="Nama Peminjam" required="required">
                                       <?php
                                         foreach ($anggota as $a) {
                                           echo "<option ";
                                           if($m->id_anggota==$a->id_anggota){
                                             echo "selected=\"selected\"";
                                           }
                                           echo "value=\"".$a->id_anggota."\">".$a->nama_anggota."</option>";
                                         }
                                       ?>
                                     </select>
                                   </div>

                               </div><!-- /.box-body -->
                               <input type="hidden" value="<?php echo $m->id_pinjam;?>" name="id_pinjam">
                               <div class="box-footer">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                               </div>
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
