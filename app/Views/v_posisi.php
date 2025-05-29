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
                  <th>Posisi</th>
                  <th width="100px">Aksi</th>
                </tr>
                  </thead>
                <tbody>
                <?php $no=1;
                foreach ($posisi as $key => $value){ ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $value['nama_posisi'] ?></td>
                  <td>
                    <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_posisi']?>"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value['id_posisi']?>"><i class="fas fa-trash"></i></button>
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
            <?php echo form_open('Posisi/InsertData') ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nama Posisi</label>
                <input name="nama_posisi" class="form-control" placeholder="Posisi" required>
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

      <!-- /.Modal Edit Data -->
      <?php foreach ($posisi as $key => $value){ ?>
          
          <div class="modal fade" id="edit-data<?= $value['id_posisi'] ?>">
          <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Posisi/UpdateData/'.$value['id_posisi']) ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nama Posisi</label>
                <input name="nama_posisi" value="<?= $value['nama_posisi'] ?>" class="form-control" placeholder="Posisi" required>
              </div>  
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-warning btn-flat">Save</button>
            </div>
            <?php echo form_close()?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
     <?php }     ?>

     <!-- /.Modal Delete Data -->
     <?php foreach ($posisi as $key => $value){ ?>
          
          <div class="modal fade" id="delete-data<?= $value['id_posisi'] ?>">
          <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
             Apakah Anda yakin hapus <b><?= $value['nama_posisi']?></b>. ?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <a href="<?= base_url('Posisi/DeleteData/'.$value['id_posisi']) ?>" type="submit" class="btn btn-danger btn-flat">Delete</a>
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