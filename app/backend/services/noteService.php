<?php
require __DIR__ . '/../repositories/noteRepository.php';

class NoteService {
    public function getNotes($workspace) {
        $repository = new NoteRepository();
        return $repository->getNotes($workspace);  
    }

    public function getNote($noteID) {
        $repository = new NoteRepository();
        return $repository->getNote($noteID);  
    }

    public function updateNote($note) {
        $repository = new NoteRepository();
        return $repository->updateNote($note);  
    }

    public function addNote($note) {
        $repository = new NoteRepository();
        return $repository->addNote($note);  
    }

    public function deleteNote($note) {
        $repository = new NoteRepository();
        return $repository->deleteNote($note);  
    }
}

?>