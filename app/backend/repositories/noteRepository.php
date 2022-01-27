<?php
require_once __DIR__ . '/repository.php';

class NoteRepository extends Repository
{
    function getNotes($selectedWorkspace)
    {
        require __DIR__ . '/../../config.php';

        // Getting all the subjects of specific workspace
        $tasksSql = $conn->prepare('SELECT notes.id as NotesID, title, created, sub.description as subDescription
                                    FROM notes
                                    LEFT JOIN subjects as sub ON notes.fkSubject = sub.id
                                    WHERE notes.fkWorkspace=:workspaceID'
                                );
        $tasksSql->execute(['workspaceID' => $selectedWorkspace->getId()]);
        if ($tasksSql->rowCount() > 0) {
            return $tasksSql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    function getNote($noteID)
    {
        require __DIR__ . '/../../config.php';

        // Getting all the subjects of specific workspace
        $tasksSql = $conn->prepare('SELECT notes.id, title, textMarkup, textHtml, created, sub.id as subID, sub.description as subDescription
                                    FROM notes
                                    LEFT JOIN subjects as sub ON notes.fkSubject = sub.id
                                    WHERE notes.id=:notesId'
                                );
        $tasksSql->execute(['notesId' => $noteID]);
        if ($tasksSql->rowCount() > 0) {
            return $tasksSql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    function updateNote($note)
    {
        require __DIR__ . '/../../config.php';

        // Getting all the subjects of specific workspace
        $tasksSql = $conn->prepare('UPDATE notes
                                    SET textMarkup=:textMarkup, textHtml=:textHtml, title=:title
                                    WHERE id=:notesId;'
                                );
        return $tasksSql->execute(['notesId' => $note->getId(),
                            'textMarkup' => $note->getMarkup(),
                            'textHtml' => $note->getHTML(),
                            'title' => $note->getTitle()]);
    }

    function addNote($note)
    {
        require __DIR__ . '/../../config.php';

        // Getting all the tasks of specific user
        $tasksSql = $conn->prepare(
            'INSERT INTO notes (title, fkWorkspace, created)
            VALUES (:title, :workspaceID, :created);'
        );

        $workspace = $note->getWorkspace();
        $title = $note->getTitle();

        return $tasksSql->execute([ 'workspaceID' => $workspace->getID(),
                                    'title' => $title,
                                    'created' => date('Y-m-d H:i:s')
                                ]);
    }
}