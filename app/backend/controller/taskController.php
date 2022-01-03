<?php

use Model\Subject;
use Model\Task;
use Model\Workspace;

require __DIR__ . '/controller.php';
require __DIR__ . '/../services/taskService.php';
require __DIR__ . '/../models/Task.php';
require __DIR__ . '/../models/Subject.php';
require __DIR__ . '/../models/Workspace.php';


class taskController extends Controller
{

    public function run()
    {

        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'addTask':
                    $this->addTask();
                    break;
                case 'getTasks':
                    $this->getTasks();
                    break;
                default:
                    # code...
                    break;
            }
        }
    }

    function addTask()
    {

        if (!empty($_SESSION['unique_id'])) {
            $task =  $_POST['task'];
            $dateTime =  $_POST['dateTime'];
            $priority =  $_POST['priority'];

            $response = new stdClass;

            if (!empty($task) && !empty($dateTime) && !empty($priority)) {
                if (!array_key_exists("workspace", $_SESSION) || $_SESSION["workspace"] == null) {
                    $workspace =  new Workspace($_POST['workspace'], null, $_SESSION['unique_id']);
                } else {
                    $workspace =  new Workspace($_SESSION["workspace"], null, $_SESSION['unique_id']);
                }
                

                
                $subject =  new Subject($_POST['subject'], null, $workspace);
                $task = new Task(null, $task, $dateTime, $priority, $workspace, $subject);
    
                $taskService = new TaskService();
    
                
                $response->result = $taskService->addTask($task);
            }else {
                $response->result = "emptyFields";
            }

            

            require __DIR__ . "/../views/api/jsonOutput.php";
        } else {
            require __DIR__ . "/../views/login.php";
        }
    }

    function getTasks()
    {
        if (!empty($_SESSION['unique_id'])) {
            if (!array_key_exists("workspace", $_SESSION) || $_SESSION["workspace"] == null) {
                $workspace =  new Workspace($_POST['workspace'], null, $_SESSION['unique_id']);
            } else {
                $workspace =  new Workspace($_SESSION["workspace"], null, $_SESSION['unique_id']);
            }

            $taskService = new TaskService();

            $response = new stdClass;
            $response = $taskService->getTasks($workspace);

            require __DIR__ . "/../views/api/jsonOutput.php";
        } else {
            require __DIR__ . "/../views/login.php";
        }
    }
}
