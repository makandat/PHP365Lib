<?php
# FileSystem4.php
require_once("../Common.php");
Common\esc_print('cyan', 'FileSystem4.php');
require_once("../FileSystem.php");
require_once("../Text.php");
use FileSystem as fs;


# 物理パスを得る。
$path = fs\getPhysicalPath("..");
Common\println($path);

# 拡張子を得る。
$path = '/home/user/workspace/PHP7.0/PHP365Lib/Common.php';
Common\println(fs\getExtension($path));

# ファイル名を得る。
Common\println(fs\getFileName($path));
# 拡張子を含まないファイル名を得る。
Common\println(fs\getFileNameBody($path));

# ファイルをコピーする。
fs\fcopy("/home/user/temp/text1.txt", "/home/user/temp/text2.txt");
if (!fs\exists("/home/user/temp/text2.txt")) {
  Common\stop(7, "Failed to copy file.");
}

# ファイルを移動する。
fs\fmove("/home/user/temp/text2.txt", "/home/user/temp/text3.txt");
if (!fs\exists("/home/user/temp/text3.txt")) {
  Common\stop(7, "Failed to move file.");
}

# ファイルを削除する。
fs\fdelete("/home/user/temp/text3.txt");
if (fs\exists("/home/user/temp/text3.txt")) {
  Common\stop(7, "Failed to move file.");
}

# 終わり
Common\esc_print('magenta', "Done.\n");
?>
