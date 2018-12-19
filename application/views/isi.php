<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Top Navigation</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="../../index2.html" class="navbar-brand"><b>Admin</b>LTE</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="<?php echo site_url('home/cari')?>" > Close </a>
                  </li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->

          <!-- Main content -->
          <section class="content">
		   
             <?php

                    echo form_open_multipart("c_buku/input", "role=form");

                  ?>

                   <div class="box-body">
                     <div class="form-group">
                       <label for="isbn">Nama Pengadu</label>
                       <input type="text" class="form-control" id="isbn" placeholder="ISBN / ISSN" name="isbn">
                       <label for="judul">Alamat Pengadu</label>
                       <input type="text" class="form-control" id="judul" placeholder="Judul Buku" name="judul_buku">
                       <label for="pengarang">Nama Langganan</label>
                       <input type="text" class="form-control" id="pengarang" placeholder="Pengarang" name="pengarang_buku">
                     </div>
                      
                     <div class="form-group">
                       <label for="kolasi">Alamat Pesawat</label>
                       <input type="text" class="form-control" id="kolasi" placeholder="Kolasi" name="kolasi">

                     </div>
                     <div class="form-group">
                       <label for="penerbit">Nomor Telepon</label>
                       <input type="text" class="form-control" id="penerbit" placeholder="Penerbit" name="penerbit_buku">

                     </div>
                     <div class="form-group">
                       <label for="bahasa">Segmentasi</label>
                       <input type="text" class="form-control" id="bahasa" placeholder="Bahasa" name="bahasa">

                     </div>


                     <div class="form-group">
                       <label for="deskripsi">Status Pengadu</label>
                       <textarea class="form-control" id="deskripsi" placeholder="Deskripsi" name="deskripsi"></textarea>

                     </div>
					 
                     <div class="form-group">
                       <label for="bahasa">Pengaduan Tagihan Bulan </label>
                       <input type="text" class="form-control" id="bahasa" placeholder="Bahasa" name="bahasa">

                     </div>
					 
					 <div class="form-group">
                       <label for="bahasa">Segmentasi</label>
                       <input type="text" class="form-control" id="bahasa" placeholder="Bahasa" name="bahasa">

                     </div>


                   </div><!-- /.box-body -->
                   <input type="hidden" name="id_pelanggan">

                   <div class ="col-lg-12">
					<div class = "row">
						 <div class = "col-lg-6">
								 <button type="submit" class="btn btn-primary">Submit</button>
								 <?php echo form_close();?>
								 
								 <a href="<?php echo base_url();?>" ><button type="button" class="btn btn-danger"> Kembali </button></a>
						 </div>
						
                   </div>
				   </div>
                 
             
          </section><!-- /.content -->
      
     
				 <div class="navbar-custom-menu">
							<ul class="nav navbar-nav">
							  <li class="dropdown user user-menu">
								<!-- Menu Toggle Button -->
								
							  </li>
							</ul>
						  </div><!-- /.navbar-custom-menu -->
	  </div><!-- /.content-wrapper -->
      
 	 

	 
	  <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
          </div>
          <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
  </body>
</html>
