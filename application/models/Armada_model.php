<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Armada_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function get_armada()
    {
        $this->db->order_by('nama_travel', 'ASC');
        $this->db->join('travel', 'travel.id_travel=armada.id_travel');
        return $this->db->get('armada')->result_array();
    }

    // start tabel progress admin to do cgl for server side
    var $column_order_armada =  array(null, 'nama_travel', 'mobil', 'no_pol', 'driver', 'no_hp'); //set column field database for datatable orderable
    var $column_search_armada = array('nama_travel'); //set column field database for datatable searchable
    var $order_armada = array('nama_travel' => 'asc'); // default order

    private function _get_armada()
    {
        $this->db->select('armada.*, travel.nama_travel');
        $this->db->from('armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');

        $i = 0;
        foreach ($this->column_search_armada as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_armada) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_armada[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_armada)) {
            $order_armada = $this->order_armada;
            $this->db->order_by(key($order_armada), $order_armada[key($order_armada)]);
        }
    }

    function get_datatables_armada()
    {
        $this->_get_armada();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_armada()
    {
        $this->_get_armada();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_armada()
    {
        $this->db->select('armada.*, travel.nama_travel');
        $this->db->from('armada');
        $this->db->join('travel', 'travel.id_travel = armada.id_travel');

        $query = $this->db->get();
        return $query->num_rows();
    }
    // end tabel progress to do admin armada

    //query
    public function insert_armada($data)
    {
        $this->db->insert('armada', $data);
        return $this->db->insert_id();
    }

    public function get_by_id($id_armada) //edit progress 
    {
        $this->db->select("* FROM armada WHERE id_armada = '" . $id_armada . "'");
        $query = $this->db->get();

        return $query->row();
    }

    public function update_armada($data, $where)
    {
        $this->db->update('armada', $data, $where);
        return $this->db->affected_rows();
    }
}
