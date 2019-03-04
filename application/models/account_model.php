<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_model{

  public function __construct()
  {

  }

  public function createCaptcha()
  {
    $data['aCaptcha'] =  rand( 1 , 10 );
    $data['bCaptcha'] =  rand( 1 , 10 );
    $data['result'] = $data['aCaptcha'] + $data['bCaptcha'];
    return $data;
  }

  public function loginValidation()
  {
    $where = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
     );
     $query = $this->db->get_where('account', $where);
     $account['status'] = $query->num_rows();
     $account['session'] = array (
       'login' => true,
       'id' => $query->row('id'),
       'username' => $query->row('username'),
       'password' => $query->row('password'),
       'fullname' => $query->row('fullname'),
       'email' => $query->row('email'),
       'phone' => $query->row('phone'),
       'display_picture' => $query->row('display_picture'),
       'other' => $query->row('other'),
       'role' => $query->row('role')
     );
     return $account;
  }

  public function getDataRow($id, $table)
  {
    $where = array('id' => $id);
    $query = $this->db->get_where($table, $where);
    return $query->row();
  }

  public function findAccountByUsername()
  {
    $where = array('username' => $this->input->post('username'));
    $query = $this->db->get_where('account', $where);
    $account['status'] = $query->num_rows();
    $this->resetPassword($query->row('id'));
    return $account;
  }

  public function resetPassword($id)
  {
    $newPassword = rand(1001, 9999);
    $data = array(
      'password' => md5($newPassword),
      'other_info' => $newPassword
    );
    $where = array('id' => $id);
    $this->db->where($where);
    $this->db->update('account', $data);
    $message = "Bersamaan dengan email ini kami informasikan bahwa password akun anda berhasil direset, password baru anda adalah ".$newPassword;
    $this->sentEmail($id, $message);
  }

  public function sentEmail($id, $message)
  {
    $account = $this->getDataRow($id, 'account');
    $emailConf = $this->getDataRow(1, 'webconf');
    $config = [
      'protocol' => 'sentmail',
      'smtp_host' => $emailConf->host,
      'smtp_user' => $emailConf->username,
      'smtp_pass' => $emailConf->password,
      'smtp_crypto' => $emailConf->crypto,
      'charset' => 'utf-8',
      'crlf' => 'rn',
      'newline' => "\r\n", //REQUIRED! Notice the double quotes!
      'smtp_port' => $emailConf->port
    ];
    $this->load->library('email', $config);
    $this->email->from('admin@sipmaft.com');
    $this->email->to($account->email);
    $this->email->subject('Password baru akun Wardah');
    $this->email->message('
    Yth. '.$account->fullname.'
    Di tempat.

    '.$message.'

    Atas perhatiannya kami ucapkan terima kasih.

    Admin
    ');
    $sent = $this->email->send();
    error_reporting(0);
  }



}

 ?>
