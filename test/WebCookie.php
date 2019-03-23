<?php
include "WebPage.php";
include "Text.php";

class WebCookie extends WebPage {
  public function __construct($template) {
    parent::__construct($template);
    $count = 0;
    if ($this->isCookie('count')) {
      $count = (int)$this->getCookie('count');
      $count += 1;
      $this->setCookie('count', $count);
    }
    else {
      $this->setCookie('count', 0);
    }

    $this->setPlaceHolder('title', "Cookie test");
    $this->setPlaceHolder('count', $count);
  }
}

$obj = new WebCookie('templates/WebCookie.html');
$obj->echo();
