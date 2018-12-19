<section class="content-header">
        <h1><i class="fa fa-book"></i>
          Pelanggan
          <small>Daftar Pengaduan</small>
        </h1>
        <ol class="breadcrumb">
          
          <li class="active"><img src = "<?php echo base_url();?>/assets/telkom.jpg" width="150" height="70"></li>
        </ol>
      </section>

<section class="content">
<div class="row">
  <div class="col-sm-1">
    <div class="box">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Isi Pelanggan</button>
	 
 <!-- Modal -->
         <div class="modal fade" id="myModal" role="dialog">
           <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button> <!--  pake kan a href anchor    -->
                 <h4 class="modal-title">Isi Pelanggan</h4>
               </div>
               <div class="modal-body">
                 <?php

                    echo form_open_multipart("c_buku/input", "role=form");

                  ?>

                   <div class="box-body">
                     <div class="form-group">
						   <label for="nama_pelanggan">Nama Pengadu</label>
						   <input type="text" class="form-control" id="nama_pelanggan"  name="nama_pelanggan">
					 </div>
					   <div class="form-group">
						   <label for="judul">Alamat Pengadu</label>
						   <textarea class="form-control" id="judul"  name="alamat"></textarea>
					   </div>
					   <div class="form-group">
						   <label for="pengarang">Nama Langganan</label>
						   <input type="text" class="form-control" id="pengarang"  name="nama_langganan">
                     </div>
                     <div class="form-group">
                       
                         <label for="tahun">Alamat Pesawat</label>
                         <textarea class="form-control" id="tahun"  name="pesawat"></textarea>
                     </div>  
                     <div class="form-group">
                         <label for="stok">Nomor Telepon</label>
                         <input type="text" class="form-control" id="stok"  name="telp">
                    </div>
                    <div class="form-group">
                         <label for="jenis">Segmentasi</label>
                        <select class="form-control" id="jenis" name="id_segmentasi">
							<option value = "1">Bisnis</option>
							<option value = "2">Lembaga Negara / Pemerintah</option>
							<option value = "3">Organisasi</option>
							<option value = "4">Perwakilan Asing</option>
							<option value = "5">Pelayanan Umum</option>
							<option value = "6">Lembaga Pendidikan</option>
							<option value = "7">Perumahan</option>
						</select>
                     
                     </div>
                     <div class="form-group">
                       <label for="status">Status Pengadu</label>
					  <select class="form-control" id="jenis" name="status">
							<option value = "Pemakai">Pemakai</option>
							<option value = "Langganan">Langganan</option>
							<option value = "Kuasa">Kuasa</option>
							
						</select>
                     </div>
					 
                     <div class="form-group">
                       <label for="penerbit">Pengaduan Tagihan Bulan </label>
                       <input type="text" class="form-control" id="penerbit"  name="bulan">

                     </div>
					 
                     <div class="form-group">
                       <label for="tagihan">Jumlah Tagihan</label>
                       <input type="text" class="form-control" id="tagihan"  name="tagihan">

                     </div>

                     <div class="form-group">
                       <label for="TLD">Tagihan Luar Dugaan</label>
					<textarea class="form-control" id="tahun"  name="TLD"></textarea>
                     </div>
					 
					 					 					 
					 <div class="form-group">
                       <label for="TLD">Kondisi Telepon</label>
                       <select class="form-control" id="jenis" name="kondisi">
							<option value = "Ada Pararel">Ada Pararel</option>
							<option value = "Ada Alat Anti Interlokal">Ada Alat Anti Interlokal</option>
						</select>
                     </div>
					 
					 <div class="form-group">
                       <label for="TLD">Minta Penjelasan</label>
                       <textarea class="form-control" id="penerbit"  name="penjelasan"></textarea>
                     </div>
					 					 					 
                     <div class="form-group">
					 
		               <label for="gambar">Scan KTP</label>
                       <input type="file" class="form-control" id="gambar"  name="userfile">

                     </div>


                   </div><!-- /.box-body -->
                   <input type="hidden" name="id_pelanggan">

                   <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                 <?php echo form_close();?>
               </div><!-- /.box -->

               <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
             </div>

           </div>
         </div>
    </div>
  </div>
