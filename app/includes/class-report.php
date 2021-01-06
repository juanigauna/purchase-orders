<?php
class Report {
    public $recipent;
    public $title;
    public $body;
    function __construct($params) {
        $this->recipent = $params['recipent'];
        $this->title = $params['title'];
        $this->body = $params['body'];
    }
    public function sendReport() {
        mail($this->recipent, $this->title, $this->body);
    }
}