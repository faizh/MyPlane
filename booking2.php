<?php 
require_once 'action/koneksi.php';
ob_start();
session_start();

?>

<?php require_once 'page/header.php' ?>
<style type="text/css">
p{
	padding-left: 5px;
}
</style>

<div class="gtco-loader"></div>

<div id="page">

	
	<!-- <div class="page-inner"> -->
		
	<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">

				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<?php
							if (isset($_SESSION['user'])) {
									$username = $_GET["username"];
								echo "<div id='gtco-logo'><a href='index.php?username=$username'>MyPlane</a></div>";
							}else{
									echo "<div id='gtco-logo'><a href='index.php?'".$username.">MyPlane</a></div>";
								}
						?>
					</div>
					<div class="col-xs-8 text-right menu-1">
						<ul>
							<?php
							if (isset($_SESSION['user'])) {
									$username = $_GET["username"];
									echo "<li class='active'><a href='index.php?username=$username'>Search Flight</a></li>";
									echo "<li><a href='list_order.php?username=$username'>List Order</a></li>";
									echo "<li><a href='contact.php?username=$username'>Contact</a></li>";

							}else{
									echo "<li class='active'><a href='index.php'>Search Flight</a></li>";
									echo "<li><a href='contact.php'>Contact</a></li>";
								}
							?>
							<!-- <li><a href="pricing.php">Pricing</a></li>	
							<li><a href="contact.php">About Us</a></li> -->
							<?php
								
								if (isset($_SESSION['user'])) {
								    echo "<li><a href='logout.php'>Logout</a></li>";
								   	echo "<li>".$username."</li>";
								}else{
									echo "<li><a href='login.php?pesan=Login'>Log in</a></li>";
								}
							?>
					</div>
				</div>

			</div>
		</nav>

		<div id="gtco-features" >
			<div class="gtco-container">
				<div class="tamprute">
					
				</div>
			</div>
		</div>

		
		<div class="overlay"></div>
		<div class="konfirm">
			<div class="gtco-container">
				<div class="col-md-12">
					<div class="kbreadcum">
						<h3>Detail Pemesanan</h3>
						<div style="width: 100%; height: 1px; background-color: #09C6AB; margin: 10px 0px;"></div>
						<?php
						$id_rute = $_GET['id_rute'];
						$jumlah = $_GET['jumlah'];
						$data = mysqli_query($connect, "SELECT rute.asal, rute.tujuan, rute.tanggal, rute.sisa_seat, rute.berangkat, rute.tiba, rute.harga, rute.id_rute, transport.nama, transport.logo, transport.kode, transport.seat from rute, transport where rute.maskapai=transport.id_transport and rute.id_rute=".$id_rute."");
						$d = mysqli_fetch_array($data);
						echo $d['asal'];
						echo " - ";
						echo $d['tujuan'];
						?>
						<p><?php echo date('D, d/M/Y', strtotime($d['tanggal']));?></p>						
						<p><?php echo $d['nama'].' '.$d['kode'].''; ?></p>
						<p><?php echo $d['berangkat'].' - '.$d['tiba']?><br>
							<?php echo $d['asal'].'  '.$d['tujuan']?></p>
							<?php
							$tiba = strtotime($d['tiba']);
							$berangkat = strtotime($d['berangkat']);
							$durasi = $tiba-$berangkat;
							echo '<h5>Durasi: '.gmdate("H",$durasi).' jam '.gmdate("i", $durasi). ' menit </h5>';
							?>
						</div>
					</div>
					<?php 
					function getcode(){
						$k = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
						$h = strlen($k) -1;
						return substr($k, rand(0, $h), 1);
					}
					$jumlah = $_GET['jumlah'];
					$id_rute = $_GET['id_rute'];
					$nama_pemesan = $_GET['nama_pemesan'];
					$alamat = $_GET['alamat'];
					$telp = $_GET['telp'];
					$email = $_GET['email'];
					$sisa_seat = $_GET['sisa_seat'];
					$sisakuota = $sisa_seat-$jumlah;
					for ($j=1; $j <=$jumlah ; $j++) { 
						
						?>
						<div class="col-md-6">
							<div class="kbreadcum">
								<form method="POST">
									<input type="hidden" name="username" value="<?php echo $username ?>">
									<input type="hidden" name="nama_pemesan" value="<?php echo $nama_pemesan ?>">
									<input type="hidden" name="alamat" value="<?php echo $alamat  ?>">
									<input type="hidden" name="email" value="<?php echo $email ?>">
									<input type="hidden" name="telp" value="<?php echo $telp ?>">
									<input type="hidden" name="sisakuota" value="<?php echo $sisakuota ?>">
									<input type="hidden" name="id_rute" value="<?php echo $id_rute ?>">
									<input type="hidden" name="kode_reservasi" value="<?php 
									for ($a = 0; $a < 7; $a++){
										echo getcode(); }?>">
										<input type="hidden" name="kode_penumpang<?php echo $j;?>" value="<?php 
										for ($a = 0; $a < 7; $a++){
											echo getcode(); echo $j; }?>">
											<div class="form-group">
												<label class="control-label">Tittle Penumpang <?php echo $j ?></label>

												<select class="form-control" name="tittle<?php echo $j ?>">
													<option>Pilih Tittle</option>
													<option>Tn.</option>
													<option>Ny.</option>
													<option>Nn.</option>
												</select>							
											</div>
											<div class="form-group">
												<label class="control-label">Nama Penumpang <?php echo $j ?></label>
												<input type="text" class="form-control" name="nama_penumpang<?php echo $j ?>">	
											</div>
										</div>
									</div>
									<?php 
								}
								?>
								<div class="col-md-6" style="float: left">
									<input class="btn btn-primary" value="Selanjutnya" name="Input" type="submit" style="position: relative; left: 71%; margin-top: 5px;"/>
								</div>
							</form>
							<?php
							if (isset($_POST['Input'])){
								$username=$_POST["username"];
								$get= array(
									'kode_penumpang' => $_POST['kode_penumpang1'],
									'id_rute' => $_POST['id_rute'],
									'sisa_seat' => $d['sisa_seat']
								);
								$getdata = http_build_query($get);
								for ($j=1; $j <= $jumlah; $j++){
									$nama_pemesan = $_POST['nama_pemesan'];
									$alamat = $_POST['alamat'];
									$telp = $_POST['telp'];
									$email = $_POST['email'];
									$kode_reservasi = $_POST['kode_reservasi'];
									$nama_penumpang = $_POST['nama_penumpang'.$j];
									$kode_penumpang = $_POST['kode_penumpang'.$j];
									$tittle = $_POST['tittle'.$j];
									$id_rute = $_POST['id_rute'];
									$sisakuota = $_POST['sisakuota'];
									$insert = mysqli_query($connect, "INSERT INTO costumer (nama_pemesan,alamat,telp,email,kode_reservasi,nama_penumpang,kode_penumpang,tittle,id_rute, username, status) VALUES ('$nama_pemesan','$alamat','$telp','$email','$kode_reservasi','$nama_penumpang','$kode_penumpang','$tittle','$id_rute','$username', 'Belum Konfirmasi');");
									$upd = mysqli_query($connect, "UPDATE rute SET sisa_seat='$sisakuota' WHERE id_rute='$id_rute'");
								}
								header('Location:booking3.php?'.$getdata);
							}
							?>

							<div class="clearfix"></div>
						</div>
					</div>


					<footer id="gtco-footer" role="contentinfo">
						<div class="gtco-container">
							<div class="row row-p	b-md">

								<div class="col-md-4">
									<div class="gtco-widget">
										<h3>About Us</h3>
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
									</div>
								</div>

								<div class="col-md-2 col-md-push-1">
									<div class="gtco-widget">
										<h3>Destination</h3>
										<ul class="gtco-footer-links">
											<li><a href="#">Europe</a></li>
											<li><a href="#">Australia</a></li>
											<li><a href="#">Asia</a></li>
											<li><a href="#">Canada</a></li>
											<li><a href="#">Dubai</a></li>
										</ul>
									</div>
								</div>

								<div class="col-md-2 col-md-push-1">
									<div class="gtco-widget">
										<h3>Hotels</h3>
										<ul class="gtco-footer-links">
											<li><a href="#">Luxe Hotel</a></li>
											<li><a href="#">Italy 5 Star hotel</a></li>
											<li><a href="#">Dubai Hotel</a></li>
											<li><a href="#">Deluxe Hotel</a></li>
											<li><a href="#">BoraBora Hotel</a></li>
										</ul>
									</div>
								</div>

								<div class="col-md-3 col-md-push-1">
									<div class="gtco-widget">
										<h3>Get In Touch</h3>
										<ul class="gtco-quick-contact">
											<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
											<li><a href="#"><i class="icon-mail2"></i> info@freehtml5.co</a></li>
											<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
										</ul>
									</div>
								</div>

							</div>

							<div class="row copyright">
								<div class="col-md-12">
									<p class="pull-left">
										<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
										<small class="block">Designed by <a href="https://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
									</p>
									<p class="pull-right">
										<ul class="gtco-social-icons pull-right">
											<li><a href="#"><i class="icon-twitter"></i></a></li>
											<li><a href="#"><i class="icon-facebook"></i></a></li>
											<li><a href="#"><i class="icon-linkedin"></i></a></li>
											<li><a href="#"><i class="icon-dribbble"></i></a></li>
										</ul>
									</p>
								</div>
							</div>

						</div>
						<?php require_once 'page/footer.php' ?>