<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Trayek_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function get_trayek()
    {
        $this->db->order_by('nama_travel', 'ASC');
        $this->db->order_by('rute_ke', 'ASC');
        $this->db->order_by('rute_dari', 'ASC');
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');
        return $this->db->get('trayek')->result_array();
    }

    function get_trayek_filter($rute_dari, $rute_ke, $tanggal, $waktu)
    {
        $this->db->order_by('tanggal', 'ASC');
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');
        $this->db->where('waktu', $waktu);
        $this->db->where('tanggal', $tanggal);
        $this->db->where('rute_ke', $rute_ke);
        $this->db->where('rute_dari', $rute_dari);
        return $this->db->get('trayek')->result_array();
    }


    function count_trayek_filter($rute_dari, $rute_ke, $tanggal, $waktu)
    {
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');
        $this->db->where('waktu', $waktu);
        $this->db->where('tanggal', $tanggal);
        $this->db->where('rute_ke', $rute_ke);
        $this->db->where('rute_dari', $rute_dari);
        $query = $this->db->get('trayek');
        return $query->num_rows();
    }


    function get_trayek_filter_without_waktu($rute_dari, $rute_ke, $tanggal)
    {
        $this->db->order_by('tanggal', 'ASC');
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');
        $this->db->where('tanggal', $tanggal);
        $this->db->where('rute_ke', $rute_ke);
        $this->db->where('rute_dari', $rute_dari);
        return $this->db->get('trayek')->result_array();
    }

    function count_trayek_filter_without_waktu($rute_dari, $rute_ke, $tanggal)
    {
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');
        $this->db->where('tanggal', $tanggal);
        $this->db->where('rute_ke', $rute_ke);
        $this->db->where('rute_dari', $rute_dari);
        $query = $this->db->get('trayek');
        return $query->num_rows();
    }

    function get_trayek_filter_without_tanggal($rute_dari, $rute_ke)
    {
        $this->db->order_by('tanggal', 'ASC');
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');
        $this->db->where('rute_ke', $rute_ke);
        $this->db->where('rute_dari', $rute_dari);
        return $this->db->get('trayek')->result_array();
    }

    function count_trayek_filter_without_tanggal($rute_dari, $rute_ke)
    {
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');
        $this->db->where('rute_ke', $rute_ke);
        $this->db->where('rute_dari', $rute_dari);
        $query = $this->db->get('trayek');
        return $query->num_rows();
    }

    // start tabel trayek for server side
    var $column_order_trayek =  array(null, 'nama_travel', 'rute_dari', 'mobil', 'no_pol', 'tanggal', 'waktu', 'harga'); //set column field database for datatable orderable
    var $column_search_trayek = array('nama_travel', 'rute_dari', 'rute_ke', 'mobil', 'tanggal', 'waktu'); //set column field database for datatable searchable
    var $order_trayek = array('tanggal' => 'desc'); // default order

    private function _get_trayek()
    {
        $this->db->select('trayek.*, rute.*, armada.*, travel.*');
        $this->db->from('trayek');
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');

        $i = 0;
        foreach ($this->column_search_trayek as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_trayek) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_trayek[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_trayek)) {
            $order_trayek = $this->order_trayek;
            $this->db->order_by(key($order_trayek), $order_trayek[key($order_trayek)]);
        }
    }

    function get_datatables_trayek()
    {
        $this->_get_trayek();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_trayek()
    {
        $this->_get_trayek();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_trayek()
    {
        $this->db->select('trayek.*, rute.*, armada.*, travel.*');
        $this->db->from('trayek');
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');

        $query = $this->db->get();
        return $query->num_rows();
    }
    // end tabel progress to do admin trayek

    //query
    public function insert_trayek($data)
    {
        $this->db->insert('trayek', $data);
        return $this->db->insert_id();
    }

    public function get_by_id($id_trayek) //edit progress 
    {
        $this->db->select("* FROM trayek WHERE id_trayek = '" . $id_trayek . "'");
        $query = $this->db->get();

        return $query->row();
    }

    public function get_by_id_as_row_array($id_trayek) //edit progress
    {
        $this->db->select("* FROM trayek WHERE id_trayek = '" . $id_trayek . "'");
        $query = $this->db->get();

        return $query->row_array();
    }

    public function update_trayek($data, $where)
    {
        $this->db->update('trayek', $data, $where);
        return $this->db->affected_rows();
    }

    // start tabel trayek for server side
    var $column_order_trayek_driver =  array(null, 'nama_travel', 'rute_dari', 'mobil', 'no_pol', 'tanggal', 'waktu', 'harga'); //set column field database for datatable orderable
    var $column_search_trayek_driver = array('nama_travel', 'rute_dari', 'rute_ke', 'mobil', 'tanggal', 'waktu'); //set column field database for datatable searchable
    var $order_trayek_driver = array('tanggal' => 'desc'); // default order

    private function _get_trayek_driver($nama_driver)
    {
        $this->db->select('trayek.*, rute.*, armada.*, travel.*');
        $this->db->from('trayek');
        $this->db->where('driver', $nama_driver);
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');

        $i = 0;
        foreach ($this->column_search_trayek_driver as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_trayek_driver) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_trayek_driver[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_trayek_driver)) {
            $order_trayek_driver = $this->order_trayek_driver;
            $this->db->order_by(key($order_trayek_driver), $order_trayek_driver[key($order_trayek_driver)]);
        }
    }

    function get_datatables_trayek_driver($nama_driver)
    {
        $this->_get_trayek_driver($nama_driver);
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_trayek_driver($nama_driver)
    {
        $this->_get_trayek_driver($nama_driver);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_trayek_driver($nama_driver)
    {
        $this->db->select('trayek.*, rute.*, armada.*, travel.*');
        $this->db->from('trayek');
        $this->db->where('driver', $nama_driver);
        $this->db->join('rute', 'rute.id_rute = trayek.id_rute');
        $this->db->join('armada', 'armada.id_armada = trayek.id_armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');

        $query = $this->db->get();
        return $query->num_rows();
    }
    // end tabel progress to do admin trayek
}
