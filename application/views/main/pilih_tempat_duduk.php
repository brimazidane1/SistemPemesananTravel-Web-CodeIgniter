<!doctype html>

<html>

<head>
	<title><?= $title; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Travelix Project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>styles/bootstrap4/bootstrap.min.css">
	<link href="<?= base_url('assets/') ?>plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>styles/responsive.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>styles/single_listing_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>styles/single_listing_responsive.css">
	<!-- Datepicker -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>css/lib/jquery.seat-charts.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>css/lib/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>css/lib/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>css/lib/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>css/lib/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>css/booking.css">
</head>

<body>
	<div class="super_container">

		<!-- Header -->

		<header class="header">

			<!-- Top Bar -->

			<div class="top_bar">
				<div class="container">
					<div class="row">
						<div class="col d-flex flex-row">
							<div class="phone">+45 345 3324 56789</div>
							<div class="social">
								<ul class="social_list">
									<li class="social_list_item"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
									<li class="social_list_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li class="social_list_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li class="social_list_item"><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
									<li class="social_list_item"><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
									<li class="social_list_item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								</ul>
							</div>
							<div class="user_box ml-auto">
								<?php if (!empty($users['username'])) { ?>
									<div class="user_box_login user_box_link"><a href="<?= base_url($users['role']) ?>">dashboard</a></div>
									<div class="user_box_register user_box_link"><a href="<?= base_url('auth/logout') ?>">logout, Hai <?= $users['username'] ?>!</a></div>
								<?php } else { ?>
									<div class="user_box_login user_box_link"><a href="<?= base_url('auth') ?>">login</a></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?= $this->session->flashdata('message'); ?>
			<!-- Main Navigation -->

			<nav class="main_nav">
				<div class="container">
					<div class="row">
						<div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<div class="logo"><a href="#"><img src="<?= base_url('assets/') ?>images/logo.png" alt="">Travel AJAP</a></div>
							</div>
							<div class="main_nav_container ml-auto">
								<ul class="main_nav_list">
									<li class="main_nav_item"><a href="<?= base_url('main') ?>">home</a></li>
									<li class="main_nav_item"><a href="<?= base_url('main/cek_status') ?>">cek status pembayaran</a></li>
									<li class="main_nav_item"><a href="<?= base_url('main') ?>">about us</a></li>
								</ul>
							</div>
							<div class="content_search ml-lg-0 ml-auto">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17px" height="17px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
									<g>
										<g>
											<g>
												<path class="mag_glass" fill="#FFFFFF" d="M78.438,216.78c0,57.906,22.55,112.343,63.493,153.287c40.945,40.944,95.383,63.494,153.287,63.494
									s112.344-22.55,153.287-63.494C489.451,329.123,512,274.686,512,216.78c0-57.904-22.549-112.342-63.494-153.286
									C407.563,22.549,353.124,0,295.219,0c-57.904,0-112.342,22.549-153.287,63.494C100.988,104.438,78.439,158.876,78.438,216.78z
									M119.804,216.78c0-96.725,78.69-175.416,175.415-175.416s175.418,78.691,175.418,175.416
									c0,96.725-78.691,175.416-175.416,175.416C198.495,392.195,119.804,313.505,119.804,216.78z" />
											</g>
										</g>
										<g>
											<g>
												<path class="mag_glass" fill="#FFFFFF" d="M6.057,505.942c4.038,4.039,9.332,6.058,14.625,6.058s10.587-2.019,14.625-6.058L171.268,369.98
									c8.076-8.076,8.076-21.172,0-29.248c-8.076-8.078-21.172-8.078-29.249,0L6.057,476.693
									C-2.019,484.77-2.019,497.865,6.057,505.942z" />
											</g>
										</g>
									</g>
								</svg>
							</div>

							<form id="search_form" class="search_form bez_1">
								<input type="search" class="search_content_input bez_1">
							</form>

							<div class="hamburger">
								<i class="fa fa-bars trans_200"></i>
							</div>
						</div>
					</div>
				</div>
			</nav>

		</header>

		<div class="menu trans_500">
			<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
				<div class="menu_close_container">
					<div class="menu_close"></div>
				</div>
				<div class="logo menu_logo"><a href="#"><img src="<?= base_url('assets/') ?>images/logo.png" alt=""></a></div>
				<ul>
					<li class="menu_item"><a href="<?= base_url('main') ?>">home</a></li>
					<li class="menu_item"><a href="<?= base_url('main/cek_status') ?>">cek status pembayaran</a></li>
					<li class="menu_item"><a href="<?= base_url('main') ?>">tentang kami</a></li>
				</ul>
			</div>
		</div>

		<!-- Home -->

		<div class="home">
			<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url('assets/') ?>images/single_background.jpg"></div>
			<div class="home_content">
				<div class="home_title"><?= $title; ?></div>
			</div>
		</div>

		<!-- Pilih Tempat Duduk -->
		<div class="wrapper">
			<div class="container">
				<div id="seat-map" class="seat-panel">
					<div class="front-indicator">Depan</div>
					
				</div>
				<div class="booking-details">
					<h3> Tiket (<span id="counter">0</span>):</h3>
					<ul id="selected-seats"></ul>
					<b>Total: <span id="total">0</span></b>

					<form id="lanjutPembayaran" name="lanjutPembayaran" onsubmit="lanjut();" action="<?= base_url('main/data_penumpang') ?>" method="post">
						<input type="hidden" class="form-control" id="id_trayek" name="id_trayek" value="<?= $trayek['id_trayek']; ?>">
						<input type="hidden" class="form-control" id="jumlah_tiket" name="jumlah_tiket" value="">
						<input type="hidden" class="form-control" id="tempat_duduk" name="tempat_duduk" value="">
						<input type="hidden" class="form-control" id="no" name="no" value="">
						<input type="hidden" class="form-control" id="harga" name="harga" value="">
						<button id="submitBtn" type="submit" class="checkout-button btn btn-warning">Lanjut &raquo;</button>
					</form>

					<div id="legend"></div>
				</div>
			</div>
		</div>




		<!-- Footer -->

		<footer class="footer">
			<div class="container">
				<div class="row">

					<!-- Footer Column -->
					<div class="col-lg-3 footer_column">
						<div class="footer_col">
							<div class="footer_content footer_about">
								<div class="logo_container footer_logo">
									<div class="logo"><a href="#"><img src="<?= base_url('assets/') ?>images/logo.png" alt="">Travel AJAP</a></div>
								</div>
								<p class="footer_about_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vu lputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer eleme ntum orci eu vehicula pretium.</p>
								<ul class="footer_social_list">
									<li class="footer_social_item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
									<li class="footer_social_item"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
									<li class="footer_social_item"><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li class="footer_social_item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
									<li class="footer_social_item"><a href="#"><i class="fa fa-behance"></i></a></li>
								</ul>
							</div>
						</div>
					</div>

					<!-- Footer Column -->
					<div class="col-lg-3 footer_column">
					</div>

					<!-- Footer Column -->
					<div class="col-lg-3 footer_column">
					</div>

					<!-- Footer Column -->
					<div class="col-lg-3 footer_column">
						<div class="footer_col">
							<div class="footer_title">contact info</div>
							<div class="footer_content footer_contact">
								<ul class="contact_info_list">
									<li class="contact_info_item d-flex flex-row">
										<div>
											<div class="contact_info_icon"><img src="<?= base_url('assets/') ?>images/placeholder.svg" alt=""></div>
										</div>
										<div class="contact_info_text">4127 Raoul Wallenber 45b-c Gibraltar</div>
									</li>
									<li class="contact_info_item d-flex flex-row">
										<div>
											<div class="contact_info_icon"><img src="<?= base_url('assets/') ?>images/phone-call.svg" alt=""></div>
										</div>
										<div class="contact_info_text">2556-808-8613</div>
									</li>
									<li class="contact_info_item d-flex flex-row">
										<div>
											<div class="contact_info_icon"><img src="<?= base_url('assets/') ?>images/message.svg" alt=""></div>
										</div>
										<div class="contact_info_text"><a href="<?= base_url('assets/') ?>mailto:contactme@gmail.com?Subject=Hello" target="_top">contactme@gmail.com</a></div>
									</li>
									<li class="contact_info_item d-flex flex-row">
										<div>
											<div class="contact_info_icon"><img src="<?= base_url('assets/') ?>images/planet-earth.svg" alt=""></div>
										</div>
										<div class="contact_info_text"><a href="<?= base_url('assets/') ?>https://colorlib.com">www.travelajap.com</a></div>
									</li>
								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>
		</footer>

		<!-- Copyright -->

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 order-lg-1 order-2  ">
						<div class="copyright_content d-flex flex-row align-items-center">
							<div>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved | <a href="<?= base_url('assets/') ?>https://colorlib.com" target="_blank">TravelAJAP</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</div>
						</div>
					</div>
					<div class="col-lg-9 order-lg-2 order-1">
						<div class="footer_nav_container d-flex flex-row align-items-center justify-content-lg-end">
							<div class="footer_nav">
								<ul class="footer_nav_list">
									<li class="footer_nav_item"><a href="<?= base_url('main') ?>">home</a></li>
									<li class="footer_nav_item"><a href="<?= base_url('main/cek_status') ?>">cek status pembayaran</a></li>
									<li class="footer_nav_item"><a href="<?= base_url('main') ?>">tentang kami</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="<?= base_url('assets/') ?>js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url('assets/') ?>styles/bootstrap4/popper.js"></script>
	<script src="<?= base_url('assets/') ?>styles/bootstrap4/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/easing/easing.js"></script>
	<script src="<?= base_url('assets/') ?>js/custom.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/parallax-js-master/parallax.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/colorbox/jquery.colorbox-min.js"></script>
	<script src="<?= base_url('assets/') ?>js/single_listing_custom.js"></script>
	<!-- Datepicker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
	<script src="<?= base_url('assets/') ?>js/lib/jquery-1.11.0.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/lib/jquery.seat-charts.js"></script>
	<script src="<?= base_url('assets/') ?>js/lib/bootstrap.js"></script>
	<script src="<?= base_url('assets/') ?>js/lib/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/lib/angular.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/booking.js"></script>

	<script>
		//rupiah convert
		function convertToRupiah(angka) {
			var rupiah = '';
			var angkarev = angka.toString().split('').reverse().join('');
			for (var i = 0; i < angkarev.length; i++)
				if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
			return rupiah.split('', rupiah.length - 1).reverse().join('');
		}

		function removeArray(arr) {
			var what, a = arguments,
				L = a.length,
				ax;
			while (L > 1 && arr.length) {
				what = a[--L];
				while ((ax = arr.indexOf(what)) !== -1) {
					arr.splice(ax, 1);
				}
			}
			return arr;
		}

		var firstSeatLabel = 1;
		var jumlah = 0;
		var tempat_duduk_pilihan = [];
		var no = [];
		$(document).ready(function() {
			$('#submitBtn').prop('disabled', true);

			var $cart = $('#selected-seats'),
				$counter = $('#counter'),
				$total = $('#total'),
				sc = $('#seat-map').seatCharts({
					map: [
						'd____',
						'ttt__',
						'bbb__',
					],
					seats: {
						d: {
							price: <?= $trayek['harga'] ?>,
							classes: 'depan', //your custom CSS class
							category: 'Depan'
						},
						t: {
							price: <?= $trayek['harga'] ?>,
							classes: 'tengah', //your custom CSS class
							category: 'Tengah'
						},
						b: {
							price: <?= $trayek['harga'] ?>,
							classes: 'belakang', //your custom CSS class
							category: 'Belakang'
						}
					},
					naming: {
						top: false,
						getLabel: function(character, row, column) {
							return firstSeatLabel++;
						},
					},
					legend: {
						node: $('#legend'),
						items: [
							['d', 'available', 'Tersedia'],
							['x', 'unavailable', 'Tidak Tersedia']
						]
					},
					click: function() {
						if (this.status() == 'available') {
							//let's create a new <li> which we'll add to the cart items
							$('<li>' + this.data().category + ' #' + this.settings.label + ': <b>Rp. ' + convertToRupiah(this.data().price) + '</b> <a href="#" class="cancel-cart-item btn btn-primary btn-sm">Batal</a></li>')
								.attr('id', 'cart-item-' + this.settings.id)
								.data('seatId', this.settings.id)
								.appendTo($cart);
							// console.log($cart);
							/*
							 * Lets update the counter and total
							 *
							 * .find function will not find the current seat, because it will change its stauts only after return
							 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
							 */
							$counter.text(sc.find('selected').length + 1);

							jumlah = recalculateTotal(sc) + this.data().price;
							$total.text("Rp. " + convertToRupiah(jumlah));
							//tempat duduk array push
							tempat_duduk_pilihan.push(this.settings.id);
							//no tempat duduk array push
							no.push(this.data().category + " #" + this.settings.label);

							$('#submitBtn').prop('disabled', false);

							return 'selected';
						} else if (this.status() == 'selected') {
							//update the counter
							$counter.text(sc.find('selected').length - 1);
							//and total
							jumlah = recalculateTotal(sc) - this.data().price;
							$total.text("Rp. " + convertToRupiah(jumlah));

							//remove the item from our cart
							$('#cart-item-' + this.settings.id).remove();
							//remove tempat duduk array
							removeArray(tempat_duduk_pilihan, this.settings.id);
							//remove tempat duduk array
							removeArray(no, this.data().category + " #" + this.settings.label);

							if ($counter.text() == 0) {
								$('#submitBtn').prop('disabled', true);
							}

							//seat has been vacated
							return 'available';
						} else if (this.status() == 'unavailable') {
							//seat has been already booked
							return 'unavailable';
						} else {
							return this.style();
						}
					}
				});

			//this will handle "[cancel]" link clicks
			$('#selected-seats').on('click', '.cancel-cart-item', function() {
				//let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
				sc.get($(this).parents('li:first').data('seatId')).click();
			});

			//seats that already been booked
			<?php
			$sisa = explode(',', $trayek['sisa_tempat_duduk']);
			$tempat_duduk = array('1_1', '2_1', '2_2', '2_3', '3_1', '3_2', '3_3');
			$diff = array_values(array_diff($tempat_duduk, $sisa));

			?>
			<?php for ($i = 0; $i < count($diff); $i++) { ?>
				sc.get(['<?= $diff[$i] ?>']).status('unavailable');
			<?php } ?>

		});

		function recalculateTotal(sc) {
			var total = 0;

			//basically find every selected seat and sum its price
			sc.find('selected').each(function() {
				total += this.data().price;
			});

			return total;
		}

		function lanjut() {
			var counter = $("#counter").text();

			$("#jumlah_tiket").val(counter);
			$("#tempat_duduk").val(tempat_duduk_pilihan);
			$("#no").val(no);
			$("#harga").val(jumlah);
		}
	</script>
</body>

</html>
