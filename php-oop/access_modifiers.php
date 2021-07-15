<?php
class A {
  public $name;
  public function show(){
    echo $this->name;
  }
}
class B extends class A{
  public function get(){
    echo "Your Name".$this->name;
  }
}

//protected - inheritance class access
// private - only use in { } not outside work on inside

$test = new A();
$this->name = "Mamun";
$test->show();