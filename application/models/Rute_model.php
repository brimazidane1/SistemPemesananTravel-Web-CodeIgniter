<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Rute_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_rute()
    {
        $this->db->order_by('rute_dari', 'ASC');
        return $this->db->get('rute')->result_array();
    }

    function get_rute_filter()
    {
        $this->db->distinct();
        $this->db->select('rute_dari');
        return $this->db->get('rute')->result_array();
    }

    // start tabel rute for server side
    var $column_order_rute =  array(null, 'rute_dari', 'harga'); //set column field database for datatable orderable
    var $column_search_rute = array('rute_dari', 'rute_ke'); //set column field database for datatable searchable
    var $order_rute = array('rute_dari' => 'asc'); // default order

    private function _get_rute()
    {
        $this->db->select('*');
        $this->db->from('rute');

        $i = 0;
        foreach ($this->column_search_rute as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_rute) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_rute[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_rute)) {
            $order_rute = $this->order_rute;
            $this->db->order_by(key($order_rute), $order_rute[key($order_rute)]);
        }
    }

    function get_datatables_rute()
    {
        $this->_get_rute();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_rute()
    {
        $this->_get_rute();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_rute()
    {
        $this->db->select('*');
        $this->db->from('rute');

        $query = $this->db->get();
        return $query->num_rows();
    }
    // end tabel rute

    //query
    public function insert_rute($data)
    {
        $this->db->insert('rute', $data);
        return $this->db->insert_id();
    }

    public function get_by_id($id_rute) //edit progress 
    {
        $this->db->select("* FROM rute WHERE id_rute = '" . $id_rute . "'");
        $query = $this->db->get();

        return $query->row();
    }

    public function update_rute($data, $where)
    {
        $this->db->update('rute', $data, $where);
        return $this->db->affected_rows();
    }
}
