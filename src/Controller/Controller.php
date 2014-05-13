<?php

abstract class Controller_Controller {

    protected $response;
    protected $db;
    protected $templatePath;

    public function before() {

    }

    public function after() {

    }

    public function __construct(PDO $db, $templatePath) {
        $this->response = new Response();
        $this->db           = $db;
        $this->templatePath = $templatePath;
    }

    public function __destruct() {
        $this->response->sendHeaders();
        $this->response->sendContent();
    }

}
