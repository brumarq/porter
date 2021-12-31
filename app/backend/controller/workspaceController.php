<?php


require __DIR__ . '/controller.php';
require __DIR__ . '/../services/workspaceService.php';

class workspaceController extends Controller{
    public function run(){
        
        if(isset($_POST['action'])){
            switch ($_POST['action']) {
                case 'loadWorkspace':
                    $this->loadWorkspace();
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

    public function loadWorkspace(){
        $userID =  $_SESSION['unique_id'];

        if (!empty($userID)) {
                $workspaceService = new WorkspaceService();
                $workspace = $workspaceService->loadWorkspace($userID, null);
                $response = $workspace;
        } else {
            $response = "noUser";
        }

        require __DIR__ . "/../views/workplace.php";
    }
}