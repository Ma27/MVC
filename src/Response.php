<?php

class Response {

    private $headers = array();
    private $content = '';

    public function setContent($content) {
        $this->content = $content;
    }

    public function appendHeader($key, $value) {
        $this->headers[$key] = $value;
    }

    public function sendHeaders() {
        foreach ($this->headers as $key => $value) {
            $headerString = sprintf('%s:%s', $key, $value);
            header($headerString);
        }
    }
    public function sendContent() {
        echo $this->content;
    }

}
