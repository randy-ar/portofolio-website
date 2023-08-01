<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Model.php';

class porto_folio{
  public $id, $judul,$deksripsi, $image,$link;

  public function __construct($id = "", $judul = "", $deskripsi="", $image="",$link="")
  {
    $this->id = $id;
    $this->judul = $judul;
    $this->deskripsi = $deksripsi;
    $this->image= $image;
    $this->link = $link;
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

    $SQL = "INSERT INTO `porto_folio` (`judul`,`deskripsi`, `image`,`link`) VALUES ('".$data['judul']."','".$data['deksripsi']."', '".$data['image']."','".$data['link']."',)";
    mysqli_query($conn, $SQL);

    $SQL = "SELECT * FROM `porto_folio` WHERE id = (SELECT MAX(porto_folios.id) FROM porto_folio)";
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
    $SQL = "SELECT * FROM porto_folio WHERE id = ".$id;
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    list($id, $judul,$deksripsi,$image,$link)=$row;
    return new porto_folio($id, $judul,$deksripsi,$image,$link);
  }

  public static function all(){
    $list = [];
    $conn = (new Model)->connect();

    $SQL = "SELECT * FROM `porto_folio`";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    do{
      list($id, $judul,$deksripsi,$image,$link) = $row;
      if(!empty($id)){
        array_push($list, new porto_folio($id, $judul,$deksripsi,$image,$link));
      }
    }
    while($row = mysqli_fetch_row($result));

    return $list;
  }

  public function destroy(){
    $conn = (new Model)->connect();
    $SQL = "DELETE FROM `porto_folio` WHERE id = ".$this->id;
    mysqli_query($conn, $SQL);
  }
}