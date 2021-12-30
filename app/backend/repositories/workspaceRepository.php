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
                $conn = new PDO("mysql:host=$servername;dbname=$databasename", $dbusername, $dbpassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare('SELECT id, name FROM workspaces WHERE fkuser=:loggedUserID');
                $stmt->execute(['loggedUserID' => $userID]);

                if ($stmt->rowCount() > 0) {
                    $workspaces = $stmt->fetch();

                    return $workspaces;
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