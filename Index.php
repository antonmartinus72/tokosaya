<?php
require "function.php";
$tabeljualan = query("SELECT * FROM tbjual");

  // if( isset($_POST["tambah_keranjang"])) {
  //   var_dump($_POST);die;
  // }
?>

<?php if(isset($_GET["tb"])): ?>
  <div class="flash-tbkeranjang" data-flashtbkeranjang="<?= $_GET['tb']; ?>"></div>
<?php endif; ?>

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
          session_start();
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
    <!-- #sidebar-wrapper -->

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
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li> -->
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
          <div class="container" id="card-toko">
            <div class="row">
              <?php $i = 1; ?>
              <?php foreach($tabeljualan as $row) : ?>
                <div class="col-sm-3 d-flex align-items-stretch" style="padding-top: 10px;">

                  <div class="card" style="width: 22rem; max-height:500px; background-color:;">
                    <div clas="container" style="height: 200px;">
                      <img class="card-img-top custom-card-style" src="img/product_thumb/<?= $row["gambar"]; ?>" style="height:100%; object-fit: cover;" alt="Card image cap">
                    </div>
                    <div class="card-body" style="height:100px; margin:5px; padding:0">
                      <p class="card-text" style="margin:0; padding:0;">
                          <div><?= $row["nama_barang"]; ?></div>
                          <div>Rp.<?= $row["harga"]; ?></div>
                          <div>Stok:<?= $row["jumlah"]; ?></div>
                      </p>
                    </div>

                    <form class="form-inline" method="post" action="tambah_keranjang.php">

                      <div class="input-group mb-2" style="width:100%; margin-right:20px; margin-left:20px;">
                        <input type="hidden" name="id" value="<?= $i; ?>">
                        <?php 
                          // var_dump($i);   
                        ?> 
                        <input type="hidden" name="kode" value="<?= $row["kode_barang"]; ?>">
                        <input type="hidden" name="nama" value="<?= $row["nama_barang"]; ?>">
                        <input type="hidden" name="harga" value="<?= $row["harga"]; ?>">
                        <input type="hidden" name="stok" value="<?= $row["jumlah"]; ?>">
                        <input type="number" class="form-control" name="qty" value="1" aria-label="Recipient's username" aria-describedby="basic-addon2" min="1" max="<?= $row['jumlah'];?>">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit" name="tambah_keranjang"><img src="img/icons/shopping_cart.png" height="20px;"></button>
                        </div>
                      </div>
                      <a href="keranjang.php" class="btn btn-primary" style="width:100%; margin-right:20px; margin-left:20px; margin-bottom:1 0px">Check Out!</a>
                    </form>
                    

                  </div>

                </div>
                <?php $i++; ?>
              <?php endforeach; ?>
            </div>
          </div>
      </div><!-- container-fluid -->

    </div><!-- Page Content -->
  </div> <!-- Wrapper -->


  <!-- Bootstrap 4 -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- SweetAlert2 -->
  <script src="js/sweetalert2.min.js"></script>

  <script type="text/javascript">
    const flashtbkeranjang = $('.flash-tbkeranjang').data('flashtbkeranjang')
    if (flashtbkeranjang) {
      Swal.fire({
        width: '200px',
        position: 'top-end',
        icon: 'success',

        showConfirmButton: false,
        timer: 1000
      })
    }
  </script>
  

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
