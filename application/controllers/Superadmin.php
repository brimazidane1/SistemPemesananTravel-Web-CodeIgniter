<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Travel_model', '', TRUE);
		$this->load->model('Users_model', '', TRUE);
		$this->load->model('Menu_model', '', TRUE);
		$this->load->model('Submenu_model', '', TRUE);
		$this->load->model('Akses_model', '', TRUE);

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
		$this->load->view('superadmin/profile', $data);
		$this->load->view('templates/footer');
	}

	public function kelola_menu()
	{
		$data['title'] = "Kelola Menu";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//model
		$data['get_menu'] = $this->Menu_model->get();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('superadmin/kelola_menu', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_menu()
	{
		$data['title'] = 'Tambah Menu';

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//validasi form
		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('superadmin/tambah_menu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'menu' => $this->input->post('menu')
			];
			$this->db->insert('user_menu', $data);

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>Success!</h5>
                Menu telah berhasil ditambahkan!
              </div>'
			);
			redirect('superadmin/kelola_menu');
		}
	}

	public function edit_menu($id)
	{

		$data['title'] = 'Edit Menu';

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//baca id  
		$data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();

		//validasi form
		$this->form_validation->set_rules('id', 'ID', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('superadmin/edit_menu', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Menu_model->edit_menu($id);

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i>Success!</h5>
				Data menu telah berhasil diperbarui!
			  </div>'
			);
			redirect('superadmin/kelola_menu');
		}
	}

	public function hapus_menu($id)
	{
		$this->Menu_model->hapus_menu($id);
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h5><i class="icon fas fa-check"></i>Success!</h5>
            Data menu telah berhasil dihapus!
            </div>'
		);
		redirect('superadmin/kelola_menu');
	}


	public function kelola_submenu()
	{
		$data['title'] = "Kelola Submenu";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//model
		$data['get_submenu'] = $this->Submenu_model->get();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('superadmin/kelola_submenu', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_submenu()
	{
		$data['title'] = 'Tambah Submenu';

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//load data mitra
		$data['daftar_menu'] = $this->Menu_model->get();

		//validasi form
		$this->form_validation->set_rules('pilih_menu', 'Menu', 'required');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('superadmin/tambah_submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'id_user_menu' => $this->input->post('pilih_menu'),
				'judul' => $this->input->post('judul'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
			];
			$this->db->insert('user_sub_menu', $data);

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>Success!</h5>
                Submenu telah berhasil ditambahkan!
              </div>'
			);
			redirect('superadmin/kelola_submenu');
		}
	}

	public function edit_submenu($id)
	{

		$data['title'] = 'Edit Submenu';

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//baca id  
		$data['submenu'] = $this->db->get_where('user_sub_menu', ['id_sub' => $id])->row_array();

		//load data menu
		$data['daftar_menu'] = $this->Menu_model->get();

		//validasi form
		$this->form_validation->set_rules('pilih_menu', 'Menu', 'required');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('superadmin/edit_submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Submenu_model->edit_submenu($id);

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i>Success!</h5>
				Submenu telah berhasil diperbarui!
			  </div>'
			);
			redirect('superadmin/kelola_submenu');
		}
	}

	public function hapus_submenu($id)
	{
		$this->Submenu_model->hapus_submenu($id);
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h5><i class="icon fas fa-check"></i>Success!</h5>
            Submenu telah berhasil dihapus!
            </div>'
		);
		redirect('superadmin/kelola_submenu');
	}

	public function kelola_user()
	{
		$data['title'] = "Kelola User";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//model
		$data['get_users'] = $this->Users_model->get();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('superadmin/kelola_user', $data);
		$this->load->view('templates/footer');
	}

	public function register()
	{
		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//rules inputan form
		$this->form_validation->set_rules('nama', 'Nama User', 'required|trim');

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
			'is_unique' => 'Username tersebut sudah ada!',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[repeat_password]', [
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password minimal 6 karakter!'
		]);
		$this->form_validation->set_rules('repeat_password', 'Password', 'required|matches[password]');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required|min_length[11]|max_length[13]', [
			'min_length' => 'No HP minimal 11 digit!',
			'max_length' => 'No HP maximal 13 digit!'
		]);
		$this->form_validation->set_rules('pilih_role', 'Role', 'required');

		//load data role
		$data['daftar_role'] = $this->Users_model->get_role();
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Register';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('superadmin/register', $data);
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'no_hp' => $this->input->post('no_hp'),
				'id_role' => $this->input->post('pilih_role'),
			];

			$this->db->insert('users', $data);
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i>Success!</h5>
				User telah berhasil ditambahkan!
			</div>'
			);
			redirect('superadmin/kelola_user');
		}
	}

	public function reset_user($id)
	{
		$data['title'] = "Reset Password";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//baca id dari reset 
		$data['reset_user'] = $this->db->get_where('users', ['id' => $id])->row_array();

		//validasi form
		$this->form_validation->set_rules('passwordBaru1', 'Password Baru', 'required|min_length[6]|matches[passwordBaru2]', [
			'matches' => 'Maaf, password yang anda masukkan tidak cocok!',
			'min_length' => 'Password harus diisi dengan minimal 6 karakter!'
		]);
		$this->form_validation->set_rules(
			'passwordBaru2',
			'Ulangi Password',
			'required'
		);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('superadmin/reset_user', $data);
			$this->load->view('templates/footer');
		} else {

			$passwordBaru1 = $this->input->post('passwordBaru1');
			$passwordBaru2 = $this->input->post('passwordBaru2');
			$id = $this->input->post('id');

			if ($passwordBaru1 != $passwordBaru2) {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    Password yang anda masukkan tidak cocok!
                  </div>'
				);
				redirect('superadmin/reset_user/' . $id);
			} else {
				//password benar dan ganti password
				$passwordHash = password_hash($passwordBaru1, PASSWORD_DEFAULT);
				$this->db->set('password', $passwordHash);
				$this->db->where('id', $id);
				$this->db->update('users');

				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-check"></i>Success!</h5>
					Password user telah berhasil direset!
				  </div>'
				);
				redirect('superadmin/kelola_user');
			}
		}
	}

	public function edit_user($id)
	{

		$data['title'] = 'Edit User';

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//baca id dari reset 
		$data['user'] = $this->db->get_where('users', ['id' => $id])->row_array();

		//load data role
		$data['daftar_role'] = $this->Users_model->get_role();

		//validasi form
		$this->form_validation->set_rules('nama', 'Nama User', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required');
		$this->form_validation->set_rules('pilih_role', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('superadmin/edit_user', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Users_model->edit_user($id);

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i>Success!</h5>
				Data user telah berhasil diperbarui!
			  </div>'
			);
			redirect('superadmin/kelola_user');
		}
	}

	public function kelola_akses()
	{
		$data['title'] = "Kelola Akses";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		//model
		$data['get_role'] = $this->Akses_model->get_role();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('superadmin/kelola_akses', $data);
		$this->load->view('templates/footer');
	}

	public function akses_role($id)
	{
		$data['title'] = "Kelola Akses";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$data['role'] = $this->db->get_where('role', ['id_role' => $id])->row_array();

		//get akses menu
		$ignore = array("superadmin");
		$this->db->where_not_in('menu', $ignore);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('superadmin/akses_role', $data);
		$this->load->view('templates/footer');
	}

	public function ganti_akses()
	{
		$id_menu = $this->input->post('idMenu');
		$id_role = $this->input->post('idRole');

		$data = [
			'id_role' => $id_role,
			'id_menu' => $id_menu
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}
	}

	// tabel travel todo
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

	public function data_po_travel()
	{
		$data['title'] = "Data PO Travel";

		//baca session dari form login
		$this->db->join('role', 'role.id_role=users.id_role');
		$data['users'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('superadmin/data_po_travel', $data);
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
			'id_travel' => $id,
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
}
