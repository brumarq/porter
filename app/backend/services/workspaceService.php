<?php
require __DIR__ . '/../repositories/workspaceRepository.php';

class WorkspaceService {
    public function getWorkspaces($userID) {
        $repository = new WorkspaceRepository();
        $workspace = $repository->getWorkspaces($userID);
        return $workspace;
    }
}

?>