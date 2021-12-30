<?php
require __DIR__ . '/../repositories/workspaceRepository.php';

class WorkspaceService {
    public function loadWorkspace($userID) {
        $repository = new WorkspaceRepository();
        $workspace = $repository->loadWorkspace($userID);
        return $workspace;
    }
}

?>