<?php 
	$localhost	= "localhost";
	$username	= "root";
	$password	= "";
	$dbname		= "traveler";

	//command buat koneksi//
	$connect = new mysqli($localhost,$username,$password,$dbname);

	//testkoneksi
	if ($connect->connect_error) {
		die("gagal terkoneksi : " .$connect->connect_error);
	} else {
		//echo "berhasil terkoneksi";
	}
 ?>