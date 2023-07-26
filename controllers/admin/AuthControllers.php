<?php
class AuthController{
    public $root;
    public function __construct()
    {
        $this->root = $_SERVER['DOCUMENT_ROOT'];
    }

    public function viewLogin(){ 
        require $this->root. '/views/admin/auth/login.php';
    }

    public function login(){
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(!empty($email)){
                if($email == 'admin@gmail.com' && $password == '12341234'){
                    return header('Location: /admin/dashboard');
                }else{
                    $_SESSION['failed'] = "Login gagal dilakukan, periksa kembali akun anda.";
                    return header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }else{
                $_SESSION['failed'] = "Isian Email tidak boleh kosong.";
                return header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}