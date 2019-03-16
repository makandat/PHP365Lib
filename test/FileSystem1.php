<?php
# FileSystem1.php
require_once("../Common.php");
Common\esc_print('cyan', 'FileSystem1.php');
require_once("../FileSystem.php");
require_once("../Text.php");
use FileSystem as fs;

# ファイルの存在など
Common\println(Text\bool2str(fs\exists('/usr/bin/perl')));
Common\println(Text\bool2str(fs\exists('/usr/bin/qerl')));
Common\println(Text\bool2str(fs\exists('/usr')));
Common\println(Text\bool2str(fs\exists('/home/USER')));

# ファイルの長さ
Common\println(fs\getLength('/usr/bin/perl'));

# ファイルのモード
Common\println(fs\getMode('/home/user/bin'));
Common\println(fs\getMode('/home/user/.bashrc'));

$dir = '/home/user/temp';
fs\setMode($dir, 0755);
Common\println(fs\getMode($dir));
fs\setMode($dir, 0777);
Common\println(fs\getMode($dir));

# ディレクトリ、リンク判別
Common\println(Text\bool2str(fs\isDirectory('/home')));
Common\println(Text\bool2str(fs\isDirectory('/home/user/.bashrc')));
Common\println(Text\bool2str(fs\isLink('/home/user')));
Common\println(Text\bool2str(fs\isLink('/home/user/Music')));

?>
