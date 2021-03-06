<?php
require_once __DIR__ . '/repository.php';

class TaskRepository extends Repository
{
    function getTasks($selectedWorkspace)
    {
        require __DIR__ . '/../../config.php';

        $tasksSql = $conn->prepare(
            'SELECT tasks.id as "taskID", taskDescription, dateTime, priority, sub.description as "subject"
                                    FROM tasks
                                    LEFT JOIN subjects as sub ON tasks.fkSubject = sub.id
                                    LEFT JOIN workspaces as wks ON tasks.fkWorkspace = wks.id
                                    WHERE tasks.fkWorkspace=:workspaceID AND wks.fkUser=:loggedInUser AND status="open"'
        );
        $tasksSql->execute(['workspaceID' => $selectedWorkspace->getId(),
                            'loggedInUser' => $_SESSION['unique_id']]);
        if ($tasksSql->rowCount() > 0) {
            return $tasksSql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    function addTask($task)
    {
        require __DIR__ . '/../../config.php';

        $tasksSql = $conn->prepare(
            'INSERT INTO tasks (taskDescription, dateTime, priority, fkWorkspace, fkSubject)
            VALUES (:taskDescription, :dateTime, :priority, :fkWorkspace, :fkSubject);'
        );

        $workspace = $task->getWorkspace();
        $subject = $task->getSubject();

        return $tasksSql->execute([ 'taskDescription' => $task->getDescription(),
                             'dateTime' => $task->getDateTime(),
                             'priority' => $task->getPriority(),
                             'fkWorkspace' => $workspace->getId(),
                             'fkSubject' =>  $subject->getId() != '' ? $subject->getId() : NULL
                            ]);
    }

    function completeTask($task)
    {
        require __DIR__ . '/../../config.php';

        $tasksSql = $conn->prepare(
            'UPDATE tasks
            SET status = "closed"
            WHERE id=:taskId;'
        );
        
        return $tasksSql->execute([ 'taskId' => $task->getId()]);
    }
}
