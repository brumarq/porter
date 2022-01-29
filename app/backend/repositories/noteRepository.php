<?php
require_once __DIR__ . '/repository.php';

class NoteRepository extends Repository
{
    function getNotes($selectedWorkspace)
    {
        require __DIR__ . '/../../config.php';

        $tasksSql = $conn->prepare(
            'SELECT notes.id as NotesID, title, created
            FROM notes
            WHERE notes.fkWorkspace=:workspaceID
            ORDER BY created DESC'

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

        $tasksSql = $conn->prepare(
            'SELECT notes.id, title, textMarkup, textHtml, created
            FROM notes
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

        $tasksSql = $conn->prepare(
            'UPDATE notes
                                    SET textMarkup=:textMarkup, textHtml=:textHtml, title=:title
                                    WHERE id=:notesId;'
        );
        return $tasksSql->execute([
            'notesId' => $note->getId(),
            'textMarkup' => $note->getMarkup(),
            'textHtml' => $note->getHTML(),
            'title' => $note->getTitle()
        ]);
    }

    function addNote($note)
    {
        require __DIR__ . '/../../config.php';

        $tasksSql = $conn->prepare(
            'INSERT INTO notes (title, fkWorkspace, created)
            VALUES (:title, :workspaceID, :created);'
        );

        $workspace = $note->getWorkspace();
        $title = $note->getTitle();

        return $tasksSql->execute([
            'workspaceID' => $workspace->getID(),
            'title' => $title,
            'created' => date('Y-m-d H:i:s')
        ]);
    }

    function deleteNote($note)
    {
        require __DIR__ . '/../../config.php';

        $tasksSql = $conn->prepare(
            'DELETE notes
            FROM notes
            LEFT JOIN workspaces ON notes.fkWorkspace = workspaces.id
            WHERE notes.id=:notesID and workspaces.fkuser=:userID'
        );

        return $tasksSql->execute([
            'notesID' => $note->getID(),
            'userID' => $note->getWorkspace()->getUser()
        ]);
    }
}
