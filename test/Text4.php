<?php
# Text4.php
require_once "../Text.php";
require_once "../Common.php";

# contains, indexOf
$str = " Abc-K+poa";
Common\println(Text\bool2str(Text\contains($str, "K")));
Common\println(Text\bool2str(Text\contains($str, "J")));
Common\println(Text\indexOf($str, "c"));
Common\println(Text\indexOf($str, "X"));

# replace
$str = "A B C D";
Common\println(Text\replace($str, " ", ","));

# split
$arr = Text\split($str, " ");
print_r($arr);

# join
$ss = join($arr, '-');
Common\println($ss);

# 終わり
Common\println("Done.");
?>
