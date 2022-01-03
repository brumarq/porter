<?php

namespace Model;

class Subject {

    protected $id;
    protected $name;
    protected Workspace $workspace;


    public function __construct($id, $name, $workspace) {
        $this->id = $id;
        $this->name = $name;
        $this->workspace = $workspace;
    }

    public function getId() {
        return $this->id;
    }

    public function getWorkspace() {
        return $this->workspace;
    }

    public function getName() {
        return $this->name;
    }
}