<?php
abstract class A{
  protected $name;
  protected function __construct($n){
    $this->name = $n;
  }
  abstract protected function show();
}
class B extends class A{
  public function show(){
    echo $this->name;
  }
}