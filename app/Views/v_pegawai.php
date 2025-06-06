<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                <div class="card-tools">
                 <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"> Add Data</i>
                 </button>
                <button type="button" class="btn btn-tool" onclick="window.location.href='Pegawai/excel'">
                <i class="fa fa-file-excel"> Export Excel</i> </button>


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
                  <th>NIP Pegawai</th>
                  <th>NIK Pegawai</th>
                  <th>Nama Pegawai</th>
                  <th>Nama Unit kerja</th>
                  <th>Nama Posisi</th>
                  <th>No Handphone</th>
                  <th>Alamat</th>
                  <th>Tanggal Lahir</th>
                  <th>Gaji</th>
                  <th width="100px">Aksi</th>
                </tr>
                  </thead>
                <tbody>
                <?php $no=1;
                foreach ($pegawai as $key => $value){ ?>
                <tr>
                <td class="text-center"><?= $no++ ?></td>
                  <td class="text-center"><?= esc($value['NIP']) ?></td>
                <td class="text-center">
                  <?php
                      $nik = $value['NIK'];
                      $start_visible = 4;
                      $end_visible = 4;
                      $masked_length = strlen($nik) - ($start_visible + $end_visible);
                      $masked = substr($nik, 0, $start_visible) . str_repeat('*', $masked_length) . substr($nik, -$end_visible);
                      echo esc($masked);
                  ?>
                </td>
                  <td class="text-left"> <?= esc($value['nama_pegawai']) ?></td>
                  <td class="text-center"><?= esc($value['nama_unit_kerja']) ?></td>
                  <td class="text-center"><?= esc($value['nama_posisi']) ?></td>
                  <td class="text-center"><?= esc($value['no_hp']) ?></td>
                  <td class="text-center"><?= esc($value['alamat']) ?></td>
                  <td class="text-center"><?= esc(date('d-m-Y', strtotime($value['tanggal_lahir']))) ?></td>
                  <td>Rp. <?= esc(number_format($value['gaji'], 0)) ?></td>
                  <td class="text-center">
                    <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_pegawai']?>"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value['id_pegawai']?>"><i class="fas fa-trash"></i></button>
                    <button class="btn btn-primary btn-sm btn-flat" 
                        onclick="window.location.href='View/index/<?= $value['id_pegawai'] ?>'">
                        <i class="fas fa-plus"></i>
                    </button>
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
          <div class="modal fade" id="add-data" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Pegawai/InsertData') ?>
            <div class="modal-body">
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <label for="">NIP Pegawai</label>
                <input name="NIP" class="form-control" value="<?= old('NIP')?>" placeholder="NIP Pegawai" required>
              </div> 
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label for="">NIK Pegawai</label>
                <input name="NIK" class="form-control" value="<?= old('NIK')?>" placeholder="NIK Pegawai" required>
              </div>
              </div>
              </div>
              <div class="form-group">
                <label for="">Nama Pegawai</label>
                <input name="nama_pegawai" class="form-control" value="<?= old('nama_pegawai')?>" placeholder="Nama Pegawai" required>
              </div> 
              <div class="form-group">
              <label for="">Alamat</label>
                <input name="alamat" class="form-control" value="<?= old('alamat')?>" placeholder="Alamat" required>
              </div>               
              <div class="form-group">
              <label for="">No Handphone</label>
                <input name="no_hp" class="form-control" value="<?= old('no_hp')?>" placeholder="No HP" required>
              </div>
              <div class="form-group">
              <label for="">Tanggal Lahir</label>
                <input name="tanggal_lahir" type="date" class="form-control" value="<?= old('tanggal_lahir')?>" placeholder="Tanggal Lahir" required>
              </div>
              <div class="form-group"> 
              <label for="">Gaji Pegawai</label>
              <div class="input-group mb-3"> 
              <div class="input-group-prepend"> 
                <span class="input-group-text">Rp.</span>
              </div>
                <input name="gaji"  id="gaji" class="form-control" value="<?= old('gaji')?>" placeholder="Gaji Pegawai" required>
              </div>
              </div> 

            <div class="form-group"> 
              <label for="">Nama Unit Kerja</label>
              <select name="id_unit_kerja" class="form-control">
                <option value="">--Pilih Unit Kerja--</option>
                <?php foreach ($unitkerja as $key => $value) { ?>
                  <option value="<?= $value['id_unit_kerja']?>"><?= $value['nama_unit_kerja'] ?></option>
                  <?php }?>
             </select>
              </div> 
              <div class="form-group"> 
              <label for="">Nama Posisi</label>
              <select name="id_posisi" class="form-control">
                <option value="">--Pilih Posisi--</option>
                <?php foreach ($posisi as $key => $value) { ?>
                  <option value="<?= $value['id_posisi']?>"><?= $value['nama_posisi'] ?></option>
                  <?php }?>
             </select>
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat">Save</button>
            </div>
           </div>
            <?php echo form_close()?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!-- /.Modal Edit Data -->
    <?php foreach ($pegawai as $key => $value){ ?>
          
          <div class="modal fade" id="edit-data<?= $value['id_pegawai'] ?>">
          <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Pegawai/UpdateData/'.$value['id_pegawai']) ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="">NIP Pegawai</label>
                <input name="NIP"  value="<?= $value['NIP'] ?>" class="form-control" placeholder="NIP Pegawai" readonly>
              </div>  
              <div class="form-group">
              <label for="">NIK Pegawai</label>
                <input name="NIK"  value="<?= $value['NIK'] ?>" class="form-control" placeholder="NIK Pegawai" required>
              </div> 
              <div class="form-group">
              <label for="">Nama Pegawai</label>
                <input name="nama_pegawai"  value="<?= $value['nama_pegawai'] ?>" class="form-control" placeholder="Nama Pegawai" required>
              </div> 
              <div class="form-group">
              <label for="">Alamat</label>
              <input name="alamat"  value="<?= $value['alamat'] ?>" class="form-control" placeholder="Alamat Pegawai" required>
              </div> 
              <div class="form-group">
              <label for="">No Handphone</label>
              <input name="no_hp"  value="<?= $value['no_hp'] ?>" class="form-control" placeholder="No Handphone" required>
              </div>
              <div class="form-group">
              <label for="">Tanggal Lahir</label>
              <input name="tanggal_lahir"  value="<?= $value['tanggal_lahir'] ?>" class="form-control" placeholder="Tanggal Lahir" required>
              </div> 
              <div class="form-group">
              <label for="">Gaji Pegawai</label>
              <input name="gaji"  value="<?= $value['gaji'] ?>" class="form-control" placeholder="gaji Pegawai" required>
              </div> 
              <div class="form-group"> 
              <label for="">Nama Unit Kerja</label>
              <select name="id_unit_kerja" class="form-control">
                <option value="">--Pilih Unit Kerja--</option>
                <?php foreach ($unitkerja as $key => $kate) { ?>
                  <option value="<?= $kate['id_unit_kerja']?>" <?= $value['id_unit_kerja'] == $kate['id_unit_kerja'] ? 'Selected' : ''?>><?= $kate['nama_unit_kerja'] ?></option>
                  <?php }?>
             </select>
              </div> 
              <div class="form-group"> 
              <label for="">Nama Posisi</label>
              <select name="id_posisi" class="form-control">
                <option value="">--Pilih posisi--</option>
                <?php foreach ($posisi as $key => $s) { ?>
                  <option value="<?= $s['id_posisi']?>" <?= $value['id_posisi'] == $s['id_posisi'] ? 'Selected' : ''?>><?= $s['nama_posisi'] ?></option>
                  <?php }?>
             </select>
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
      </div>
      <!-- /.modal -->
     <?php }     ?>

     

     <!-- /.Modal Delete Data -->
     <?php foreach ($pegawai as $key => $value){ ?>
          
          <div class="modal fade" id="delete-data<?= $value['id_pegawai'] ?>">
          <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
             Apakah Anda yakin hapus <b><?= $value['nama_pegawai']?></b>. ?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <a href="<?= base_url('Pegawai/DeleteData/'.$value['id_pegawai']) ?>" type="submit" class="btn btn-danger btn-flat">Delete</a>
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
      
      
            // Initialization
        new AutoNumeric('#harga_beli', {
        currencySymbol : '',
        decimalCharacter : ',',
        digitGroupSeparator : '.',
        }); 
        new AutoNumeric('#harga_jual', {
        currencySymbol : '',
        decimalCharacter : ',',
        digitGroupSeparator : '.',
        });
        
        
          });


        </script>