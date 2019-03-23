<?php
include "WebPage.php";
include "Text.php";

class WebUpload extends WebPage {
  
  public function __construct($template) {
    parent::__construct($template);

    $this->setPlaceHolder('title', "File Upload");

    if ($this->isPostback()) {
      $this->fileUpload("file1");
      $this->setPlaceHolder('message', $this->getUploadFileName("file1") . "を保存しました。");
    }
    else {
      $this->setPlaceHolder('message', '');
    }
  }
}

$obj = new WebUpload('templates/WebUpload.html');
$obj->echo();
