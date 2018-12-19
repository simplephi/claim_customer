
<!DOCTYPE html>
<html>
  <?php include 'admin/head.php';?>
  <body class="hold-transition register-page" id="login_bg">
    <div class="register-box">
      <div class="register-logo">
        <a href="<?php echo base_url()?>"><b>Perpustakaan Teknik Informatika</b></a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Cari Buku</p>
        <?php echo form_open("home/cari"); ?>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Pencarian" name="search">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
          </div>

          <div class="row">
            <div class="col-xs-12" >
			 <button type="submit" class="btn btn-primary btn-block btn-flat">Cari</button>
            </div><!-- /.col -->
            
			
             
            
        <?php echo form_close();?>
			
		<div class="col-xs-12">
		<br>
		<button type='reset' class='btn btn-danger btn-block btn-flat'>Reset</button>
		
		
		</div><!-- /.col -->
			
          </div>
		<div class = "row">
			<div class = "col-xs-6">
				<a href="<?php echo site_url('home/login');?>/" class="text-center">Saya ingin masuk</a><br>
			</div>
			<div class = "col-xs-6">
				 <a href="<?php echo base_url();?>" class="text-right"> Kembali </a>
			</div>
		</div>
		
      </div><!-- /.form-box -->
	
    </div><!-- /.register-box -->

    <?php if($result!=""){?>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Hasil Pencarian</h4>
          </div>
          <div class="modal-body">
            <?php if($result==null){
              echo "<h1 >Data Tidak Ditemukan</h1>";
            }else{?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 5px">No</th>
                  <th>Judul Buku</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th style="width: 10px">Tahun</th>
                  <th style="width: 10px">Stok</th>
                  <th>Detail</th>
				 
                </tr>
              </thead>
              <tbody>
                <?php
                    $no=1;

                    foreach ($result as $m) {
                    $id=$m->id_pelanggan;


                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $m->judul_buku;?></td>
                  <td><?php echo $m->pengarang_buku;?></td>
                  <td><?php echo $m->penerbit_buku;?></td>
                  <td><?php echo $m->tahun_terbit;?></td>
                  <td><?php echo $m->stok_buku;?></td>
                  <td><?php echo anchor ('home/detail?id='.$m->id_pelanggan, "<button type='button' class='btn btn-success' >Detail</button>");?></td>
					
                </tr>
                <?php
                  $no++;

                  };
                ?>

              </tbody>

            </table>
            <?php
                          };
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()?>/assets/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()?>/assets/admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>/assets/admin/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#myModal").modal('show');
      })
      </script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
