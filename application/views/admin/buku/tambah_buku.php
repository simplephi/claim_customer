
  <section class="content-header">
          <h1>
            Buku
            <small>Tambah Buku</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> beranda</a></li>
            <li class="active">buku</li>
          </ol>
        </section>

<section class="content">
<div class="row">
         <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Buku</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                 if($index==""){
                   echo form_open_multipart("c_buku/input", "role=form");
                 }else{
                   echo form_open_multipart("c_buku/edit");
                 }
                 ?>
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="judul">Judul Buku</label>
                      <input type="text" class="form-control" id="judl" placeholder="Judul Buku" name="alamat"
                      <?php
                      if($index!=""){
                        echo"value=\"".$entry->alamat."\"";
                      }
                      ?>>
                      <label for="pengarang">Pengarang</label>
                      <input type="text" class="form-control" id="pengarang" placeholder="Pengarang" name="nama_langganan"
                      <?php
                      if($index!=""){
                        echo"value=\"".$entry->nama_langganan."\"";
                      }
                      ?>>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="col-md-4">
                        <label for="tahun">Tahun Terbit</label>
                        <input type="text" class="form-control" id="tahun" placeholder="Tahun Terbit" name="pesawat"
                        <?php
                        if($index!=""){
                          echo"value=\"".$entry->pesawat."\"";
                        }
                        ?>>
                      </div>
                      <div class="col-md-4">
                        <label for="stok">Stok Buku</label>
                        <input type="text" class="form-control" id="stok" placeholder="Stok Buku" name="telp"
                        <?php
                        if($index!=""){
                          echo"value=\"".$entry->telp."\"";
                        }
                        ?>>
                      </div>
                      <div class="col-md-4">
                        <label for="jenis">Jenis Buku</label>
                        <select class="form-control" id="jenis" name="id_segmentasi">
                          <?php
                            foreach ($jenis_buku as $j ) {
                              echo "<option value=\"".$j->id_segmentasi."\"";
                              if($index!="" && $entry->id_segmentasi==$j->id_segmentasi){
                                echo"selected=\"selected\"";
                              }
                              echo ">".$j->nama_segmentasi;
                            }
                          ?>


                        </select>

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="penerbit">Penerbit</label>
                      <input type="text" class="form-control" id="penerbit" placeholder="Penerbit" name="bulan"
                      <?php
                      if($index!=""){
                        echo"value=\"".$entry->bulan."\"";
                      }
                      ?>>

                    </div>
                  </div><!-- /.box-body -->
                  <input type="hidden" name="id_pelanggan"
                  <?php
                    if($index!=""){
                      echo "value=\"".$entry->id_pelanggan."\"";
                    }
                  ?>
                  >

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                <?php echo form_close();?>
              </div><!-- /.box -->
            </div>
            <div class="col-md-6">
              <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Data Buku</h3>
                              </div><!-- /.box-header -->
                              <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 5px">No</th>
                                      <th>Judul Buku</th>
                                      <th>Pengarang</th>
                                      <th style="width: 10px">Stok</th>
                                      <th>Jenis Buku</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                        $no=1;
                                        foreach ($daftar_buku as $m) {


                                    ?>
                                    <tr>
                                      <td><?php echo $no;?></td>
                                      <td><?php echo $m->alamat;?></td>
                                      <td><?php echo $m->nama_langganan;?></td>

                                      <td><?php echo $m->telp;?></td>
                                      <td><?php echo $m->nama_segmentasi;?></td>

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
