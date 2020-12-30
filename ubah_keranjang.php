<?php 
// var_dump($_POST);die;
session_start();
$kode  = $_POST['nama0'];
$nama = $_POST['nama1'];
$harga = intval($_POST['nama2']);
$stok = intval($_POST['nama3']);
$kuantitas = intval($_POST['nama4']);
$event = $_POST['event'];

$produk = [$kode, $nama, $harga, $stok, $kuantitas];

if($event == "update"){
    $_SESSION[$kode] = $produk;
}else if($event == "delete"){
    unset($_SESSION[$kode]);
}

header('location: keranjang.php?bu=1');


?>