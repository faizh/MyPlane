<?php
require 'action/koneksi.php';
							if (isset($_POST['Input'])){
							
								for ($j=1; $j <= $jumlah; $j++){
									$nama_pemesan = $_POST['nama_pemesan'];
									$alamat = $_POST['alamat'];
									$telp = $_POST['telp'];
									$email = $_POST['email'];
									$kode_reservasi = $_POST['kode_reservasi'];
									$nama_penumpang = $_POST['nama_penumpang'.$j];
									$kode_penumpang = $_POST['kode_penumpang'.$j];
									$tittel = $_POST['tittel'.$j];
									$id_rute = $_POST['id_rute'];
									$sisakuota = $_POST['sisa_kuota'];
									$insert = mysqli_query($connect, "INSERT INTO costumer (nama_pemesan,alamat,telp,email,kode_reservasi,nama_penumpang,kode_penumpang,tittel,id_rute) VALUES ('$nama_pemesan','$alamat','$telp','$email','$kode_reservasi','$nama_penumpang','$kode_penumpang','$tittel','$id_rute')");
									$upd = mysqli_query($connect, "UPDATE rute SET sisa_seat='$sisakuota' WHERE id_rute='$id_rute'");
								}
							}
							?>