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
.customer-color{
		width: 15px;
		height: 15px;
		background-color:#61667d;
		cursor:pointer;
	}
	.customer-selected{
		background-color:#FFF;
	}
	/* seat */
	.seat{
		background-color:#f2f2f2;
		padding:5px;
		overflow: hidden;
	}
	.seat-id{
		height: 46px;
		width: 46px;
		margin:2px;
		background-color: #bfbfbf;
		border-radius: 15px;
		float: left;
		cursor: pointer;
	}
	.seat-id > p{
		text-align: center;
	}
	.seat-notavailabe{
		background-color: #dc352f;
		/* cursor:disabl */
	}
	.seat-selected{
		background-color: #61667d;
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
						$data = mysqli_query($connect, "SELECT rute.asal, rute.tujuan, rute.tanggal, rute.sisa_seat, rute.berangkat, rute.tiba, rute.harga, rute.id_rute, transport.nama, transport.logo, transport.kode, transport.seat from rute, transport where rute.maskapai=transport.id_transport and rute.id_rute=".$id_rute."");
						$d = mysqli_fetch_array($data);
						echo $d['asal'];
						echo " - ";
						echo $d['tujuan'];
						?>
						<p><?php echo date('D, d/M/Y', strtotime($d['tanggal']));?></p>						
						<p><?php echo $d['nama'].' '.$d['kode'].''; ?></p>
						<p><?php echo $d['berangkat'].' - '.$d['tiba']?><br>
							<?php echo $d['asal'].' - '.$d['tujuan']?></p>
							<?php
							$tiba = strtotime($d['tiba']);
							$berangkat = strtotime($d['berangkat']);
							$durasi = $tiba-$berangkat;
							echo '<h5>Durasi: '.gmdate("H",$durasi).' jam '.gmdate("i", $durasi). ' menit </h5>';
							?>
						</div>
						<div class="kbreadcum">
							<form method="POST">
								<?php
								$kode_penumpang = $_GET['kode_penumpang'];
								$datapenumpang = mysqli_query($connect, "SELECT * FROM costumer WHERE kode_penumpang='$kode_penumpang'");
								$ddd = mysqli_fetch_array($datapenumpang);
								$kode = $ddd['kode_reservasi'];
								$rute = $ddd['id_rute'];
								$jml = $d['seat'];
								$costumer = mysqli_query($connect,"SELECT * FROM costumer WHERE kode_reservasi='$kode'"); 
								$jumlah_cos = mysqli_num_rows($costumer);
								$get= array(
									'kode_penumpang' => $kode_penumpang,
									'id_rute' => $rute,
									'jumlah' => $jumlah_cos,
									'kode_reservasi' => $kode
								);
								$getdata = http_build_query($get);
								$count = 0;
								
								if(isset($_POST['submit'])){
									$kursi = $_POST['kursi'];
									foreach ($costumer as $cus) {
										$connect->query("UPDATE costumer SET kode_kursi='$kursi[$count]' WHERE kode_reservasi='$kode' AND id_costumer = '$cus[id_costumer]'");
										$count++;
									}
									header('Location:konfirmasi2.php?'.$getdata);

								} 
								?>
								<?php
								for ($i=1; $i <= $jumlah_cos ; $i++) { 

									?>
									<div class="customer-name">
										<table>
											<td>
												<div onclick="pget(this.id)" id="p<?php echo $i;?>" class="customer-color id-1"></div>
											</td>
											<div class="form-group">
												<td>
													<span>Penumpang<?php echo $i; ?></span>
												</td>
												<td>
													<input id="i<?php echo $i ?>" type="text" name="kursi[]">
												</td>
											</div>
										</table>
									</div>
									<?php
								}
								?>

								<?php
								$apa = [];
								$sss = mysqli_query($connect, "SELECT * FROM costumer WHERE id_rute =".$id_rute."");
								while ($bb = mysqli_fetch_assoc($sss)) {
									$apa[]=$bb['kode_kursi'];
								}
								?>
								<div class="seat">
									<?php
									for ($i=1; $i <= $jml ; $i++) { 
										if (in_array($i, $apa)) {
								# code...

											?>


											<div id="<?php echo $i; ?>" class="seat-id seat-notavailabe"><p><?php echo $i; ?></p></div>
											<?php
										}
										else{
											?>
											<div onclick="sget(this.id)" id="<?php echo $i; ?>" class="seat-id"><p><?php echo $i; ?></p></div>

											<?php
										}
									} 
									?>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="date_btn col-md-12">
								<input type="submit" class="btn btn-primary" name="submit" value="Selanjutnya" style="border-radius: 0px; float: right;">
							</div>
						</form>
					</div>
				</div>
			</div>
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
			<script>

        function pget(id){
            seat.p = id;
            $('.customer-color').removeClass("customer-selected");
            $('#'+id).addClass("customer-selected");
        }
        function sget(id){
            seat.selectSeat(id);
        }

        var seat = {
            p:'',
            pn:function(id){
                pn = id.replace('p', '');
                return pn;
            },
            selectSeat: function(id) {
                if ($('#' + id).attr('class') == 'seat-id') {

                    if($('#i'+this.pn(this.p)).val() == ''){
                        $('#' + id).addClass("seat-selected");
                         // console.log(this.pn(this.p));
                        $('#i'+this.pn(this.p)).val(id);
                        $('#'+id).addClass('seat-for-'+this.p);
                    }

                  
                } else {
                    cSeat = $('#' + id).attr('class');
                    cSeatoc = cSeat.replace('seat-id seat-selected seat-for-p','');
                    $('#' + id).removeClass("seat-selected");
                    $('#'+id).removeClass(cSeat.replace('seat-id ',''));
                    $('#i'+cSeatoc).val(''); 
                    
                    
                }
                //    console.log($('#'+id).attr('class'));
            }
        }



    </script>