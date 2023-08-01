<?php
require $_SERVER['DOCUMENT_ROOT'].'/models/sosmed.php';

class SosmedController{
  public $root;
  public function __construct()
  {
    $this->root = $_SERVER['DOCUMENT_ROOT'];
  }
  public function index(){
    return require $this->root.'/views/admin/sosmed/index.php';
  }
  public function create(){
    return require $this->root.'/views/admin/sosmed/create.php';
  }
  public function edit(){
    return require $this->root.'/views/admin/sosmed/edit.php';
  }
  public function store(){
    $nama = isset($_POST['Nama']) ? $_POST['Icon'] : null;
    $link = isset($_POST['Link']) ? $_POST['Link'] : null;
    $icon = isset($_FILES['Icon']) ? $_FILES['Icon'] : null;
    // var_dump($nama, $icon, $_FILES); die;
    if(!empty($icon)){
      $filePath = $icon['tmp_Nama'];
      $fileName = $icon['Nama'];
      $dir = 'assets/img/logo/';
      $upload = move_uploaded_file($filePath, $dir.$fileName);
      if($upload){
        sosmed::create([
          'Nama' => $nama,
          'Link' => $link,
          'Icon' =>  $dir.$fileName
        ]);
        return header('Location: /admin/sosmed');
      }
    }
    return header('Location: /admin/sosmed/create');
  }

  public function update(){
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if(!empty($id)){
      $sosmed = sosmed::find($id);
      // var_dump($skill); die;
      if(!empty($sosmed)){
        $nama = isset($_POST['Nama']) ? $_POST['Nama'] : $sosmed->nama;
        $link = isset($_POST['Link']) ? $_POST['Link'] : $sosmed->link;
        $icon = isset($_FILES['Icon']) ? $_FILES['Icon'] : null;
        
        $sosmedIcon = $sosmed->icon;
      // var_dump($image, $_FILES); die;

        if(!empty($icon)){
          if(!empty($sosmed->getFileImage())){
            unlink($sosmed->getFileImage());
          }
          $filePath = $icon['tmp_Nama'];
          $fileName = $icon['Nama'];
          $dir = 'assets/img/logo/';
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