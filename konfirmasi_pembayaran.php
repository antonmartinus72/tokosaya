<?php
require "function.php";
$tabeljualan = query("SELECT * FROM tbjual");
session_start(); 
// session_unset();
var_dump($_SESSION);

if(isset($_POST["submitkonfirm_p"])) {
  if ($_POST > 0) {
    header('location: proses_pembayaran.php');
  }else{
    echo "<script>
            alert('Data gagal ditambah!');
            document.location.href = 'admin.php';
          </script>
          ";
  }
  
};

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
        <div class="container m-3 p-2">
          <h2 class="h2">Konfirmasi Pembayaran </h2>
          <?php
            $total_bayar = 0;
            foreach($_SESSION["barang"] as $daftar){
                $total_bayar = $total_bayar + $daftar[5];
            }
          ?>
                <div class="container">
                  <form method="post" action="proses_pembayaran.php">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Nominal Tunai : </span>
                      </div>
                      <input type="hidden" class="form-control" name="tagihan_p" value="<?= $total_bayar; ?>"> 
                      <input type="number" class="form-control" name="tunai_p" placeholder="Masukan Tunai (Rp)" aria-label="Username" aria-describedby="basic-addon1"> 
                    </div>
                    
                    <div class="d-flex">
                      <div class="btn btn-primary mt-1 mr-2">Total Tagihan : Rp.<?= $total_bayar; ?></div>
                      <button class="btn btn-warning mt-1" type="submit" name="submitkonfirm_p" id="submit">Konfirmasi Pembayaran</button>
                    </div>

                  </form>
                  
                  
                </div>
        </div>


        <form method="post" class="container" style="width:100%; ">
          <div class="form-group ">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga/pcs</th>
                <th scope="col">Total Harga</th>

              </tr>
            </thead>
            <tbody>
            
            <?php 
            $i = 1;
            if (!isset($_SESSION["barang"])) {
              echo "<td>NO DATA</td>";
            }else{
              foreach($_SESSION["barang"] as $row){
                echo "<tr>";
                echo "<th scope='row'>$i</th>";
                echo "<td><input class='form-control' type='text' placeholder='Kode' value='$row[0]' readonly></td>";
                echo "<td><input class='form-control' type='text' placeholder='Nama' value='$row[2]' readonly></td>";
                echo "<td><input class='form-control' type='number' placeholder='Jumlah' value='$row[3]'  style='width:80px' readonly></td>";
                echo "<td><input class='form-control' type='number' placeholder='Harga/pcs' value='$row[4]' readonly></td>";
                echo "<td><input class='form-control' type='number' placeholder='Total' value='$row[5]' readonly></td>";
                echo "</tr>";
                $i++;
              }
            }
            ?>
            </tbody>
          </table>
          </div>
        </form>
        


        


      </div>
    </div>
  </div>


  <!-- Bootstrap 4 -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- SweetAlert2 -->
  <script src="js/sweetalert2.min.js"></script>

  <!-- datatables -->
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

  <!-- <script>
    $('document').ready(function(){
        $('#tambahdata').click(function(e){
            e.preventDefault();
            $('.apsection').append('<div class="form-group d-flex justify-content-center"><input class="form-control" type="text" placeholder="Kode Barang"><input class="form-control" type="number" placeholder="Jumlah barang"><input id="tambahdata" class="form-control" type="number" placeholder="Tunai"></div>');

        });
    });
  </script> -->
  
  <!-- Toogle side-bar; -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>


</body>

</html>
