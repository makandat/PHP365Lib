<?php
# Dict クラス
class Dict {
  # 連想配列
  public $content;

  # コンストラクタ  
  public function __construct($hash = NULL) {
    $this->content = array();
    if (gettype($hash) == 'array') {
      foreach (array_keys($hash) as $key) {
        $this->content[$key] = $hash[$key];
      }
    }
  }

  # 要素の数を返す。
  public function count() {
    return count($this->content);
  }
  
  # 連想配列のキーに対応する値を得る。
  public function getValue($key) {
    return $this->content[$key];
  }

  # 連想配列のキーに対応する値を追加または変更する。
  public function setValue($key, $value) : void {
    $this->content[$key] = $value;
  }

  #  キーが存在すれば TRUE, 存在しなければ FALSE
  public function exists(string $key) : bool {
    return array_key_exists($key, $this->content);
  }

  # キー一覧を得る。
  public function getKeys() {
    return array_keys($this->content);
  }

  # 値一覧を得る。
  public function getValues() {
    return array_values($this->content);
  }

  # キーでソートする。
  public function sort() {
    ksort($this->content); 
  }

  # すべての要素に関数を適用する。
  public function each(callable $callback) {
    foreach (array_keys($this->content) as $key) {
      $callback($key, $this->content[$key]);
    }
  }

  # クリアする。
  public function clear() : void {
    $this->content = array();
  }

  # 内容を表示する。
  public function dump() {
    print_r($this->content);
  }
}

?>
