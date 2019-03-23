<?php
include "WebPage.php";

class HelloPage extends WebPage {

  public function __construct($template) {
    parent::__construct($template);
    $this->setPlaceHolder('title', 'Hello, World!');
    $this->setPlaceHolder('message', '--- Hello, World! ---');
  }
}

$obj = new HelloPage('templates/HelloWorld.html');
# header('Content-Type: text/html');
$obj->echo();

?>

