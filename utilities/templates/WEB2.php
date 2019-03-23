<?php
require_once "WebPage.php";

class WebPageEx extends WebPage {
  // コンストラクタ
  public function __construct($template = '') {
    parent::__construct($template);
    $this->setPlaceHolder('title', 'Sample');
    $this->setPlaceHolder('message', '');
    if ($this->isPostback()) {
      $text1 = $this->getParam('text1');

      $this->setPlaceHolder('message', 'OK');
    }
  }
}

// 開始
$obj = new WebPageEx('templates/WebPageEx.html');
$obj->echo();
?>
