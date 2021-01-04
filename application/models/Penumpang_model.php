<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Penumpang_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_penumpang()
    {
        return $this->db->get('penumpang')->result_array();
    }

    // start tabel penumpang for server side
    var $column_order_penumpang =  array(null, 'nama', 'jk', 'umur', 'alamat', 'email', 'penumpang.nohp', 'jenis_pembayaran', 'nama_travel', 'mobil', 'rute_dari', 'waktu', 'status'); //set column field database for datatable orderable
    var $column_search_penumpang = array('nama', 'jk', 'umur', 'alamat', 'email', 'penumpang.nohp', 'jenis_pembayaran', 'nama_travel', 'mobil', 'no_pol', 'rute_dari', 'rute_ke', 'waktu', 'status'); //set column field database for datatable searchable
    var $order_penumpang = array('id_penumpang' => 'desc'); // default order

    private function _get_penumpang()
    {
        $this->db->select('penumpang.*, rute.rute_dari, rute.rute_ke, trayek.waktu, armada.mobil, armada.no_pol, travel.nama_travel');
        $this->db->from('penumpang');
        $this->db->join('trayek', 'trayek.id_trayek = penumpang.id_trayek');
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');

        $i = 0;
        foreach ($this->column_search_penumpang as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_penumpang) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_penumpang[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_penumpang)) {
            $order_penumpang = $this->order_penumpang;
            $this->db->order_by(key($order_penumpang), $order_penumpang[key($order_penumpang)]);
        }
    }

    function get_datatables_penumpang()
    {
        $this->_get_penumpang();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_penumpang()
    {
        $this->_get_penumpang();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_penumpang()
    {
        $this->db->select('penumpang.*, rute.rute_dari, rute.rute_ke, trayek.waktu, armada.mobil, armada.no_pol, travel.nama_travel');
        $this->db->from('penumpang');
        $this->db->join('trayek', 'trayek.id_trayek = penumpang.id_trayek');
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');

        $query = $this->db->get();
        return $query->num_rows();
    }
    // end tabel progress to do admin penumpang

    //query
    public function insert_penumpang($data)
    {
        $this->db->insert('penumpang', $data);
        return $this->db->insert_id();
    }

    public function get_by_id($id_penumpang) //edit progress 
    {
        $this->db->select("* FROM penumpang WHERE id_penumpang = '" . $id_penumpang . "'");
        $query = $this->db->get();

        return $query->row();
    }

    public function update_penumpang($data, $where)
    {
        $this->db->update('penumpang', $data, $where);
        return $this->db->affected_rows();
    }


    // start tabel penumpang for server side
    var $column_order_penumpang_driver =  array(null, 'nama', 'jk', 'umur', 'alamat', 'email', 'penumpang.nohp', 'jenis_pembayaran', 'nama_travel', 'mobil', 'rute_dari', 'waktu', 'status'); //set column field database for datatable orderable
    var $column_search_penumpang_driver = array('nama', 'jk', 'umur', 'alamat', 'email', 'penumpang.nohp', 'jenis_pembayaran', 'nama_travel', 'mobil', 'no_pol', 'rute_dari', 'rute_ke', 'waktu', 'status'); //set column field database for datatable searchable
    var $order_penumpang_driver = array('id_penumpang' => 'desc'); // default order

    private function _get_penumpang_driver($nama_driver)
    {
        $this->db->select('penumpang.*, rute.rute_dari, rute.rute_ke, trayek.waktu, armada.mobil, armada.no_pol, travel.nama_travel');
        $this->db->from('penumpang');
        $this->db->where('driver', $nama_driver);
        $this->db->join('trayek', 'trayek.id_trayek = penumpang.id_trayek');
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');

        $i = 0;
        foreach ($this->column_search_penumpang_driver as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_penumpang_driver) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_penumpang_driver[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_penumpang_driver)) {
            $order_penumpang_driver = $this->order_penumpang_driver;
            $this->db->order_by(key($order_penumpang_driver), $order_penumpang_driver[key($order_penumpang_driver)]);
        }
    }

    function get_datatables_penumpang_driver($nama_driver)
    {
        $this->_get_penumpang_driver($nama_driver);
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_penumpang_driver($nama_driver)
    {
        $this->_get_penumpang_driver($nama_driver);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_penumpang_driver($nama_driver)
    {
        $this->db->select('penumpang.*, rute.rute_dari, rute.rute_ke, trayek.waktu, armada.mobil, armada.no_pol, travel.nama_travel');
        $this->db->from('penumpang');
        $this->db->where('driver', $nama_driver);
        $this->db->join('trayek', 'trayek.id_trayek = penumpang.id_trayek');
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');

        $query = $this->db->get();
        return $query->num_rows();
    }
    // end tabel progress to do admin penumpang
}
