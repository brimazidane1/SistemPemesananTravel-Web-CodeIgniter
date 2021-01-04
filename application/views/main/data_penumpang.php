	<!DOCTYPE html>
	<html lang="en">

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
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>styles/about_styles.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>styles/about_responsive.css">
		<!-- Datepicker -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" type="text/css" />
		<!-- Toastr -->
		<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/toastr/toastr.min.css">
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
										<div class="user_box_register user_box_link"><a href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">logout,</a></div>
										<div class="user_box_register user_box_link"><a>Hai <?= $users['username'] ?>!</a></div>
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
										<li class="main_nav_item"><a href="<?= base_url('main') ?>">tentang kami</a></li>
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

			<!-- Pilih Paket -->
			<div class="wrapper">
				<div class="container">
					<div id="seat-map" class="seat-panel">
						<div class="front-indicator">Silahkan pilih bagasi (jika membawa paket)</div>
					</div>
					<div class="booking-details">
						<h3> Paket (<span id="counter">0</span>):</h3>
						<ul id="selected-seats"></ul>
						<b>Total: <span id="total">0</span></b>

						<div id="legend"></div>
					</div>
				</div>
			</div>

			<!-- Contact -->

			<div class="contact_form_section">
				<div class="container">
					<div class="row">
						<div class="col">

							<!-- Contact Form -->
							<div class="contact_form_container">
								<div class="contact_title text-center"><?= $jumlah_tiket ?> Tiket <?= $trayek['rute_dari'] . "-" . $trayek['rute_ke'] . " / " . $trayek['nama_travel'] . " / " . $trayek['mobil'] . " / Rp. " . rupiah($harga) ?></div>
								<form method="post" onsubmit="lanjut();" action="<?= base_url('main/data_penumpang'); ?>" id="contact_form" class="contact_form text-center">
									<input type="hidden" class="form-control" id="id_trayek" name="id_trayek" value="<?= $trayek['id_trayek']; ?>">
									<input type="hidden" class="form-control" id="jumlah_tiket" name="jumlah_tiket" value="<?= $jumlah_tiket; ?>">
									<input type="hidden" class="form-control" id="tempat_duduk" name="tempat_duduk" value="<?= $tempat_duduk; ?>">
									<input type="hidden" class="form-control" id="harga" name="harga" value="<?= $harga; ?>">
									<input type="hidden" class="form-control" id="kode_verifikasi" name="kode_verifikasi" value="<?= $kode_verifikasi; ?>">
									<input type="hidden" class="form-control" id="paket" name="paket" value="">
									<input type="hidden" class="form-control" id="jumlah_paket" name="jumlah_paket" value="">
									<?php $pilihan = explode(',', $no);

									for ($i = 0; $i < count($pilihan); $i++) { ?>
										<div class="contact_title1 text-center">Data Penumpang <?= $pilihan[$i] ?></div>
										<input type="text" id="nama<?= $i; ?>" name="nama<?= $i; ?>" class="contact_form_name input_field" placeholder="Nama" required="required" data-error="nama wajib diisi." autocomplete="off">
										<input type="text" id="jk<?= $i; ?>" name="jk<?= $i; ?>" list="jklist<?= $i; ?>" class="contact_form_email input_field" placeholder="Jenis Kelamin" required="required" data-error="Jenis Kelamin wajib diisi." autocomplete="off">
										<datalist id="jklist<?= $i; ?>">
											<option value="Laki-Laki">Laki-Laki</option>
											<option value="Perempuan">Perempuan</option>
										</datalist>
										<input type="text" id="umur<?= $i; ?>" name="umur<?= $i; ?>" class="contact_form_name input_field" placeholder="Umur" required="required" data-error="Umur wajib diisi." autocomplete="off">
										<input type="text" id="alamat<?= $i; ?>" name="alamat<?= $i; ?>" class="contact_form_email input_field" placeholder="Alamat" required="required" data-error="Alamat wajib diisi." autocomplete="off">
										<input type="text" id="nohp<?= $i; ?>" name="nohp<?= $i; ?>" class="contact_form_name input_field" placeholder="No HP" required="required" data-error="No HP wajib diisi." autocomplete="off">
										<input type="text" id="email<?= $i; ?>" name="email<?= $i; ?>" class="contact_form_email input_field" placeholder="Email" required="required" data-error="Email wajib diisi." autocomplete="off">
									<?php } ?>

									<input type="text" id="jenis_pembayaran" name="jenis_pembayaran" list="jp" class="contact_form_subject input_field" placeholder="Jenis Pembayaran" required="required" data-error="Jenis Pembayaran wajib diisi." autocomplete="off">
									<datalist id="jp">
										<option value="Agen">Agen</option>
										<option value="Transfer">Transfer</option>
									</datalist>
									<button type="submit" id="form_submit_button" class="form_submit_button button trans_200">Lanjutkan<span></span><span></span><span></span></button>
								</form>
							</div>
						</div>
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
		<script src="<?= base_url('assets/') ?>js/about_custom.js"></script>
		<!-- Datepicker -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
		<!-- Toastr -->
		<script src="<?= base_url('assets/') ?>plugins/toastr/toastr.min.js"></script>
		<script src="<?= base_url('assets/') ?>js/lib/jquery-1.11.0.min.js"></script>
		<script src="<?= base_url('assets/') ?>js/lib/jquery.seat-charts.js"></script>
		<script src="<?= base_url('assets/') ?>js/lib/bootstrap.js"></script>
		<script src="<?= base_url('assets/') ?>js/lib/bootstrap.min.js"></script>
		<script src="<?= base_url('assets/') ?>js/lib/angular.min.js"></script>
		<script src="<?= base_url('assets/') ?>js/booking.js"></script>


		<script>
			$('.datepicker').each(function() {
				$(this).datepicker({
					uiLibrary: 'bootstrap4',
					format: 'yyyy-mm-dd',
					showOnFocus: true,
					showRightIcon: false
				});
			});

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
			var paket_pilihan = [];
			var no = [];
			$(document).ready(function() {
				$('#submitBtn').prop('disabled', true);

				var $cart = $('#selected-seats'),
					$counter = $('#counter'),
					$total = $('#total'),
					sc = $('#seat-map').seatCharts({
						map: [
							'ppppp',
						],
						seats: {
							p: {
								price: 1,
								classes: 'paket', //your custom CSS class
								category: 'Paket'
							},
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
								['p', 'available', 'Tersedia'],
								['x', 'unavailable', 'Tidak Tersedia']
							]
						},
						click: function() {
							if (this.status() == 'available') {
								//let's create a new <li> which we'll add to the cart items
								$('<li>' + this.data().category + ' #' + this.settings.label + ': <a href="#" class="cancel-cart-item btn btn-primary btn-sm">Batal</a></li>')
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
								$total.text(jumlah);
								//tempat duduk array push
								paket_pilihan.push(this.settings.id);
								//no tempat duduk array push
								no.push(this.data().category + " #" + this.settings.label);

								return 'selected';
							} else if (this.status() == 'selected') {
								//update the counter
								$counter.text(sc.find('selected').length - 1);
								//and total
								jumlah = recalculateTotal(sc) - this.data().price;
								$total.text(jumlah);

								//remove the item from our cart
								$('#cart-item-' + this.settings.id).remove();
								//remove tempat duduk array
								removeArray(paket_pilihan, this.settings.id);
								//remove tempat duduk array
								removeArray(no, this.data().category + " #" + this.settings.label);

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
				$sisa = explode(',', $trayek['sisa_paket']);
				$paket = array('1_1', '1_2', '1_3', '1_4', '1_5');
				$diff = array_values(array_diff($paket, $sisa));

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

				$("#jumlah_paket").val(counter);
				$("#paket").val(paket_pilihan);
			}
		</script>

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modaltitle" id="logoutModalLabel">Apakah anda yakin ingin keluar?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Jika tidak, pilih batal.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
						<a class="btn btn-warning" href="<?= base_url('auth/logout'); ?>">Logout</a>
					</div>
				</div>
			</div>
		</div>
	</body>

	</html>