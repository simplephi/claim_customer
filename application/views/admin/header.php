<header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="<?php echo site_url('admin')?>" class="navbar-brand"><i class="fa fa-home"></i><b>Telkom Kendari </b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
               
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-book"></i> Pelanggan  </span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url('admin/daftar_buku'); ?>"><i class="fa fa-clipboard"></i> Pengaduan </a></li>
                    <li><a href="<?php echo site_url('admin/daftar_acara'); ?>"><i class="fa fa-clipboard"></i> Klaim Tagihan </a></li>
					<li class="divider"></li>
                    <li><a href="<?php echo site_url('admin/jenis_buku'); ?>"><i class="fa fa-table"></i> Segmentasi</a></li>
                  </ul>
                </li>

                <li class=""><a href="<?php echo site_url('admin/daftar_user'); ?>"><i class="fa fa-user"></i> Pengguna </a></li>
                
                <li class="dropdown">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-clipboard"></i> Laporan  </span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url('admin/report_buku'); ?>"><i class="fa fa-book"></i> Pengaduan </a></li>
                    <li><a href="<?php echo site_url('admin/report_anggota'); ?>"><i class="fa fa-user"></i> Klaim Tagihan </a></li>
                    
                  </ul>
                </li>
              </ul>

            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                    <li class="">
                      <a href="<?php echo site_url('admin/logout'); ?>"><i class="fa  fa-sign-out"></i> Keluar </a>
                      </li>
                    <li class="">

                      </li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
