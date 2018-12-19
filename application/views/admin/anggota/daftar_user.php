<section class="content-header">
        <h1>
          <i class="fa fa-user"></i> User
          <small>Daftar User</small>
        </h1>
        <ol class="breadcrumb">
          <li class="active"><img src = "<?php echo base_url();?>/assets/telkom.jpg" width="150" height="70"></li>
        </ol>
      </section>

<section class="content">
<div class="row">
  <div class="col-sm-1">
    <div class="box">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah User</button>

 <!-- Modal -->
         <div class="modal fade" id="myModal" role="dialog">
           <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Input User Baru</h4>
               </div>
               <div class="modal-body">
                 <?php
                  echo form_open_multipart("c_user/input");
                  ?>

                     <div class="box-body">
                       <div class="form-group">
                         <label for="jenis">Username</label>
                         <input type="text" class="form-control" id="jenis" placeholder="username" name="username" required="required">
                       </div>
                       <div class="form-group">
                         <label for="password">password</label>
                         <input type="password" class="form-control" id="password" placeholder="password" name="password" required="required">
                       </div>
                       <div class="form-group">
                         <label for="nama_user">Nama User</label>
                         <input type="text" class="form-control" id="nama_user" placeholder="Nama User" name="nama_user" required="required">
                       </div>
                       <div class="form-group  ">
                         <label for="level">Level</level>
                         <select class="form-control" id="level" name="level" required="required">
                             <option value="">Level</option>
                             <option value="member">Member</option>
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
    </div>
  </div>
  <div class="col-md-12">
    <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tabel User</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>username</th>
                <th>password</th>
                <th>Nama User</th>
                <th>level</th>
                <th>action</th>

              </tr>
              </thead>
              <tbody>
                <?php
                    $no=1;
                    foreach ($daftar_user as $m) {
				$id=$m->id_user;

                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $m->username;?></td>
                  <td><?php echo md5("$m->password");?></td> 
                  <td><?php echo $m->nama_user;?></td>
                  <td><?php echo $m->level;?></td>
                  <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $id;?>"><i class="fa fa-trash"></i>Delete</button>
                                    <?php  include('delete_user_modal.php'); ?>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $no;?>"><i class="fa fa-edit"></i>Edit</button>
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
              foreach ($daftar_user as $m) {
                ?>
                <div class="modal fade" id="edit<?php echo $no?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                      </div>
                      <div class="modal-body">
                        <?php
                            echo form_open_multipart("c_user/edit");

                          ?>

                            <div class="box-body">
                              <div class="form-group">
                                <label for="jenis">Username</label>
                                <input type="text" class="form-control" id="jenis" placeholder="username" name="username" value="<?php echo $m->username?>" required="required">
                              </div>
                              <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control" id="password" placeholder="password" name="password" value="" required="required">
                              </div>
                              <div class="form-group">
                                <label for="rak">Nama</label>
                                <input type="text" class="form-control" id="rak" placeholder="Nama User" name="nama_user" value="<?php echo $m->nama_user?>" required="required">
                              </div>
                              <div class="form-group  ">
                                <label for="level">Level</level>
                                <select class="form-control" id="level" name="level">
                                    <option value="">Level</option>
                                    <option value="member"
                                    <?php
                                      if($m->level=="member")
                                        {
                                          echo "selected=\"selected\"";
                                        }
                                    ?>
                                    >Member</option>
                                    <option value="admin"
                                    <?php
                                      if($m->level=="admin")
                                        {
                                          echo "selected=\"selected\"";
                                        }
                                    ?>
                                    >Admin</option>
                                </select>
                              </div>
                            </div><!-- /.box-body -->
                            <input type="hidden" name="id_user" <?php echo "value=\"".$m->id_user."\"";?>>
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

            <?php
            $no++;
            };
          ?>
        </div><!-- /.box -->
  </div>

</div>
</section>
