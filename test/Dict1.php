<?php
# Dict クラスのテスト (1)
include "../Dict.php";
include "../Common.php";
include "../Text.php";

$dict1 = new Dict(['A'=>0, 'B'=>1, 'C'=>2]);

Common\println('count = '. $dict1->count());
Common\println($dict1->getValue('A'));
Common\println($dict1->getValue('B'));
Common\println($dict1->getValue('C'));

$dict1->setValue('X', 100);
Common\println(Text\bool2str($dict1->exists('X')));
Common\println(Text\bool2str($dict1->exists('x')));
$dict1->dump();
$dict1->clear();
Common\println('clear count = '. $dict1->count());

?>
