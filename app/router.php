<?php
class Router {
    public function route($url){
        
        switch ($url) {
            case '':
            case 'login':
                require __DIR__.'/backend/controller/pagesController.php';
                $controller = new PagesController();
                $controller->loginPage();
                break;                
            case 'signup':
                require __DIR__.'/backend/views/signup.php';
                break;
            case 'userController':
                require __DIR__.'/backend/controller/userController.php';
                $controller = new userController();
                $controller->run();
                break;
            case 'workspace':
                require __DIR__.'/backend/views/workplace.php';
                break;
            default:
                echo '404 not found';
                http_response_code(404);
                break;
        }
    }
}