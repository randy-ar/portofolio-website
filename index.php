<?php

$request = $_SERVER['REQUEST_URI'];
$root = $_SERVER['DOCUMENT_ROOT'];
$viewDir = '/views/';
$viewHomeDir = '/views/home/';
$viewAdminDir = '/views/admin/';

require $root.'/controllers/admin/AuthControllers.php';

switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewHomeDir . 'index.php';
        break;

    // case '/views/users':
    //     require __DIR__ . $viewDir . 'users.php';
    //     break;

    case '/login':
        AuthController::viewLogin();
        break;
    
    case '/admin/login':
        AuthController::login();
        break;

    default:
        // http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}