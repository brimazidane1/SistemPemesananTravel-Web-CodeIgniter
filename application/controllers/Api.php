<?php
defined('BASEPATH') or exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;


class Api extends REST_Controller
{

	function __construct($config = 'rest')
	{
		parent::__construct($config);
	}

	// API untuk mendapatkan data rute kota asal & tujuan
	public function daftar_rute_get()
	{

		$response['rute'] = $this->Rute_model->get_rute_filter();

		$this->response($response, 200);
	}

	// API untuk mendapatkan data daftar trayek / Untuk melakukan pencarian travel
	public function daftar_trayek_get()
	{

		$response['daftar_trayek'] = array();
		$response['jumlah_trayek'] = array();


		$rute_dari = $this->input->get('rute_dari');
		$rute_ke = $this->input->get('rute_ke');
		$tanggal = $this->input->get('tanggal');
		$waktu = $this->input->get('waktu');

		if ($waktu == 'semua' && $tanggal != '') {
			$response['daftar_trayek'] = $this->Trayek_model->get_trayek_filter_without_waktu($rute_dari, $rute_ke, $tanggal);
			$response['jumlah_trayek'] = $this->Trayek_model->count_trayek_filter_without_waktu($rute_dari, $rute_ke, $tanggal);
		} else if ($waktu == 'semua' && $tanggal == '') {
			$response['daftar_trayek'] = $this->Trayek_model->get_trayek_filter_without_tanggal($rute_dari, $rute_ke);
			$response['jumlah_trayek'] = $this->Trayek_model->count_trayek_filter_without_tanggal($rute_dari, $rute_ke);
		} else {
			$response['daftar_trayek'] = $this->Trayek_model->get_trayek_filter($rute_dari, $rute_ke, $tanggal, $waktu);
		}

		$this->response($response, 200);
	}

	// API untuk periksa status pembayaran
	public function cek_status_pembayaran_get()
	{

		$kodver = $this->input->get('kodver');
		$response['status_pembayaran'] = array();

		if ($kodver != NULL && $kodver != '') {
			$query = $this->db->get_where('penumpang', ['kode_verifikasi' => $kodver], 1)->row_array();
			if ($query) {
				$data = array(
					'message' => 'Data ditemukan!',
					'status' => 1
				);
				$data['base64'] = get_file_encode_base64($query['bukti_pembayaran']);
				$response['status_pembayaran'][] = $query + $data;
			} else {
				$data = array(
					'message' => 'Data tidak ditemukan, Periksa kembali data anda!',
					'status' => -1
				);
				$response['status_pembayaran'][] = $data;
			}
		} else {
			$data = array(
				'message' => 'Kode Pembayaran Tidak Boleh Kosong!',
				'status' => -1
			);

			$response['status_pembayaran'][] = $data;
		}

		$this->response($response, 200);
	}

	// API untuk memilih tempat duduk
	public function pilih_tempat_duduk_get()
	{

		$idtrayek = $this->input->get('id_trayek');

		if ($idtrayek != '' & $idtrayek != NULL) {
			$this->db->join('rute', 'rute.id_rute=trayek.id_rute');
			$response['trayek'] = $this->db->get_where('trayek', ['id_trayek' => $idtrayek])->row_array();
		} else {
			$response['message'] = 'ID Trayek tidak boleh kosong';
			$response['status'] = 'error';
		}

		$this->response($response, 200);
	}

