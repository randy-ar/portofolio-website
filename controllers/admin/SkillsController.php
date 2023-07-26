<?php
require $_SERVER['DOCUMENT_ROOT'].'/models/Skill.php';

class SkillsController{
  public $root;
  public function __construct()
  {
    $this->root = $_SERVER['DOCUMENT_ROOT'];
  }
  public function index(){
    return require $this->root.'/views/admin/skills/index.php';
  }
  public function create(){
    return require $this->root.'/views/admin/skills/create.php';
  }
  public function edit(){
    return require $this->root.'/views/admin/skills/edit.php';
  }
  public function store(){
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $image = isset($_FILES['image']) ? $_FILES['image'] : null;
    // var_dump($name, $image, $_FILES); die;
    if(!empty($image)){
      $filePath = $image['tmp_name'];
      $fileName = $image['name'];
      $dir = 'assets/img/logo/';
      $upload = move_uploaded_file($filePath, $dir.$fileName);
      if($upload){
        Skill::create([
          'name' => $name,
          'image' =>  $dir.$fileName
        ]);
        return header('Location: /admin/skills');
      }
    }
    return header('Location: /admin/skills/create');
  }

  public function update(){
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if(!empty($id)){
      $skill = Skill::find($id);
      // var_dump($skill); die;
      if(!empty($skill)){
        $name = isset($_POST['name']) ? $_POST['name'] : $skill->name;
        $image = isset($_FILES['image']) ? $_FILES['image'] : null;
        
        $skillImage = $skill->image;
      // var_dump($image, $_FILES); die;

        if(!empty($image)){
          if(!empty($skill->getFileImage())){
            unlink($skill->getFileImage());
          }
          $filePath = $image['tmp_name'];
          $fileName = $image['name'];
          $dir = 'assets/img/logo/';
          $upload = move_uploaded_file($filePath, $dir.$fileName);
          if($upload){
            $skillImage = $dir.$fileName;
          }
        }

        $skill->update([
          'name' => $name,
          'image' => $skillImage
        ]);
      }
      return header('Location: /admin/skills/edit?id='.$id);
    }
    return header('Location: /admin/skills');
  }

  public function delete(){
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if(!empty($id)){
      $skill = Skill::find($id);
      if(!empty($skill)){
        if(!empty($skill->getFileImage())){
          unlink($skill->getFileImage());
        }
        $skill->destroy();
      }
    }
    return header('Location: /admin/skills');
  }
}