<?php
require_once __DIR__ . '/repository.php';

class SubjectRepository extends Repository
{
    function getSubjects($workspace)
    {
        require __DIR__ . '/../../config.php';

        // Get selected workspace
        $selectedWorkspace;

        if (!array_key_exists("workspace", $_SESSION) || $_SESSION["workspace"] == null) {
            $selectedWorkspace = $workspace;
        }else {
            $selectedWorkspace = $_SESSION["workspace"];
        }

        // Getting all the subjects of specific workspace
        $tasksSql = $conn->prepare('SELECT id, description
                                    FROM subjects
                                    WHERE subjects.fkWorkspace=:workspaceID'
                                );
        $tasksSql->execute(['workspaceID' => $selectedWorkspace->getId()]);
        if ($tasksSql->rowCount() > 0) {
            return $tasksSql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    function addSubject($subject)
    {
        require __DIR__ . '/../../config.php';

        // Getting all the tasks of specific user
        $tasksSql = $conn->prepare(
            'INSERT INTO subjects (description, fkWorkspace)
            VALUES (:description, :workspaceID);'
        );

        $workspace = $subject->getWorkspace();
        $name = $subject->getName();

        return $tasksSql->execute([ 'workspaceID' => $workspace->getID(),
                                    'description' => $name 
                                ]);
    }
}