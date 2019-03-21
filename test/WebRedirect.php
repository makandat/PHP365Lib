<?php
include "WebPage.php";
include "Text.php";

# リダイレクト
class WebRedirect extends WebPage {
  public function __construct($template) {
    parent::__construct($template);

    $this->setPlaceHolder('title', "Redirect test");
    if ($this->isPostback()) {
      $url = $this->getParam('url');
      $this->redirect($url);
    }
  }
}

$obj = new WebRedirect('templates/WebRedirect.html');
$obj->echo();

?>
