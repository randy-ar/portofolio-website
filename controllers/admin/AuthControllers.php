<?php
class AuthController{
    public static function viewLogin(){ 
        require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/auth/login.php';
    }
    public static function login(){
        if(isset($_POST['email'])){
            if(!empty($_POST['email'])){
                require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/dashboard.php';
            }else{
                $_GET['failed'] = "Email tidak boleh kosong";
                return header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}