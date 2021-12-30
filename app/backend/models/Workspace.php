<?php

namespace Model;

class Workspace {

    protected $id;
    protected $name;
    protected $user;

    public function __construct($id, $name, $user) {
        $this->id = $id;
        $this->name = $name;
        $this->user = $user;
    }

    public function getUser() {
        return $this->user;
    }

    public function getName() {
        return $this->name;
    }


}