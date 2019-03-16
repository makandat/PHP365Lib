<?php
require '../Common.php';
# esc_print, readline, is_windows, get_env など

Common\log_output("Start Common2.php");

Common\esc_print("yellow", "Start Common3.php");
$s = Common\readline('> ');
echo $s."\n";

if (Common\is_windows()) {
  Common\esc_print(ESC_REVERSE, "Windows");
}
else {
  Common\esc_print(ESC_UNDERLINE, "Not Windows");
}

$s = Common\get_env('PYTHONPATH');
echo $s."\n";

print("Done.\n");
Common\log_output("Normal End Common3.php");
?>
