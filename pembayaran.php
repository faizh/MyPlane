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
									$username = $_SESSION['user'];
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
									$username = $_SESSION['user'];
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
									echo "<li><a href='login.php'>Log in</a></li>";
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
				<?php
				$id_rute = $_GET['id_rute'];
				$jumlah = $_GET['jumlah'];
				$data = mysqli_query($connect, "SELECT rute.asal, rute.tujuan, rute.tanggal, rute.sisa_seat, rute.berangkat, rute.tiba, rute.harga, rute.id_rute, transport.nama, transport.logo, transport.kode from rute, transport where rute.maskapai=transport.id_transport and rute.id_rute=".$id_rute."");
				$d = mysqli_fetch_array($data);
				?>
				<div class="col-md-8">
					<div class="kbreadcum">
						<h3>Pembayaran</h3>
						<div style="width: 100%; height: 1px; background-color: red; margin: 10px 0px;"></div>
						Pilih Salah Satu Rekening Tujuan
						<div class="kbreadcum">
							<h4><b>Mandiri</b></h4>
							<p>Nomer Renkening : 134567899898</p>
							<p>Nama Renkening : PT Traveler.com</p>
							<p><?php echo 'Total harga : Rp '.$total=$d['harga']*$jumlah.''; ?></p>
						</div>
						<div class="kbreadcum">
							<h4><b>BNI</b></h4>
							<p>Nomer Renkening : 134567899898</p>
							<p>Nama Renkening : PT Traveler.com</p>
							<p><?php echo 'Total harga : Rp '.$total=$d['harga']*$jumlah.''; ?></p>
						</div>
						<div class="kbreadcum">
							<h4><b>BCA</b></h4>
							<p>Nomer Renkening : 134567899898</p>
							<p>Nama Renkening : PT Traveler.com</p>
							<p><?php echo 'Total harga : Rp '.$total=$d['harga']*$jumlah.''; ?></p>
						</div>
						<div class="kbreadcum">
							<h4><b>BRI</b></h4>
							<p>Nomer Renkening : 134567899898</p>
							<p>Nama Renkening : PT Traveler.com</p>
							<p><?php echo 'Total harga : Rp '.$total=$d['harga']*$jumlah.''; ?></p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="kbreadcum">
						<h3><span class="icon-credit-card"> Rincian Harga</span></h3>
						<div style="width: 100%; height: 1px; background-color: red; margin: 10px 0px;"></div>
						<p><?php echo 'Harga<span style="float:right">Rp '.$d['harga'].'</span>'; ?></p>
						<p><?php echo 'Jumlah<span style="float:right">'.$jumlah.'</span>'; ?></p>
						<p><?php echo 'Total harga<span style="float:right">Rp '.$total=$d['harga']*$jumlah.'</span>'; ?></p>
					</div>
				</div>

				<?php 
				$id_rute = $_GET['id_rute'];
				$kode_reservasi = $_GET['kode_reservasi'];
				?>
				<div class="col-md-12">
					<div class="kbreadcum">
						<h3>Kirim Bukti Pembayaran</h3>
						<div style="width: 100%; height: 1px; background-color: red; margin: 10px 0px;"></div>
						<form class="form-control" method="POST" enctype="multipart/form-data">
							<input type="file" name="bukti_lokasi">
							<input type="hidden" name="id_rute" value="<?php echo $id_rute?>">
							<input type="hidden" name="kode_reservasi"  value="<?php echo $kode_reservasi ?>">
							<input type="submit" name="masuk" value="Upload" class="btn2 btn-primary" >							
						</form>
						
					</div>
				</div>
				<?php 
				if (isset($_POST['masuk'])){
					$id_rute = $_POST['id_rute'];
					$kode_reservasi = $_POST['kode_reservasi'];
					$tanggal_reservasi = date('Y-m-d');
					$bukti_lokasi = $_FILES['bukti_lokasi']['name'];
					$tmp_name = $_FILES['bukti_lokasi']['tmp_name'];
					$get= array(
						'id_rute' => $_POST['id_rute'],
						'kode_reservasi' => $_POST['kode_reservasi'],
						'jumlah' => $jumlah
					);
					$getdata = http_build_query($get);

					$ft = move_uploaded_file($tmp_name, 'assets/images/'.$bukti_lokasi);
					$insert = mysqli_query($connect, "INSERT INTO reservation (kode_reservasi,tanggal_reservasi,id_rute,bukti_lokasi) values ('$kode_reservasi','$tanggal_reservasi','$id_rute','$bukti_lokasi')");
					header('Location:pembayaran2.php?'.$getdata);
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