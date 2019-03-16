<?php
# Text3.php
require_once "../Text.php";
require_once "../Common.php";

# 書式化
$s = Text\format("%10d, %10.2f\n", 12, -5.3456);
print($s);

# 金額書式化
$s = Text\money(10000000);
Common\println($s);

# 終わり
Common\println("Done.");
?>
