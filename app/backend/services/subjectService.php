<?php
require __DIR__ . '/../repositories/subjectRepository.php';

class SubjectService {
    public function getSubjects($workspace) {
        $repository = new SubjectRepository();
        return $repository->getSubjects($workspace);  
    }

    public function addSubject($subject) {
        $repository = new SubjectRepository();
        return $repository->addSubject($subject);  
    }
}

?>