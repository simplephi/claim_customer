<div class="content-wrapper">
  <div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <?php
  if($menu=='beranda'){
    include('beranda/index.php');
  }else if ($menu=='tambah_buku'){
    include('buku/tambah_buku.php');
  }else if ($menu=='daftar_buku'){
    include('buku/daftar_buku.php');
  }else if ($menu=='jenis_buku'){
    include('buku/jenis_buku.php');
  }else if ($menu=='daftar_acara'){
    include('buku/daftar_acara.php');
  }else if ($menu=='daftar_anggota'){
    include('anggota/daftar_anggota.php');
  }else if ($menu=='daftar_user'){
    include('anggota/daftar_user.php');
  }else if ($menu=='tambah_anggota'){
    include('anggota/tambah_anggota.php');
  }else if ($menu=='daftar_pinjam'){
    include('peminjaman/daftar_pinjam.php');
  }else if ($menu=='pinjam_buku'){
    include('peminjaman/pinjam_buku.php');
  }else if ($menu=='pengembalian_buku'){
    include('peminjaman/pengembalian_buku.php');
  }else if ($menu=='denda'){
    include('peminjaman/denda.php');
  }else if ($menu=='report_buku'){
    include('report/buku.php');
  }else if ($menu=='report_anggota'){
    include('report/anggota.php');
  }else if ($menu=='report_peminjaman'){
    include('report/peminjaman.php');
  }
  ?>
</div>
</div><!-- /.content-wrapper -->
