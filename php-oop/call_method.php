<?php
class abc{
  private $name;
  private function hello($n){
    $this->name = $n;
  }
  public function __call(){
    echo "This is Private or Non existing method";
  }

}
$test = new abc();
echo $test->hello("Ram");
echo $test->personal();