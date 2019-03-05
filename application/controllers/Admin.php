<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    if (!$this->session->userdata['login']) {
      redirect(base_url('login'));
    } elseif ($this->session->userdata['role']!='admin') {
      redirect(base_url('error/501'));
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
    $data['config'] = $this->admin_model->getDataRow(1,'webconf');
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
    if ($this->input->post('createItem')) {
      $this->admin_model->createItem();
      redirect(base_url('itemList'));
    }
    $data['list'] = $this->admin_model->getAllData('view_item');
    $data['title'] = 'Stok Item';
    $data['view_name'] = 'itemList';
    $data['notification'] = 'no';
    $this->load->view('template', $data);
  }

  public function detailItem($id)
  {
    $data['notification'] = 'no';
    if ($this->input->post('deleteItem')) {
      if (md5($this->input->post('password'))==$this->session->userdata['password']) {
        $this->admin_model->deleteItem($id);
        redirect(base_url('itemList'));
      } else {
        $data['notification'] = 'wrongPassword';
      }
    } elseif ($this->input->post('updateItem')) {
      $data['notification'] = 'updateItemSuccess';
      $this->admin_model->updateItem($id);
    }
    $data['stock'] = $this->admin_model->getSomeData('id_item',$id,'view_stock');
    $data['detail'] = $this->admin_model->getDataRow($id,'view_item');
    $data['title'] = 'Detail Item '.$data['detail']->item;
    $data['view_name'] = 'detailItem';
    $this->load->view('template', $data);

  }

  public function recapOrder()
  {
    $data['notification'] = 'no';
    $data['recap'] = $this->admin_model->getAllData('global_invoice');
//    $data['detail'] = $this->admin_model->getDataRow($id,'view_item');
    $data['title'] = 'Pemesanan Barang';
    $data['view_name'] = 'recapOrder';
    $this->load->view('template', $data);
  }
}
 ?>
