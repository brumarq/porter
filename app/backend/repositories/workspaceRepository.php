<?php
require __DIR__ . '/repository.php';

class WorkspaceRepository extends Repository
{
    function loadWorkspace($userID)
    {
        try {
            // Temporary
            require __DIR__ . '/../../config.php';

            try {
                $stmt = $conn->prepare('SELECT id, name FROM workspaces WHERE fkuser=:loggedUserID');
                $stmt->execute(['loggedUserID' => $userID]);

                $workspace = new stdClass();

                if ($stmt->rowCount() > 0) {
                    $workspace->workspaces = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $workspace;
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }
}