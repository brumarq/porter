<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/userService.php';

class userController extends Controller{
    public function run(){
        
        if(isset($_POST['action'])){
            switch ($_POST['action']) {
                case 'login':
                    $this->login();
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

    public function login(){
        $email =  $_POST['email'];
        $password =  $_POST['password'];
        $response = new stdClass();

        if (!empty($email) && !empty($password)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $userService = new UserService();
                $loginResult = $userService->getUser($email, $password);
                $response->message = $loginResult;

            } else {
                $response->message = "Enter a valid email!";
            }
        } else {
            $response->message = "Fill in all input fields!";
        }

        require __DIR__ . "/../views/api/jsonOutput.php";
    }
}