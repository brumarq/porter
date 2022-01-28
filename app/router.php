<?php
session_start();
class Router
{
    public function route($url)
    {
        switch ($url) {
            case '':
            case 'login':
                require __DIR__ . '/backend/controller/pagesController.php';
                $controller = new PagesController();
                $controller->loginPage();
                break;
            case 'signup':
                require __DIR__ . '/backend/views/signup.php';
                break;
            case 'workspace':
                require __DIR__ . '/backend/controller/workspaceController.php';
                $controller = new workspaceController();
                $_POST['action'] = "loadWorkspace";
                $controller->run();
                break;
            case 'workspace/notes':
                require __DIR__ . '/backend/controller/noteController.php';
                $controller = new noteController();
                $_POST['action'] = "loadNotes";
                $controller->run();
                break;
            case 'workspace/notes/viewEdit':
                require __DIR__ . '/backend/controller/noteController.php';
                $controller = new noteController();
                $_POST['action'] = "getNote";
                $controller->run();
                break;
            case 'workspace/notesController':
                require __DIR__ . '/backend/controller/noteController.php';
                $controller = new noteController();
                $controller->run();
                break;
            case 'workspace/notes/notesController':
                require __DIR__ . '/backend/controller/noteController.php';
                $controller = new noteController();
                $controller->run();
                break;
            case 'userController':
                require __DIR__ . '/backend/controller/userController.php';
                $controller = new userController();
                $controller->run();
                break;
            case 'workspaceController':
                require __DIR__ . '/backend/controller/workspaceController.php';
                $controller = new workspaceController();
                $controller->run();
                break;
            case 'taskController':
                require __DIR__ . '/backend/controller/taskController.php';
                $controller = new taskController();
                $controller->run();
                break;
            case 'subjectController':
                require __DIR__ . '/backend/controller/subjectController.php';
                $controller = new subjectController();
                $controller->run();
                break;
            case 'initdb':
                require __DIR__ . '/initdb.php';
                break;
            default:
                echo '404 not found';
                http_response_code(404);
                break;
        }
    }
}
