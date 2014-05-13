<?php

class Controller_Guestbook extends Controller_Controller {

    public function before() {

    }

    public function listEntries() {
        $header        = new View($this->templatePath . '/header.php');
        $header->title = _('List Entries');
        $footer        = new View($this->templatePath . '/footer.php');
        $layout        = new View($this->templatePath . '/listEntries.php');
        $navigation    = new View($this->templatePath . '/navigation.php');

        $query     = "SELECT id,title,content,created FROM entries ORDER BY created DESC";
        $statement = $this->db->prepare($query);
        $statement->execute();

        $layout->entries    = $statement->fetchAll(PDO::FETCH_CLASS, 'Model_Entry');
        $layout->navigation = $navigation;
        $layout->header     = $header;
        $layout->footer     = $footer;
        $this->response->setContent($layout->render());
    }

    public function newEntry() {
        $header              = new View($this->templatePath . '/header.php');
        $header->title       = _('New Entry');
        $footer              = new View($this->templatePath . '/footer.php');
        $layout              = new View($this->templatePath . '/newEntry.php');
        $navigation          = new View($this->templatePath . '/navigation.php');
        $layout->errors      = array();
        $layout->successfull = false;
        if (isset($_POST['save'])) {
            $entry          = new Model_Entry;
            $entry->title   = $_POST['title'];
            $entry->content = $_POST['content'];
            $entry->created = 'now';

            if ($entry->isValid()) {
                $layout->successfull = $this->saveEntry($entry);
            } else {
                $layout->errors = $entry->getErrors();
            }
        }

        $layout->navigation = $navigation;
        $layout->header     = $header;
        $layout->footer     = $footer;
        $this->response->setContent($layout->render());
    }

    private function saveEntry(Model_Entry $entry) {
        $query    = "INSERT INTO entries (title,content,created) VALUES(:title,:content,:created)";
        $statment = $this->db->prepare($query);
        return $statment->execute(array(
                    ':title'   => $entry->title,
                    ':content' => $entry->content,
                    ':created' => $entry->created->format('Y-m-d H:i:s')
        ));
    }

    public function after() {
        
    }

}
