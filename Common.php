<?php
namespace Common;
define("VERSION", "1.0.0");
define("INIFILE", "AppConf.ini");

define("ESC_NORMAL", "\x1b[0m");
define("ESC_BOLD", "\x1b[1m");
define("ESC_DIM", "\x1b[2m");
define("ESC_ITALIC", "\x1b[3m");
define("ESC_UNDERLINE", "\x1b[4m");
define("ESC_BLINK", "\x1b[5m");
define("ESC_HBLINK", "\x1b[6m");
define("ESC_REVERSE", "\x1b[6m");
define("ESC_FG_BLACK", "\x1b[30m");
define("ESC_BG_BLACK", "\x1b[40m");
define("ESC_FG_RED", "\x1b[31m");
define("ESC_BG_RED", "\x1b[41m");
define("ESC_FG_GREEN", "\x1b[32m");
define("ESC_BG_GREEN", "\x1b[42m");
define("ESC_FG_YELLOW", "\x1b[33m");
define("ESC_BG_YELLOW", "\x1b[43m");
define("ESC_FG_BLUE", "\x1b[34m");
define("ESC_BG_BLUE", "\x1b[44m");
define("ESC_FG_MAGENTA", "\x1b[35m");
define("ESC_BG_MAGENTA", "\x1b[45m");
define("ESC_FG_CYAN", "\x1b[36m");
define("ESC_BG_CYAN", "\x1b[46m");
define("ESC_FG_WHITE", "\x1b[37m");
define("ESC_BG_WHITE", "\x1b[47m");


# コマンドライン引数の数
function count_args() : int {
  return ($_SERVER['argc'] - 1);
}

# コマンドライン引数を返す。n はコマンドライン引数の番号であるが、負の場合はコマンドライン引数配列全体を返す。
function args(int $n = -1) {
  $argv = $_SERVER['argv'];
  if (count_args() > 0) {
    if ($n < 0) {
      return $argv;
    }
    else {
      return $argv[$n + 1];
    }
  }
  else {
    return NULL;
  }
}

# ログを出力する。logfile を省略すると STDOUT に出力する。
function log_output(string $message, string $logfile = NULL) : void {
  $now = strftime('%Y-%m-%d %T')." ";
  if (isset($logfile)) {
    error_log($now.$message."\n", 3, $logfile);
  }
  else {
    error_log($now.$message."\n", 0);
  }
}

# プログラムを停止する。
function stop(int $code = 0, string $message = NULL) : void {
  if (isset($message)) {
    print($message);
  }
  exit($code);
}

# プロセスを起動し、プロセスが成功(TRUE)か失敗か(FALSE)を返す。
function exec(string $cmd) : int {
  if (system($cmd) === FALSE) {
    return FALSE;
  }
  else {
    return TRUE;
  }
}

# プロセスを起動してプロセスの出力を返す。
function shell(string $cmd) : string {
  return shell_exec($cmd);
}

# 環境変数の値を返す。
function get_env(string $key) : string {
  return getenv($key);
}

# OS が Windows かどうかを返す。
function is_windows() : bool {
  return (substr(PHP_OS, 0, 3) == 'WIN');
}

# エスケープシーケンス＋メッセージを表示する。esc は一部の色名称を使用できる。
function esc_print(string $esc, string $message) {
  if ($esc == 'red') {
    print(ESC_FG_RED . $message . ESC_NORMAL . "\n");
  }
  else if ($esc == 'green') {
    print(ESC_FG_GREEN . $message . ESC_NORMAL . "\n");
  }
  else if ($esc == 'blue') {
    print(ESC_FG_BLUE . $message . ESC_NORMAL . "\n");
  }
  else if ($esc == 'yellow') {
    print(ESC_FG_YELLOW . $message . ESC_NORMAL . "\n");
  }
  else if ($esc == 'cyan') {
    print(ESC_FG_CYAN . $message . ESC_NORMAL . "\n");
  }
  else if ($esc == 'magenta') {
    print(ESC_FG_MAGENTA . $message . ESC_NORMAL . "\n");
  }
  else {
    print($esc . $message . ESC_NORMAL . "\n");
  }
}

# キーボードから1行読む。
function readline(string $message = NULL) : string {
  print($message);
  $line = trim(fgets(STDIN));
  return $line;
}

# １行+改行を標準出力に出力する。
function println($text) {
  print($text . "\n");
}

?>
