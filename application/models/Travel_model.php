<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Travel_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_travel()
    {
        $this->db->order_by('nama_travel', 'ASC');
        return $this->db->get('travel')->result_array();
    }

    // start tabel progress admin to do cgl for server side
    var $column_order_travel =  array(null, 'nama_travel', 'jumlah_armada'); //set column field database for datatable orderable
    var $column_search_travel = array('nama_travel'); //set column field database for datatable searchable
    var $order_travel = array('nama_travel' => 'asc'); // default order

    private function _get_travel()
    {
        $this->db->select('travel.*, count(id_armada) as jumlah_armada
                    FROM travel
                        LEFT JOIN armada 
                        ON armada.id_travel = travel.id_travel');

        $i = 0;
        foreach ($this->column_search_travel as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_travel) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        $this->db->group_by('travel.nama_travel');

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_travel[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_travel)) {
            $order_travel = $this->order_travel;
            $this->db->order_by(key($order_travel), $order_travel[key($order_travel)]);
        }
    }

    function get_datatables_travel()
    {
        $this->_get_travel();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_travel()
    {
        $this->_get_travel();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_travel()
    {
        $this->db->select('travel.*, count(id_armada) as jumlah_armada
        FROM travel
            LEFT JOIN armada 
            ON armada.id_travel = travel.id_travel');
        $this->db->group_by('travel.nama_travel');


        $query = $this->db->get();
        return $query->num_rows();
    }
    // end tabel progress to do admin travel

    //query
    public function insert_travel($data)
    {
        $this->db->insert('travel', $data);
        return $this->db->insert_id();
    }

    public function get_by_id($id_travel) //edit progress 
    {
        $this->db->select("* FROM travel WHERE id_travel = '" . $id_travel . "'");
        $query = $this->db->get();

        return $query->row();
    }

    public function update_travel($data, $where)
    {
        $this->db->update('travel', $data, $where);
        return $this->db->affected_rows();
    }
}
