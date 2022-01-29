<?php
require __DIR__ . '/../repositories/workspaceRepository.php';

class WorkspaceService {
    public function getWorkspaces($userID) {
        $repository = new WorkspaceRepository();
        $workspace = $repository->getWorkspaces($userID);
        return $workspace;
    }

    public function addWorkspace($workspace) {
        $repository = new WorkspaceRepository();
        $workspace = $repository->addWorkspace($workspace);
        return $workspace;
    }
}

?>