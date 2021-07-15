<?php
//overriding methods
class A{
  public $name;
  public function show(){
    echo "My Name".$this->name;
  }
}
class B extends class A{
  public function show(){
    echo "Your Name".$this->name;
  }
}