<?php
require __DIR__ . '/../repositories/workspaceRepository.php';

class WorkspaceService {
    public function loadWorkspace($userID, $workspace) {
        $repository = new WorkspaceRepository();
        $workspace = $repository->loadWorkspace($userID, $workspace);
        return $workspace;
    }
}

?>