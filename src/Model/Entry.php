<?php

class Model_Entry extends Model_Model {

    private $id;
    private $title;
    private $content;
    private $created;

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCreated() {
        return $this->created;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setCreated($created) {
        $this->created = new DateTime($created);
    }
    public function validate() {
        if (empty($this->title)) {
            $this->addError(_('Title is Empty'));
        }
        if (strlen($this->title) > 254) {
            $this->addError(_('Title is too long'));
        }
        if (empty($this->content)) {
            $this->addError(_('Content is Empty'));
        }
    }

}
