<?php
define("VERSION", "1.0.0");
define("INIFILE", "AppConf.ini");
define("UPLOADDIR", "/var/www/data");

# Web ページクラス
class WebPage {
  protected $html;    // HTML
  public $vars;       // 埋め込み変数のディクショナリ
  public $conf;    // コンフィギュレーション

  // コンストラクタ
  public function __construct(string $filePath) {
    if (isset($filePath))
      $this->html = readAllText($filePath);
    $this->vars = array();
    // INI ファイルを読んで $conf に格納する。
    $inifile = getcwd() . "/" . INIFILE;
    $this->conf = $this->readIniFile($inifile);
  }

  // HTML 文字列を返す。
  public function toString() : string {
    foreach (array_keys($this->v ) as $key) {
       $this->htm = str_replace('(*'.$key.'*)', $this->vars[$key], $this->html);
    }
    return $this->htm;
  }

  // HTML を出力する。
  public function echo() {
    echo $this->toString();
  }

  // パラメータがあれば true,　なければ false
  public function isPostback() : bool {
    return (count($_REQUEST) > 0);
  }

  // プレイスホルダを得る。
  public function getPlaceHolder(string $key) {
    return $this->vars[$key];
  }

  // プレイスホルダを設定する。
  public function setPlaceHolder(string $key, $value) {
    $this->vars[$key] = $value;
  }

  // パラメータを得る。
  public function getParam(string $key) {
    return $_REQUEST[$key];
  }

  // クッキーを得る。
  public function getCookie(string $key) {
    return $_COOKIE[$key];
  }

  // クッキーを設定する。
  public function setCookie(string $key, $value) {
    $_COOKIE[$key] = $value;
  }

  // リダイレクト
  public static function redirect(string $loc) : void {
    header('Location: ' . $loc);
  }

  // 画像を送る。
  public static function sendImage(string $filePath) {
     $img = getExtension($filePath);
     $img = strtolower($img);
     if ($img == '.jpg')
       $img = 'jpeg';
     else
       $img = substr($img, 1);
     header("Content-Type: image/" . $img);
     $buff = readBinary($filePath);
     print $buff;
  }

  // INI ファイルを読む。
  public static function readIniFile(string $inifile) {
    if (is_file($inifile))
      return parse_ini_file($inifile);
    else
      return false;
  }

  // ファイルアップロード
  public function fileUpload(string $key) : bool {
    $uploadfile = UPLOADDIR . basename($_FILES[$key]['name']);
    return move_uploaded_file($_FILES[$key]['tmp_name'], $uploadfile);
  }

  # テキストファイルを読んで内容を文字列として返す。
  public static function readAllText(string $filePath) : string {
    return file_get_contents($filePath);
  }

  # バイナリーファイルを読んで内容を文字列として返す。
  public static function readBinary(string $fileName) : string {
     $fp = foprn($fileName, "rb");
     $buff = fread($fp, filesize($fileName));
     fclose($fp);
     return $buff;
  }

  public static function getExtension(string $path) : string {
    $arr = pathinfo($path);
    if (isset($arr['extension']))
      return ".".$arr['extension'];
    else
      return "";
  }

}





// タグ作成関連関数

// タグを作る。
function tag($tagname, $value, $style=null) : string {
  $s = "<" . $tagname ;
  if (isset($style)) {
    $s .= " " . $style;
  }
  $s .= ">";
  $s .= $value;
  $s .= "</" . $tagname . ">\n";
  return $s;
}


// Anchor タグ
function anchor($href, $text, $target="") {
  $s = "<a href=\"" . $href . "\">";
  if ($target != "") {
    $s = "<a href=\"" . $href . "\" target=\"" . $target . "\">";
  }
  $s .= $text;
  $s .= "</a>\n";
  return $s;
}



// HTML テーブル行
function table_row(array $arr, string $tr = null, string $td = null) : string {
  $s = "<tr";
  if (isset($tr)) {
     $s .= " " . $tr . ">";
  }
  else {
     $s .= ">";
  }

  foreach ($arr as $c) {
    if (isset($td)) {
      $s .= "<td " . $td . ">";
    }
    else {
       $s .= "<td>";
    }
    $s .= $c;
    $s .= "</td>";
  }
  $s .= "</tr>\n";
  return $s;
}


// HTMLテーブルを作る。
function HtmlTable(array $arr, string $tab = null, string $td = null, string $th = null) : string {
  $s = "<table>\n";
  if (isset($tag)) {
    $s = "<table ".$tab.">\n";
  }

  $i = 0;
  foreach ($arr as $row) {
    $s .= "<tr>";
    foreach ($row as $c) {
      if ($i == 0) {
        if (isset($th)) {
          $s .= "<th " . $th . ">" . $c . "</th>";
        }
        else {
          $s .= "<th>" . $c . "</th>";
        }
      }
      else {
        if (isset($td)) {
          $s .= "<td " . $td . ">" . $c . "</td>";
        }
        else {
          $s .= "<td>" . $c . "</td>";
        }
      }
    }
    $s .= "</tr>\n";
    $i += 1;
  }
  $s .= "<table>\n";
  return $s;
}

// HTMLリストを作る。
function HtmlList(array $arr, bool $ol = false, string $style1 = null, string $style2 = null) {
  if ($ol) {
    if (isset($style1)) {
      $s = "<ol " . $style1 . ">\n";
    }
    else {
      $s = "<ol>\n";
    }
  }
  else {
    if (isset($style1)) {
      $s = "<ul " . $style1 . ">\n";
    }
    else {
      $s = "<ul>\n";
    }
  }

  foreach ($arr as $it) {
    if (isset($style2)) {
      $s .= "<li " . $style2 . ">" . $it . "</li>\n";
    }
    else {
      $s .= "<li>" . $it . "</li>\n";
    }
  }

  if ($ol)
    $s .= "</ol>\n";
  else
    $s .= "</ul>\n";
  return $s;
}

// 定義を作る。
function HtmlDefine(array $titles, array $defs, string $style1 = null, string $style2 = null) : string {
  $s = "";
  for ($i = 0; $i < count($titles); $i++) {
    $s .= "<dl>\n";
    if (isset($style1)) {
      $s .= "<dt " . $style1 . ">" . $titles[$i] . "</dt>\n";
    }
    else {
      $s .= "<dt>" . $titles[$i] . "</dt>\n";
    }
    if (isset($style2)) {
      $s .= "<dd " . $style2 . ">" . $defs[$i] . "</dd>\n";
    }
    else {
      $s .= "<dd>" . $defs[$i] . "</dd>\n";
    }
    $s .= "</dl>\n";
  }
  return $s;
}

?>
