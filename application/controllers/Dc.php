<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dc extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('dc_model');
    error_reporting(0);

    if (!$this->session->userdata['login']) {
      redirect(base_url('login'));
    } elseif ($this->session->userdata['role']!='dc') {
      redirect(base_url('error/501'));
    }
  }

  public function order()
  {
    $data['notification'] = 'no';
    if ($this->input->post('addOrder')) {
      $this->dc_model->addOrder();
      redirect(base_url('order'));
    }
    $id = $this->dc_model->getID();
    $data['list1'] = $this->dc_model->getAllData('view_item');
    $data['list'] = $this->dc_model->getSomeData('id_order', $id['order'], 'view_detail_order');
    $data['title'] = 'List Pesan Item';
    $data['view_name'] = 'orderList';
    $this->load->view('template', $data);
  }

  public function deleteOrder($id)
  {
    $this->dc_model->deleteOrder($id);
    redirect(base_url('order'));
  }

  public function orderHistory()
  {
    $data['list'] = $this->dc_model->getSomeData('id_dc', $this->session->userdata['id'], 'view_dc_order');
    $data['title'] = 'Riwayat Order';
    $data['view_name'] = 'orderHistory';
    $data['notification'] = 'no';
    $this->load->view('template', $data);
  }

  public function detailOrder($id)
  {
    $data['list'] = $this->dc_model->getSomeData('id_order', $id, 'view_detail_order');
    $data['title'] = 'Detail Order';
    $data['view_name'] = 'detailOrderHistory';
    $data['notification'] = 'no';
    $this->load->view('template', $data);

  }
}

 ?>
