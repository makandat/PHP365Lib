<?php
include_once('../List.php');
include_once('../Common.php');
#  List クラスのテスト(1)

Common\esc_print('yellow', 'Test of List');
$list1 = new List365();
Common\println("count = " . $list1->count());
$list1->push(1);
$list1->push(5);
$list1->push(-4);
$list1->push(7);
$list1->dump();
$list1->clear();
Common\println("count = " . $list1->count());
$list2 = new List365(["AB", "C", "567"]);
$x = $list2->getValue(0);
Common\println($x);
$list2->setValue(1, "YOU");
$list2->dump();

Common\esc_print('blue', "Done.\n");
?>
