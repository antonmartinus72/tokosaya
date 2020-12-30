<?php
require "function.php";
$tabelorder = query("SELECT * FROM tborder");
// $tabelorderdetail = query("SELECT * FROM tborderdetail");

// var_dump($tabelorderdetail);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>


  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="css/simple-sidebar.css">
  

  <!-- Bootstrap base -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Datatables Bootstrap4 version-->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

  
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading blues bg-primary text-white">Toko Saya</div>
      <div style="" class="list-group list-group-flush">
        <a href="margin#" class="list-group-item list-group-item-action bg-dark text-white">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white" >Shortcuts</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div style="" id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

        <div class="container-fluid">
            <h1 class="mt-4">Toko saya (Riwayat Transaksi)</h1>
            <table id="dataTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr role="row">
                            <th>#</th>
                            <th>ID Order</th>
                            <th>Total Barang</th>
                            <th>Tagihan</th>
                            <th>Tunai</th>
                            <th>Kembalian</th>
                            <th>Tanggal</th>
                            <th>Opsi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>ID Order</th>
                        <th>Total Barang</th>
                        <th>Tagihan</th>
                        <th>Tunai</th>
                        <th>Kembalian</th>
                        <th>Tanggal</th>
                        <th>Opsi</th>
                    </tr>
                </tfoot>
                <tbody>

                <?php 
                  $i = 1;
                ?>
                <?php foreach($tabelorder as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["id_order"]; ?></td>
                        <td><?= $row["total_item"]; ?></td>
                        <td><?= $row["tagihan"]; ?></td>
                        <td><?= $row["tunai"]; ?></td>
                        <td><?= $row["kembalian"]; ?></td>
                        <td><?= $row["tgl_transaksi"]; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="informasi_pembayaran_detail.php?id_order=<?= $row["id_order"]; ?>" type="button" class="btn btn-primary">Detail</a>
                                <!-- <button type="button" class="btn btn-primary">Detail</button> -->
                                <button type="button" class="btn btn-warning">Cetak</button>
                            </div>
                        </td>
                    </tr>
                    <?php 
                    $i++; 
                    ?>
                    
                <?php endforeach; ?>
                
            </tbody>
          </table>

        </div>

    </div>
  </div>


  <!-- Bootstrap 4 -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  
  <!-- SweetAlert2 -->
  <script src="js/sweetalert2.min.js"></script>

  <!-- datatables -->
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    } );
  </script>

</body>

</html>
