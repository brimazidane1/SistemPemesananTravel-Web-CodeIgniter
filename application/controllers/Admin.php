<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model', '', TRUE);
		$this->load->model('Menu_model', '', TRUE);
		$this->load->model('Submenu_model', '', TRUE);
		$this->load->model('Akses_model', '', TRUE);
		$this->load->model('Travel_model', '', TRUE);
		$this->load->model('Armada_model', '', TRUE);
		$this->load->model('Rute_model', '', TRUE);
		$this->load->model('Trayek_model', '', TRUE);
		$this->load->model('Penumpang_model', '', TRUE);

		//cek session dan role
		cek_login();
	}

	public function index()
	{
		$data['title'] = "Profile";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('templates/footer');
	}

	// tabel travel
	function get_ajax_travel()
	{
		$list = $this->Travel_model->get_datatables_travel();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = array();
			$row[] = $no . ".";
			$row[] = $item->nama_travel;
			$row[] = $item->jumlah_armada;


			$row[] = '<div>
				<a class="btn btn-success btn-xs btn-block" href="javascript:void(0)" title="Edit" onclick="edit_travel(' . "'" . $item->id_travel . "'" . ')"><span class="fas fa-pencil-alt"></span>Edit</a>
				</div>';

			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Travel_model->count_all_travel(),
			"recordsFiltered" => $this->Travel_model->count_filtered_travel(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function data_travel()
	{
		$data['title'] = "Data Travel";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/data_travel', $data);
		$this->load->view('templates/footer');
	}

	public function insert_travel_ajax()
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();


		$this->_validate_insert_travel();

		$data = array(
			'nama_travel' => $this->input->post('nama_travel'),
		);
		$id = $this->Travel_model->insert_travel($data);

		echo json_encode(array("status" => TRUE));
	}

	public function edit_travel_ajax($id_travel)
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//cek doc id terakhir pada tagihan
		$data = $this->Travel_model->get_by_id($id_travel);

		echo json_encode($data);
	}

	public function update_travel_ajax()
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$this->_validate_update_travel();

		//cek id
		$id = $this->input->post('id_travel');

		$data = array(
			'nama_travel' => $this->input->post('nama_travel')
		);
		$this->Travel_model->update_travel($data, [
			'id_travel' => $id
		]);

		echo json_encode(array("status" => TRUE));
	}


	private function _validate_insert_travel()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('nama_travel') == '') {
			$data['inputerror'][] = 'nama_travel';
			$data['error_string'][] = 'Nama Travel is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

	private function _validate_update_travel()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('nama_travel') == '') {
			$data['inputerror'][] = 'nama_travel';
			$data['error_string'][] = 'Nama Travel is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

	// tabel armada 
	function get_ajax_armada()
	{
		$list = $this->Armada_model->get_datatables_armada();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = array();
			$row[] = $no . ".";
			$row[] = $item->nama_travel;
			$row[] = $item->mobil;
			$row[] = $item->no_pol;
			$row[] = $item->driver;
			$row[] = $item->nohp;

			$row[] = '<div>
				<a class="btn btn-success btn-xs btn-block" href="javascript:void(0)" title="Edit" onclick="edit_armada(' . "'" . $item->id_armada . "'" . ')"><span class="fas fa-pencil-alt"></span>Edit</a>
				</div>';

			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Armada_model->count_all_armada(),
			"recordsFiltered" => $this->Armada_model->count_filtered_armada(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function data_armada()
	{
		$data['title'] = "Data Armada";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$data['daftar_travel'] = $this->Travel_model->get_travel();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/data_armada', $data);
		$this->load->view('templates/footer');
	}

	public function insert_armada_ajax()
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();


		$this->_validate_insert_armada();

		$data = array(
			'mobil' => $this->input->post('mobil'),
			'no_pol' => $this->input->post('no_pol'),
			'driver' => $this->input->post('driver'),
			'nohp' => $this->input->post('nohp'),
			'id_travel' => $this->input->post('pilih_travel')
		);
		$id = $this->Armada_model->insert_armada($data);

		echo json_encode(array("status" => TRUE));
	}

	public function edit_armada_ajax($id_armada)
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//cek doc id terakhir pada tagihan
		$data = $this->Armada_model->get_by_id($id_armada);

		echo json_encode($data);
	}

	public function update_armada_ajax()
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$this->_validate_update_armada();

		//cek id
		$id = $this->input->post('id_armada');

		$data = array(
			'mobil' => $this->input->post('mobil'),
			'no_pol' => $this->input->post('no_pol'),
			'driver' => $this->input->post('driver'),
			'nohp' => $this->input->post('nohp'),
			'id_travel' => $this->input->post('pilih_travel')
		);
		$this->Armada_model->update_armada($data, [
			'id_armada' => $id,
		]);

		echo json_encode(array("status" => TRUE));
	}

	private function _validate_insert_armada()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('pilih_travel') == '') {
			$data['inputerror'][] = 'pilih_travel';
			$data['error_string'][] = 'Nama Travel is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('mobil') == '') {
			$data['inputerror'][] = 'mobil';
			$data['error_string'][] = 'Nama Mobil is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('no_pol') == '') {
			$data['inputerror'][] = 'no_pol';
			$data['error_string'][] = 'Nomor Polisi is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('driver') == '') {
			$data['inputerror'][] = 'driver';
			$data['error_string'][] = 'Nama Driver is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('nohp') == '') {
			$data['inputerror'][] = 'nohp';
			$data['error_string'][] = 'Nomor HP Driver is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

	private function _validate_update_armada()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('pilih_travel') == '') {
			$data['inputerror'][] = 'pilih_travel';
			$data['error_string'][] = 'Nama Travel is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('mobil') == '') {
			$data['inputerror'][] = 'mobil';
			$data['error_string'][] = 'Nama Mobil is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('no_pol') == '') {
			$data['inputerror'][] = 'no_pol';
			$data['error_string'][] = 'Nomor Polisi is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('driver') == '') {
			$data['inputerror'][] = 'driver';
			$data['error_string'][] = 'Nama Driver is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('nohp') == '') {
			$data['inputerror'][] = 'nohp';
			$data['error_string'][] = 'Nomor HP Driver is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

	// tabel rute
	function get_ajax_rute()
	{
		$list = $this->Rute_model->get_datatables_rute();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = array();
			$row[] = $no . ".";
			$row[] = $item->rute_dari . " - " . $item->rute_ke;
			$row[] = "Rp. " . rupiah($item->harga);


			$row[] = '<div>
				<a class="btn btn-success btn-xs btn-block" href="javascript:void(0)" title="Edit" onclick="edit_rute(' . "'" . $item->id_rute . "'" . ')"><span class="fas fa-pencil-alt"></span>Edit</a>
				</div>';

			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Rute_model->count_all_rute(),
			"recordsFiltered" => $this->Rute_model->count_filtered_rute(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function data_rute()
	{
		$data['title'] = "Data Rute";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/data_rute', $data);
		$this->load->view('templates/footer');
	}

	public function insert_rute_ajax()
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();


		$this->_validate_insert_rute();

		$data = array(
			'rute_dari' => $this->input->post('rute_dari'),
			'rute_ke' => $this->input->post('rute_ke'),
			'harga' => $this->input->post('harga')
		);
		$id = $this->Rute_model->insert_rute($data);

		$data2 = array(
			'rute_dari' => $this->input->post('rute_ke'),
			'rute_ke' => $this->input->post('rute_dari'),
			'harga' => $this->input->post('harga')
		);
		$id2 = $this->Rute_model->insert_rute($data2);

		echo json_encode(array("status" => TRUE));
	}

	public function edit_rute_ajax($id_rute)
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//cek doc id terakhir pada tagihan
		$data = $this->Rute_model->get_by_id($id_rute);

		echo json_encode($data);
	}

	public function update_rute_ajax()
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$this->_validate_update_rute();

		//cek id
		$id = $this->input->post('id_rute');

		$data = array(
			'rute_dari' => $this->input->post('rute_dari'),
			'rute_ke' => $this->input->post('rute_ke'),
			'harga' => $this->input->post('harga')
		);
		$this->Rute_model->update_rute($data, [
			'id_rute' => $id,
		]);

		echo json_encode(array("status" => TRUE));
	}

	private function _validate_insert_rute()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('rute_dari') == '') {
			$data['inputerror'][] = 'rute_dari';
			$data['error_string'][] = 'Rute Dari is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('rute_ke') == '') {
			$data['inputerror'][] = 'rute_ke';
			$data['error_string'][] = 'Rute Ke is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('harga') == '') {
			$data['inputerror'][] = 'harga';
			$data['error_string'][] = 'Harga is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

	private function _validate_update_rute()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('rute_dari') == '') {
			$data['inputerror'][] = 'rute_dari';
			$data['error_string'][] = 'Rute Dari is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('rute_ke') == '') {
			$data['inputerror'][] = 'rute_ke';
			$data['error_string'][] = 'Rute Ke is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('harga') == '') {
			$data['inputerror'][] = 'harga';
			$data['error_string'][] = 'Harga is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

	// tabel trayek
	function get_ajax_trayek()
	{
		$list = $this->Trayek_model->get_datatables_trayek();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = array();
			$row[] = $no . ".";
			$row[] = $item->nama_travel;
			$row[] = $item->rute_dari . " - " . $item->rute_ke;
			$row[] = $item->mobil;
			$row[] = $item->no_pol;
			$row[] = $item->tanggal;
			$row[] = $item->waktu;
			$row[] = "Rp. " . rupiah($item->harga);

			$row[] = '<div>
				<a class="btn btn-success btn-xs btn-block" href="javascript:void(0)" title="Edit" onclick="edit_trayek(' . "'" . $item->id_trayek . "'" . ')"><span class="fas fa-pencil-alt"></span>Edit</a>
				</div>';

			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Trayek_model->count_all_trayek(),
			"recordsFiltered" => $this->Trayek_model->count_filtered_trayek(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function data_trayek()
	{
		$data['title'] = "Data Trayek";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$data['daftar_armada'] = $this->Armada_model->get_armada();
		$data['daftar_rute'] = $this->Rute_model->get_rute();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/data_trayek', $data);
		$this->load->view('templates/footer');
	}

	public function insert_trayek_ajax()
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();


		$this->_validate_insert_trayek();

		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'waktu' => $this->input->post('pilih_waktu'),
			'sisa_tempat_duduk' => "1_1,2_1,2_2,2_3,3_1,3_2,3_3",
			'sisa_paket' => "1_1,1_2,1_3,1_4,1_5",
			'id_rute' => $this->input->post('pilih_rute'),
			'id_armada' => $this->input->post('pilih_armada')
		);
		$id = $this->Trayek_model->insert_trayek($data);

		echo json_encode(array("status" => TRUE));
	}

	public function edit_trayek_ajax($id_trayek)
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//cek doc id terakhir pada tagihan
		$data = $this->Trayek_model->get_by_id($id_trayek);

		echo json_encode($data);
	}

	public function update_trayek_ajax()
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$this->_validate_update_trayek();

		//cek id
		$id = $this->input->post('id_trayek');

		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'waktu' => $this->input->post('pilih_waktu'),
			'id_rute' => $this->input->post('pilih_rute'),
			'id_armada' => $this->input->post('pilih_armada')
		);
		$this->Trayek_model->update_trayek($data, [
			'id_trayek' => $id,
		]);

		echo json_encode(array("status" => TRUE));
	}

	private function _validate_insert_trayek()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('tanggal') == '') {
			$data['inputerror'][] = 'tanggal';
			$data['error_string'][] = 'Tanggal is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('pilih_waktu') == '') {
			$data['inputerror'][] = 'pilih_waktu';
			$data['error_string'][] = 'Waktu is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('pilih_rute') == '') {
			$data['inputerror'][] = 'pilih_rute';
			$data['error_string'][] = 'Trayek is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('pilih_armada') == '') {
			$data['inputerror'][] = 'pilih_armada';
			$data['error_string'][] = 'Armada is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

	private function _validate_update_trayek()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('tanggal') == '') {
			$data['inputerror'][] = 'tanggal';
			$data['error_string'][] = 'Tanggal is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('pilih_waktu') == '') {
			$data['inputerror'][] = 'pilih_waktu';
			$data['error_string'][] = 'Waktu is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('pilih_rute') == '') {
			$data['inputerror'][] = 'pilih_rute';
			$data['error_string'][] = 'Trayek required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('pilih_armada') == '') {
			$data['inputerror'][] = 'pilih_armada';
			$data['error_string'][] = 'Armada is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

	// tabel penumpang
	function get_ajax_penumpang()
	{
		$list = $this->Penumpang_model->get_datatables_penumpang();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = array();
			$row[] = $no . ".";
			$row[] = $item->nama;
			$row[] = $item->jk;
			$row[] = $item->umur;
			$row[] = $item->alamat;
			$row[] = $item->email;
			$row[] = $item->nohp;
			$row[] = $item->jenis_pembayaran;
			$row[] = $item->nama_travel;
			$row[] = $item->mobil . " - " . $item->no_pol;
			$row[] = $item->rute_dari . " - " . $item->rute_ke . " (" . $item->tempat_duduk . ")";
			//jumlah paket
			$paket = explode(',', $item->paket);
			$jumlah_paket = count($paket);
			if ($item->paket == 0) {
				$row[] = "-";
			} else {
				$row[] =  $jumlah_paket . " Paket (" . $item->paket . ")";
			}

			$row[] = $item->waktu;
			if ($item->status == 0) {
				$row[] = '<a style="color:red">Belum Bayar</a>';;
			} else {
				$row[] = '<a style="color:green">Sudah Bayar</a>';
			}

			$row[] = '<div>
				<a class="btn btn-success btn-xs btn-block" href="javascript:void(0)" title="Edit" onclick="edit_penumpang(' . "'" . $item->id_penumpang . "'" . ')"><span class="fas fa-pencil-alt"></span>Edit</a>
				</div>';

			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Penumpang_model->count_all_penumpang(),
			"recordsFiltered" => $this->Penumpang_model->count_filtered_penumpang(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function data_penumpang()
	{
		$data['title'] = "Data Penumpang";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$data['daftar_trayek'] = $this->Trayek_model->get_trayek();
		$data['daftar_tempat_duduk'] = $this->Penumpang_model->get_penumpang();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/data_penumpang', $data);
		$this->load->view('templates/footer');
	}

	public function insert_penumpang_ajax()
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//baca id 
		$this->db->join('rute', 'rute.id_rute = trayek.id_rute');
		$this->db->join('armada', 'armada.id_armada=trayek.id_armada');
		$this->db->join('travel', 'travel.id_travel=armada.id_travel');
		$this->db->where('trayek.id_trayek', $this->input->post('pilih_trayek_tambah'));
		$this->db->from('trayek');
		$this->db->select('trayek.*, travel.*, armada.*, rute.rute_dari, rute.rute_ke');
		$detail = $this->db->get()->row_array();

		//baca sisa tempat duduk
		$trayek = $this->db->get_where('trayek', ['id_trayek' => $this->input->post('pilih_trayek_tambah')])->row_array();

		$date = date_create($detail['tanggal']);
		$date_format = date_format($date, "d-m-y");
		$tanggal = explode('-', $date_format);
		$no_pol = explode(' ', $detail['no_pol']);
		$random_hash = md5(uniqid(rand(), true));
		$kode_verifikasi = substr($random_hash, 0, 5) . $no_pol[2] . $no_pol[1] . $no_pol[0] . $detail['rute_dari'] . $detail['rute_ke'] . $tanggal[0] . $tanggal[1] . $tanggal[2] . $detail['waktu'];

		$this->_validate_insert_penumpang();

		$data = array(
			'nama' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'umur' => $this->input->post('umur'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'nohp' => $this->input->post('nohp'),
			'tempat_duduk' => $this->input->post('tempat_duduk_tambah'),
			'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
			'kode_verifikasi' => $kode_verifikasi,
			'status' => 0,
			'id_trayek' => $this->input->post('pilih_trayek_tambah'),
		);
		$id = $this->Penumpang_model->insert_penumpang($data);

		$sisa = explode(',', $trayek['sisa_tempat_duduk']);
		$update_sisa = "";

		for ($i = 0; $i < count($sisa); $i++) {
			if ($sisa[$i] != $this->input->post('tempat_duduk_tambah')) {
				if ($i == count($sisa) - 1) {
					$update_sisa .= $sisa[$i];
				} else {
					$update_sisa .= $sisa[$i] . ",";
				}
			}
		}

		$data2 = array(
			'sisa_tempat_duduk' => $update_sisa,
		);
		$this->Trayek_model->update_trayek($data2, [
			'id_trayek' => $this->input->post('pilih_trayek_tambah'),
		]);

		echo json_encode(array("status" => TRUE));
	}

	public function edit_penumpang_ajax($id_penumpang)
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//cek doc id terakhir pada tagihan
		$data = $this->Penumpang_model->get_by_id($id_penumpang);

		echo json_encode($data);
	}

	public function update_penumpang_ajax()
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$this->_validate_update_penumpang();

		//cek id
		$id = $this->input->post('id_penumpang');

		$data = array(
			'nama' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'umur' => $this->input->post('umur'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'nohp' => $this->input->post('nohp'),
			'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
			'status' => $this->input->post('status'),
		);
		$this->Penumpang_model->update_penumpang($data, [
			'id_penumpang' => $id,
		]);

		echo json_encode(array("status" => TRUE));
	}

	private function _validate_insert_penumpang()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('nama') == '') {
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Nama is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('jk') == '') {
			$data['inputerror'][] = 'jk';
			$data['error_string'][] = 'Jenis Kelamin is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('umur') == '') {
			$data['inputerror'][] = 'umur';
			$data['error_string'][] = 'Umur is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('alamat') == '') {
			$data['inputerror'][] = 'alamat';
			$data['error_string'][] = 'Alamat is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('email') == '') {
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('nohp') == '') {
			$data['inputerror'][] = 'nohp';
			$data['error_string'][] = 'No HP is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('tempat_duduk_tambah') == '') {
			$data['inputerror'][] = 'tempat_duduk_tambah';
			$data['error_string'][] = 'Tempat Duduk is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('jenis_pembayaran') == '') {
			$data['inputerror'][] = 'jenis_pembayaran';
			$data['error_string'][] = 'Jenis Pembayaran is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('pilih_trayek_tambah') == '') {
			$data['inputerror'][] = 'pilih_trayek_tambah';
			$data['error_string'][] = 'Trayek is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

	private function _validate_update_penumpang()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('nama') == '') {
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Nama is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('jk') == '') {
			$data['inputerror'][] = 'jk';
			$data['error_string'][] = 'Jenis Kelamin is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('umur') == '') {
			$data['inputerror'][] = 'umur';
			$data['error_string'][] = 'Umur is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('alamat') == '') {
			$data['inputerror'][] = 'alamat';
			$data['error_string'][] = 'Alamat is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('email') == '') {
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('nohp') == '') {
			$data['inputerror'][] = 'nohp';
			$data['error_string'][] = 'No HP is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('jenis_pembayaran') == '') {
			$data['inputerror'][] = 'jenis_pembayaran';
			$data['error_string'][] = 'Jenis Pembayaran is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('status') == '') {
			$data['inputerror'][] = 'status';
			$data['error_string'][] = 'Status Pembayaran is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}
}
