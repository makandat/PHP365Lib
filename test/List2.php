<?php
include_once("../List.php");
include_once("../Common.php");
#  List クラスのテスト(2)
$stack = new List365();
$stack->push('A');
$stack->push('B');
$stack->push('C');
$x = $stack->pop();
Common\println($x);
$x = $stack->pop();
Common\println($x);
$x = $stack->pop();
Common\println($x);

$queue = new List365();
$queue->unshift('A');
$queue->unshift('B');
$queue->unshift('C');
$x = $queue->shift();
Common\println($x);
$x = $queue->shift();
Common\println($x);
$x = $queue->shift();
Common\println($x);

$queue->push('A');
$queue->push('B');
$queue->push('C');
$x = $queue->shift();
Common\println($x);
$x = $queue->shift();
Common\println($x);
$x = $queue->shift();
Common\println($x);
?>