	// API untuk melengkapi data penumpang dan pilih bagasi
	public function data_penumpang_post()
	{
//		$this->response(unserialize('a:16:{s:14:"Content-Length";s:3:"270";s:12:"Content-Type";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:4:"Host";s:13:"192.168.137.1";s:10:"Connection";s:10:"Keep-Alive";s:15:"Accept-Encoding";s:4:"gzip";s:2:"jk";s:22:"[Laki-Laki, Laki-Laki]";s:4:"umur";s:8:"[29, 21]";s:4:"nama";s:12:"[koko, kiki]";s:12:"tempat_duduk";s:10:"[2_2, 2_3]";s:4:"nohp";s:12:"[0812, 0859]";s:9:"id_trayek";s:2:"12";s:5:"email";s:24:"[koko@m.com, kiki@m.com]";s:5:"paket";s:10:"[1_4, 1_5]";s:12:"total_bangku";s:1:"2";s:16:"jenis_pembayaran";s:4:"Agen";s:6:"alamat";s:13:"[jalan, duma]";}'));
		$idTrayek = $this->post('id_trayek');
		$totalSeat = $this->post('total_bangku');
		$names = parseStringBrackets($this->post('nama'));
		$genders = parseStringBrackets($this->post('jk'));
		$ages = parseStringBrackets($this->post('umur'));
		$addresses = parseStringBrackets($this->post('alamat'));
		$emails = parseStringBrackets($this->post('email'));
		$phones = parseStringBrackets($this->post('nohp'));
		$seats = parseStringBrackets($this->post('tempat_duduk'));
		$luggages = parseStringBrackets($this->post('paket'));
		$payment = $this->post('jenis_pembayaran');

		$queryTrayek = $this->Trayek_model->get_by_id_as_row_array($idTrayek);
		$arraySisaTempatDuduk = explode(',',$queryTrayek['sisa_tempat_duduk']);
		$arraySisaPaket = explode(',',$queryTrayek['sisa_paket']);
		foreach ($seats as $i => $seat)
			if (!in_array($seat, $arraySisaTempatDuduk))
				return $this->response(['status'=>'failed', 'message'=>'Tempat duduk sudah dipesan, silahkan coba lagi'], 409);
		foreach ($luggages as $i => $luggage)
			if (!in_array($luggage, $arraySisaPaket))
				return $this->response(['status'=>'failed', 'message'=>'Bagasi sudah dipesan, silahkan coba lagi'], 409);

		$arraySisaTempatDuduk = array_diff($arraySisaTempatDuduk, $seats);
		foreach ($arraySisaTempatDuduk as $value)
			$newArraySisaTempatDuduk[] = $value;
		$arraySisaPaket = array_diff($arraySisaPaket, $luggages);
		foreach ($arraySisaPaket as $value)
			$newArraySisaPaket[] = $value;

		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		$kodeVerifikasi = generateKodeVerifikasi($idTrayek);
		for ($i = 0; $i < $totalSeat; $i++) {
			$data = array(
				'nama' => $names[$i],
				'jk' => $genders[$i],
				'umur' => $ages[$i],
				'alamat' => $addresses[$i],
				'email' => $emails[$i],
				'nohp' => $phones[$i],
				'tempat_duduk' => isset($seats[$i]) ? $seats[$i] : '',
				'paket' => isset($luggages[$i]) ? $luggages[$i] : '',
				'jenis_pembayaran' => $payment,
				'id_trayek' => $idTrayek,
				'kode_verifikasi' => $kodeVerifikasi
			);
			$this->Penumpang_model->insert_penumpang($data);
		}

		$dataUpdate = array(
			'sisa_tempat_duduk' => implode(',',$newArraySisaTempatDuduk),
			'sisa_paket' => implode(',',$newArraySisaPaket)
		);
		$update = $this->Trayek_model
			->update_trayek($dataUpdate, ['id_trayek' => $idTrayek]);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE || $update != 1) {
			$this->db->trans_rollback();
			return $this->response(['status'=>'failed', 'message'=>'Bagasi sudah dipesan, silahkan coba lagi'], 409);
		}
		else {
			$this->db->trans_commit();
			return $this->response('', 204);
		}
	}

	public function bukti_bayar_post() {
		$photo = htmlspecialchars($this->post('photo'));

		$photo = str_replace('data:image/png;base64,', '', $photo);
		$photo = str_replace(' ', '+', $photo);

		$dir_path = DIR_ASSETS_IMAGES;
		$file_name = uniqid() . '.png';
		$data = base64_decode($photo);
		$file = $dir_path . $file_name;

		file_put_contents($file, $data);

		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		$dataUpdate = array('bukti_pembayaran' => $file_name, 'status' => 1);
		$whereUpdate = array('kode_verifikasi' => $this->post('kode_verifikasi'));
		$update = $this->Penumpang_model->update_penumpang($dataUpdate, $whereUpdate);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE || $update == 0) {
			$this->db->trans_rollback();
			return $this->response(['status'=>'failed', 'message'=>'Kode verifikasi tidak ditemukan'], 409);
		}
		else {
			$this->db->trans_commit();
			return $this->response('', 204);
		}
	}
}
