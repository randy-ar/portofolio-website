<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Model.php';

class sosmed{
  public $id, $nama, $link, $icon;

  public function __construct($id = "", $nama = "", $link = "", $icon="")
  {
    $this->id = $id;
    $this->nama = $nama;
    $this->link = $link;
    $this->icon = $icon;
  }

  public function getImage(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'].'/'.$this->icon;
  }

  public function getFileImage(){
    if(is_file($_SERVER['DOCUMENT_ROOT'].'/'.$this->icon)){
      return $_SERVER['DOCUMENT_ROOT'].'/'.$this->icon;
    }else{
      return null;
    }
  }
  
  public static function create($data){
    $conn = (new Model)->connect();

    $SQL = "INSERT INTO `sosial_media` (`Nama`, `Icon`) VALUES ('".$data['Nama']."', '".$data['Icon']."')";
    mysqli_query($conn, $SQL);

    $SQL = "SELECT * FROM `sosial_media` WHERE id = (SELECT MAX(sosial_media.id) FROM sosial_media)";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    list($id, $nama, $link, $icon) = $row;

    return new sosmed($id, $nama, $link, $icon);
  }

  public function update($data){
    $conn = (new Model)->connect();

    $data['Nama'] = (!empty($data['Nama'])) ? $data['Nama'] : $this->nama;
    $data['Link'] = (!empty($data['Link'])) ? $data['Link'] : $this->link;
    $data['Icon'] = (!empty($data['Icon'])) ? $data['Icon'] : $this->icon;

    $SQL = "UPDATE `sosial_media` SET `Nama` = '".$data['Nama']."', `Link` = '".$data['Link']."' WHERE id = ".$this->id;
    mysqli_query($conn, $SQL);

    $this->icon = $data['Icon'];
    $this->link = $data['Link'];
    $this->nama = $data['Nama'];

  }

  public static function find($id){
    $conn = (new Model)->connect();
    $SQL = "SELECT * FROM sosial_media WHERE id = ".$id;
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    list($id, $nama, $link, $icon)=$row;
    return new sosmed($id, $nama, $link, $icon);
  }

  public static function all(){
    $list = [];
    $conn = (new Model)->connect();

    $SQL = "SELECT * FROM `sosial_media`";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    do{
      list($id, $nama, $link, $icon) = $row;
      if(!empty($id)){
        array_push($list, new sosmed($id, $nama, $link, $icon));
      }
    }
    while($row = mysqli_fetch_row($result));

    return $list;
  }

  public function destroy(){
    $conn = (new Model)->connect();
    $SQL = "DELETE FROM `sosial_media` WHERE id = ".$this->id;
    mysqli_query($conn, $SQL);
  }
}