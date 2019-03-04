<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_model{

  public function __construct()
  {
    $this->load->model('account_model');
  }

  public function getAllData($table)
  {
    $query = $this->db->get($table);
    return $query->result();
  }

  public function createAccount()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'fullname' => $this->input->post('fullname'),
      'phone' => $this->input->post('phone'),
      'email' => $this->input->post('email'),
      'role' => $this->input->post('role'),
      'display_picture' => 'no.jpg',
      'password' => md5('0000')
     );

     $this->db->insert('account', $data);
     $this->account_model->sentEmail($this->db->insert_id(), "Akun anda berhasil dibuat, silahkan login dengan usename ".$this->input->post('username').' dengan password 0000');
  }

  public function deleteAccount($id)
  {
    $where = array('id' => $id);
    $this->db->delete('account',$where);
  }

  public function getDataRow($id, $table)
  {
    $where = array('id' => $id);
    $query = $this->db->get_where($table, $where);
    return $query->row();
  }

  public function updateEmail()
  {
    $where = array('id' => 1 );
    $data = array(
      'host' => $this->input->post('host'),
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'port' => $this->input->post('port'),
      'crypto' => $this->input->post('crypto')
    );
    $this->db->where($where);
    $this->db->update('webconf',$data);
  }

  public function updateAccount($id)
  {
    $where = array('id' => $id );
    $data = array(
      'username' => $this->input->post('username'),
      'role' => $this->input->post('role'),
      'fullname' => $this->input->post('fullname'),
      'phone' => $this->input->post('phone'),
      'email' => $this->input->post('email')
    );
    $this->db->where($where);
    $this->db->update('account', $data);
  }

  public function createItem()
  {
    $data = array(
      'item' => $this->input->post('item'),
      'stock' => $this->input->post('stock'),
      'id_warehouse' => $this->session->userdata['id'],
     );
     $this->db->insert('item', $data);
  }

  public function deleteItem($id)
  {
    $where = array('id' => $id );
    $this->db->delete('item', $where);
  }

  public function updateItem($id)
  {
    $where = array('id' => $id );
    $data = array(
      'item' => $this->input->post('item'),
  #    'stock' => $this->input->post('stock'),
     );
     $this->db->where($where);
     $this->db->update('item', $data);
  }
}
 ?>
