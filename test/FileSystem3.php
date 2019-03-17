<?php
# FileSystem2.php
require_once("../Common.php");
Common\esc_print('cyan', 'FileSystem2.php');
require_once("../FileSystem.php");
require_once("../Text.php");
use FileSystem as fs;

if (Common\count_args() == 0) {
  Common\stop(9, "テスト番号を指定してください。\n");
}
else {
  $testNo = Common\args(0);
  Common\println(Common\count_args() . " " . $testNo);
}

$text1 = <<<EOS
12345
 ABCD
=== @@@ ===
EOS;
$fileName1 = '/home/user/temp/text1.txt';
$fileName2 = '/home/user/temp/data1.bin';


if ($testNo == 1) {
  # テキストファイルの書き込み
  fs\writeAllText($fileName1, $text1);
  # テキストファイルの読み込み
  $str = fs\readAllText($fileName1);
  Common\esc_print('cyan', $str . "\n");
}
else if ($testNo == 2) {
  # ァイルを読み込んで文字列の配列として返す。
  $lines = fs\readAllLines($fileName1);
  foreach ($lines as $line) {
    Common\println($line);
  }
}
else {
  # バイナリーファイルの書き込み
  fs\writeBinary($fileName2, "0".chr(0x09).chr(0x1a));
  # バイナリーファイルの読み込み
  $data = fs\readBinary($fileName2);
  Common\println(bin2hex($data));
}

Common\esc_print('magenta', "Done.\n");
?>
