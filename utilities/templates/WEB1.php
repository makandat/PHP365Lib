<?php
require_once "WebPage.php";
$title = "Sample";
$message = "";

// WebPage インスタンス化
$obj = new WebPage();
if ($obj->isPostback()) {
  $text1 = $this->getParam('text1');

  $message = 'OK';
}

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8" />
 <title><?php echo $title ?></title>
 <link rel="stylesheet" href="style.css" />
</head>

<body>
 <h1><?php echo $title ?></h1>
 <hr />
 <div class="menu_bar"><a href="/">HOME</a></div>
 <br />
 <form style="margin-left:10%" method="POST">
  <div class="form_row"><label>Text1 <input type="text" name="text1" id="text1" size="50" placeholder="text1" /></label></div>
  <div class="form_row"><input type="submit" value="送信する" /></div>
 </form>
 <br />
 <p>&nbsp;</p>
 <p class="message"><?php echo $message ?></p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
</body>
</html>
