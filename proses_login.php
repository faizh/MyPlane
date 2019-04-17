<?php
	session_start();
	require_once "action/koneksi.php";

	$user = $_POST['username'];
	$pass = $_POST['password'];
  $pesan = $_POST['pesan'];

	$query = "SELECT * FROM user WHERE username='$user' && password='$pass' && status=1";
	$result = mysqli_query($connect,$query);


if(!mysqli_num_rows($result)){
     echo "<SCRIPT>alert('Error: $msg');history.go (-1)</SCRIPT>";
     header('Location: login.php?pesan='.$pesan.'&failed=Wrong Username or password');
  }else{
  	$data = mysqli_fetch_assoc($result);  	
		$_SESSION['user'] = $user;
	    header('Location: index.php?username='.$user);	
  	}
     
  
?>