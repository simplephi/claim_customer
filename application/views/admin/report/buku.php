
  <section class="content-header">
          <h1>
            Laporan Pengaduan
	       </h1>
          <ol class="breadcrumb">
            <li class="active"><img src = "<?php echo base_url();?>/assets/telkom.jpg" width="150" height="70"></li>
          </ol>
        </section>
<br>
<br>
<section class="content">
<!-- Modal -->

<div class="row">
  <div class="col-lg-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Cetak Data</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php echo form_open("c_report/report_buku",
                        "class='form-horizontal' row-border")?>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Bulan</label>
                      <div class="col-sm-10">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">
                            <select id="active" class="form-control" name="bulan">

                            <?php
            $jb=array(0=>"","Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
                  "September", "Oktober", "November", "Desember");

            for($i=0;$i<=12;$i++) {
              echo "<option value='$i'/>$jb[$i]</option>";
            }
                            ?>
                          </select>
                            </div>
                        </div>
                    </div>
                  </div>
        <div class="form-group">
                    <label class="col-md-2 control-label">Tahun</label>
                      <div class="col-sm-10">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">
                            <select id="active" class="form-control" name="tahun">
                            <?php
            $jb=array(0=>"","2015", "2016", "2017", "2018", "2019", "2012");

            for($i=0;$i<=6;$i++) {
              echo "<option value='$jb[$i]'/>$jb[$i]</option>";
            }
                            ?>
                          </select>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-info" id="confirm">Cetak</button>
          <button type="reset" class="btn btn-danger" title="Mengembalikan Data">Reset</button>

                    </div>
                  </div>
                <?php form_close()?>

                </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

</div>
</section>
