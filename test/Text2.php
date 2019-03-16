<?php
# Text2.php
require_once "../Text.php";
require_once "../Common.php";

$str = "012345";
# len
Common\println(Text\len($str));
# isstr, isint, isnum
Common\println(Text\bool2str(Text\isstr('0')));  # TRUE
Common\println(Text\bool2str(Text\isstr(0)));  # FALSE

# 追加
$str = Text\append($str, "6789");
Common\println($str);

# 部分文字列
$str1 = Text\substring($str, 2, 4);
Common\println($str1);

$str1 = Text\slice($str, 2, 4);
Common\println($str1);

# 繰り返し
$str = Text\times('%', 4);
Common\println($str);

# 終わり
Common\println("Done.");
?>
