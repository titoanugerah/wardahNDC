<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packing_model extends CI_Model{
  public function __construct()
  {

  }

  public function getAllData($table)
  {
    $query = $this->db->get($table);
    return $query->result();
  }

  public function getDataRow($id, $table)
  {
    $where = array('id' => $id);
    $query = $this->db->get_where($table, $where);
    return $query->row();
  }

  public function getSomeData($row, $id, $table)
  {
    $where = array($row => $id);
    $query = $this->db->get_where($table, $where);
    return $query->result();
  }

  public function getPackingOrder()
  {
    $query = $this->db->query('select * from global_invoice where status=3 or status=4');
    return $query->result();
  }

}

 ?>
