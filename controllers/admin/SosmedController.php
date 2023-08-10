<?php
require $_SERVER['DOCUMENT_ROOT'].'/models/sosmed.php';
// require $_SERVER['DOCUMENT_ROOT'].'/models/Setting.php';

class SosmedController{
  public $root;
  public function __construct()
  {
    $this->root = $_SERVER['DOCUMENT_ROOT'];
  }
  public function index(){
    $list_sosmed = sosmed::all();
    $app_setting = AppSetting::first();
    include($this->root.'/views/admin/sosmed/index.php');
  }
  public function create(){
    return require $this->root.'/views/admin/sosmed/create.php';
  }
  public function edit(){
    $id = $_GET['id'];
    if(!empty($id)){
      $sosmed = sosmed::find($id);
      // var_dump($sosmed);
      include $this->root.'/views/admin/sosmed/edit.php';
    }else{
      return header('Location: /admin/sosmed/');
    }
  }
  public function store(){
    $nama = isset($_POST['Nama']) ? $_POST['Nama'] : null;
    $link = isset($_POST['Link']) ? $_POST['Link'] : null;
    $icon = isset($_FILES['Icon']) ? $_FILES['Icon'] : null;
    // var_dump($icon); die;
    if(!empty($icon['size'])){
      $filePath = $icon['tmp_name'];
      $fileName = $icon['name'];
      $dir = 'assets/img/logo-sosmed/';
      $upload = move_uploaded_file($filePath, $dir.$fileName);
      if($upload){
        sosmed::create([
          'Nama' => $nama,
          'Link' => $link,
          'Icon' =>  $dir.$fileName
        ]);
        return header('Location: /admin/sosmed');
      }
    }else{
      return header('Location: /admin/sosmed/create');
    }
  }

  public function update(){
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if(!empty($id)){
      $sosmed = sosmed::find($id);
      // var_dump($skill); die;
      if(!empty($sosmed)){
        $nama = isset($_POST['Nama']) ? $_POST['Nama'] : $sosmed->nama;
        $link = isset($_POST['Link']) ? $_POST['Link'] : $sosmed->link;
        $icon = isset($_FILES['Icon']) ? $_FILES['Icon'] : $sosmed->icon;
        
        $sosmedImage = $sosmed->icon;
        // var_dump($sosmedImage, $_FILES); die;

        if(!empty($icon['size'])){
          if(!empty($sosmed->getFileImage())){
            unlink($sosmed->getFileImage());
          }
          $filePath = $icon['tmp_name'];
          $fileName = $icon['name'];
          $dir = 'assets/img/logo-sosmed/';
          $upload = move_uploaded_file($filePath, $dir.$fileName);
          if($upload){
            $sosmedImage = $dir.$fileName;
          }
        }

        $sosmed->update([
          'Nama' => $nama,
          'Link' => $link,
          'Icon' => $sosmedImage
        ]);
      }
      return header('Location: /admin/sosmed/edit?id='.$id);
    }
    return header('Location: /admin/sosmed');
  }

  public function delete(){
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if(!empty($id)){
      $sosmed = sosmed::find($id);
      if(!empty($sosmed)){
        if(!empty($sosmed->getFileImage())){
          unlink($sosmed->getFileImage());
        }
        $sosmed->destroy();
      }
    }
    return header('Location: /admin/sosmed');
  }
}