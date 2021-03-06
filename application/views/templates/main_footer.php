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

		<script>
			$('.datepicker').each(function() {
				$(this).datepicker({
					uiLibrary: 'bootstrap4',
					format: 'yyyy-mm-dd',
					showOnFocus: true,
					showRightIcon: false
				});
			});
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