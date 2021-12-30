<?php
require __DIR__ . '/../repositories/workspaceRepository.php';

class WorkspaceService {
    public function loadWorkspace($userID) {
        $repository = new WorkspaceRepository();
        $workspaces = $repository->loadWorkspace($userID);
        return $workspaces;
    }
}

?>