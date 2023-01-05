<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Libraries\Pdf;
use App\Libraries\Fpdi;
use App\Controllers\BaseController;


class Generalreport extends BaseController {


  public function index(){ 
  	$this->data['view'] = 'Modules\SystemSettings\Views\coursetypes\index';
    $this->data['types'] = $this->courseTypeModel->get();
    $this->data['types_deleted'] = $this->courseTypeModel->onlyDeleted()->get();
    return view('template/index', $this->data);


  }

}
