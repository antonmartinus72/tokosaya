<?php 
require "function.php";
session_start();
// echo "tagihan_p : ";
// var_dump($_POST["tagihan_p"]);die;

// Header kondisi
if (!isset($_SESSION["barang"])) {
	header('Location: index.php');die;
}else if($_POST["tunai_p"] <= 0) {
    echo "
      <script>
        alert('Anda belum memasukan nominal pembayaran!');
        document.location.href = 'konfirmasi_pembayaran.php';
      </script>
    ";die;
}else if($_POST["tunai_p"] < $_POST["tagihan_p"]) {
    echo "
      <script>
        alert('Nominal pembayaran tidak cukup untuk membayar tagihan!');
        document.location.href = 'konfirmasi_pembayaran.php';
      </script>
    ";die;
}

// Mendapatkan data
$tunai_bayar = intval(htmlspecialchars($_POST["tunai_p"]));
$tagihan = intval(htmlspecialchars($_POST["tagihan_p"]));
$kembalian = ($tunai_bayar - $tagihan);
$total_item = 0;
$total_biaya_item = 0;
$id_order = 0;

// Menghitung value total biaya item, total item dan id order
foreach($_SESSION["barang"] as $daftar){
    $total_biaya_item = $total_biaya_item + $daftar[5];
    $total_item = $total_item + $daftar[3];
    $id_order = $daftar[6];

}
echo $total_biaya_item." totalbayar<br>";
echo $total_item." totalitem<br> ";
echo $id_order." id_order<br> ";
// die;

// Set timezone
date_default_timezone_set('Asia/Jakarta');

// Membuat laporan pembayaran
$query = mysqli_query($db, "INSERT INTO tborder (id_order, total_item, total_bayar_item, tagihan, tunai, kembalian, tgl_transaksi) VALUES ('$id_order', '$total_item', '$total_biaya_item', '$tagihan', '$tunai_bayar', '$kembalian', '". date('Y-m-d') ."')");

// Membuat detil laporan pembayaran
foreach($_SESSION["barang"] as $daftar){
    $id_produk = $daftar[1];
    var_dump($id_produk); echo " id_produk<br> ";
    // echo $id_produk." id_produk<br> ";
    $pembelian = $daftar[3];
    // echo $pembelian." pembelian<br> ";
    var_dump($pembelian); echo " pembelian<br> ";

    $query = mysqli_query($db, "INSERT INTO tborderdetail (id_order, id_produk, kuantitas) VALUES ('$id_order', '$id_produk', '$pembelian')");
}

// Menghapus proses pembayaran
unset($_SESSION['barang']);

// Kembali ke menu pembayaran
header('Location: pembayaran.php?s=1');

echo "end";

?>