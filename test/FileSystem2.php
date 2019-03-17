<?php
# FileSystem2.php
require_once("../Common.php");
Common\esc_print('cyan', 'FileSystem2.php');
require_once("../FileSystem.php");
require_once("../Text.php");
use FileSystem as fs;

# 書き込み禁止
Common\println(Text\bool2str(fs\isReadOnly('/home/user/temp/test.html')));
Common\println(Text\bool2str(fs\isReadOnly('/bin/bash')));

# ファイルの最終更新日時
Common\println(fs\getLastModified('/home/user/.bashrc'));

# ファイルの所有者
Common\println(fs\getOwnerName('/bin/bash'));

# ファイルのグループ
Common\println(fs\getGroupName('/bin/bash'));

?>
