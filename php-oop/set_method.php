<?php
// same as get methods
class abc
{
    private $name;
    public function __set($property, $value)
    {
        echo "This is Private or Non existing property";
    }
}
$test = new abc();
$test->name = "Mamun Khan";
$test->course = "PHP";
