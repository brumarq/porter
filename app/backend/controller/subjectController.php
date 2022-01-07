<?php

use Model\Subject;
use Model\Workspace;

require __DIR__ . '/controller.php';
require __DIR__ . '/../services/subjectService.php';
require __DIR__ . '/../models/Subject.php';
require __DIR__ . '/../models/Workspace.php';



class subjectController extends Controller
{

    public function run()
    {

        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'getSubjects':
                    $this->getSubjects();
                    break;
                case 'addSubject':
                    $this->addSubject();
                    break;
                default:
                    # code...
                    break;
            }
        }
    }

    public function getSubjects() {
        if (!empty($_SESSION['unique_id'])) {
            $_SESSION["workspace"] = $_POST['workspace'];
            $workspace =  new Workspace($_POST['workspace'], null, $_SESSION['unique_id']);
        
            $subjectService = new SubjectService();

            $response = new stdClass;
            $response = $subjectService->getSubjects($workspace);

            require __DIR__ . "/../views/api/jsonOutput.php";
        } else {
            require __DIR__ . "/../views/login.php";
        }
    }

    public function addSubject() {
        if (!empty($_SESSION['unique_id'])) {
            

            $response = new stdClass;

            if (!empty($_POST['subject'])) {

                if (!array_key_exists("workspace", $_SESSION) || $_SESSION["workspace"] == null) {
                    $workspace =  new Workspace($_POST['workspace'], null, $_SESSION['unique_id']);
                } else {
                    $workspace =  new Workspace($_SESSION["workspace"], null, $_SESSION['unique_id']);
                }

                $subject =  new Subject(null, $_POST['subject'], $workspace);
    
                $subjectService = new SubjectService;
    
                
                $response->result = $subjectService->addSubject($subject);
            }else {
                $response->result = "emptyFields";
            }

            

            require __DIR__ . "/../views/api/jsonOutput.php";
        } else {
            require __DIR__ . "/../views/login.php";
        }
    }
}