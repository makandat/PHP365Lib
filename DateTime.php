<?php

# 日付時刻クラス
class SDateTime {
  // Unix time
  private $unixtime;
  private $element;
  
  # コンストラクタ 
  public function __construct($str = NULL) {
    if (!isset($str)) {
      $this->unixtime = time();
    }
    else {
      $this->unixtime = strtotime($str);
    }
    $this->element = getdate($this->unixtime);
  }

  # 現在のUnixタイムスタンプを返す。
  public static function timestamp() : int {
    return time();
  }

  # この日付時刻オブジェクトの文字列表現
  public function toString() {
    return strftime("%Y-%m-%d %H:%M:%S", $this->unixtime);
  }

  # この日付時刻オブジェクトの日付だけの文字列表現
  public function toDateString() {
    return strftime("%Y-%m-%d", $this->unixtime);
  }

  # この日付時刻オブジェクトの時刻だけの文字列表現
  public function toTimeString() {
    return strftime("%H:%M:%S", $this->unixtime);
  }

  # この日付時刻オブジェクトの日 (1..31)
  public function day() :int {
    return $this->element['mday'];
  }

  # この日付時刻オブジェクトの月 (1..12)
  public function month() : int {
    return $this->element['mon'];
  }

  # この日付時刻オブジェクトの年
  public function year() : int {
    return $this->element['year'];
  }

  # この付時刻オブジェクトの曜日 (0..6)
  public function dayOfWeek() : int {
    return $this->element['wday'];
  }

  # この日付時刻オブジェクトの秒
  public function second() : int {
    return $this->element['seconds'];
  }

  # この日付時刻オブジェクトの分
  public function minute() : int {
    return $this->element['minutes'];
  }

  # この日付時刻オブジェクトの時
  public function hour() : int {
    return $this->element['hours'];
  }

  # この日付時刻オブジェクトに日を加算する。
  public function addDay(int $day) : void {
    $interval = new DateInterval('P'.$day.'D');
    $dt = new DateTime($this->toString());
    $dt->add($interval);
    $this->unixtime = $dt->getTimestamp();
  }

  # この日付時刻オブジェクトに秒を加算する。
  public function addSecond(int $seconds) : void {
    $interval = new DateInterval('PT'.$seconds.'S');
    $dt = new DateTime($this->toString());
    $dt->add($interval);
    $this->unixtime = $dt->getTimestamp();
  }
};
?>
