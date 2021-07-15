<?php
class abc{
  private $name="Mamun Khan";
  public function hello(){
    echo "Hello".$this->name;
  }
  public function __get(){
    echo "This is Private or Non existing property";
  }
}

// fatal error thika bacer jono use kora hoi
$test = new abc();
echo $test->name;
echo $test->course;