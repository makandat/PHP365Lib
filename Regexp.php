<?php
namespace Regexp;
define("VERSION", "1.0.0");
define("INIFILE", "AppConf.ini");

# 正規表現　モジュール

#  パターン pattern に文字列 str に一致する部分文字列があれば TRUE、なければ FALSE を返す。
function ismatch(string $pattern, string $str) : bool {
  return preg_match("/".$pattern."/", $str);
}

#  パターン pattern に文字列 str に一致する部分文字列があればそれを返す。
function matches(string $pattern, string $str) : array {
  $arr = array();
  preg_match("/".$pattern."/", $str, &$arr);
  return $arr;
}

#  文字列 str のパターン pattern に一致する部分文字列を文字列 rep で置き換えた文字列を返す。
function replace(string $pattern, string $rep, string $str) : string {
  return preg_replace("/".$pattern."/", $rep, $str);
}

#  文字列 str のパターン pattern に一致する部分文字列で分割した配列を返す。
function split(string $pattern, string $str) : array {
  return preg_split($pattern, $str);
}

?>
