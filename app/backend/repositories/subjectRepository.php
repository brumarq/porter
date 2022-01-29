<?php
require_once __DIR__ . '/repository.php';

class SubjectRepository extends Repository
{
    function getSubjects($selectedWorkspace)
    {
        require __DIR__ . '/../../config.php';

        // Getting all the subjects of specific workspace
        $tasksSql = $conn->prepare('SELECT id, description
                                    FROM subjects
                                    WHERE subjects.fkWorkspace=:workspaceID'
                                );
        $tasksSql->execute(['workspaceID' => $selectedWorkspace->getId()]);
        if ($tasksSql->rowCount() > 0) {
            return $tasksSql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    function addSubject($subject)
    {
        require __DIR__ . '/../../config.php';

        // Getting all the tasks of specific user
        $tasksSql = $conn->prepare(
            'INSERT INTO subjects (description, fkWorkspace)
            VALUES (:description, :workspaceID);'
        );

        $workspace = $subject->getWorkspace();
        $name = $subject->getName();

        return $tasksSql->execute([ 'workspaceID' => $workspace->getID(),
                                    'description' => $name 
                                ]);
    }

    function deleteSubject($subject)
    {
        require __DIR__ . '/../../config.php';

        $tasksSql = $conn->prepare(
            'DELETE subj FROM subjects as subj 
            LEFT JOIN workspaces as ws on subj.fkWorkspace=ws.id
            WHERE subj.id=:subjectId and ws.fkuser=:userId'
        );

        $workspace = $subject->getWorkspace();
        $userId = $workspace->getUser();

        return $tasksSql->execute([ 'subjectId' => $subject->getID(),
                                    'userId' => $userId 
                                ]);
    }
}