<?php
include "../DateTime.php";
include "../Common.php";
#  SDateTime のテスト (2)

Common\esc_print("cyan", "SDateTime のテスト (2)\n");

# コンストラクタ, toString()
$dt1 = new SDateTime();
Common\println($dt1->toString());

# 日を加算する。
$dt1->addDay(1);
Common\println($dt1->toDateString());

# 秒を加算する。
$dt1->addSecond(60*60);
Common\println($dt1->toTimeString());

Common\esc_print("magenta", "終わり\n");
?>
