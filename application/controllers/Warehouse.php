<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse Extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('warehouse_model');
  }

  public function item()
  {
    $data['notification'] = 'no';
    if ($this->input->post('createItem')) {
      $this->warehouse_model->createItem();
      $data['notification'] = 'createItemSuccess';
    } elseif ($this->input->post('updateItem')) {
      $this->warehouse_model->updateStockItem($this->input->post('id_item'), $this->input->post('qty_in'));
      $data['notification'] = 'updateStockItemSuccess';
    }
    $data['list'] = $this->warehouse_model->getAllData('view_item');
    $data['title'] = 'Daftar Item';
    $data['view_name'] = 'item';
    $this->load->view('template', $data);
  }

  public function detailItem($id)
  {
    $data['detail'] = $this->warehouse_model->getAllData('view_item');
    $data['title'] = 'Daftar Item';
    $data['view_name'] = 'item';
    $this->load->view('template', $data);
  }
}

 ?>
