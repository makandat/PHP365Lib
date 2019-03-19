<?php
include "../DateTime.php";
include "../Common.php";
#  SDateTime のテスト (1)

Common\esc_print("cyan", "DateTime のテスト (1)\n");

# コンストラクタ, toString(), timestamp()
$dt1 = new SDateTime();
Common\println($dt1->toString());
Common\println(SDateTime::timestamp());

# コンストラクタ, toDateString(), toTimeString()()
$dt2 = new SDateTime('2012-10-10 23:50:00');
Common\println($dt2->toString());
Common\println($dt2->toDateString());
Common\println($dt2->toTimeString());

# 日付
Common\println($dt2->year());
Common\println($dt2->month());
Common\println($dt2->day());

# 時刻
Common\println($dt2->hour());
Common\println($dt2->minute());
Common\println($dt2->second());


Common\esc_print("magenta", "終わり\n");
?>
