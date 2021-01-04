<?php

function cek_login()
{
    //panggil library ci untuk helper
    $ci = get_instance();

    //cek session dan role
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        //role pada session
        $id_role = $ci->session->userdata('id_role');

        //ambil segment uri
        $menu = $ci->uri->segment(1);

        //query nama menu = segment uri 1
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        //mengambil id menu
        $id_menu = $queryMenu['id'];

        //ambil role dan id menu berdasarkan role pada session dan id menu
        $userAccess = $ci->db->get_where(
            'user_access_menu',
            [
                'id_role' => $id_role,
                'id_menu' => $id_menu
            ]
        );

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function cek_akses($id_role, $id_menu)
{
    $ci = get_instance();

    $result = $ci->db->query("SELECT *
                            FROM user_access_menu
                            WHERE id_role = '" . $id_role . "'
                            AND id_menu = '" . $id_menu . "'");

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function rupiah($angka)
{

    $hasil_rupiah = number_format($angka, 0, '.', '.');
    return $hasil_rupiah;
}

function generateKodeVerifikasi($id_trayek)
{
	$ci = get_instance();
	$ci->db->join('rute', 'rute.id_rute = trayek.id_rute');
	$ci->db->join('armada', 'armada.id_armada = trayek.id_armada');
	$ci->db->join('travel', 'travel.id_travel = armada.id_travel');
	$data['trayek'] = $ci->db->get_where('trayek', ['id_trayek' => $id_trayek])->row_array();

	//data auto
	$date = date_create($data['trayek']['tanggal']);
	$date_format = date_format($date, "d-m-y");
	$tanggal = explode('-', $date_format);
	$no_pol = explode(' ', $data['trayek']['no_pol']);

	$random_hash = md5(uniqid(rand(), true));
	return substr($random_hash, 0, 5) . $no_pol[2] . $no_pol[1] . $no_pol[0] . $data['trayek']['rute_dari'] . $data['trayek']['rute_ke'] . $tanggal[0] . $tanggal[1] . $tanggal[2] . $data['trayek']['waktu'];
}

function format_form_data(array $form_values) {

	$reformat_array = array();
	$matches = array();
	$result = null;

	foreach($form_values as $value) {
		preg_match_all("/\[(.*?)\]/", $value["name"], $matches);
		$parsed_product_array = $this->parse_array($matches[1], $value["value"]);
		$result = array_push($reformat_array, $parsed_product_array);
	}

	return $result;
}

function parseStringBrackets($string) {
	$string = ltrim($string, '[');
	$string = rtrim($string, ']');
	$string = str_replace(' ', '', $string);
	return explode(',',$string);
}

function parseStringCommas($arg) {
	$tags = explode(',', $arg);
	foreach ($tags as &$tag) {
		$tag = '<a href="' . $u . 'tag/' . $tag . '/" title="' . $tag . '">' . $tag . '</a>';
	}

	return implode(', ', $tags);
}

if ( ! function_exists('asset'))
{
	function asset($uri)
	{
		$_ci =& get_instance();
		return $_ci->config->base_url('assets/'.$uri);
	}
}

function get_file_encode_base64($filename) {
	if ($filename == null)
		return "";

	$dir_path = DIR_ASSETS_IMAGES;
	$path = $dir_path . $filename;

	$type = pathinfo($path, PATHINFO_EXTENSION);
	$data = file_get_contents($path);
	return 'data:image/' . $type . ';base64,' . base64_encode($data);
}
