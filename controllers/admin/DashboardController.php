<?php 
class DashboardController{
  public $root;
  public function __construct()
  {
    $this->root = $_SERVER['DOCUMENT_ROOT'];
  }

  public function index(){
    require $this->root.'/views/admin/dashboard.php';
  }
}