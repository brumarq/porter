<?php
require __DIR__ . '/../repositories/taskRepository.php';

class TaskService {
    public function getTasks($workspace) {
        $repository = new TaskRepository();
        return $repository->getTasks($workspace);  
    }
}

?>