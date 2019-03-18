<?php
# Dict クラスのテスト (2)
include "../Dict.php";
include "../Common.php";
include "../Text.php";

$dict1 = new Dict(['S'=>0, 'b'=>1, 'O'=>2]);

$keys = $dict1->getKeys();
foreach ($keys as $k) {
  print($k . " ");
}
print("\n");

$values = $dict1->getValues();
foreach ($values as $x) {
  print($x . " ");
}
print("\n");

$dict1->setValue('X', 100);
$dict1->sort();
$dict1->dump();

$dict1->each(function($k, $v) {
  print("$k:$v\n");
});

?>
