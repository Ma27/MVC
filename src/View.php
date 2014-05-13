<?php

class View {

    private $data;
    private $fileName;


    public function __construct($filename) {
        $this->setFileName($filename);
    }

    private function setFileName($filename) {
        if (!is_file($filename)) {
            throw new Exception(sprintf('File "%s" not found', $filename));
        }
        $this->fileName = $filename;
    }

    public function render() {
        if ($this->data) {
            extract($this->data, EXTR_SKIP);
        }

        ob_start();

        try {
            include_once realpath($this->fileName);
        } catch (Exception $e) {
            ob_end_clean();
            throw $e;
        }
        return ob_get_clean();
    }

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    public function __toString() {
        try {
            return $this->render();
        } catch (Exception $e) {
            throw $e;
        }
    }

}
