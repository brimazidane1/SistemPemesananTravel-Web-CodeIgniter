		<!-- Offers -->

		<div class="listing">

			<!-- Search -->
			<div class="search">

				<!-- Search Contents -->
				<div class="container fill_height">
					<div class="row fill_height">
						<div class="col fill_height">

							<!-- Search Tabs -->
							<div class="search_tabs_container">
								<div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="<?= base_url('assets/') ?>images/bus.png" alt="">Cari Travel</div>
								</div>
							</div>

							<!-- Search Panel -->
							<div class="search_panel active">

								<form id="form-cari" action="<?= base_url('main/daftar_trayek/') ?>" method="post" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="form-group search_item">
										<div>Dari</div>
										<select class="custom-select dropdown_item_select search_input" id="rute_dari" name="rute_dari" required>
											<option disabled value="" selected>-- Pilih Rute --</option>
											<?php foreach ($daftar_rute as $d) : ?>
												<option value="<?= $d['rute_dari'] ?>"><?= $d['rute_dari'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group search_item">
										<div>Ke</div>
										<select class="custom-select dropdown_item_select search_input" id="rute_ke" name="rute_ke" required>
											<option disabled value="" selected>-- Pilih Rute --</option>
											<?php foreach ($daftar_rute as $d) : ?>
												<option value="<?= $d['rute_dari'] ?>"><?= $d['rute_dari'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group search_item">
										<div>Tanggal</div>
										<input id="tanggal" value="<?= set_value('tanggal'); ?>" class="form-control datepicker search_input" name="tanggal" placeholder="YYYY-MM-DD">
									</div>
									<div class="form-group search_item">
										<div>Waktu</div>
										<select class="custom-select dropdown_item_select search_input" id="waktu" name="waktu">
											<option value="Semua" selected>Semua</option>
											<option value="Pagi">Pagi</option>
											<option value="Siang">Siang</option>
											<option value="Malam">Malam</option>
										</select>
									</div>
									<div class="search_item">
										<button type="submit" class="button search_button">Cari</button>
										<button type="button" id="btn-reset" onclick="reset_form()" class="button search_button">Reset</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Daftar Travel -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="single_listing">
							<div class="hotel_location"><?= $jumlah_trayek ?> Travel Ditemukan.</div>

							<!-- Travel -->
							<?php foreach ($daftar_trayek as $t) : ?>
								<div class="rooms">
									<div class="room">
										<div class="row">
											<div class="col-lg-2">
												<div class="room_image"><img src="<?= base_url('assets/') ?>images/room_1.jpg" alt="https://unsplash.com/@grovemade"></div>
											</div>
											<div class="col-lg-7">
												<div class="room_content">
													<?php $tanggal = date_create($t['tanggal']); ?>
													<div class="room_title"><?= $t['rute_dari'] . " - " . $t['rute_ke'] ?></div>
													<div class="room_price"><?= "Rp. " . rupiah($t['harga']) . "/tiket" ?></div>
													<div class="room_text">Waktu Berangkat: <?= date_format($tanggal, "d M Y") . " - " . $t['waktu'] ?></div>
													<div class="room_extra"><?= $t['nama_travel'] . " - " . $t['mobil'] ?></div>
												</div>
											</div>
											<div class="col-lg-3 text-lg-right">
												<div class="room_button">
													<div class="button book_button trans_200"><a href="<?= base_url('main/pilih_tempat_duduk/' . $t['id_trayek']) ?>">Pilih Tempat Duduk<span></span><span></span><span></span></a></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			document.getElementById('rute_dari').value = "<?= $_POST['rute_dari']; ?>";
			document.getElementById('rute_ke').value = "<?= $_POST['rute_ke']; ?>";
			document.getElementById('waktu').value = "<?= $_POST['waktu']; ?>";

			function reset_form() {
				document.getElementById("form-cari").reset();
				$('[name="tanggal"]').datepicker().val("");
			}
		</script>