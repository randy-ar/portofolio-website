<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Model.php';

class Skill{
  public $id, $name, $image;

  public function __construct($id = "", $name = "", $image="")
  {
    $this->id = $id;
    $this->name = $name;
    $this->image = $image;
  }

  public function getImage(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'].'/'.$this->image;
  }

  public function getFileImage(){
    if(is_file($_SERVER['DOCUMENT_ROOT'].'/'.$this->image)){
      return $_SERVER['DOCUMENT_ROOT'].'/'.$this->image;
    }else{
      return null;
    }
  }
  
  public static function create($data){
    $conn = (new Model)->connect();

    $SQL = "INSERT INTO `skills` (`name`, `image`) VALUES ('".$data['name']."', '".$data['image']."')";
    mysqli_query($conn, $SQL);

    $SQL = "SELECT * FROM `skills` WHERE id = (SELECT MAX(skills.id) FROM skills)";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    list($id, $name, $image) = $row;

    return new Skill($id, $name, $image);
  }

  public function update($data){
    $conn = (new Model)->connect();

    $data['name'] = (!empty($data['name'])) ? $data['name'] : $this->name;
    $data['image'] = (!empty($data['image'])) ? $data['image'] : $this->image;

    $SQL = "UPDATE `skills` SET `name` = '".$data['name']."', `image` = '".$data['image']."' WHERE id = ".$this->id;
    mysqli_query($conn, $SQL);

    $this->image = $data['image'];
    $this->name = $data['name'];

  }

  public static function find($id){
    $conn = (new Model)->connect();
    $SQL = "SELECT * FROM skills WHERE id = ".$id;
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    list($id, $name, $image)=$row;
    return new Skill($id, $name, $image);
  }

  public static function all(){
    $list = [];
    $conn = (new Model)->connect();

    $SQL = "SELECT * FROM `skills`";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    do{
      list($id, $name, $image) = $row;
      if(!empty($id)){
        array_push($list, new Skill($id, $name, $image));
      }
    }
    while($row = mysqli_fetch_row($result));

    return $list;
  }

  public function destroy(){
    $conn = (new Model)->connect();
    $SQL = "DELETE FROM `skills` WHERE id = ".$this->id;
    mysqli_query($conn, $SQL);
  }
}