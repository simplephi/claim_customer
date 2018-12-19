<!DOCTYPE HTML>
<html>
<head>
<title>Perpustakaan FT-UHO</title>
<link href="<?php echo base_url()?>assets/home/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url()?>assets/home/js/jquery.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="<?php echo base_url()?>assets/home/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/home/js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		
		<script>
      $(document).ready(function(){
        $("#myModal").modal('show');
      })
      </script>
<!---- start-smoth-scrolling---->
<!-- Custom Theme files -->
<link href="<?php echo base_url()?>assets/home/css/theme-style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<!----font-Awesome----->
<link rel="stylesheet" href="<?php  echo base_url()?>assets/home/fonts/css/font-awesome.min.css">
<!----font-Awesome----->
<!----
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
---->
<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//End-top-nav-script---->
</head>
<body>


		<!----start-container---->
			<!----start-header---->
		<div id="home" class="header ">
			<div class="container">
				<!---- start-logo---->
				<div class="logo">
					<a href="index.html"><img src="<?php echo base_url()?>assets/home/images/logo1.png" title="Mabur" />LOGO IT</a>
				</div>
				<!---- //End-logo---->
				<!----start-top-nav---->
				<nav class="top-nav">
					<ul class="top-nav">
						<li class="page-scroll"><a href="#home" class="scroll">Home</a></li>
						<li class="page-scroll"><a href="#tentang" class="scroll">Tentang</a></li>
						<li class="page-scroll"><a href="#cari" class="scroll">Daftar Buku</a></li>
					</ul>
					<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
				</nav>
				<div class="clearfix"> </div>
				<div class="slide-text text-center">
					<h1>Perpustakaan Teknik Informatika</h1>
					<span>Universitas Halu Oleo</span>
					<br>
					<?php  echo anchor('home/cari', "<button type='button' class='btn btn-primary'>Cari Buku</button>");?>
				</div>
				
				<!----//End-top-nav---->
			</div>
		</div>
		
		<!----//End-header---->
		<!----start-feartures----->
		<div class="work">
			<div class="container">
				<div class="head text-center work-head">
					<h3><span> </span> Sistem Informasi Perpustakaan</h3>
					<p>Sistem Informasi Perpustakaan ini bertujuan mempermudah mahasiswa dan sivitas akademika lainya dalam mendapatkan informasi tentang perpustakaan fakultas</p>
				</div>
				<!---- start-features-grids---->
				<div class="head text-center work-head">

					<div class="col-md-4 features-grid">
						<span class="fea-icon1"><i class="fa fa-thumbs-up"> </i> </span>
						<h3><a href="#">Mudah</a></h3>
						<p>Aplikasi ini mudah digunakan dan memudahhkan dalam pendaataan peminjaam dan pengembalian buku</p>
					</div>
					<div class="col-md-4 features-grid">
						<span class="fea-icon1"><i class="fa fa-tachometer"> </i> </span>
						<h3><a href="#">Cepat</a></h3>
						<p>Memudahkan proses pendaftaran dan pemimjaman dan pengembalian buku</p>
					</div>
					<div class="col-md-4 features-grid">
						<span class="fea-icon1"><i class="fa fa-mobile"> </i> </span>
						<h3><a href="#">Online</a></h3>
						<p>Aplikasi ini mudah diakses menggunakan jaringan internet</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!---- //End-features-grids---->
			</div>
		</div>
		<!----//End-feartures----->
		<!---- start-work---->

		<!---- //End-work---->
		<!----start-portfolio----->
		<div id="cari" class="portfolio portfolio-box">
				<div class="head text-center">
					<h3><span> </span> Daftar Buku</h3>
				</div>
				
				
				
				<div class="col-lg-12">		
						<div class="row">
								<?php foreach ($result as $data) {?>
								
							<div class="col-lg-4" align="center">
								<a href = "<?php echo site_url('home/detail?id='.$data->id_pelanggan);?>"><img src = "<?php echo base_url()."/assets/gambar/".$data->gambar;?>" width = "150" height="100">
								</a>
								
								<br>
								
							</div>
								
								<?php
								}
								?>
											
						</div>
			
				</div>
				
				
				<br>
			<?php echo $links;?>
				
				
		</div>

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
                  <td><?php echo anchor ('home/detail?id='.$m->id_pelanggan, "<button>Detail</button>");?></td>
					
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
		
		
		
		<div class="clearfix"> </div>
		<!----//End-portfolio----->
		<!----start-blog----><!----//End-blog---->
		<!----start-test-monials---->

			<!----//End-testmonial-time-line---->
			<!----start-contact---->

			<!----//End-contact---->
		<!----start-footer---->
		<div class="footer">
			<div class="container">
				<div class="footer-left">

					<p>Sistem Informasi Oleh <a href="#">Teknik Informatika UHO</a></p>
				</div>
				
				
				
				<script type="text/javascript">
				$(document).ready(function() {
					/*
					var defaults = {
			  			containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear'
			 		};
					*/

					$().UItoTop({ easingType: 'easeOutQuart' });

				});
			</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
			</div>
		</div>
		<!----//End-footer---->
		<!----//End-container---->
	</body>
</html>
