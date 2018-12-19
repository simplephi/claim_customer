<section class="content-header">
        <h1>
          Anggota
          <small>Tambah Anggota</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> beranda</a></li>
          <li class="active">anggota</li>
        </ol>
      </section>

<section class="content">

<div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Anggota</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                 if($index==""){
                   echo form_open_multipart("c_anggota/input", "role=form");
                 }else{
                   echo form_open_multipart("c_anggota/edit");
                 }
                 ?>

                  <div class="box-body">
                    <div class="form-group">
                      <label for="nama_anggota">Nama Anggota</label>
                      <input type="text" class="form-control" id="nama_anggota" placeholder="Nama Anggota" name="nama_anggota"
                      <?php
                      if($index!=""){
                        echo"value=\"".$entry->nama_anggota."\"";
                      }
                      ?>>
                    </div>
                    <div class="form-group">
                        <label for="nim_nip">Nomor Induk Mahasiswa/Perancangan</label>
                        <input type="text" class="form-control" id="nim_nip" placeholder="Nomor Induk Mahasiswa/Perancangan" name="nim_nip"
                        <?php
                        if($index!=""){
                          echo"value=\"".$entry->nim_nip."\"";
                        }
                        ?>>
                    </div>
                    <div class="form-group">
                        <label for="nim_nip">Alamat</label>
                        <input type="text" class="form-control" id="alamat_anggota" placeholder="Alamat" name="alamat_anggota"
                        <?php
                        if($index!=""){
                          echo"value=\"".$entry->alamat_anggota."\"";
                        }
                        ?>>
                    </div>
                    <div class="form-group">
                        <label for="nim_nip">Nomor HP</label>
                        <input type="text" class="form-control" id="telepon_anggota" placeholder="Nomor HP" name="telepon_anggota"
                        <?php
                        if($index!=""){
                          echo"value=\"".$entry->telepon_anggota."\"";
                        }
                        ?>>
                    </div>
                    <div class="form-group">
                        <label for="nim_nip">Email</label>
                        <input type="text" class="form-control" id="email_anggota" placeholder="Email" name="email_anggota"
                        <?php
                        if($index!=""){
                          echo"value=\"".$entry->email_anggota."\"";
                        }
                        ?>>
                    </div>
                    <div class="form-group">
                        <label for="nim_nip">Password</label>
                        <input type="text" class="form-control" id="password_anggota" placeholder="Password" name="password_anggota"
                        <?php
                        if($index!=""){
                          echo"value=\"".$entry->alamat_anggota."\"";
                        }
                        ?>>
                    </div>

                      <div class="">
                        <label for="jenis">Status</label>
                        <select class="form-control" id="jenis" name="status">
                          <option value="">Pilih Status Anggota</option>
                          <option value="Dosen" <?php
                          if($index!=""){
                            if($entry->status=="Dosen"){
                              echo "selected=\"selected\"";
                            }
                          }
                          ?>>Dosen</option>
                          <option value="Mahasiswa"

                          <?php
                          if($index!=""){
                            if($entry->status=="Mahasiswa"){
                              echo "selected=\"selected\"";
                            }
                          }
                          ?>
                          >Mahasiswa</option>
                          <option value="Staf"
                          <?php
                          if($index!=""){
                            if($entry->status=="Staf"){
                              echo "selected=\"selected\"";
                            }
                          }
                          ?>
                          >Staf</option>

                        </select>

                      </div>


                  </div><!-- /.box-body -->
                  <input type="hidden" name="id_buku"
                  <?php
                    if($index!=""){
                      echo "value=\"".$entry->id_anggota."\"";
                    }
                  ?>>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                <?php echo form_close();?>
              </div><!-- /.box -->
            </div>
            <div class="col-md-6">
              <div class="box">
                              <div class="box-header">

                              </div><!-- /.box-header -->
                              <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 5px">No</th>
                                      <th>Nama</th>
                                      <th>NIM/NIP</th>
                                      <th style="width: 10px">Nomor HP</th>
                                      <th>Status</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                        $no=1;
                                        foreach ($daftar_anggota as $m) {


                                    ?>
                                    <tr>
                                      <td><?php echo $no;?></td>
                                      <td><?php echo $m->nama_anggota;?></td>
                                      <td><?php echo $m->nim_nip;?></td>
                                      <td><?php echo $m->telepon_anggota;?></td>
                                      <td><?php echo $m->status;?></td>

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

</div>   <!-- /.row -->
</section>
