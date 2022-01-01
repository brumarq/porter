<?php
require_once __DIR__ . '/repository.php';

class WorkspaceRepository extends Repository
{
    function getWorkspaces($userID)
    {
        try {
            require __DIR__ . '/../../config.php';

            try {
                // Getting all the available workspaces for loggedin User
                $sql = $conn->prepare('SELECT id, name FROM workspaces WHERE fkuser=:loggedUserID');
                $sql->execute(['loggedUserID' => $userID]);

                if ($sql->rowCount() > 0) {
                    return $sql->fetchAll(PDO::FETCH_ASSOC);
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