<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Model.php';

class AppSetting{
  public $id, $nomor_whatsapp;
  public function __construct($id = "", $nomor_whatsapp = "")
  {
    $this->id = $id;
    $this->nomor_whatsapp = $nomor_whatsapp;
  }
  public static function first(){
    $conn = (new Model)->connect();
    $SQL = "SELECT * FROM app_setting ORDER BY id ASC LIMIT 1";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    list($id, $nomor_whatsapp)=$row;
    return new AppSetting($id, $nomor_whatsapp);
  }

  public static function create($data){
    $conn = (new Model)->connect();
    $SQL = "INSERT INTO `app_setting` (`nomor_whatsapp`) VALUES (\"".AppSetting::format_nomor_wa($data['nomor_whatsapp'])."\")";
    // var_dump($SQL); die;
    mysqli_query($conn, $SQL);
    $SQL = "SELECT * FROM `app_setting` WHERE id = (SELECT MAX(app_setting.id) FROM app_setting)";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_row($result);
    list($id, $nomor_whatsapp) = $row;
    return new AppSetting($id, $nomor_whatsapp);
  }

  public function update($data){
    $conn = (new Model)->connect();
    $SQL = "UPDATE `app_setting` SET `nomor_whatsapp` = \"".AppSetting::format_nomor_wa($data['nomor_whatsapp'])."\" WHERE id = ".$this->id;
    mysqli_query($conn, $SQL);
    $this->nomor_whatsapp = AppSetting::format_nomor_wa($data['nomor_whatsapp']);
  }

  public function delete(){
    $conn = (new Model)->connect();
    $SQL = "DELETE FROM `app_setting` WHERE id = ".$this->id;
    mysqli_query($conn, $SQL);
  }

  public static function format_nomor_wa($nomor){
    $nowa = '';
    if(substr($nomor, 0, 1) == '0'){
      $nowa = "62".substr($nomor, 1);
    }else if(substr($nomor, 0, 2) != '62'){
      $nowa = "62".$nomor;
    }else{
      $nowa = $nomor;
    }
    return $nowa;
  }
}