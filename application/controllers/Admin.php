<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    if ($this->session->userdata['role']!='admin') {
      redirect(base_url('login'));
    }
  }


  public function account()
  {
    if ($this->input->post('createAccount')) {
      $this->admin_model->createAccount();
    }
    $data['account'] = $this->admin_model->getAllData('account');
    $data['title'] = 'Akun';
    $data['view_name'] = 'account';
    $data['notification'] = 'no';
    $this->load->view('template', $data);
  }

  public function deleteAccount($id)
  {
    $this->admin_model->deleteAccount($id);
    redirect(base_url('account'));
  }

  public function webConf()
  {
    if ($this->input->post('updateEmail')) {
      $this->admin_model->updateEmail();
    }
    $data['config'] = $this->admin_model->getDataRow(1,'webConf');
    $data['title'] = 'Konfigurasi Website';
    $data['view_name'] = 'webConf';
    $data['notification'] = 'no';
    $this->load->view('template', $data);
  }

  public function detailAccount($id)
  {
    if ($this->input->post('back')) {
      redirect(base_url('account'));
    } elseif ($this->input->post('updateAccount')) {
      $this->admin_model->updateAccount($id);
    }
    $data['account'] = $this->admin_model->getDataRow($id,'account');
    $data['title'] = 'Detail Akun '.$data['account']->username;
    $data['view_name'] = 'detailAccount';
    $data['notification'] = 'no';
    $this->load->view('template', $data);
  }

  public function itemList()
  {
    $data['list'] = $this->admin_model->getAllData('item');
    $data['title'] = 'Stok Item';
    $data['view_name'] = 'itemList';
    $data['notification'] = 'no';
    $this->load->view('template', $data);
  }
}
 ?>
