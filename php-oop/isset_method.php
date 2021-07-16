<?php
//private property outside a check korta use kora hoi.
class abc
{
    public $name = "Mamun Khan";
    private $course = "PHP";
    public function __isset($property)
    {
        echo isset($this->$property);
    }
}
$test = new abc();
echo $test->isset($this->name);
echo $test->isset($this->course);
