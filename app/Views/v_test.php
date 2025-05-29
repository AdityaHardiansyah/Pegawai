<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"> Add Data</i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                if (session()->getFlashdata('pesan')){
                  echo'<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                  echo session()->getFlashdata('pesan');
                  echo'</h5></div>';
                }
                ?>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                  <th width="50px">No</th>
                  <th>Nama User</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Level</th>
                  <th width="100px">Aksi</th>
                </tr>
                  </thead>
                <tbody>
                <?php $no=1;
                foreach ($user as $key => $value){ ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $value['nama_user'] ?></td>
                  <td><?= $value['email'] ?></td>
                  <td class="text-center"><?= $value['password'] ?></td>
                  <td class="text-center"><?php 
                  if($value['level'] == 1){ ?>
                    <span class="badge bg-success">Admin</span>
                  <?php } else {?>
                    <span class="badge bg-primary">Kasir</span>
                 
                  <?php } ?>
                </td>
                  <td>
                    <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_user']?>"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value['id_user']?>"><i class="fas fa-trash"></i></button>
                  </td>

                </tr>
                <?php  }?>
                </tbody>
                


                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          
           <!-- /.Modal Add Data -->
           <div class="modal fade" id="add-data">
          <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('User/InsertData') ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nama User</label>
                <input name="nama_user" class="form-control" placeholder="Nama User" required>
              </div>  
              <div class="form-group">
                <label for="">Email User</label>
                <input name="email" class="form-control" placeholder="Email User" required>
              </div>  
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password" required
                pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}"
                title="Password minimal 8 karakter, harus mengandung huruf besar, huruf kecil, angka, dan simbol">
            </div>
            <div class="form-group">
          <label for="">Konfirmasi Password</label>
          <input type="password" name="pass_confirm" class="form-control" placeholder="Konfirmasi Password" required
            pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}"
            title="Harus sama dengan password dan memenuhi persyaratan password">
        </div>


              <div class="form-group">
                <label for="">level</label>
                <select name="level" class="form-control">
                    <option value="1" >Admin</option>
                    <option value="2" selected>Kasir</option>
                </select>
              </div>
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat">Save</button>
            </div>
            <?php echo form_close()?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <?php foreach ($user as $key => $value) { ?>
        <div class="modal fade" id="edit-data<?= $value['id_user'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php echo form_open('User/UpdateData/' . $value['id_user']) ?>
              <div class="modal-body">
                <div class="form-group">
                  <label for="">Nama User</label>
                  <input name="nama_user" value="<?= esc($value['nama_user']) ?>" class="form-control" placeholder="Nama User" required>
                </div>  
                <div class="form-group">
                  <label for="">Email</label>
                  <input name="email" value="<?= esc($value['email']) ?>" class="form-control" placeholder="Email" required>
                </div> 
                <div class="form-group">
                  <label for="">Password Baru (kosongkan jika tidak ingin mengubah)</label>
                  <input type="password" name="password" class="form-control" placeholder="Password Baru" 
                  pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}">
                </div> 
                <div class="form-group">
                  <label for="">Konfirmasi Password Baru</label>
                  <input type="password" name="pass_confirm" class="form-control" placeholder="Konfirmasi Password Baru"
                  pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}">
                </div>
                <div class="form-group">
                  <label for="">Level</label>
                  <select name="level" class="form-control">
                    <option value="1" <?= $value['level'] == 1 ? 'selected' : '' ?>>Admin</option>
                    <option value="2" <?= $value['level'] == 2 ? 'selected' : '' ?>>Kasir</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning btn-flat">Update</button>
              </div>
              <?php echo form_close() ?>
            </div>
          </div>
        </div>
      <?php } ?>

          <!-- /.Modal Delete Data -->
          <?php foreach ($user as $key => $value){ ?>
          
          <div class="modal fade" id="delete-data<?= $value['id_user'] ?>">
          <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
             Apakah Anda yakin hapus <b><?= $value['nama_user']?></b> ?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <a href="<?= base_url('User/DeleteData/'.$value['id_user']) ?>" type="submit" class="btn btn-danger btn-flat">Delete</a>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
     <?php }     ?>


      <script>
              
        $(function () {
            $("#example1").DataTable({
            "responsive": true, 
            "lengthChange": true, 
            "autoWidth": false,
            "paging": true,
            "info": true,
            "searching": true,
            "ordering": true,
            //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      
        
          });


        </script>