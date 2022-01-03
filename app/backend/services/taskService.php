<?php
require __DIR__ . '/../repositories/taskRepository.php';

class TaskService {
    public function getTasks($workspace) {
        $repository = new TaskRepository();
        return $repository->getTasks($workspace);  
    }

    public function addTask($task) {
        $repository = new TaskRepository();
        return $repository->addTask($task);  
    }

    public function completeTask($task) {
        $repository = new TaskRepository();
        return $repository->completeTask($task);  
    }
}

?>