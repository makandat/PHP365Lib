<?php
# List クラス
class List365 {
  public $content;
  
  // コンストラクタ
  public function __construct($arr=NULL) {
    if (gettype($arr) == 'array') {
      $this->content = array();
      foreach ($arr as $x) {
        array_push($this->content, $x);
      }
    }
    else
      $this->content = array();
  }

  # 要素の数を返す。
  public function count() {
    return count($this->content);
  }

  # 指定した番号の値を得る。
  public function getValue(int $idx) {
    return $this->content[$idx];
  }

  # 指定した番号の値を変更する。
  public function setValue(int $idx, $value) {
    $this->content[$idx] = $value;
  }

  # 値をリストの最後に追加する。
  public function push($value) {
    array_push($this->content, $value);
  }

  # 値をリストの最後から取り出す。
  public function pop() {
    return array_pop($this->content);
  }

  # 値をリストの先頭に追加する。
  public function unshift($value) {
    array_unshift($this->content, $value);
  }

  # 値をリストの先頭から取り出す。
  public function shift() {
    return array_shift($this->content);
  }

  # 要素をすべて削除する。
  public function clear() {
    $this->content = array();
  }

  # リストの先頭から値を検索して見つかったらその番号を返す。見つからない場合は FALSE.
  public function find($value) {
    return array_search($value, $this->content);
  }

  # 配列をソートする。
  public function sort() {
    sort($this->content);
  }

  # ダンプ表示
  public function dump() {
    print_r($this->content);
  }

  # すべての要素に関数を適用する。
  public function each(callable $callback) {
    foreach ($this->content as $x) {
      $callback($x);
    }
  }
}
?>
