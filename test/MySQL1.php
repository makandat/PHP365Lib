<?php
include "../MySQL.php";
include "../Common.php";
include "../Text.php";
#  MySQL クラスのテスト (1)

$client = new MySQL();

$result = $client->query('SELECT * FROM m_tables');
foreach ($result as $row) {
  $s = Text\format('%s,%s,%s,%d,%s', $row['database'], $row['name'], $row['engine'], $row['rows'], $row['created']);
  Common\println($s);
}

$count = $client->getValue('SELECT count(*) FROM m_tables');
Common\println('Lines = ' . $count);

$client->close();

?>

