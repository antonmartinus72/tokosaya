<?php 

require "function.php";

$id = $_GET["id"];
hapus($id);
header('location: admin.php?m=1');
 ?>

