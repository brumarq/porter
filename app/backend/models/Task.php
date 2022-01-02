<?php

namespace Model;

class Task {

    protected $id;
    protected $description;
    protected $dateTime;
    protected $priority;
    protected Workspace $workspace;
    protected Subject $subject;


    public function __construct($id, $description, $dateTime, $priority, Workspace $workspace, Subject $subject) {
        $this->id = $id;
        $this->description = $description;
        $this->dateTime = $dateTime;
        $this->priority = $priority;
        $this->workspace = $workspace;
        $this->subject = $subject;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    public function getPriority() {
        return $this->priority;
    }

    public function getWorkspace() {
        return $this->workspace;
    }

    public function getSubject() {
        return $this->subject;
    }
}