<?php
include "WebPage.php";


// HTMLtable クラス
class HTMLtable extends WebPage {
  private $chtml = <<< EOS
<!doctype html>
<html lang="ja_jp">
<head>
<meta charset="utf-8" />
<title>(*title*)</title>
<link rel="stylesheet" href="style.css" />
<style>
table {
  width:50%;
}
</style>
</head>

<body>
<h1>(*title*)</h1>
<hr />
<br />
<div style="margin-left:10%;">
(*table*)
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
EOS;

  // コンストラクタ
  public function __construct($template = '') {
    parent::__construct($template);
    $this->html = $this->chtml;
    $this->setPlaceHolder('title', 'HTML テーブル');
    $this->setPlaceHolder('table', $this->createTable());
  }

  // HTMLテーブルを作成
  private function createTable() {
    $result = array(array('A', 'B'), array(1,2), array(3,4));
    return WebPage::HtmlTable($result);
  }
}

// START
$obj = new HTMLtable();
$obj->echo();
?>
