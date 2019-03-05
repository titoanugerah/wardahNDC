<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dc extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('dc_model');
  }

  public function order()
  {
    $data['list'] = $this->dc_model->getAllData('view_item');
    $data['title'] = 'Stok Item';
    $data['view_name'] = 'itemList';
    $data['notification'] = 'no';
    $this->load->view('template', $data);
  }
}

 ?>
