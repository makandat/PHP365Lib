<?php
# FileSystem6.php
require_once("../Common.php");
Common\esc_print('cyan', 'FileSystem6.php');
require_once("../FileSystem.php");
require_once("../List.php");
use FileSystem as fs;

# ファイル一覧を得る。
$files = fs\getFiles('/home/user/bin', '*.pl', TRUE);
print_r($files);
print "\n";
$files = fs\getFiles('/home/user/bin');
print_r($files);
print "\n";

# サブディレクトリ一覧を得る。
$dirs = fs\getSubDirectories('/home/user', TRUE);
print_r($dirs);
print "\n";

# 親のディレクトリを返す。
Common\println(fs\getParentPath('/usr/bin/perl'));

# 終わり
Common\esc_print('magenta', "Done.\n");
?>
