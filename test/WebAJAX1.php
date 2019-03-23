<?php
include "WebPage.php";
include "Text.php";

# AJAX テキスト取得
class WebAJAX1 extends WebPage {
  public function __construct($template) {
    parent::__construct($template);

    $this->setPlaceHolder('title', "AJAX get text");
    $this->setPlaceHolder('message', "");
  }
}

$obj = new WebAJAX1('templates/WebAJAX1.html');
$obj->echo();

?>
