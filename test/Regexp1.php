<?php
include "../Regexp.php";
include "../Common.php";
include "../Text.php";
# Regexp のテスト

Common\esc_print("red", "Regexp のテスト (1)\n");

$target = "var y = 1 + 22 * x - 61";

Common\println(Text\bool2str(Regexp\ismatch('^var.*', $target)));
Common\println(Text\bool2str(Regexp\ismatch('^x.*', $target)));

$m = Regexp\matches('\s\d+\s', $target);
print_r($m);

Common\println(Regexp\replace('\s+', '_', $target));

$arr = Regexp\split('\s+', $target);
print_r($arr);

Common\esc_print("magenta", "終わり\n");
?>
