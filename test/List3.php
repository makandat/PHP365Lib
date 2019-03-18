<?php
include "../List.php";
include "../Common.php";
include "../Text.php";
# List クラスのテスト (3)

$list1 = new List365([9,6,11,16,4]);
Common\println(Text\bool2str($list1->find(1)));
Common\println(Text\bool2str($list1->find(11)));

$list1->sort();
$list1->dump();

$list2 = new List365();
# 偶数のみを取り出す。
$list1->each(function($x) {
  global $list2;
  if ($x % 2 == 0) {
    $list2->push($x);
  }
});

$list2->dump();
?>
