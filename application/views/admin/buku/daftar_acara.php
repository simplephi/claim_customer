<section class="content-header">
        <h1><i class="fa fa-book"></i>
          Pelanggan
          <small>Daftar Klaim</small>
        </h1>
        <ol class="breadcrumb">
          
          <li class="active"><img src = "<?php echo base_url();?>/assets/telkom.jpg" width="150" height="70"></li>
        </ol>
      </section>

<section class="content">
<div class="row">
  <div class="col-sm-1">
    <div class="box">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Isi Klaim</button>
	 
 <!-- Modal -->
         <div class="modal fade" id="myModal" role="dialog">
           <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button> <!--  pake kan a href anchor    -->
                 <h4 class="modal-title">Isi Klaim</h4>
               </div>
               <div class="modal-body">
                 <?php

                    echo form_open_multipart("c_buku/input_baru", "role=form");

                  ?>

                   <div class="box-body">
                     
					   <div class="form-group">
						   <label for="judul">Nama Pengadu</label>
						   <textarea class="form-control" id="judul"  name="nama"></textarea>
					   </div>
					   <div class="form-group">
						   <label for="pengarang">Alamat</label>
						   <input type="text" class="form-control" id="pengarang"  name="alamat">
                     </div>
                     <div class="form-group">
                       
                         <label for="tahun">No. Handphone</label>
                         <textarea class="form-control" id="tahun"  name="telepon"></textarea>
                     </div>  
                     <div class="form-group">
                         <label for="stok">No. Pots / Internet</label>
                         <input type="text" class="form-control" id="stok"  name="internet">
                    </div>
                    				 
                     <div class="form-group">
                       <label for="penerbit">Dengan Alasan</label>
                       <input type="text" class="form-control" id="penerbit"  name="alasan">

                     </div>
					 
                     <div class="form-group">
                       <label for="tagihan">Besaran Restitusi</label>
                       <input type="text" class="form-control" id="tagihan"  name="restitusi">

                     </div>

                    </div><!-- /.box-body -->
                   <input type="hidden" name="id_klaim">

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
                <div class="box-body" >
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width: 5px">No</th>
                        
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. Handphone</th>
                        <th>No. Pots / Internet</th>
                        <th>Alasan</th>
                        <th>Restitusi</th>
                        <th>Aksi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $no=1;

                          foreach ($daftar_acara as $m) {
                          $id=$m->id_klaim;

                      ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        
                        <td><?php echo $m->nama;?></td>
                        <td><?php echo $m->alamat;?></td>
                        <td><?php echo $m->telepon;?></td>
                        <td><?php echo $m->internet;?></td>
						<td><?php echo $m->alasan;?></td>
						<td><?php echo $m->restitusi;?></td>
						
                        <td>
						 <div class="btn-group">
                          <button type="button" class="btn-xs btn-success" title="Edit Buku" data-toggle="modal" data-target="#edit<?php echo $no;?>"><i class="fa fa-edit"></i></button>
                          <button type="button" class="btn-xs btn-danger" data-toggle="modal" title="Delete Buku" data-target="#delete<?php echo $id;?>"><i class="fa fa-trash"></i></button>
                                          <?php  include('delete_buku_baru.php'); ?>
							<a href="<?php echo site_url('c_anggota/cetak_kartu_baru')."?id=".$m->id_klaim;?>"><button type="button" class="btn-xs btn-primary" title="Print Surat"><i class="fa fa-print"></i></button></a>
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
                    foreach ($daftar_acara as $m) {
                      ?>
                      <div class="modal fade" id="edit<?php echo $no?>" role="dialog">
                        <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Data Klaim</h4>
                        </div>
                        <div class="modal-body">
                          <div class="box-body">
                              <?php
                               echo form_open_multipart("c_buku/edit_baru");
                               ?>
                               <div class="box-body">
                                

                     
					   <div class="form-group">
						   <label for="judul">Nama Pengadu</label>
						   <textarea class="form-control" id="judul"  name="nama" ><?php echo "$m->nama";?></textarea>
					   </div>
					 <div class="form-group">
						   <label for="pengarang">Alamat</label>
						   <input type="text" class="form-control" id="pengarang"  name="alamat" <?php  echo"value=\"".$m->alamat."\"";?>>
                     </div>
                     <div class="form-group">
                       
                         <label for="tahun">No. Handphone</label>
                         <textarea class="form-control" id="tahun"  name="telepon" ><?php  echo "$m->telepon";?></textarea>
                     </div>  
                     <div class="form-group">
                         <label for="stok">No. Pots / Internet</label>
                         <input type="text" class="form-control" id="stok"  name="internet" <?php  echo"value=\"".$m->internet."\"";?>>
                    </div>
					 
                     <div class="form-group">
                       <label for="penerbit">Alasan </label>
                       <input type="text" class="form-control" id="penerbit"  name="alasan" <?php  echo"value=\"".$m->alasan."\"";?>>

                     </div>
					 
                     <div class="form-group">
                       <label for="tagihan">Restitusi</label>
                       <input type="text" class="form-control" id="tagihan"  name="restitusi" <?php  echo"value=\"".$m->restitusi."\"";?>>

                     </div>

                   
                 </div><!-- /.box-body -->
                               <input type="hidden" name="id_klaim" <?php echo "value=\"".$m->id_klaim."\"";?>>

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
