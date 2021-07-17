<?php
class abc
{
    public $name = "Mamun Khan";
    public $course = "PHP";
    public function __sleep()
    {
        return array("name"); //without $
    }
}
$obj = new abc();
$test = serialize($obj); //array , obj k seialize korta use kori
echo $test;
