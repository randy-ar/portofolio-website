<?php
class AuthController{
    public $root;
    public function __construct()
    {
        $this->root = $_SERVER['DOCUMENT_ROOT'];
    }

    public function viewLogin(){ 
        // var_dump($_COOKIE); die;
        if(isset($_COOKIE['admin_email']) && isset($_COOKIE['admin_password'])){
            return header('Location: /admin/dashboard');
        }else{
            require $this->root. '/views/admin/auth/login.php';
        }
    }

    public function login(){
        
        if (isset($_POST['email'])) {
            $email = urldecode($_POST['email']);
            $password = $_POST['password'];
            $remember = isset($_POST['remember']);
        
            if (!empty($email)) {
                if ($email === 'admin@gmail.com' && $password === '12341234') {
                    if ($remember) {
                        $expiration_time = time() + (7 * 24 * 60 * 60);
                        setcookie('admin_email', hash('sha256', $email), $expiration_time, '/');
                        setcookie('admin_password', hash('sha256', $password), $expiration_time, '/');
                    }
                    $_SESSION['login'] = true;
                    return header('Location: /admin/dashboard');
                } else {
                    $_SESSION['failed'] = "Login gagal dilakukan, periksa kembali akun anda.";
                    return header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            } else {
                if (isset($_COOKIE['admin_email']) && isset($_COOKIE['admin_password'])) {
                    $cookie_email = $_COOKIE['admin_email'];
                    $cookie_password = $_COOKIE['admin_password'];
                    if ($cookie_email === hash('sha256', 'admin@gmail.com') && $cookie_password === hash('sha256', '12341234')) {
                        $_SESSION['login'] = true;
                        return header('Location: /admin/dashboard');
                    }
                }
        
                $_SESSION['failed'] = "Isian Email tidak boleh kosong.";
                return header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }        

    public function logout() {
        session_start();
        session_destroy();

        // setcookie('admin', '', time() - 3600, '/');
        if(isset($_COOKIE['admin_email']) && $_COOKIE['admin_password']){
            unset($_COOKIE['admin_email']); 
            unset($_COOKIE['admin_password']); 
            setcookie('admin_email', '', time() - 3600, '/'); 
            setcookie('admin_password', '', time() - 3600, '/'); 
        }
        header('Location: /login');
        exit();
    }
}