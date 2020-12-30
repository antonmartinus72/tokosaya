<?php 
require "function.php";
// $db = mysqli_connect("localhost", "root", "", "db_jualan");
// $result = mysqli_query($db, 'SELECT nama_barang FROM tbjual WHERE kode_barang = "AQUA00234"');
// var_dump($result);
// $row = mysqli_fetch_row($result);


$sql = "SELECT kode_barang FROM tbjual";
$result = mysqli_query($db ,$sql);
$kodearray = [];
while($row = mysqli_fetch_array($result)){
    $kodearray[] = $row['kode_barang'];
}

// if(in_array($_POST["kode"], $kodearray[])){
//     echo "ADAAAAAAAAAAAAA!";
// }

// var_dump($result);echo "<br>";
// echo $kodearray;
// print_r($kodearray);echo "<br>";
// var_dump($kodearray);echo "<br>";
// die;

// die;

if(!in_array($_POST["kode"], $kodearray) || $_POST["jumlah"] < 1){
    echo "
      <script>
        alert('Jumlah barang belum di isi atau kode salah!');
        document.location.href = 'pembayaran.php';
      </script>
    ";die;
}
// die;

$kode = strval($_POST["kode"]);
// var_dump($kode); echo "<br>";
// $nama = mysqli_query($db, "SELECT nama_barang FROM tbjual WHERE kode_barang = '".$kode."'");
// $row = mysqli_fetch_row($nama);
$id = intval(querydatakasir("id", $kode)[0]);

$result = mysqli_query($db, "SELECT id FROM tborder");
$id_order = intval(mysqli_fetch_row($result)[0])+1;
// var_dump($id_pesanan);die;


$nama = querydatakasir("nama_barang", $kode)[0];
$kuantitas = intval($_POST["jumlah"]);
// var_dump($jumlah);die;
$harga = intval(querydatakasir("harga", $kode)[0]);
// var_dump($n);die;
// $harga = intval($n[0]);
// var_dump($harga);die;
$hargatotal = ($kuantitas*$harga);

var_dump($id); echo "| ID <br>";
var_dump($nama); echo "| NAMA <br>";
var_dump($kuantitas); echo "| JUMLAH <br>";
var_dump($harga); echo "| HARGA <br>";
var_dump($hargatotal); echo "| TOTAL <br>";
var_dump($_SESSION); echo "| SESSION <br>";

session_start();
$produk = [$kode, $id, $nama, $kuantitas, $harga, $hargatotal, $id_order];

// $_SESSION ["id"] = $id;
$_SESSION["barang"]["$kode"] = $produk;


header('location: pembayaran.php');

// echo $row[0];

// $row = mysqli_fetch_array($tabeljualan);

// var_dump($result);die;


// var_dump($_POST);die;
// session_start();
// $tabeljualan as $tb;
// echo "tb = ".var_dump($tb);
// $kode = ;
// $nama = query("SELECT nama_barang FROM tbjual where kode_barang=$_POST["kode"]");

// var_dump($kode);
// echo "<br>";
// var_dump($nama);
// echo "<br>";
// print_r($_POST);die;



?>