<section class="content-header">
        <h1>
          <i class="fa fa-group"></i>Anggota
          <small>Daftar Anggota</small>
        </h1>
        <ol class="breadcrumb">
          <li class="active"><img src = "<?php echo base_url();?>/assets/telkom.jpg" width="150" height="70"></li>
        </ol>
      </section>

<section class="content">
<div class="row">
  <div class="col-sm-1">
    <div class="box">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Input Anggota</button>

 <!-- Modal -->
         <div class="modal fade" id="myModal" role="dialog">
           <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Modal Header</h4>
               </div>
               <div class="modal-body">
                 <?php
                  echo form_open_multipart("c_anggota/input");
                  ?>

                     <div class="box-body">
                       <div class="form-group">
                         <label>Nama Anggota</label>
                         <input type="text" class="form-control"  placeholder="Nama Anggota" name="nama_anggota" required="required">
                       </div>
                       <div class="form-group">
                         <label>NIM/NIP</label>
                         <input type="text" class="form-control"  placeholder="NIM/NIP" name="nim_nip" required="required">
                       </div>
                       <div class="form-group">
                         <label>Alamat Anggota</label>
                         <input type="text" class="form-control"  placeholder="Alamat Anggota" name="alamat_anggota" required="required">
                       </div>
                       <div class="form-group">
                         <label>Telepon</label>
                         <input type="text" class="form-control"  placeholder="Telepon Anggota" name="telepon_anggota" required="required">
                       </div>
                       <div class="form-group">
                         <label>Email Anggota</label>
                         <input type="text" class="form-control"  placeholder="Email Anggota" name="email_anggota" required="required">
                       </div>

                       <div class="form-group  ">
                         <label for="status">Status</level>
                         <select class="form-control" id="status" name="status" required="required">
                             <option value="">Status</option>
                             <option value="mahasiswa">Mahasiswa</option>
                             <option value="dosen">Dosen</option>
                         </select>
                       </div>
                     </div><!-- /.box-body -->

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
  </div>
  <div class="col-lg-12">
      <div class="box box-primary">

                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width: 5px">No</th>
                        <th>Nama Anggota</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Tanggal Daftar</th>

                        <th>Anggota</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $no=1;
                          foreach ($daftar_anggota as $m) {


                      ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $m->nama_anggota; $id = $m->id_anggota?></td>
                        <td><?php echo $m->telepon_anggota;?></td>
                        <td><?php echo $m->alamat_anggota;?></td>
                        <td><?php echo $m->status;?></td>
                        <td><?php echo $m->tanggal_daftar;?></td>

                        <td><?php echo $m->anggota;?></td>
                        <td>
                          <div class="btn-group">
                          <button type="button" class="btn-xs btn-danger" data-toggle="modal" title="Delete Anggota" data-target="#delete<?php echo $id;?>"><i class="fa fa-trash"></i></button>
                                          <?php  include('delete_anggota_modal.php'); ?>
                          <button type="button" class="btn-xs btn-success" title="Edit Anggota" data-toggle="modal" data-target="#edit<?php echo $no;?>"><i class="fa fa-edit"></i></button>
                          <a href="<?php echo site_url('c_anggota/cetak_kartu')."?id=".$m->id_anggota;?>"><button type="button" class="btn-xs btn-primary" title="Print Kartu"><i class="fa fa-print"></i></button></a>
                          <button type="button" class="btn-xs btn-warning" data-toggle="modal" title="Terima Anggota" data-target="#accept<?php echo $id;?>"><i class="fa fa-check"></i></button>
                                          <?php include('modal_accept_anggota.php'); ?>
                          </div>
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
                    foreach ($daftar_anggota as $m) {
                      ?>
                      <div class="modal fade" id="edit<?php echo $no?>" role="dialog">
                        <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Data Anggota</h4>
                        </div>
                        <div class="modal-body">
                          <div class="box-body">
                              <?php
                               echo form_open_multipart("c_anggota/edit");
                               ?>
                               <input type="hidden" class="form-control"  value="<?php echo $m->id_anggota;?>" name="id_anggota" ><br>
                                <div class="form-group">
                                  <label>Nama Anggota</label><br>
                                  <input type="text" class="form-control"  value="<?php echo $m->nama_anggota;?>" name="nama_anggota" required="required"><br>
                                </div>
                                <div class="form-group">
                                  <label>NIM/NIP</label><br>
                                  <input type="text" class="form-control"  value="<?php echo $m->nim_nip;?>" name="nim_nip" required="required"><br>
                                </div>
                                <div class="form-group">
                                  <label>Alamat Anggota</label><br>
                                  <input type="text" class="form-control" value="<?php echo $m->alamat_anggota;?>" name="alamat_anggota" required="required"><br>
                                </div>
                                <div class="form-group">
                                  <label>Telepon</label><br>
                                  <input type="text" class="form-control" value="<?php echo $m->telepon_anggota;?>" name="telepon_anggota" required="required"><br>
                                </div>
                                <div class="form-group">
                                  <label>Email Anggota</label>
                                  <input type="text" class="form-control"  value="<?php echo $m->email_anggota;?>" name="email_anggota" required="required">
                                </div>

                                <div class="form-group  ">
                                  <label for="status">Status</level>
                                  <select class="form-control" id="status" name="status" required="required">
                                      <option value="">Status</option>
                                      <option value="Mahasiswa" <?php if($m->status=='Mahasiswa'){echo "selected";}?>>Mahasiswa</option>
                                      <option value="Dosen" <?php if($m->status=='Dosen'){echo "selected";}?>>Dosen</option>
                                  </select>
                                </div>
                              </div><!-- /.box-body -->

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


                <?php
                  $no++;
                  };
                ?>
              </div><!-- /.box -->
            </div>
          </div>
</section>
