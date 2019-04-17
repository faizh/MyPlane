<?php
	session_start();
	require_once "action/koneksi.php";

	$user = $_POST['username'];
	$pass = $_POST['password'];
  $nama = $_POST['namalengkap'];
  $alamat = $_POST['alamat'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $jk = $_POST['jk'];
  $telephone = $_POST['telephone'];
  $level = "user";

  $cek = mysqli_query($connect, "SELECT * from user where username='$user'");

  if(mysqli_num_rows($cek)>0){

    header('Location: create_user.php?failed=Username Sudah Digunakan');
  }else{
    $query = "INSERT INTO user(username, password, namalengkap, alamat, tgl_lahir, jk, telephone, level) VALUES('$user','$pass','$nama','$alamat','$tgl_lahir', '$jk','$telephone','$level')";
    
    $result = mysqli_query($connect,$query);
    if (!mysqli_num_rows($result))
    {
    //echo("Invalid Query!<br>Please register again...<br>");
      header('Location: login.php?pesan=Login');
    //exit;
    }else{
      header('Location: create_user.php');
    }

  }
mysqli_close($link);
	
?>