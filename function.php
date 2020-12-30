<?php
// Koneksi database
$db = mysqli_connect("localhost", "root", "", "db_jualan");

function query($query) {
	global $db;
	$result = mysqli_query($db, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function querydatakasir($kolom, $kode){
	global $db;
	if ($kolom == "nama_barang") {
		$kolom = "nama_barang";
	}else if($kolom == "jumlah"){
		$kolom = "jumlah";
	}else if($kolom == "harga"){
		$kolom = "harga";
	}else if($kolom == "id"){
		$kolom = "id";
	}

	$result = mysqli_query($db, "SELECT $kolom FROM tbjual WHERE kode_barang = '".$kode."'");
	$row = mysqli_fetch_row($result);
	return $row;
	
}

function tambah($data){
	global $db;
	$kode = htmlspecialchars($data["kode_barang"]);
	$nama = htmlspecialchars($data["nama_barang"]);
	$jumlah = htmlspecialchars($data["jumlah"]);
	$harga = htmlspecialchars($data["harga"]);
	// $gambar = htmlspecialchars($data["gambar"]);

	// upload gambar
	$gambar = upload();
	if(!$gambar){
		return false;
	}

	$query = "INSERT INTO tbjual VALUES ('', '$kode', '$nama', '$jumlah', '$harga', '$gambar')";

	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}


function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];
	if($error === 4){
		echo "<script>
				alert('Masukan gambar!');
				document.location.href = 'admin.php';
			</script>";
		return false;
	}


	// cek extensi gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode(".", $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
		echo "<script>
				alert('File yang anda upload harus dengan format jpg/jpeg/png!');
				document.location.href = 'admin.php';
			</script>";
	}

	// Limit ukuran gambar
	if($ukuranFile > 1000000){
		echo "<script>
				alert('Ukuran gambar terlalu besar!');
				document.location.href = 'admin.php';
			</script>";
	}

	// upload saat lolos pengecekan
	// generate nama file
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	// var_dump($namaFileBaru);die;
	move_uploaded_file($tmpName, 'img/product_thumb/'. $namaFileBaru);
	return $namaFileBaru;

}


function hapus($id) {
	global $db;
	mysqli_query($db, "DELETE FROM tbjual WHERE id=$id");
	return mysqli_affected_rows($db);

}

function ubah($data){
	global $db;
	$id = $data["id"];
	$kode = htmlspecialchars($data["kode_barang"]);
	$nama = htmlspecialchars($data["nama_barang"]);
	$jumlah = htmlspecialchars($data["jumlah"]);
	$harga = htmlspecialchars($data["harga"]);
	$gambarLama = $data["gambar"];

	if($_FILES['gambar']['error'] > 0){
		$gambar = $gambarLama;
	} else{
		$gambar = upload();
	}


	// $gambar = htmlspecialchars($data["gambar"]);

	$query = "UPDATE tbjual SET 
		kode_barang = '$kode',
		nama_barang = '$nama',
		jumlah = '$jumlah',
		harga = '$harga',
		gambar = '$gambar'
		WHERE id = '$id'
	";

	mysqli_query($db, $query);

	return mysqli_affected_rows($db);

}

function registrasi($data){
	global $db;
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($db, $data["password"]);
	$password2 = mysqli_real_escape_string($db, $data["password2"]);

	// cek username digunakana

	$result = mysqli_query($db, "SELECT username FROM tbpengguna WHERE username='$username'");

	if(mysqli_fetch_assoc($result)){
		echo "<script>
				alert('Username sudah dipakai!');
				document.location.href = 'registrasi.php';
			</script>";
		return false;
	}

	// cek konfirmasi password
	if($password !== $password2){
		echo "<script>
				alert('Konfirmasi password tidak sesuai!');
				document.location.href = 'index.php';
			</script>";
		return false;
	}

	// return 1;

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	// var_dump($password);die;

	// masukan data akun
	mysqli_query($db, "INSERT INTO tbpengguna VALUE('','$username', '$password')");
	return mysqli_affected_rows($db);

}

?>