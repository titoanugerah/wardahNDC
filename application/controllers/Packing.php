<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packing extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('packing_model');
  }

  public function packingOrder()
  {
    $data['list'] = $this->packing_model->getPackingOrder();
    $data['title'] = 'Permintaan Packing';
    $data['view_name'] = 'packingOrder';
    $data['notification'] = 'no';
    $this->load->view('template', $data);
  }
}

 ?>
