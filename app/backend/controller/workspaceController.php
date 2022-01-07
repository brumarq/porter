<?php

use Model\Workspace;

require __DIR__ . '/controller.php';
require __DIR__ . '/../services/workspaceService.php';
require __DIR__ . '/../services/taskService.php';
require __DIR__ . '/../services/subjectService.php';
require __DIR__ . '/../models/Workspace.php';

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
        $workspace = new stdClass;
        if (!empty($_SESSION['unique_id'])) {
            $userID =  $_SESSION['unique_id'];
            $workspaceService = new WorkspaceService();
            $taskService = new TaskService();
            $subjectService = new SubjectService();

            $workspace->workspaces = $workspaceService->getWorkspaces($userID, null);

            if (!array_key_exists("workspace", $_SESSION) || $_SESSION["workspace"] == null) {
                $workspaceObj = new Workspace($workspace->workspaces[0]["id"], $workspace->workspaces[0]["name"], $_SESSION['unique_id']);
                $_SESSION["workspace"] = $workspaceObj;
            } else {
                $workspaceObj =  new Workspace($_SESSION["workspace"], null, $_SESSION['unique_id']);
            }
            
            $workspace->tasks = $taskService->getTasks($workspaceObj);
            $workspace->subjects = $subjectService->getSubjects($workspaceObj);

            require __DIR__ . "/../views/workplace.php";
        }else {
            require __DIR__ . "/../views/login.php";
        }
    }
}