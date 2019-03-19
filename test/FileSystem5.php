<?php
# FileSystem5.php
require_once("../Common.php");
Common\esc_print('cyan', 'FileSystem5.php');
require_once("../FileSystem.php");
require_once("../Text.php");
use FileSystem as fs;

# シンボリックリンクを作成する。
fs\createSymlink('/home/user/workspace/PHP7.0/PHP365Lib/Common.php', '/home/user/temp/Common.php');
if (!fs\exists('/home/user/temp/Common.php')) {
  fs\stop(7, 'Failed to create symlink.');
}
else {
  unlink('/home/user/temp/Common.php');
}

# 現在のディレクトリを得る。
Common\println(fs\getCurrentDirectory());

# 現在のディレクトリを変更する。
$cur = fs\getCurrentDirectory();
fs\setCurrentDirectory('/home/user');
Common\println(fs\getCurrentDirectory());
fs\setCurrentDirectory($cur);

# ディレクトリを作成する。
fs\createDirectory('/home/user/temp/temp');
if (!fs\isDirectory('/home/user/temp/temp')) {
  Common\stop(7, "Failed to create directory.");
}

# ディレクトリを削除する。
fs\removeDirectory('/home/user/temp/temp');
if (fs\isDirectory('/home/user/temp/temp')) {
  Common\stop(7, "Failed to remove directory.");
}


# 終わり
Common\esc_print('magenta', "Done.\n");
?>
