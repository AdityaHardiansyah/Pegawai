<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pegawai.xls");
?>

<html>
<body>
    <h2>Daftar Pegawai</h2>
              <table border="1">
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
                </tr>
                  </thead>
                <tbody>
                <?php $no=1;
                foreach ($pegawai as $key => $value){ ?>
                <tr>
                <td class="text-center"><?= $no++ ?></td>
                  <td class="text-center">'<?= $value['NIP'] ?></td>
                  <td class="text-center">'<?= esc(substr($value['NIK'], 0, 16)) ?></td>
                  <td class="text-left"> <?= $value['nama_pegawai'] ?></td>
                  <td class="text-center"><?= $value['nama_unit_kerja'] ?></td>
                  <td class="text-center"><?= $value['nama_posisi'] ?></td>
                  <td class="text-center"><?= $value['no_hp'] ?></td>
                  <td class="text-center"><?= $value['alamat'] ?></td>
                  <td class="text-center"><?= date('d-m-Y', strtotime($value['tanggal_lahir'])) ?></td>
                  <td>Rp. <?= number_format($value['gaji'], 0) ?></td>
                  
                </tr>
                <?php  }?>
                </tbody>
                


                </table>
</body>
</html>
