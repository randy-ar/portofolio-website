<?php
require $_SERVER['DOCUMENT_ROOT'].'/models/porto_folio.php';

class porto_folioController{
  public $root;
  public function __construct()
  {
    $this->root = $_SERVER['DOCUMENT_ROOT'];
  }
  public function index(){
    return require $this->root.'/views/admin/porto_folio/index.php';
  }
  public function create(){
    return require $this->root.'/views/admin/porto_folio/create.php';
  }
  public function edit(){
    return require $this->root.'/views/admin/porto_folio/edit.php';
  }
  public function store(){
    $judul = isset($_POST['judul']) ? $_POST['judul'] : null;
    $deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : null;
    $image = isset($_FILES['image']) ? $_FILES['image'] : null;
    $link = isset($_POST['link']) ? $_POST['link'] : null;
    // var_dump($name, $image, $_FILES); die;
    if(!empty($image)){
      $filePath = $image['tmp_name'];
      $fileName = $image['name'];
      $dir = 'assets/img/portofolio/';
      $upload = move_uploaded_file($filePath, $dir.$fileName);
      if($upload){
        porto_folio::create([
          'judul' => $judul,
          'deskripsi' => $deskripsi,
          'image' =>  $dir.$fileName,
          'link' => $link
        ]);
        return header('Location: /admin/porto_folio');
      }
    }
    return header('Location: /admin/porto_folio/create');
  }

  public function update(){
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if(!empty($id)){
      $porto_folio = porto_folio::find($id);
      // var_dump($skill); die;
      if(!empty($porto_folio)){
        $judul = isset($_POST['judul']) ? $_POST['judul'] : $porto_folio->judul;
        $deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : $porto_folio->deskripsi;
        $image = isset($_FILES['image']) ? $_FILES['image'] : null;
        $link = isset($_POST['link']) ? $_POST['link'] : $porto_folio->link;
        
        $porto_folioImage = $porto_folio->image;
      // var_dump($image, $_FILES); die;

        if(!empty($image)){
          if(!empty($porto_folio->getFileImage())){
            unlink($porto_folio->getFileImage());
          }
          $filePath = $image['tmp_name'];
          $fileName = $image['name'];
          $dir = 'assets/img/portofolio/';
          $upload = move_uploaded_file($filePath, $dir.$fileName);
          if($upload){
            $porto_folioImage = $dir.$fileName;
          }
        }

        $porto_folio->update([
          'judul' => $judul,
          'deskripsi' => $deskripsi,
          'image' => $porto_folioImage,
          'link' => $link
        ]);
      }
      return header('Location: /admin/porto_folio');
    }
    return header('Location: /admin/porto_folio');
  }

  public function delete(){
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if(!empty($id)){
      $porto_folio = porto_folio::find($id);
      if(!empty($porto_folio)){
        if(!empty($porto_folio->getFileImage())){
          unlink($porto_folio->getFileImage());
        }
        $porto_folio->destroy();
      }
    }
    return header('Location: /admin/porto_folio');
  }
}