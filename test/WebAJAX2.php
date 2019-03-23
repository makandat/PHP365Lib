<?php
include "WebPage.php";
include "Text.php";

# リダイレクト
class WebRedirect extends WebPage {
  public function __construct($template) {
    parent::__construct($template);

    $this->setPlaceHolder('title', "AJAX JSON 取得");
    $this->setPlaceHolder('message', "");
  }
}

$obj = new WebRedirect('templates/WebAJAX2.html');
$obj->echo();

?>
