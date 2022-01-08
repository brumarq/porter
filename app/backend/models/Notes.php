<?php

namespace Model;

class Note {

    protected $id;
    protected $title;
    protected $textMarkup;
    protected $textHTML;
    protected $creationDate;
    protected $workspace;
    protected $subject;

    public function __construct($id, $title, $textMarkup, $textHTML, $creationDate, $workspace, $subject) {
        $this->id = $id;
        $this->title = $title;
        $this->textMarkup = $textMarkup;
        $this->textHTML = $textHTML;
        $this->creationDate = $creationDate;
        $this->workspace = $workspace;
        $this->subject = $subject;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getMarkup() {
        return $this->textMarkup;
    }

    public function getHTML() {
        return $this->textHTML;
    }

    public function getDate() {
        return $this->creationDate;
    }

    public function getWorkspace() {
        return $this->workspace;
    }

    public function getSubject() {
        return $this->subject;
    }
}