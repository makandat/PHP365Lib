<?php
#  ソース(スケルトン)作成ツール
include "../Common.php";
include "../FileSystem.php";
include "../Text.php";


# 開始
Common\esc_print("yellow", "PHP ソース作成支援ツール\n");

Common\println("1. コンソールアプリ");
Common\println("2. ウェブアプリ (HTML テンプレートなし)");
Common\println("3. ウェブアプリ (HTML テンプレートあり)");

$apptype = Common\readline("番号を選んでください。");
if ($apptype == "") {
  Common\stop(1, "中断しました。");
}

$a = Common\readline("モジュールのリンクを保存先へ作成しますか？ (y/n) ");
if ($a == "") {
  Common\stop(1, "中断しました。");
}
else if ($a == "y") {
  $modlink = TRUE;
}
else if ($a == "n") {
  $modlink = FALSE;
}
else {
  Common\stop(1, "中断しました。");
}

$a = Common\readline("INI ファイルを保存先に作成しますか？ (y/n) ");
if ($a == "") {
  Common\stop(1, "中断しました。");
}
else if ($a == "y") {
  $ini = TRUE;
}
else if ($a == "n") {
  $ini = FALSE;
}
else {
  Common\stop(1, "中断しました。");
}

$savedir = Common\readline("ファイル保存先のフォルダをフルパスで入力してください？ ");
if ($savedir == "") {
  Common\stop(1, "中断しました。");
}

$progname = Common\readline("ファイル名(.php)を入力してください？ ");
if ($progname == "") {
  Common\stop(1, "中断しました。");
}

$filename = $savedir . "/" . $progname;

$confirm = Common\readline("実行してよいですか？ (y/n) ");

// 保存先がない場合
if (! FileSystem\isDirectory($savedir)) {
  Common\stop(2, "エラー：保存先のフォルダが存在しません。");
}


// ソースの種別, ファイル保存実施
$modedir = "/home/user/workspace/PHP7.0/PHP365Lib";

$inifile = $savedir . "/AppConf.ini";
$inicontent = <<<EOS
host=localhost
uid=user
pwd=****
db=user
EOS;

if ($apptype == 1) {
  // コンソールアプリ
  FileSystem\fcopy("templates/CLI.php", $filename);
  if ($modlink) {
    FileSystem\createSymlink($modedir . "/Common.php", $savedir . "/Common.php");
    FileSystem\createSymlink($modedir . "/FileSystem.php", $savedir . "/FileSystem.php");
    FileSystem\createSymlink($modedir . "/Text.php", $savedir . "/Text.php");
    FileSystem\createSymlink($modedir . "/DateTime.php", $savedir . "/DateTime.php");
    FileSystem\createSymlink($modedir . "/Regexp.php", $savedir . "/Regexp.php");
    FileSystem\createSymlink($modedir . "/List.php", $savedir . "/List.php");
    FileSystem\createSymlink($modedir . "/Dict.php", $savedir . "/Dict.php");
  }
  if ($ini) {
    FileSystem\writeAllText($inifile, $inicontent);
  }
}
else if ($apptype == 2) {
  // ウェブアプリ (HTML テンプレートなし)
  FileSystem\fcopy("templates/WEB1.php", $filename);
  if ($modlink) {
    FileSystem\createSymlink($modedir . "/WebPage.php", $savedir . "/WebPage.php");
    FileSystem\createSymlink($modedir . "/FileSystem.php", $savedir . "/FileSystem.php");
    FileSystem\createSymlink($modedir . "/Text.php", $savedir . "/Text.php");
    FileSystem\createSymlink($modedir . "/DateTime.php", $savedir . "/DateTime.php");
    FileSystem\createSymlink($modedir . "/Regexp.php", $savedir . "/Regexp.php");
    FileSystem\createSymlink($modedir . "/List.php", $savedir . "/List.php");
    FileSystem\createSymlink($modedir . "/Dict.php", $savedir . "/Dict.php");
  }
  if ($ini) {
    FileSystem\writeAllText($inifile, $inicontent);
  }
}
else if ($apptype == 3) {
  // ウェブアプリ (HTML テンプレートあり)
  FileSystem\fcopy("templates/WEB2.php", $filename);
  $tdir = $savedir . "/templates";
  if (! FileSystem\isDirectory($tdir)) {
     FileSystem\createDirectory($tdir);
  }
  $htmlfile = $tdir . "/" . Text\replace($progname, ".php", ".html");
Common\println($tdir);
Common\println($htmlfile);
  FileSystem\fcopy("templates/WEB2.html", $htmlfile);
  if ($modlink) {
    FileSystem\createSymlink($modedir . "/WebPage.php", $savedir . "/WebPage.php");
    FileSystem\createSymlink($modedir . "/FileSystem.php", $savedir . "/FileSystem.php");
    FileSystem\createSymlink($modedir . "/Text.php", $savedir . "/Text.php");
    FileSystem\createSymlink($modedir . "/DateTime.php", $savedir . "/DateTime.php");
    FileSystem\createSymlink($modedir . "/Regexp.php", $savedir . "/Regexp.php");
    FileSystem\createSymlink($modedir . "/List.php", $savedir . "/List.php");
    FileSystem\createSymlink($modedir . "/Dict.php", $savedir . "/Dict.php");
  }
  if ($ini) {
    FileSystem\writeAllText($inifile, $inicontent);
  }
}
else {
  Common\stop(2, "エラー：この番号はサポートされていません。");
}



Common\println("終了。");
?>
