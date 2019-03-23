#!/bin/sh
# リンクをすべて削除する。$1 は削除するリンクがあるフォルダ
unlink $1/Common.php
unlink $1/WebPage.php
unlink $1/FileSystem.php
unlink $1/Text.php
unlink $1/DateTime.php
unlink $1/Regexp.php
unlink $1/List.php
unlink $1/Dict.php
