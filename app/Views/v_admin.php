<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><span class="info-box-number"><?= count($pegawai); ?></span></h3>

                <p>Pegawai</p>
              </div>
              <div class="icon">
              <i class="fas fa-boxes"></i>
              </div>
              <a href="Pegawai/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><span class="info-box-number"><?= count($unitkerja); ?></span></h3>

                <p>Unit Kerja</p>
              </div>
              <div class="icon">
              <i class="fas fa-th-list"></i>
              </div>
              <a href="UnitKerja/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><span class="info-box-number"><?= count($posisi); ?></span></h3>

                <p>Posisi</p>
              </div>
              <div class="icon">
              <i class="fas fa-list"></i>
              </div>
              <a href="Posisi/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><span class="info-box-number"><?= count($user); ?></span></h3>

                <p>User</p>
              </div>
              <div class="icon">
              <i class="fas fa-users"></i>
              </div>
              <a href="User/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           
          <div class="col-md-4">

            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-primary">
              <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Pegawai</span>
                <span class="info-box-number"><?= count($pegawai); ?> Pegawai</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </div>

            <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-navy">
              <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Unit Kerja</span>
                <span class="info-box-number"><?= count($unitkerja); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </div>

            <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-olive">
              <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Posisi</span>
                <span class="info-box-number"><?= count($posisi); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </div>


            <div class="col-md-12">
            <canvas id="myChart" width="100%" height="30px"></canvas>
            <script>
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
            </div>

            

