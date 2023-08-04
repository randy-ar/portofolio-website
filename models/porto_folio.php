<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Model.php';

class porto_folio{
  public $id, $judul,$deskripsi, $image,$link;

  public function __construct($id = "", $judul = "", $deskripsi="", $image="",$link="")
  {
    $this->id = $id;
    $this->judul = $judul;
    $this->deskripsi = $deskripsi;
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

    $SQL = "INSERT INTO `porto_folio` (`judul`,`deskripsi`,`image`,`link`) VALUES ('".$data['judul']."','".$data['deskripsi']."', '".$data['image']."','".$data['link']."')";
    mysqli_query($conn, $SQL);

    $SQL = "SELECT * FROM `porto_folio` WHERE id = (SELECT MAX(porto_folio.id) FROM porto_folio)";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    list($id, $judul,$deskripsi, $image,$link) = $row;

    return new porto_folio($id, $judul, $deskripsi, $image, $link);
  }

  public function update($data){
    $conn = (new Model)->connect();

    $data['judul'] = (!empty($data['judul'])) ? $data['judul'] : $this->judul;
    $data['deskripsi'] = (!empty($data['deskripsi'])) ? $data['deskripsi'] : $this->deskripsi;
    $data['image'] = (!empty($data['image'])) ? $data['image'] : $this->image;
    $data['link'] = (!empty($data['link'])) ? $data['link'] : $this->link;


    $SQL = "UPDATE `porto_folio` SET `judul` = '".$data['judul']."',`deskripsi` = '".$data['deskripsi']."', `image` = '".$data['image']."',`link` = '".$data['link']."' WHERE id = ".$this->id;
    mysqli_query($conn, $SQL);

    $this->image = $data['image'];
    $this->judul= $data['judul'];
    $this->deskripsi= $data['deskripsi'];
    $this->link= $data['link'];

  }

  public static function find($id){
    $conn = (new Model)->connect();
    $SQL = "SELECT * FROM porto_folio WHERE id = ".$id;
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    list($id, $judul,$deskripsi,$image,$link)=$row;
    return new porto_folio($id, $judul,$deskripsi,$image,$link);
  }

  public static function all(){
    $list = [];
    $conn = (new Model)->connect();

    $SQL = "SELECT * FROM `porto_folio`";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    do{
      list($id, $judul,$deskripsi,$image,$link) = $row;
      if(!empty($id)){
        array_push($list, new porto_folio($id, $judul,$deskripsi,$image,$link));
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