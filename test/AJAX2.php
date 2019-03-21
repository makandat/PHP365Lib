<?php
include "WebPage.php";
#  センチからインチへ

$cent = (float)$_REQUEST['cent'];
$inch = $cent / 2.54;
$data = array("inch"=>$inch);
WebPage::sendJson($data);

?>
