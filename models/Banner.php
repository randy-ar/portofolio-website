<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/models/Model.php';
class Banner{
  public $id, $judul, $tagline, $paragraf;

  public function __construct($id = "",$tagline = "", $judul = "", $paragraf = ""){
    $this->id = $id;
    $this->judul = $judul;
    $this->tagline = $tagline;
    $this->paragraf = $paragraf;
  }

  public static function first(){
    $conn = (new Model)->connect();
    $SQL = "SELECT * FROM banner ORDER BY id ASC LIMIT 1";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    list($id, $tagline, $judul, $paragraf)=$row;
    return new Banner($id, $tagline, $judul, $paragraf);
  }

  public static function create($data){
    $conn = (new Model)->connect();
    $SQL = "INSERT INTO `banner` (`tagline`, `judul`, `paragraf`) VALUES (\"".$data['tagline']."\", \"".$data['judul']."\", \"".$data['paragraf']."\")";
    mysqli_query($conn, $SQL);
    $SQL = "SELECT * FROM `banner` WHERE id = (SELECT MAX(banner.id) FROM banner)";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    list($id, $tagline, $judul, $paragraf) = $row;
    return new Banner($id, $tagline, $judul, $paragraf);
  }

  public function update($data){
    $conn = (new Model)->connect();

    $data['tagline'] = (!empty($data['tagline'])) ? $data['tagline'] : $this->tagline;
    $data['judul'] = (!empty($data['judul'])) ? $data['judul'] : $this->judul;
    $data['paragraf'] = (!empty($data['paragraf'])) ? $data['paragraf'] : $this->paragraf;

    
    $SQL = "UPDATE `banner` SET `tagline` = \"".$data['tagline']."\" , `judul` = \"".$data['judul']."\" , `paragraf` = \"".$data['paragraf']."\" WHERE id = ".$this->id;
    
    // var_dump($data, $this->id, $SQL ); die;
    mysqli_query($conn, $SQL);

    $this->tagline = $data['tagline'];
    $this->judul = $data['judul'];
    $this->paragraf = $data['paragraf'];
  }

  public function destroy(){
    $conn = (new Model)->connect();
    $SQL = "DELETE FROM `banner` WHERE id = ".$this->id;
    mysqli_query($conn, $SQL);
  }

}