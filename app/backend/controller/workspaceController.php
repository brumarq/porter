<?php


require __DIR__ . '/controller.php';
require __DIR__ . '/../services/workspaceService.php';
require __DIR__ . '/../services/taskService.php';
require __DIR__ . '/../services/subjectService.php';

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
        $workspace = new stdClass;
        if (!empty($userID)) {
                $workspaceService = new WorkspaceService();
                $taskService = new TaskService();
                $subjectService = new SubjectService();

                $workspace->workspaces = $workspaceService->getWorkspaces($userID, null);
                $workspace->tasks = $taskService->getTasks($workspace);
                $workspace->subjects = $subjectService->getSubjects($workspace);
                $response = $workspace;
        } else {
            $response = "noUser";
        }

        require __DIR__ . "/../views/workplace.php";
    }
}