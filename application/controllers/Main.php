<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model', '', TRUE);
		$this->load->model('Travel_model', '', TRUE);
		$this->load->model('Armada_model', '', TRUE);
		$this->load->model('Rute_model', '', TRUE);
		$this->load->model('Trayek_model', '', TRUE);
		$this->load->model('Penumpang_model', '', TRUE);
	}

	public function index()
	{
		$this->session->unset_userdata('kode_verifikasi');

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$data['title'] = "Travel AJAP";
		$rute_dari = $this->input->post('rute_dari');
		$rute_ke = $this->input->post('rute_ke');
		$tanggal = $this->input->post('tanggal');
		$waktu = $this->input->post('waktu');

		//baca data 
		$data['daftar_rute'] = $this->Rute_model->get_rute_filter();
		if ($waktu == "Semua" && $tanggal != "") {
			$data['daftar_trayek'] = $this->Trayek_model->get_trayek_filter_without_waktu($rute_dari, $rute_ke, $tanggal);
			$data['jumlah_trayek'] = $this->Trayek_model->count_trayek_filter_without_waktu($rute_dari, $rute_ke, $tanggal);
		} else if ($waktu == "Semua" && $tanggal == "") {
			$data['daftar_trayek'] = $this->Trayek_model->get_trayek_filter_without_tanggal($rute_dari, $rute_ke);
			$data['jumlah_trayek'] = $this->Trayek_model->count_trayek_filter_without_tanggal($rute_dari, $rute_ke);
		} else {
			$data['daftar_trayek'] = $this->Trayek_model->get_trayek_filter($rute_dari, $rute_ke, $tanggal, $waktu);
		}

		$this->load->view('templates/main_header_home', $data);
		$this->load->view('main/index', $data);
		$this->load->view('templates/main_footer', $data);
	}

	public function daftar_trayek()
	{
		$data['title'] = "Daftar Travel";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$rute_dari = $this->input->post('rute_dari');
		$rute_ke = $this->input->post('rute_ke');
		$tanggal = $this->input->post('tanggal');
		$waktu = $this->input->post('waktu');

		//baca data 
		$data['daftar_rute'] = $this->Rute_model->get_rute_filter();
		if ($waktu == "Semua" && $tanggal != "") {
			$data['daftar_trayek'] = $this->Trayek_model->get_trayek_filter_without_waktu($rute_dari, $rute_ke, $tanggal);
			$data['jumlah_trayek'] = $this->Trayek_model->count_trayek_filter_without_waktu($rute_dari, $rute_ke, $tanggal);
		} else if ($waktu == "Semua" && $tanggal == "") {
			$data['daftar_trayek'] = $this->Trayek_model->get_trayek_filter_without_tanggal($rute_dari, $rute_ke);
			$data['jumlah_trayek'] = $this->Trayek_model->count_trayek_filter_without_tanggal($rute_dari, $rute_ke);
		} else {
			$data['daftar_trayek'] = $this->Trayek_model->get_trayek_filter($rute_dari, $rute_ke, $tanggal, $waktu);
			$data['jumlah_trayek'] = $this->Trayek_model->count_trayek_filter($rute_dari, $rute_ke, $tanggal, $waktu);
		}

		$this->load->view('templates/main_header', $data);
		$this->load->view('main/daftar_trayek', $data);
		$this->load->view('templates/main_footer', $data);
	}

	public function pilih_tempat_duduk($id)
	{
		$data['title'] = 'Pilih Tempat Duduk';

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//baca id  
		$this->db->join('rute', 'rute.id_rute=trayek.id_rute');
		$data['trayek'] = $this->db->get_where('trayek', ['id_trayek' => $id])->row_array();

		$this->load->view('main/pilih_tempat_duduk', $data);
	}

	public function data_penumpang()
	{
		$data['title'] = 'Data Penumpang';

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//baca id
		$this->db->join('rute', 'rute.id_rute = trayek.id_rute');
		$this->db->join('armada', 'armada.id_armada = trayek.id_armada');
		$this->db->join('travel', 'travel.id_travel = armada.id_travel');
		$data['trayek'] = $this->db->get_where('trayek', ['id_trayek' => $this->input->post('id_trayek')])->row_array();
		$data['jumlah_tiket'] = $this->input->post('jumlah_tiket');
		$data['tempat_duduk'] = $this->input->post('tempat_duduk');
		$data['no'] = $this->input->post('no');
		$data['harga'] = $this->input->post('harga');
		$data['paket'] = $this->input->post('paket');

		//data auto
		$jumlah = explode(',', $this->input->post('tempat_duduk'));
		$date = date_create($data['trayek']['tanggal']);
		$date_format = date_format($date, "d-m-y");
		$tanggal = explode('-', $date_format);
		$no_pol = explode(' ', $data['trayek']['no_pol']);
		$jumlah_paket = explode(',', $this->input->post('paket'));

		//kode verifikasi
		$random_hash = md5(uniqid(rand(), true));
		$data['kode_verifikasi'] = substr($random_hash, 0, 5) . $no_pol[2] . $no_pol[1] . $no_pol[0] . $data['trayek']['rute_dari'] . $data['trayek']['rute_ke'] . $tanggal[0] . $tanggal[1] . $tanggal[2] . $data['trayek']['waktu'];

		//validasi
		for ($i = 0; $i < count($jumlah); $i++) {
			$this->form_validation->set_rules('nama' . $i, 'Nama', 'required');
		}

		if ($this->form_validation->run() == false) {
			$this->load->view('main/data_penumpang', $data);
		} else {
			//insert penumpang
			$insert_data = array();

			for ($i = 0; $i < count($jumlah); $i++) {
				if (count($jumlah) == 1) {
					$insert_data[] = array(
						'nama' => $this->input->post('nama' . $i),
						'jk' => $this->input->post('jk' . $i),
						'umur' => $this->input->post('umur' . $i),
						'alamat' => $this->input->post('alamat' . $i),
						'email' => $this->input->post('email' . $i),
						'nohp' => $this->input->post('nohp' . $i),
						'tempat_duduk' => $jumlah[$i],
						'paket' => $data['paket'],
						'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
						'kode_verifikasi' => $data['kode_verifikasi'],
						'status' => 0,
						'id_trayek' => $this->input->post('id_trayek')
					);
				} else {
					$insert_data[] = array(
						'nama' => $this->input->post('nama' . $i),
						'jk' => $this->input->post('jk' . $i),
						'umur' => $this->input->post('umur' . $i),
						'alamat' => $this->input->post('alamat' . $i),
						'email' => $this->input->post('email' . $i),
						'nohp' => $this->input->post('nohp' . $i),
						'tempat_duduk' => $jumlah[$i],
						'paket' => $data['paket'],
						'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
						'kode_verifikasi' => $data['kode_verifikasi'],
						'status' => 0,
						'id_trayek' => $this->input->post('id_trayek')
					);
				}
			}
			$this->db->insert_batch('penumpang', $insert_data);

			//update sisa tempat duduk
			$sisa = explode(',', $data['trayek']['sisa_tempat_duduk']);
			$update_sisa = "";
			$diff = array_values(array_diff($sisa, $jumlah));

			for ($i = 0; $i < count($diff); $i++) {
				if ($i == count($diff) - 1) {
					$update_sisa .= $diff[$i];
				} else {
					$update_sisa .= $diff[$i] . ",";
				}
			}

			//update sisa paket
			$sisa_paket = explode(',', $data['trayek']['sisa_paket']);
			$update_sisa_paket = "";
			$diff_paket = array_values(array_diff($sisa_paket, $jumlah_paket));

			for ($i = 0; $i < count($diff_paket); $i++) {
				if ($i == count($diff_paket) - 1) {
					$update_sisa_paket .= $diff_paket[$i];
				} else {
					$update_sisa_paket .= $diff_paket[$i] . ",";
				}
			}

			$data2 = array(
				'sisa_tempat_duduk' => $update_sisa,
				'sisa_paket' => $update_sisa_paket,
			);
			$this->db->where('id_trayek', $this->input->post('id_trayek'));
			$this->db->update('trayek', $data2);

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fa fa-check"></i>Success!</h5>
				Tiket telah berhasil dibeli! Silahkan download dan simpan kode penumpang berikut untuk mengirimkan bukti transfer (jika transfer) & melakukan pengecekan status pembayaran.
			  </div>'
			);

			//baca session kode verifikasi
			$this->session->set_userdata('kode_verifikasi', $data['kode_verifikasi']);

			redirect('main/kode_penumpang');
		}
	}

	public function kode_penumpang()
	{
		$data['title'] = 'Kode Penumpang';

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//baca id
		$this->db->join('rute', 'rute.id_rute = trayek.id_rute');
		$this->db->join('armada', 'armada.id_armada = trayek.id_armada');
		$this->db->join('travel', 'travel.id_travel = armada.id_travel');
		$data['trayek'] = $this->db->get_where('trayek', ['id_trayek' => $this->input->post('id_trayek')])->row_array();
		$data['jumlah_tiket'] = $this->input->post('jumlah_tiket');
		$data['tempat_duduk'] = $this->input->post('tempat_duduk');
		$data['no'] = $this->input->post('no');
		$data['harga'] = $this->input->post('harga');
		$data['kode_verifikasi'] = $this->session->userdata('kode_verifikasi');

		//get pesanan
		$data['penumpang'] = $this->db->get_where('penumpang', ['kode_verifikasi' => $this->session->userdata('kode_verifikasi')])->result_array();

		$this->load->view('templates/main_header', $data);
		$this->load->view('main/kode_penumpang', $data);
		$this->load->view('templates/main_footer', $data);
	}

	public function cek_status()
	{
		$this->session->unset_userdata('kode_verifikasi');

		$data['title'] = 'Cek Status Pembayaran';

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$this->load->view('templates/main_header', $data);
		$this->load->view('main/cek_status', $data);
		$this->load->view('templates/main_footer', $data);
	}

	public function cek_status_2()
	{
		$data['title'] = 'Cek Status Pembayaran';

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//get row
		$data['cek_penumpang'] = $this->db->get_where('penumpang', ['kode_verifikasi' => $this->input->post('kode_verifikasi')], 1)->row_array();

		//get kode		
		$this->db->join('trayek', 'trayek.id_trayek = penumpang.id_trayek');
		$this->db->join('rute', 'rute.id_rute = trayek.id_rute');
		$this->db->join('armada', 'armada.id_armada = trayek.id_armada');
		$this->db->join('travel', 'travel.id_travel = armada.id_travel');
		$data['data_penumpang'] = $this->db->get_where('penumpang', ['kode_verifikasi' => $this->input->post('kode_verifikasi')])->result_array();

		$this->form_validation->set_rules('kode_verifikasi2', 'Kode Verifikasi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/main_header', $data);
			$this->load->view('main/cek_status_2', $data);
			$this->load->view('templates/main_footer', $data);
		} else {
			$bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];

			if ($bukti_pembayaran) {
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/images/bukti/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('bukti_pembayaran')) {

					$bukti_lama = $this->input->post('bukti_lama');

					if (!empty($bukti_lama)) {
						unlink(FCPATH . 'assets/images/bukti/' . $bukti_lama);
					}
					$bukti_baru = $this->upload->data('file_name');

					$this->db->set('bukti_pembayaran', $bukti_baru);
					$this->db->where('kode_verifikasi', $this->input->post('kode_verifikasi2'));
					$this->db->update('penumpang');
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fa fa-check"></i>Success!</h5>
				Bukti pembayaran telah berhasil diunggah. Silahkan menunggu verifikasi dari admin & cek secara berkala untuk mengunduh formulir penumpang.
			  </div>'
			);

			redirect('main/cek_status');
		}
	}
}
