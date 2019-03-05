<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dc_model extends CI_model{
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

  public function insertIDOrder($id)
  {
    $data = array(
      'id_dc' => $this->session->userdata['id'],
      'id_global_invoice' => $id
     );
    $this->db->insert('order', $data);
    return $this->db->insert_id();
  }

  public function getIDOrder($id)
  {
    $where = array(
      'id_dc' => $this->session->userdata['id'],
      'id_global_invoice' => $id
     );
    $query = $this->db->get_where('order', $where);
    if ($query->num_rows()>0) {
      $id = $query->row('id');
    } else {
      $id = $this->insertIDOrder($id);
    }
    return $id;
  }

  public function getId()
  {
    $query = $this->db->query('SELECT * FROM global_invoice  order by id desc limit 1');
    $today = date("Y-m-d");
    if ($query->row('date')==$today) {
      $id['globalInvoice'] = $query->row('id');
    } else {
      $this->insertGlobalInvoices();
      $query = $this->db->query('SELECT * FROM global_invoice  order by id desc limit 1');
      $id['globalInvoice'] = $query->row('id');
    }
    $id['order'] = $this->getIDOrder($id['globalInvoice']);
    return $id;
  }

  public function insertGlobalInvoices()
  {
    $data = array(
      'date' => date("Y-m-d"),
      'status' => 0
     );
     $this->db->insert('global_invoice', $data);
  }

  public function deleteOrder($id)
  {
    $where = array('id' => $id);
    $this->db->delete('detail_order', $where);
  }

  public function getSelectedID($id_order, $id_item)
  {
    $where = array(
      'id_order' => $id_order,
      'id_item' => $id_item
    );
    $query = $this->db->get_where('detail_order', $where);
    if ($query->num_rows()>0) {
      $id['status'] = 1;
      $id['detail'] = $query->row('id');
    } else {
      $id['status'] = 0;
    }
    return $id;
  }

  public function updateOrder($id, $qty)
  {
    $where = array('id' => $id);
    $data = array('qty' => $qty);
    $this->db->where($where);
    $this->db->update('detail_order', $data);
  }

  public function addOrder()
  {
    $id = $this->getID();
    $check = $this->getSelectedID($id['order'], $this->input->post('id_item'));
      //var_dump($check);die;
    if ($check['status']==1) {
      $this->updateOrder($check['detail'], $this->input->post('qty'));
    } else {
      $data = array(
        'id_order' => $id['order'],
        'id_item' => $this->input->post('id_item'),
        'qty' => $this->input->post('qty')
      );
      $this->db->insert('detail_order', $data);
    }
  }
}

?>
