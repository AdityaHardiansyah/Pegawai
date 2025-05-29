
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">

  <!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('AdminLTE') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('AdminLTE') ?>/dist/js/demo.js"></script>

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
               <span class="brand-text font-weight-light"><i class="fas fa-shopping-cart text-primary"></i><b> Transaksi Penjualan</b></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">

        
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
       
        
        <li class="nav-item">
          <?php if(session()->get('level') == '1'){ ?>
            <a class="nav-link" href="<?= base_url('Admin')?>"> 
            <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
          <?php } else { ?>
          <a class="nav-link" href="<?= base_url('Home/Logout')?>"> 
            <i class="fas fa-sign-in-alt"></i> Logout
            </a>
          <?php } ?>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <div class="content">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-7">
              <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0"></h5>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-3">
                    <div class="form-group">
                        <label>No Faktur</label>
                        <label class="form-control form-control-lg"><?= $no_faktur ?></label>
                    </div>
                    </div>

                    <div class="col-3">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <label class="form-control form-control-lg"><?= date('d M Y')?></label>
                    </div>
                    </div>

                    <div class="col-3">
                    <div class="form-group">
                        <label>Jam</label>
                        <label class="form-control form-control-lg"><?= date('13:00:00')?></label>
                    </div>
                    </div>

                    <div class="col-3">
                    <div class="form-group">
                        <label>Kasir</label>
                        <label class="form-control form-control-lg"><?= session()->get('nama_user')?></label>
                    </div>
                    </div>
                </div>

                
                
              </div>
            </div>
          </div>
          <div class="col-lg-5">
              <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0"></h5>
              </div>
              <div class="card-body text-right">
              <label class="display-4  text-green">Rp.150.000</label>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
              <div class="card card-primary card-outline">
              <div class="card-body">
              <div class="row">
               <?php echo form_open() ?>
                    <div class="col-12">
                    <div class="row">

                        <div class="col-2 input-group">
                            <input id="kode_produk" name="kode_produk"  class="form-control" placeholder="Barcode/Kode Produk" autocomplete="off">
                            <span class="input-group-append">
                                <button class=" btn btn-primary btn-flat">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class=" btn btn-danger btn-flat">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </div>
                        <div class="col-3">
                            <input name="nama_produk" class="form-control" placeholder="Nama Produk" readonly>
                        </div>
                        <div class="col-1">
                            <input name="nama_kategori" class="form-control" placeholder="Kategori" readonly>
                        </div>
                        <div class="col-1">
                            <input name="nama_satuan" class="form-control" placeholder="Satuan" readonly>
                        </div>
                        <div class="col-1">
                            <input name="harga_jual" class="form-control" placeholder="Harga" readonly>
                        </div>
                        <div class="col-1">
                            <input id="qty" type="number" min="1" value="1" name="qty" class="form-control text-center" placeholder="QTY">
                        </div>
                        <div class="col-3">
                        <button type="submit" class=" btn btn-primary btn-flat"><i class="fas fa-cart-plus"> Tambah</i></button>
                        <button type="reset" class=" btn btn-warning btn-flat"><i class="fas fa-sync"></i> Clear</button>
                        <button class=" btn btn-success btn-flat"><i class="fas fa-cash-register"></i> Pembayaran</button>
                    
                      </div>
                      <?php echo form_close() ?>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                <th>kode/Barcode</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga Jual</th>
                                <th width="100px">Qty</th>
                                <th>Total harga</th> 
                                <th></th> 
                                </tr>                 
                            </thead>
                            <tbody>
                                <tr>
                                <td>1111</td>
                                <td>Sari Roti</td>
                                <td>Makanan</td>
                                <td class="text-right">Rp. 15.000</td>
                                <td class="text-right"> 2 PCS</td>
                                <td class="text-right">Rp. 30.000</td> 
                                <td class="text-center">
                                    <a class="btn btn-flat btn-danger btn-sm"><i class="fa fa-times"></i></a>
                                </td> 
                                </tr>   
                           </tbody>
                        </table>
                    </div>    
                </div> 
                </div>
             </div> 
             </div> 
             <div class="col-lg-12">
              <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0"></h5>
              </div>
              <div class="card-body color-parlete text-center">
              <h1 class="text-warning"><b>Sertus Lima Puluh Ribu Rupiah</b></h1>
              </div>
            </div>
          </div>
             </div>
              </div>
              </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script>
  $(document).ready(function() {
      $('#kode_produk').focus();
      $('#kode_produk').keydown(function(e){
        let kode_produk = $('#kode_produk').val();
          if (e.keyCode == 13){
            e.preventDefault();
            if (kode_produk.length == 0){
              Swal.fire("Produk Kosong!");
            }else {
                CekProduk();
            }
          }
      }
    );
  });

  function CekProduk(){
      $.ajax({
        type: "POST",
        url: "<?= base_url('Penjualan/CekProduk') ?>",
        data: {
          kode_produk: $('#kode_produk').val(),
        },
        dataType: "JSON",
        success: function (response) {
          if (response.nama_produk == '') {
            Swal.fire("Kode Produk tidak terdaftar di database");
          } else {
            $('[name="nama_produk"]').val(response.nama_produk);
            $('[name="nama_kategori"]').val(response.nama_kategori);
            $('[name="nama_satuan"]').val(response.nama_satuan);
            $('[name="harga_jual"]').val(response.harga_jual);
            $('#qty').focus();
          }
        }
      });
  }
</script>

</body>
</html>
