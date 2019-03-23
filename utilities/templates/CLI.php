<?php
require_once "Common.php";

if (Common\count_args() == 0) {
  Common\stop(9, "パラメータを指定してください。");
}

Common\esc_print("yellow", "サンプルアプリケーション\n");

// 以下にコードを記述


?>