<div class="col-lg-12">
<div class="box">
                <div class="box-body table-responsive" >
                  <table id="example1" class="table table-bordered table-striped ">
                    <thead>
                      <tr>
                        <th style="width: 5px">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nama Langganan</th>
                        <th>Pesawat</th>
                        <th>Telp</th>
                        <th style="width: 10px">Segmentasi</th>
                        <th>Status</th>
                        <th>Bulan</th>
                        <th>Tagihan</th>
                        <th>TLD</th>
                        <th>Kondisi Telepon</th>
                        <th>Penjelasan</th>
						<th>Scan KTP</th>
                        <th>Aksi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $no=1;

                          foreach ($daftar_buku as $m) {
                          $id=$m->id_pelanggan;

                      ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $m->nama_pelanggan;?></td>
                        <td><?php echo $m->alamat;?></td>
                        <td><?php echo $m->nama_langganan;?></td>
                        <td><?php echo $m->pesawat;?></td>
						<td><?php echo $m->telp;?></td>
						<td><?php echo $m->nama_segmentasi;?></td>
						<td><?php echo $m->status;?></td>
						<td><?php echo $m->bulan;?></td>
						<td><?php echo $m->tagihan;?></td>
						<td><?php echo $m->TLD;?></td>
						<td><?php echo $m->kondisi;?></td>
						<td><?php echo $m->penjelasan;?></td>
						
						
                        
                        <td><img src = "<?php echo base_url()?>assets/gambar/<?php echo $m->gambar ?>" width="100" height="100"> </td>
                        <td>
						 <div class="btn-group">
                          <button type="button" class="btn-xs btn-success" title="Edit Buku" data-toggle="modal" data-target="#edit<?php echo $no;?>"><i class="fa fa-edit"></i></button>
                          <button type="button" class="btn-xs btn-danger" data-toggle="modal" title="Delete Buku" data-target="#delete<?php echo $id;?>"><i class="fa fa-trash"></i></button>
                                          <?php  include('delete_buku_modal.php'); ?>
							<a href="<?php echo site_url('c_anggota/cetak_kartu')."?id=".$m->id_pelanggan;?>"><button type="button" class="btn-xs btn-primary" title="Print Surat"><i class="fa fa-print"></i></button></a>
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
                    foreach ($daftar_buku as $m) {
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
                               echo form_open_multipart("c_buku/edit");
                               ?>
                               <div class="box-body">
                                

                     <div class="form-group">
						   <label for="nama_pelanggan">Nama Pengadu</label>
						   <input type="text" class="form-control" id="nama_pelanggan"  name="nama_pelanggan" <?php  echo"value=\"".$m->nama_pelanggan."\"";?>>
					 </div>
					   <div class="form-group">
						   <label for="judul">Alamat Pengadu</label>
						   <textarea class="form-control" id="judul"  name="alamat" ><?php echo "$m->alamat";?></textarea>
					   </div>
					 <div class="form-group">
						   <label for="pengarang">Nama Langganan</label>
						   <input type="text" class="form-control" id="pengarang"  name="nama_langganan" <?php  echo"value=\"".$m->nama_langganan."\"";?>>
                     </div>
                     <div class="form-group">
                       
                         <label for="tahun">Alamat Pesawat</label>
                         <textarea class="form-control" id="tahun"  name="pesawat" ><?php  echo "$m->pesawat";?></textarea>
                     </div>  
                     <div class="form-group">
                         <label for="stok">Nomor Telepon</label>
                         <input type="text" class="form-control" id="stok"  name="telp" <?php  echo"value=\"".$m->telp."\"";?>>
                    </div>
					
                    <div class="form-group">
                         <label for="jenis">Segmentasi</label>
                        <select class="form-control" id="jenis" name="id_segmentasi" >
							
						<option <?php if( $m->id_segmentasi=='1'){echo "selected"; } ?> value='1'>Bisnis</option>

						<option <?php if( $m->id_segmentasi=='2'){echo "selected"; } ?> value='2'>Lembaga Negara / Pemerintah</option>

						<option <?php if( $m->id_segmentasi=='3'){echo "selected"; } ?> value='3'>Organisasi</option>

						<option <?php if( $m->id_segmentasi=='4'){echo "selected"; } ?> value='4'>Perwakilan Asing</option>

						<option <?php if( $m->id_segmentasi=='5'){echo "selected"; } ?> value='5'>Pelayanan Umum</option>
						
						<option <?php if( $m->id_segmentasi=='6'){echo "selected"; } ?> value='6'>Lembaga Pendidikan</option>
						
						<option <?php if( $m->id_segmentasi=='7'){echo "selected"; } ?> value='7'>Perumahan</option>
					 
					 </select>
					 
                     </div>
					 
                     <div class="form-group">
                       <label for="status">Status Pengadu</label>
					  <select class="form-control" id="jenis" name="status" >
							
							<option <?php if( $m->status=='Pemakai'){echo "selected"; } ?>  value = "Pemakai">Pemakai</option>
							<option <?php if( $m->status=='Langganan'){echo "selected"; } ?>  value = "Langganan">Langganan</option>
							<option <?php if( $m->status=='Kuasa'){echo "selected"; } ?>  value = "Kuasa">Kuasa</option>
							
						</select>
                     </div>
					 
                     <div class="form-group">
                       <label for="penerbit">Pengaduan Tagihan Bulan </label>
                       <input type="text" class="form-control" id="penerbit"  name="bulan" <?php  echo"value=\"".$m->bulan."\"";?>>

                     </div>
					 
                     <div class="form-group">
                       <label for="tagihan">Jumlah Tagihan</label>
                       <input type="text" class="form-control" id="tagihan"  name="tagihan" <?php  echo"value=\"".$m->tagihan."\"";?>>

                     </div>

                     <div class="form-group">
                       <label for="TLD">Tagihan Luar Dugaan</label>
                       <textarea class="form-control" id="tahun"  name="TLD" ><?php  echo "$m->TLD";?></textarea>
					   
                     </div>
					 		 
					 <div class="form-group">
                       <label for="TLD">Kondisi Telepon</label>
                       <select class="form-control" id="jenis" name="kondisi" >
							<option <?php if( $m->kondisi=='Ada Pararel'){echo "selected"; } ?>  value = "Ada Pararel">Ada Pararel</option>
							<option <?php if( $m->kondisi=='Ada Alat Anti Interlokal'){echo "selected"; } ?> value = "Ada Alat Anti Interlokal">Ada Alat Anti Interlokal</option>
						</select>
                     </div>
					 
					 <div class="form-group">
                       <label for="TLD">Minta Penjelasan</label>
                       <textarea class="form-control" id="penerbit"  name="penjelasan" ><?php  echo " $m->penjelasan ";?></textarea>
                     </div>
					 
					 
                     <div class="form-group">
					 
		               <label for="gambar">Gambar</label><br>
					   <img src = "<?php echo base_url()?>/assets/gambar/<?php echo $m->gambar ?> " width="100" height="100" >
                       <input type="file" class="form-control" id="gambar"  name="userfile" >
					   
                     </div>


                 </div><!-- /.box-body -->
                               <input type="hidden" name="id_pelanggan" <?php echo "value=\"".$m->id_pelanggan."\"";?>>

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
