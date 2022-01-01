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
            $selectedWorkspace = $workspace->workspaces[0];
        }else {
            $selectedWorkspace = $_SESSION["workspace"];
        }

        // Getting all the subjects of specific workspace
        $tasksSql = $conn->prepare('SELECT description
                                    FROM subjects
                                    WHERE subjects.fkWorkspace=:workspaceID'
                                );
        $tasksSql->execute(['workspaceID' => $selectedWorkspace["id"]]);
        if ($tasksSql->rowCount() > 0) {
            return $tasksSql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
}