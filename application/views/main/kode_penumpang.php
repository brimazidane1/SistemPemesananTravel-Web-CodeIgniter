<div class="contact_form_section">
	<div class="container">
		<div class="row">
			<div class="col">

				<!-- Contact Form -->
				<div class="contact_form_container">
					<div id="kode" class="contact_title text-center">Kode: <span id="kode_penumpang"><?= $kode_verifikasi; ?></span>
						<button id="copyBtn" class="btn btn-dark btn-xs">Salin</button></div>
					<div class="contact_title1 text-center">Silahkan simpan kode verifikasi penumpang diatas:<br>(Kode digunakan untuk mengirimkan bukti transfer (jika transfer) & pengecekan status pembayaran)</div>
					<br>
					<center>
						<a class="btn btn-warning btn-xs" href="<?= base_url('main/cek_status') ?>"><span class="fa fa-info"></span> Cek Status Pembayaran</a>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	document.getElementById("copyBtn").addEventListener("click", copy_password);

	function copy_password() {
		var copyText = document.getElementById("kode_penumpang");
		var textArea = document.createElement("textarea");
		textArea.value = copyText.textContent;
		document.body.appendChild(textArea);
		textArea.select();
		document.execCommand("Copy");
		textArea.remove();

		toastr.success('Kode penumpang telah berhasil disalin.', 'Success!');
	}
</script>