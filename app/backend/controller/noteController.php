<?php

use Model\Note;
use Model\Workspace;

require __DIR__ . '/controller.php';
require __DIR__ . '/../services/workspaceService.php';
require __DIR__ . '/../services/noteService.php';
require __DIR__ . '/../models/Notes.php';
require __DIR__ . '/../models/Workspace.php';

class noteController extends Controller
{
    public function run()
    {

        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'loadNotes':
                    $this->loadNotes();
                    break;
                case 'getNote':
                    $this->getNote();
                    break;
                case 'getNoteJson':
                    $this->getNoteJson();
                    break;
                case 'saveChanges':
                    $this->saveChanges();
                    break;
                case 'addNote':
                    $this->addNote();
                    break;
                case 'getNotes':
                    $this->getNotes();
                    break;
                default:
                    # code...
                    break;
            }
        }
    }

    function loadNotes()
    {
        if (!empty($_SESSION['unique_id'])) {
            $userID =  $_SESSION['unique_id'];

            $noteService = new NoteService();
            $workspaceService = new WorkspaceService();

            $workspace = new stdClass;
            $workspace->workspaces = $workspaceService->getWorkspaces($userID, null);

            if (!array_key_exists("workspace", $_SESSION) || $_SESSION["workspace"] == null) {
                $workspaceObj = new Workspace($workspace->workspaces[0]["id"], $workspace->workspaces[0]["name"], $_SESSION['unique_id']);
                $_SESSION["workspace"] = $workspaceObj->getId();
            } else {
                $workspaceObj =  new Workspace($_SESSION["workspace"], null, $_SESSION['unique_id']);
            }

            $workspace->notes = $noteService->getNotes($workspaceObj);

            require __DIR__ . "/../views/notes.php";
        } else {
            require __DIR__ . "/../views/login.php";
        }
    }

    function getNotes()
    {
        if (!empty($_SESSION['unique_id'])) {
            $userID =  $_SESSION['unique_id'];

            $noteService = new NoteService();
            $workspaceService = new WorkspaceService();

            $workspace = new stdClass;
            $workspace->workspaces = $workspaceService->getWorkspaces($userID, null);

            if (array_key_exists("workspace", $_POST) || $_POST['workspace'] != null) {
                $_SESSION["workspace"] = $_POST['workspace'];
                $workspaceObj =  new Workspace($_SESSION["workspace"], null, $_SESSION['unique_id']);
            }

            $response = $noteService->getNotes($workspaceObj);
            require __DIR__ . "/../views/api/jsonOutput.php";
        } else {
            require __DIR__ . "/../views/login.php";
        }
    }



    function getNote()
    {
        if (!empty($_SESSION['unique_id'])) {
            $userID =  $_SESSION['unique_id'];
            $noteID = $_GET['id'];
            $_SESSION['currentNoteId'] = $noteID;
            $noteService = new NoteService();


            $note = $noteService->getNote($noteID);
            require __DIR__ . "/../views/viewEditNotes.php";
        } else {
            require __DIR__ . "/../views/login.php";
        }
    }

    function getNoteJson()
    {
        if (!empty($_SESSION['unique_id'])) {
            $userID =  $_SESSION['unique_id'];
            $noteID = $_SESSION['currentNoteId'];
            $noteService = new NoteService();


            $response = $noteService->getNote($noteID);
            require __DIR__ . "/../views/api/jsonOutput.php";
        } else {
            require __DIR__ . "/../views/login.php";
        }
    }

    function addNote()
    {
        if (!empty($_SESSION['unique_id'])) {
            $response = new stdClass;

            if (!empty($_POST['title'])) {

                if (!array_key_exists("workspace", $_SESSION) || $_SESSION["workspace"] == null) {
                    $workspace =  new Workspace($_POST['workspace'], null, $_SESSION['unique_id']);
                } else {
                    $workspace =  new Workspace($_SESSION["workspace"], null, $_SESSION['unique_id']);
                }

                $subject =  new Note(null, $_POST['title'], null, null, null, $workspace, null);
                $noteService = new NoteService;

                $response->result = $noteService->addNote($subject);
            } else {
                $response->result = "emptyField";
            }

            require __DIR__ . "/../views/api/jsonOutput.php";
        } else {
            require __DIR__ . "/../views/login.php";
        }
    }

    function saveChanges()
    {
        if (!empty($_SESSION['unique_id'])) {
            $userID =  $_SESSION['unique_id'];

            $id = $_SESSION['currentNoteId'];
            $title = $_POST['title'];
            $markup = $_POST['markup'];
            $html = $_POST['html'];

            $noteService = new NoteService();
            $note = new Note($id, $title, $markup, $html, null, null, null);

            $response = $noteService->updateNote($note);
            require __DIR__ . "/../views/api/jsonOutput.php";
        } else {
            require __DIR__ . "/../views/login.php";
        }
    }
}
