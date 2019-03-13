<?php
require '../Common.php';

$n = Common\count_args();
if ($n == 0) {
  Common\stop(9, "No Parameters.\n");
}

for ($i = 0; $i < $n; $i++) {
  print(Common\args($i)."\n");
}

print("Done.\n");
?>
