<?php
require_once __DIR__ . '/repository.php';

class TaskRepository extends Repository
{
    function getTasks($workspace)
    {
        require __DIR__ . '/../../config.php';

        // Get selected workspace
        $selectedWorkspace;

        if (!array_key_exists("workspace", $_SESSION) || $_SESSION["workspace"] == null) {
            $selectedWorkspace = $workspace->workspaces[0];
        }else {
            $selectedWorkspace = $_SESSION["workspace"];
        }

        // Getting all the tasks of specific user
        $tasksSql = $conn->prepare('SELECT tasks.id as "taskID", taskDescription, dateTime, priority, sub.description as "subject"
                                    FROM tasks
                                    LEFT JOIN subjects as sub
                                        ON tasks.fkSubject = sub.fkWorkspace
                                    WHERE tasks.fkWorkspace=:workspaceID'
                                );
        $tasksSql->execute(['workspaceID' => $selectedWorkspace["id"]]);
        if ($tasksSql->rowCount() > 0) {
            return $tasksSql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
}