<?php 
require "function.php";
$idantrian = query("SELECT no_antrian FROM tbantrian");

session_start();
var_dump($_SESSION);


echo "----------------------------- <br>";


?>