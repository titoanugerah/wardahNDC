<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse_model extends CI_model{
  public function __construct()
  {

  }

  public function getAllData($table)
  {
    $query = $this->db->get($table);
    return $query->result();
  }

  public function createItem()
  {
    $data = array(
      'item' => $this->input->post('item'),
      'stock' => $this->input->post('stock'),
      'id_pic' => $this->session->userdata['id'],
     );

     $this->db->insert('item', $data);
     $this->updateStockItem($this->db->insert_id(), $this->input->post('stock'));
  }

  public function updateStockItem($id_item, $qty_in)
  {
    $data = array(
      'id_item' => $id_item,
      'qty_in' => $qty_in,
      'id_pic' => $this->session->userdata['id'],
      'information' => 'Barang masuk ke gudang ',
      'batch' => 'XXXX'
     );
     $this->db->insert('update_stock', $data);
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

  public function updateItem($id)
  {
    $where = array('id' => $id);
    $data = array('item' => $this->input->post('item'));
    $this->db->update('item', $data);
  }

}
 ?>
