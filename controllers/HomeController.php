<?php

class HomeController{
  public $root;
  public function __construct()
  {
    $this->root = $_SERVER['DOCUMENT_ROOT'];
  }
  public function index(){
    $banner = Banner::first();
    $skills = Skill::all();
    $portofolios = porto_folio::all();
    $sosial_media = sosmed::all();
    $app_setting = AppSetting::first();
    // var_dump($banner, $skills, $portofolio, $sosial_media); die;
    require $this->root.'/views/home/index.php';
  }
}