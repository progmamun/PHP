<?php
class abc
{
    public $name = "Mamun Khan, Maimuna Hasnath, Humaira Hasnath Maisha, Marjia, Mahmuda Khanum Mimi, NM Abul Hasnath";
    public $course = "PHP";
    public function __sleep()
    {
        return array("name");
    }
    public function __wakeup()
    {
        echo "This is wakeup method.";
    }
}
$obj = new abc();
$test = serialize($obj);
unserialize($test);
