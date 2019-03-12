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

  public function detailPackingIn($id)
  {
    $data['list'] = $this->packing_model->getSomeData('id_global_invoice', $id, 'view_packing');
    $data['checked'] = $this->packing_model->getCheckedItem($id);
    $data['title'] = 'Detail Order';
    $data['view_name'] = 'detailPackingIn';
    $data['notification'] = 'no';
    $this->load->view('template', $data);

  }

  public function checklistItem($id,$id_global_invoice)
  {
    $this->packing_model->updateStatusItem($id, 3, 4);
    $list = $this->packing_model->getUncheckItem($id_global_invoice);
//    var_dump($list);die;
    if ($list==0) {
      $this->packing_model->updateGlobalInvoice($id_global_invoice, 5);
      redirect(base_url('packingOrder'));
    } else {
      redirect(base_url('detailPackingIn/'.$id_global_invoice));
    }

  }
}

 ?>
