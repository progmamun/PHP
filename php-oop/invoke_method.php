<?php
class abc
{
    public $name = "Mamun Khan";
    public function hello()
    {
        echo "Hello" . $this->name;
    }
    public function __invoke()
    {
        echo "Hello" . $this->name;
    }
}
$obj = new abc();
$obj->hello();
$obj();
