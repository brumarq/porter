<?php
require __DIR__ . '/repository.php';

class WorkspaceRepository extends Repository
{
    function loadWorkspace($userID, $workspace)
    {
        try {
            // Temporary
            require __DIR__ . '/../../config.php';

            try {
                $workspacesSql = $conn->prepare('SELECT id, name FROM workspaces WHERE fkuser=:loggedUserID');
                $workspacesSql->execute(['loggedUserID' => $userID]);

                $workspace = new stdClass();

                if ($workspacesSql->rowCount() > 0) {
                    $workspace->workspaces = $workspacesSql->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    return null;
                }

                $selectedWorkspace;

                if ($_SESSION["workspace"] == null) {
                    $selectedWorkspace = $workspace->workspaces[0];
                }else {
                    $selectedWorkspace = $_SESSION["workspace"];
                }
                
                $tasksSql = $conn->prepare('SELECT tasks.id as "taskID", taskDescription, dateTime, priority, sub.description as "subject"
                                            FROM tasks
                                            LEFT JOIN subjects as sub
                                                ON tasks.fkSubject = sub.fkWorkspace
                                            WHERE tasks.fkWorkspace=:workspaceID'
                                        );
                $tasksSql->execute(['workspaceID' => $selectedWorkspace["id"]]);
                if ($tasksSql->rowCount() > 0) {
                    $workspace->tasks = $tasksSql->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    return null;
                }

                return $workspace;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }
}