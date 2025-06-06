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
                  <th>Tunjangan</th>
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
                  <td>Rp. <?= esc(number_format($value['tunjangan'], 0)) ?></td>
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


                  <!-- Modal Add Data -->
        <div class="modal fade" id="add-data" tabindex="-1" aria-hidden="true" aria-labelledby="addDataLabel" role="dialog">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content shadow-sm border-0 rounded">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addDataLabel">Tambah Data <?= esc($subjudul) ?></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <?= form_open_multipart('Pegawai/InsertData', ['class' => 'needs-validation', 'novalidate' => true]) ?>
              <div class="modal-body">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="NIP" class="form-label">NIP Pegawai</label>
                    <input type="text" name="NIP" id="NIP" class="form-control" value="<?= old('NIP') ?>" placeholder="NIP Pegawai" required>
                    <div class="invalid-feedback">NIP wajib diisi dan harus unik.</div>
                  </div>
                  <div class="col-md-6">
                    <label for="NIK" class="form-label">NIK Pegawai</label>
                    <input type="text" name="NIK" id="NIK" class="form-control" value="<?= old('NIK') ?>" placeholder="NIK Pegawai" required>
                    <div class="invalid-feedback">NIK wajib diisi.</div>
                  </div>
                </div>

                <div class="mt-3">
                  <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                  <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" value="<?= old('nama_pegawai') ?>" placeholder="Nama Pegawai" required>
                  <div class="invalid-feedback">Nama Pegawai wajib diisi.</div>
                </div>

                <div class="mt-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <textarea name="alamat" id="alamat" rows="2" class="form-control" placeholder="Alamat" required><?= old('alamat') ?></textarea>
                  <div class="invalid-feedback">Alamat wajib diisi.</div>
                </div>

                <div class="row g-3 mt-3">
                  <div class="col-md-6">
                    <label for="no_hp" class="form-label">No Handphone</label>
                    <input type="tel" name="no_hp" id="no_hp" class="form-control" value="<?= old('no_hp') ?>" placeholder="No HP" required>
                    <div class="invalid-feedback">No HP wajib diisi.</div>
                  </div>
                  <div class="col-md-6">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= old('tanggal_lahir') ?>" required>
                    <div class="invalid-feedback">Tanggal Lahir wajib diisi.</div>
                  </div>
                </div>

                <div class="mt-3">
                <label for="berkas" class="form-label">Upload Dokumen (PDF)</label>
                <input 
                  type="file" 
                  name="berkas" 
                  id="berkas" 
                  class="form-control" 
                  accept="application/pdf" 
                  required
                >
                <small class="text-muted">Hanya file PDF yang diizinkan, ukuran minimal 10KB dan maksimal 2MB.</small>
                <div class="invalid-feedback">File PDF wajib diupload dan harus sesuai ukuran.</div>
              </div>

              <script>
                document.getElementById('berkas').addEventListener('change', function() {
                  const file = this.files[0];
                  const maxSize = 200 * 1024; // 200KB
                  const minSize = 10 * 1024; // 10KB

                  if (!file) return;

                  if (file.type !== 'application/pdf') {
                    this.classList.add('is-invalid');
                    this.value = '';
                    alert('File harus berformat PDF!');
                    return;
                  }

                  if (file.size > maxSize) {
                    this.classList.add('is-invalid');
                    this.value = '';
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    return;
                  } 

                  if (file.size < minSize) {
                    this.classList.add('is-invalid');
                    this.value = '';
                    alert('Ukuran file terlalu kecil. Minimal 10KB.');
                    return;
                  }

                  this.classList.remove('is-invalid'); // valid file
                });
              </script>

                <div class="row g-3 mt-3">
                  <div class="col-md-6">
                    <label for="gaji" class="form-label">Gaji Pegawai</label>
                    <div class="input-group">
                      <span class="input-group-text">Rp.</span>
                      <input type="number" name="gaji" id="gaji" class="form-control" value="<?= old('gaji') ?>" placeholder="Gaji Pegawai" required min="0" step="1000">
                      <div class="invalid-feedback">Gaji wajib diisi dan harus angka positif.</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="tunjangan" class="form-label">Tunjangan Pegawai</label>
                    <div class="input-group">
                      <span class="input-group-text">Rp.</span>
                      <input type="number" name="tunjangan" id="tunjangan" class="form-control" value="<?= old('tunjangan') ?>" placeholder="Tunjangan Pegawai" required min="0" step="1000">
                      <div class="invalid-feedback">Tunjangan wajib diisi dan harus angka positif.</div>
                    </div>
                  </div>
                </div>

                <div class="row g-5 mt-3">
                  <div class="col-md-6">
                    <label for="id_unit_kerja" class="form-label">Nama Unit Kerja</label>
                    <select name="id_unit_kerja" id="id_unit_kerja" class="form-select" required>
                      <option value="">-- Pilih Unit Kerja --</option>
                      <?php foreach ($unitkerja as $value): ?>
                        <option value="<?= $value['id_unit_kerja'] ?>"><?= esc($value['nama_unit_kerja']) ?></option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Unit Kerja wajib dipilih.</div>
                  </div>
                  <div class="col-md-6">
                    <label for="id_posisi" class="form-label">Nama Posisi</label>
                    <select name="id_posisi" id="id_posisi" class="form-select" required>
                      <option value="">-- Pilih Posisi --</option>
                      <?php foreach ($posisi as $value): ?>
                        <option value="<?= $value['id_posisi'] ?>"><?= esc($value['nama_posisi']) ?></option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Posisi wajib dipilih.</div>
                  </div>
                </div>
              </div>

              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary fw-bold">Simpan</button>
              </div>
              <?= form_close() ?>
            </div>
          </div>
        </div>

        <!-- Optional: Bootstrap 5 Validation Script -->
        <script>
        (() => {
          'use strict'
          const forms = document.querySelectorAll('.needs-validation')
          Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }
              form.classList.add('was-validated')
            }, false)
          })
        })();
        </script>


<!-- /.Modal Edit Data -->
    <?php foreach ($pegawai as $key => $value){ ?>
          
          <div class="modal fade" id="edit-data<?= $value['id_pegawai'] ?>" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Pegawai <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Pegawai/UpdateData/'.$value['id_pegawai']) ?>
            <div class="modal-body">
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <label for="">NIP Pegawai</label>
                <input name="NIP"  value="<?= $value['NIP'] ?>" class="form-control" placeholder="NIP Pegawai" readonly>
              </div>  
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label for="">NIK Pegawai</label>
                <input name="NIK"  value="<?= $value['NIK'] ?>" class="form-control" placeholder="NIK Pegawai" required>
              </div> 
              </div>
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
              <label for="">Tunjangan Pegawai</label>
              <input name="tunjangan"  value="<?= $value['tunjangan'] ?>" class="form-control" placeholder="Tunjangan Pegawai" required>
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
        <script>
        document.getElementById('berkas').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const fileType = file.type;
                if (fileType !== 'application/pdf') {
                    alert('Tolong pilih file PDF!');
                    this.value = ''; // kosongkan input file
                }
            }
        });
        </script>