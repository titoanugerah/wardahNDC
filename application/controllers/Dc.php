<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dc extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('dc_model');
  }

  
}

 ?>
