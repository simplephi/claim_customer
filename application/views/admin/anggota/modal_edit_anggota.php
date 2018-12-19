<div class="modal fade" id="edit<?php echo $id?>" role="dialog">
  <div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Modal Header</h4>
  </div>
  <div class="modal-body">
    <div class="box-body">
        <?php
         echo form_open_multipart("c_anggota/input");
         ?>

          <div class="form-group">
            <label>Nama Anggota</label><br>
            <input type="text" class="form-control"  placeholder="Nama Anggota" name="nama_anggota" required="required"><br>
          </div>
          <div class="form-group">
            <label>NIM/NIP</label><br>
            <input type="text" class="form-control"  placeholder="NIM/NIP" name="nim_nip" required="required"><br>
          </div>
          <div class="form-group">
            <label>Alamat Anggota</label><br>
            <input type="text" class="form-control"  placeholder="Alamat Anggota" name="alamat_anggota" required="required"><br>
          </div>
          <div class="form-group">
            <label>Telepon</label><br>
            <input type="text" class="form-control"  placeholder="Telepon Anggota" name="telepon_anggota" required="required"><br>
          </div>
          <div class="form-group">
            <label>Email Anggota</label>
            <input type="text" class="form-control"  placeholder="Email Anggota" name="email_anggota" required="required">
          </div>
          <div class="form-group">
            <label>Password Anggota</label>
            <input type="password" class="form-control"  placeholder="Password Anggota" name="password_anggota" required="required">
          </div>
          <div class="form-group  ">
            <label for="status">Status</level>
            <select class="form-control" id="status" name="status" required="required">
                <option value="">Status</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="admin">Admin</option>
            </select>
          </div>
        </div><!-- /.box-body -->

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
