<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver extends CI_Controller
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
		$this->load->view('driver/profile', $data);
		$this->load->view('templates/footer');
	}

	// tabel trayek
	function get_ajax_trayek()
	{
		//nama driver 
		$data['users'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
		$nama = $this->db->get_where('armada', ['driver' => $data['users']['nama']])->row_array();

		$list = $this->Trayek_model->get_datatables_trayek_driver($nama['driver']);
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

			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Trayek_model->count_all_trayek_driver($nama['driver']),
			"recordsFiltered" => $this->Trayek_model->count_filtered_trayek_driver($nama['driver']),
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
		$this->load->view('driver/data_trayek', $data);
		$this->load->view('templates/footer');
	}

	// tabel penumpang
	function get_ajax_penumpang()
	{
		//nama driver 
		$data['users'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
		$nama = $this->db->get_where('armada', ['driver' => $data['users']['nama']])->row_array();

		$list = $this->Penumpang_model->get_datatables_penumpang_driver($nama['driver']);
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
			$row[] = $item->rute_dari . " - " . $item->rute_ke . " (" . $item->tempat_duduk . ")";
			$row[] = $item->waktu;
			if ($item->status == 0) {
				$row[] = '<a style="color:red">Belum Bayar</a>';;
			} else {
				$row[] = '<a style="color:green">Sudah Bayar</a>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Penumpang_model->count_all_penumpang_driver($nama['driver']),
			"recordsFiltered" => $this->Penumpang_model->count_filtered_penumpang_driver($nama['driver']),
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

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('driver/data_penumpang', $data);
		$this->load->view('templates/footer');
	}
}
