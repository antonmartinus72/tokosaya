<?php
require "function.php";
$tabeljualan = query("SELECT * FROM tbjual");
// $id = $_GET["id"];

// tambah data alert
if( isset($_POST["tambahdatasubmit"])) {
  // var_dump($_POST);
  if(tambah($_POST)>0){
    header('location: index.php?n=1');
  }else{
    echo "
      <script>
        alert('Data gagal ditambah!');
        document.location.href = 'index.php';
      </script>
    ";
    echo "<br";
    echo mysqli_error($db);
  }
}

if( isset($_POST["ubahdatasubmit"])) {
	// var_dump($_POST);
	if(ubah($_POST)>0){
    header('location: index.php?e=1');
	}else{
		echo "
			<script>
				alert('Data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
		echo "<br";
		echo mysqli_error($db);
	}
}


?>

<?php if (isset($_GET["m"])): ?>
  <div class="flash-datahapus" data-flashdatahapus="<?= $_GET['m']; ?>"></div>
<?php endif; ?>

<?php if (isset($_GET["n"])): ?>
  <div class="flash-datatambah" data-flashdatatambah="<?= $_GET['n']; ?>"></div>
<?php endif; ?>

<?php if (isset($_GET["e"])): ?>
  <div class="flash-dataubah" data-flashdataubah="<?= $_GET['e']; ?>"></div>
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

        <!-- floating tambahdata -->
       <span class="actiontambah" data-toggle="tooltip" data-placement="top" title="Tambah Data">
        <a class="btn btn-primary btn-lg" id="tambahdata" data-toggle="modal" data-target="#tambahmodal">+</a>
       </span>

        <h1 class="mt-4">Toko saya (ADMIN PAGE)</h1>
          <table id="dataTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr role="row">
                    <th style="width: 20px;">No</th>
                    <th style="width: 100px; text-align: center;">Opsi</th>
                    <th style="width: 50px">Gambar</th>
                    <th style="width: 150px">Kode</th>
                    <th> Nama</th>
                    <th style="width: 40px">Jumlah</th>
                    <th style="width: 120px">Harga</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Opsi</th>
                    <th>Gambar</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($tabeljualan as $row) : ?>
                    <tr>
                        <td style="text-align: center;"><?= $i; ?></td>
                        <td class="btn-group" role="group" aria-label="Third group">
                          <a id="tombolUbah" class="btn btn-primary" data-toggle="modal" data-target="#ubahModal" 
                            data-id="<?= $row["id"]; ?>"
                            data-kode="<?= $row["kode_barang"]; ?>"
                            data-nama="<?= $row["nama_barang"]; ?>"
                            data-jumlah="<?= $row["jumlah"]; ?>"
                            data-harga="<?= $row["harga"]; ?>"
                            data-gambar="<?= $row["gambar"]; ?>"
                            
                            >
                            Ubah</a>
                          <a href="hapusdata.php?id=<?= $row["id"]; ?>" class="tombol-hapus btn btn-danger">Hapus</a>
                        </td>
                        <td><img class="rounded" style="width: 50px" src="img/<?= $row["gambar"]; ?>"></td>
                        <td ><?= $row["kode_barang"]; ?></td>
                        <td ><?= $row["nama_barang"]; ?></td>
                        <td><?= $row["jumlah"]; ?>pcs</td>
                        <td>Rp.<?= $row["harga"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="tambahmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahmodal">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <!-- form tambah data -->
          <form action="" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="validationTambah01">Kode</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kode_barang" id="validationTambah01"  required>
                </div> 
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="validationTambah02">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_barang" id="validationTambah02" required>
                </div> 
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="validationTambah03">Jumlah</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jumlah" id="validationTambah03" required>
                </div> 
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="validationTambah04">Harga</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="harga"  id="validationTambah04" required>
                </div> 
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="gambartambah">Gambar</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="gambar" id="gambartambah">
                </div> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" href="" value="submit" name="tambahdatasubmit">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


<!-- Modal ubah Data -->
  <div class="modal fade" id="ubahModal" tabindex="-1" aria-labelledby="ubahmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahmodal">Ubah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- form ubah data -->
        <div class="modal-body modalubahdummy">
        
          <form action="" method="post">
          <input type="hidden" name="id" id="id">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="kode_barang">Kode</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kode_barang" id="kode_barang" required>
                </div> 
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="nama_barang">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
                </div> 
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="jumlah">Jumlah</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jumlah" id="jumlah" required>
                </div> 
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="harga">Harga</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="harga"  id="harga" required>
                </div> 
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="gambar" id="gambar">
                </div> 
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" href="" value="submit" name="ubahdatasubmit">Save changes</button>
            </div>
          </form>



        </div>

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


<script>
    $(document).on("click", "#tombolUbah", function() {
      let id = $(this).data('id');
      let kode = $(this).data('kode');
      let nama = $(this).data('nama');
      let jumlah = $(this).data('jumlah');
      let harga = $(this).data('harga');
      let gambar = $(this).data('gambar');

      $(".modalubahdummy #id").val(id);
      $(".modalubahdummy #kode_barang").val(kode);
      $(".modalubahdummy #nama_barang").val(nama);
      $(".modalubahdummy #jumlah").val(jumlah);
      $(".modalubahdummy #harga").val(harga);
      $(".modalubahdummy #gambar").val(gambar);

    });
  </script>

  <!-- SweetAlert2 -->
  <script src="js/sweetalert2.min.js"></script>

  <!-- Hapus data tabel - SweetAlert2 -->
  <script type="text/javascript">
    // Konfirmasi Hapus
    $(".tombol-hapus" ).click(function( event ) {
      event.preventDefault();
      const href = $(this).attr('href')

      Swal.fire({
        title: 'Data akan dihapus!',
        text: "Anda tidak akan dapat mengembalikan data seperti semula!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
              document.location.href = href;
        }
      })
    });

    // Flash Hapus
    const flashdatahapus = $('.flash-datahapus').data('flashdatahapus')
    if (flashdatahapus) {
      Swal.fire({
        icon: 'warning',
        title: 'Data berhasil di hapus',
        showConfirmButton: false,
        timer: 1500
        // position: 'top-center'
      })
    }

    // Flash Tambah
    const flashdatatambah = $('.flash-datatambah').data('flashdatatambah')
    if (flashdatatambah) {
      Swal.fire({
        icon: 'success',
        title: 'Data berhasil di tambah',
        showConfirmButton: false,
        timer: 1500
       // position: 'top-center'
      })
    }

    const flashdataubah = $('.flash-dataubah').data('flashdataubah')
    if (flashdataubah) {
      Swal.fire({
        icon: 'success',
        title: 'Data berhasil di ubah',
        showConfirmButton: false,
        timer: 1500
       // position: 'top-center'
      })
    }
  </script>

  <!-- datatables -->
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    } );
  </script>

  <!-- tooltip bootstrap -->
  <script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>



</body>

</html>
