<?php
include "WebPage.php";
#  インチからセンチへ

$inch = $_REQUEST['inch'];
$cent = (float)$inch * 2.54;

WebPage::sendText((string)$cent);

?>
