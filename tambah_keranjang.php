<?php
session_start();
// var_dump($_POST);die;
$id = intval($_POST['id']);
// var_dump($id);die;
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$harga = intval($_POST['harga']);
$stok = intval($_POST['stok']);
$kuantitas = intval($_POST['qty']);

if($kuantitas <= $stok){
    $produk = [$id, $kode, $nama, $harga, $stok, $kuantitas];
    $_SESSION[$kode] = $produk;
}else{
    echo "<script>
 			alert('Barang yang anda masukan terlalu banyak!');
			document.location.href = 'index.php';
          </script>";die;
}



// var_dump($_SESSION[$nama]);die;  
// session_abort(); 

header('location: index.php?tb=1');

?>