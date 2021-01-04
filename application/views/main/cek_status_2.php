			<!-- Search -->
			<div class="search">

				<!-- Search Contents -->
				<div class="container">
					<div class="row">
						<div class="col">

							<!-- Search Panel -->
							<center>
								<div class="search_panel active">
									<form id="form-cari" action="<?= base_url('main/cek_status_2/') ?>" method="post" class="search_panel_content">
										<div class="form-group search_item">
											<div>Kode Penumpang</div>
											<input type="text" id="kode_verifikasi" name="kode_verifikasi" class="form-control destination search_input" required="required" value="<?= set_value('kode_verifikasi'); ?>">
										</div>
										<button type="submit" class="button search_button">Cari</button>
									</form>
								</div>
							</center>
						</div>
					</div>
				</div>
			</div>

			<?php if ($cek_penumpang['kode_verifikasi'] == null) { ?>
				<div class="intro">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="intro_content">
									<div class="intro_title">Kode Penumpang tidak ditemukan.</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<?php if ($cek_penumpang['jenis_pembayaran'] == "Agen") { ?>
					<div class="intro">
						<div class="container">
							<div class="row">
								<div class="col-lg-7">
									<div class="intro_content">
										<div class="intro_title">Kode Penumpang: <?= $cek_penumpang['kode_verifikasi'] ?></div>
										<?php if ($cek_penumpang['status'] == 0) { ?>
											<p class="intro_text">Status Pembayaran: <a style="color:red">Menunggu Verifikasi</a></p>
										<?php } else { ?>
											<p class="intro_text">Status Pembayaran: <a style="color:green">Lunas</a></p>
										<?php } ?>
										<!-- <div class="button">
									<div class="button_bcg"></div><a href="#">explore now<span></span><span></span><span></span></a>
								</div> -->
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } else if ($cek_penumpang['jenis_pembayaran'] == "Transfer") { ?>
					<div class="intro">
						<div class="container">
							<div class="row">
								<div class="col-lg-7">
									<div class="intro_content">
										<div class="intro_title">Kode Penumpang: <?= $cek_penumpang['kode_verifikasi'] ?></div>
										<?php if ($cek_penumpang['status'] == 0) { ?>
											<p class="intro_text">Status Pembayaran: <a style="color:red">Menunggu Verifikasi</a></p>
											<p class="intro_text">Silahkan upload bukti pembayaran.</p>
											<form action="<?= base_url('main/cek_status_2'); ?>" method="post" enctype="multipart/form-data">
												<button type="submit" class="btn btn-primary">Unggah</button>
												<div class="custom-file">
													<input type="file" id="bukti_pembayaran" name="bukti_pembayaran">
												</div>
												<input type="hidden" name="kode_verifikasi2" value="<?= $cek_penumpang['kode_verifikasi']; ?>">
												<input type="hidden" name="bukti_lama" value="<?= $cek_penumpang['bukti_pembayaran']; ?>">

												<img class="img-fluid mt-3" src="<?= base_url('assets/images/bukti/') . $cek_penumpang['bukti_pembayaran']; ?>">
											<?php } else { ?>
												<p class="intro_text">Status Pembayaran: <a style="color:green">Lunas</a></p>
											<?php } ?>


											<!-- <div class="button">
									<div class="button_bcg"></div><a href="#">explore now<span></span><span></span><span></span></a>
								</div> -->
											</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>

			<script>
				//tampilkan nama upload file c1
				$('.custom-file-input').on('change', function() { //cari file input
					let fileName = $(this).val().split('\\').pop(); //ambil nama file
					$(this).next('.custom-file-label').addClass("selected").html(fileName); //simpan ke inputtext
				});
			</script>