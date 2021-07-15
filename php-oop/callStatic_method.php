<?php
class abc{
  private static function hello(){
    echo "This is hello method";
  }
  public function __callStatic(){
    echo "This is Private Static method";
  }
}
// :: it's called scope reguation operator
abc::hello();
