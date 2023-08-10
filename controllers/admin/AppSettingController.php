<?php
require $_SERVER['DOCUMENT_ROOT'].'/models/Setting.php';

class AppSettingController{
  public $root;
  public function __construct()
  {
    $this->root = $_SERVER['DOCUMENT_ROOT'];
  }
  public function store(){
    $app_setting = AppSetting::first();
    $nomor_whatsapp = isset($_POST['nomor_whatsapp']) ? $_POST['nomor_whatsapp'] : null;
    // var_dump($_POST, $nomor_whatsapp, strlen($nomor_whatsapp) > 0 && strlen($nomor_whatsapp) < 16, !empty($app_setting->id)); die;
    if(strlen($nomor_whatsapp) > 0 && strlen($nomor_whatsapp) < 16){
      if(!empty($app_setting->id)){
        $app_setting->update([
          'nomor_whatsapp' => $nomor_whatsapp
        ]);
      }else{
        AppSetting::create([
          'nomor_whatsapp' => $nomor_whatsapp
        ]);
      }
    }else{
      $_SESSION['failed'] = "Nomor whatsapp tidak sesuai.";
    }
    return header('Location: /admin/sosmed');
  }
}