<?php

$request = explode("?", $_SERVER['REQUEST_URI'])[0];
// var_dump($request);
// die;
$root = $_SERVER['DOCUMENT_ROOT'];
$viewDir = '/views/';
$viewHomeDir = '/views/home/';
$viewAdminDir = '/views/admin/';

function includeDir($path) {
    $dir      = new RecursiveDirectoryIterator($path);
    $iterator = new RecursiveIteratorIterator($dir);
    foreach ($iterator as $file) {
        $fname = $file->getFilename();
        if (preg_match('%\.php$%', $fname)) {
            include_once($file->getPathname());
        }
    }
}

includeDir($root.'/controllers');

switch ($request) {
    case '':
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;

    case '/login':
        $controller = new AuthController();
        $controller->viewLogin();
        break;
    case '/logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    
    case '/admin/login':
        $controller = new AuthController();
        $controller->login();
        break;

    case '/admin/dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;

    case '/admin/skills':
        $controller = new SkillsController();
        $controller->index();
        break;
        

    case '/admin/sosmed':
        $controller = new SosmedController();
        $controller->index();
        break;
    
    case '/admin/porto_folio':
        $controller = new porto_folioController();
        $controller->index();
        break;

//Banner
    case '/admin/banner':
        $controller = new BannerController();
        $controller->index();
        break;
    case '/admin/banner/store':
        $controller = new BannerController();
        $controller->store();
        break;
    case '/admin/banner/delete':
        $controller = new BannerController();
        $controller->delete();
        break;


//skill            
    case '/admin/skills/create':
        $controller = new SkillsController();
        $controller->create();
        break;
    case '/admin/skills/store':
        $controller = new SkillsController();
        $controller->store();
        break;
    case '/admin/skills/edit':
        if(isset($_GET['id'])){
            $controller = new SkillsController();
            $controller->edit();
        }
        break;
    case '/admin/skills/update':
        if(isset($_GET['id'])){
            $controller = new SkillsController();
            $controller->update();
        }
        break;    
    case '/admin/skills/delete':
        if(isset($_GET['id'])){
            $controller = new SkillsController();
            $controller->delete();
        }
        break;
        

//sosmed
    case '/admin/sosmed/create':
        $controller = new SosmedController();
        $controller->index();
        break;
    case '/admin/sosmed/store':
        $controller = new SosmedController();
        $controller->store();
        break;
    case '/admin/sosmed/edit':
        if(isset($_GET['id'])){
            $controller = new SosmedController();
            $controller->edit();
        }
        break;
    case '/admin/sosmed/update':
        if(isset($_GET['id'])){
            $controller = new SosmedController();
            $controller->update();
        }
        break;

//app setting
    case '/admin/app-setting/store':
        $controller = new AppSettingController();
        $controller->store();
        break;

//portofolio
    case '/admin/porto_folio/create':
        $controller = new porto_folioController();
        $controller->create();
        break;    
    case '/admin/porto_folio/store':
        $controller = new porto_folioController();
        $controller->store();
        break;
    case '/admin/porto_folio/edit':
        if(isset($_GET['id'])){
            $controller = new porto_folioController();
            $controller->edit();
        }
        break;
    case '/admin/porto_folio/update':
        if(isset($_GET['id'])){
            $controller = new porto_folioController();
            $controller->update();
        }
        break;    
    case '/admin/porto_folio/delete':
        if(isset($_GET['id'])){
        $controller = new porto_folioController();
        $controller->delete();
        }
        break;
        

    default:
        // http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}