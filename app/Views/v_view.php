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
                 
                  
                  <p>NIP Pegawai : <?= esc($pegawai['NIP']) ?></p><tr>
                  <p>NIK Pegawai : <?php
                      $nik = $pegawai['NIK'];
                      $start_visible = 4;
                      $end_visible = 4;
                      $masked_length = strlen($nik) - ($start_visible + $end_visible);
                      $masked = substr($nik, 0, $start_visible) . str_repeat('*', $masked_length) . substr($nik, -$end_visible);
                      echo esc($masked); ?></p><tr>
                  <p>Nama Pegawai : <?= esc($pegawai['nama_pegawai']) ?></p>
                  <p>Nama Unit kerja : <?= $pegawai['nama_unit_kerja'] ?></p>
                  <p>Nama Posisi : <?= $pegawai['nama_posisi'] ?></p>
                  <p>No Handphone : <?= esc($pegawai['no_hp']) ?></p>
                  <p>Alamat : <?= esc($pegawai['alamat']) ?></p>
                  <p>Tanggal Lahir : <?= esc(date('d-m-Y', strtotime($pegawai['tanggal_lahir']))) ?></p>
                  <p>Gaji : Rp. <?= esc(number_format($pegawai['gaji'], 0)) ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>