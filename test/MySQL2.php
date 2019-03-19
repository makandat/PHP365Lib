<?php
include "../MySQL.php";
include "../Common.php";
include "../Text.php";
#  MySQL クラスのテスト (2)

if (Common\count_args() == 0) {
  Common\stop(9, "パラメータ：カラーコード、名称を指定してください。");
}

$code = Common\args(0);
$name = Common\args(1);

$client = new MySQL();
$sql = "INSERT INTO colors VALUES('$code', '$name')";
$client->execute($sql);

$result = $client->query('SELECT * FROM colors', FALSE);

foreach ($result as $row) {
  $s = Text\format('%s: %s', $row[0], $row[1]);
  Common\println($s);
}

$client->close();
?>
