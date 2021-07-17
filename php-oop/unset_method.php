<?php
class abc
{
    public $name = "Mamun Khan";
    private $course = "PHP";
    public function __unset($property)
    {
        unset($this->$property);
    }
}
$test = new abc();
unset($test->name);
unset($test->course);
