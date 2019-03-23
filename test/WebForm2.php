<?php
include "WebPage.php";

class WebForm2 extends WebPage {
  public function __construct($template) {
    parent::__construct($template);
    $this->setPlaceHolder('title', 'CheckBox,RadioButton,Select');

    if ($this->isPostback()) {
      $msg = "";
      $msg .= "check1=" . $this->getParam('check1');
      $msg .= ", radio=" . $this->getParam('radiogroup');
      $msg .= ", select1 = " . $this->getParam('select1');
      $this->setPlaceHolder('message', $msg);
    }
    else {
      $this->setPlaceHolder('message', '');
    }
  }
}

$obj = new WebForm2('templates/WebForm2.html');
$obj->echo();
?>
