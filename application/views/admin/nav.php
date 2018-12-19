<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>

      </div>
    </div>
              <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN MENU</li>
      <li class="treeview">
        <a href="<?php echo site_url('c_admin');?>">
          <i class="fa fa-dashboard"></i> <span>Beranda</span>
        </a>

      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-briefcase"></i>
          <span>Peminjaman</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url('c_admin/pinjam_buku'); ?>">  <i class="fa fa-circle-o"></i>Pinjam Buku</a></li>
          <li><a href="<?php echo site_url('c_admin/daftar_pinjam'); ?>"><i class="fa fa-circle-o"></i>Daftar Pinjam</a></li>
          <li><a href="<?php echo site_url('c_admin/pengembalian_buku'); ?>"><i class="fa fa-circle-o"></i>Pengembalian Buku</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Buku</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url('c_admin/tambah_buku'); ?>">  <i class="fa fa-circle-o"></i>Tambah Buku</a></li>
          <li><a href="<?php echo site_url('c_admin/daftar_buku'); ?>"><i class="fa fa-circle-o"></i>Daftar Buku</a></li>
          <li><a href="<?php echo site_url('c_admin/jenis_buku'); ?>"><i class="fa fa-circle-o"></i>Jenis Buku</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Anggota</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url('c_admin/daftar_anggota'); ?>"><i class="fa fa-circle-o"></i>Daftar Anggota</a></li>
          <li><a href="<?php echo site_url('c_admin/daftar_user'); ?>"><i class="fa fa-circle-o"></i>Daftar User</a></li>
          <li><a href="<?php echo site_url('c_admin/tambah_anggota'); ?>"><i class="fa fa-circle-o"></i>Tambah Anggota</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Laporan</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i>Cetak Daftar Anggota</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Cetak Daftar Buku</a></li>

        </ul>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
