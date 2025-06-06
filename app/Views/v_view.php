<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                <div class="card-tools">
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                
                <?php
                if (session()->getFlashdata('pesan')){
                  echo'<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                  echo session()->getFlashdata('pesan');
                  echo'</h5></div>';
                }
                ?>
            <div class="card">
              <div class="card-header bg-primary text-white">
                <strong>Detail Pegawai</strong>
              </div>

              <div class="card-body">
                <?php 
                  $gaji = $pegawai['gaji'];
                  $tunjangan = $pegawai['tunjangan'];
                  $total = $gaji + $tunjangan;

                  // Masking NIK
                  $nik = $pegawai['NIK'];
                  $start_visible = 4;
                  $end_visible = 4;
                  $masked_length = strlen($nik) - ($start_visible + $end_visible);
                  $masked = substr($nik, 0, $start_visible) . str_repeat('*', $masked_length) . substr($nik, -$end_visible);
                ?>
                <table class="table table-bordered table-striped mb-0">
                  <tbody>
                    <tr>
                      <th scope="row">NIP Pegawai</th>
                      <td><?= esc($pegawai['NIP']) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">NIK Pegawai</th>
                      <td><?= esc($masked) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Nama Pegawai</th>
                      <td><?= esc($pegawai['nama_pegawai']) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Unit Kerja</th>
                      <td><?= esc($pegawai['nama_unit_kerja']) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Posisi</th>
                      <td><?= esc($pegawai['nama_posisi']) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">No Handphone</th>
                      <td><?= esc($pegawai['no_hp']) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Alamat</th>
                      <td><?= esc($pegawai['alamat']) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Tanggal Lahir</th>
                      <td><?= esc(date('d-m-Y', strtotime($pegawai['tanggal_lahir']))) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Gaji</th>
                      <td>Rp. <?= number_format($gaji, 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Tunjangan</th>
                      <td>Rp. <?= number_format($tunjangan, 0, ',', '.') ?></td>
                    </tr>
                    <tr class="table-success">
                      <th scope="row"><strong>Total Penghasilan</strong></th>
                      <td><strong>Rp. <?= number_format($total, 0, ',', '.') ?></strong></td>
                    </tr>
                    <tr class="table">
                    <td colspan="2">
                    <?php if (!empty($pegawai['berkas']) && file_exists(FCPATH . $pegawai['berkas'])) : ?>
                      <h5>Dokumen PDF Pegawai</h5>
                      <iframe 
                          src="<?= base_url($pegawai['berkas']) ?>" 
                          width="100%" 
                          height="600px" 
                          style="border: 1px solid #ccc;">
                      </iframe>
                  <?php else: ?>
                      <p><em>Dokumen PDF belum tersedia atau tidak ditemukan.</em></p>
                  <?php endif; ?>
                    </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>