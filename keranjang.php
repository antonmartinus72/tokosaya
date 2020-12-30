<?php
    session_start();
    var_dump($_SESSION);
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
      <div class="sidebar-heading blues bg-primary text-white"><a href="index.php" class="text-white">Toko Saya</a></div>
      <div style="" class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-dark text-white">Home</a>
        <a href="keranjang.php" class="list-group-item list-group-item-action bg-dark text-white">
          Keranjang <?php
          $itemDiKeranjang = 0;
          foreach($_SESSION as $jumlahKeranjang){
              $itemDiKeranjang++;
          }
          echo $itemDiKeranjang;
           ?>
        </a>
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

      <div class="container-fluid" style="width: 100%">
        <div class="container" style="width: 70%; margin:0; float: left;">
            <table class="table" style="font-size:14px;">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col" >Kode Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody >
                    <?php 
                        $tagihan = 0;
                        $totalTagihan = 0;
                        $sno = 1;
                        foreach($_SESSION as $produk){
                            $p = 0;
                            $q = 0;
                            $max = 0;
                            echo "<tr>";
                                echo "<td>".($sno++)."</td>";
                                echo "<form action='ubah_keranjang.php' method='post'>";
                                    foreach($produk as $key => $value){
                                        if($key == 0){// no
                                            echo "<input type='hidden' name='nama$key' value='".$value."'></input>";
                                            echo "<td>".$value."</td>";
                                        }else if($key == 1){// kode
                                            echo "<input type='hidden' name='nama$key' value='".$value."'></input>";
                                            echo "<td>".$value."</td>";
                                        }else if($key == 2){// nama
                                            echo "<input type='hidden' name='nama$key' value='".$value."'></input>";
                                            echo "<td>".$value."</td>";
                                        }else if($key == 3){// harga
                                            echo "<input type='hidden' name='nama$key' value='".$value."'></input>";
                                            echo "<td>".$value."</td>";
                                            $p = $value;
                                        }else if($key == 4){// stok
                                            echo "<input type='hidden' name='nama$key' value='".$value."'></input>";
                                            echo "<td>".$value."</td>";
                                            $max = $value;
                                        }else if($key == 5){// jumlah
                                            echo "<input type='hidden' name='nama$key' value='".$value."'></input>";
                                            echo "<td><input type='number' name='nama$key' class='form-control' value='$value' min='1' max='$max'".$value."</td>";
                                            $q = $value;
                                        }
                                    }

                                    $tagihan = ($q * $p);
                                    $totalTagihan = ($totalTagihan + $tagihan);
                                    echo "<td>".($tagihan)."</td>";
                                    echo "<td>"."<input type='submit' name='event' value='update' class='btn btn-warning btn-sm'>"."</td>";
                                    echo "<td>"."<input type='submit' name='event' value='delete' class='btn btn-danger btn-sm'>"."</td>";
                                echo "</form>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- <div class="container" style="float: right; width: auto;"> -->
            <!-- <div class="card" style="width: 100%;"> -->
                <!-- <div class="card-body"> -->
                <?php 
                  if($_SESSION == []){
                    echo "<div class='container' style='float: none; width: auto;'>";
                    echo "<div class='card' style='width: 100%;'>";
                    echo "<div class='card-body'>";
                    echo "<h5> Belum ada produk di keranjang anda! </h5>";
                  }else{
                    echo "<div class='container' style='float: right; width: auto; margin-top:20px;'>";
                    echo "<div class='card' style='width: 100%;'>";
                    echo "<div class='card-body'>";
                    echo "<h5>Total Tagihan : ".$totalTagihan."</h5>";
                    echo "<a href='tambah_antrian.php' class='btn btn-primary' style='width:100%; margin-right:0px; margin-left:0px; margin-bottom:10px'>Bayar Sekarang!</a>";
                  }
                ?>
                    <h5>
                        
                    </h5>
                    <!-- <h5>Total Tagihan : <?= $totalTagihan ?></h5> -->
                    <!-- <a href="#" class="btn btn-primary" style="width:100%; margin-right:0px; margin-left:0px; margin-bottom:10px">Bayar Sekarang!</a> -->

                </div>
            </div>  
        </div>
        
        


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

    <!-- Toogle side-bar; -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>
