<?php
include "WebPage.php";

class WebForm1 extends WebPage {
  public function __construct($template) {
    parent::__construct($template);
    $this->setPlaceHolder('title', '華氏温度');

    if ($this->isPostback()) {
      $fah = (float)$this->getParam('fahren');
      $cel = ($fah - 32.0) * 5.0 / 9.0;
      $this->setPlaceHolder('message', "摂氏 $cel 度");
    }
    else {
      $this->setPlaceHolder('message', '華氏温度を摂氏に変換します。');
    }
  }
}

$obj = new WebForm1('templates/WebForm1.html');
$obj->echo();
?>
