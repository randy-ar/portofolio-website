<?php
require $_SERVER['DOCUMENT_ROOT'].'/models/Banner.php';

class BannerController{
  public $root;
  public function __construct()
  {
    $this->root = $_SERVER['DOCUMENT_ROOT'];
  }

  public function index(){
    $banner = Banner::first();
    // var_dump($banner); die;
    include_once $this->root.'/views/admin/banner/index.php';
  }

  public function store(){
    $tagline = isset($_POST['tagline']) ? $_POST['tagline'] : null;
    $list_judul = isset($_POST['list_judul']) ? $_POST['list_judul'] : null;
    $paragraf = isset($_POST['paragraf']) ? $_POST['paragraf'] : null;
    $judul = '';
    $banner = Banner::first();

    if(strlen($tagline > 100)){
      $_SESSION['failed'] = "tagline tidak dapat lebih dari 100 karakter";
    }
    if(strlen($paragraf) > 500){
      $_SESSION['failed'] = "judul tidak dapat lebih dari 500 karakter";
    }

    foreach ($list_judul as $j){
      var_dump($j);
      $judul = $judul.$j."||";
    }
    // var_dump($_POST['tagline'], $tagline, $judul, $paragraf, $list_judul, $banner, strlen($tagline) <= 100 || strlen($paragraf) <= 500, empty($banner->id)); die;
    
    if(strlen($tagline) <= 100 || strlen($paragraf) <= 500){
      if(empty($banner->id)){
        Banner::create([
          'tagline' => $tagline,
          'judul' => $judul,
          'paragraf' => $paragraf,
        ]);
      }else{
        $banner->update(([
          'tagline' => $tagline,
          'judul' => $judul,
          'paragraf' => $paragraf,  
        ]));
      }
    }

    return header('Location: /admin/banner');
  }

  public function delete(){

  }

}