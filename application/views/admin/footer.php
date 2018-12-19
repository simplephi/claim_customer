<footer class="main-footer">
    <div class="pull-right hidden-xs">

    </div>
    <strong>Sistem Pengolahan Data Pelanggan</strong> Telkom Kendari
</footer>

<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
<!-- jQuery 2.1.4 -->

    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url()?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- select2 -->
    <script src="<?php echo base_url()?>assets/admin/plugins/select2/select2.full.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()?>assets/admin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()?>assets/admin/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()?>assets/admin/dist/js/demo.js"></script>
    <!-- page script -->

    <script>
      $(function () {
        $(".select2").select2();
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
