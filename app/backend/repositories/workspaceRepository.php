<?php
require_once __DIR__ . '/repository.php';

class WorkspaceRepository extends Repository
{
    function getWorkspaces($userID)
    {
        try {
            require __DIR__ . '/../../config.php';

            try {
                // Getting all the available workspaces for logged in User
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

    function addWorkspace($workspace){
        require __DIR__ . '/../../config.php';

        $workspacesSql = $conn->prepare(
            'INSERT INTO workspaces (name, fkuser)
            VALUES (:name, :fkuser);'
        );

        return $workspacesSql->execute([ 'name' => $workspace->getName(),
                                         'fkuser' => $workspace->getUser()
                                        ]);
    }
}