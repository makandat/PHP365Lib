<?php
require '../Common.php';
# ログとプロセス起動
define("LOGFILE", "/home/user/temp/PHP365Lib.log");

Common\log_output("Start Common2.php", LOGFILE);
# exec
$n = Common\exec("cat /home/user/.bashrc");
if ($n === FALSE) {
  Common\log_output("cat command failed.", LOGFILE);
  Common\stop(9, "cat command failed.\n");
}
else {
  print("cat command succeeded\n");
}

# shell
$s = Common\shell("cat /home/user/.profile");
print($s);

print("Done.\n");
Common\log_output("Normal End Common2.php", LOGFILE);
?>
