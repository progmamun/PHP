<?php
class abc
{
    public function __construct()
    {
        echo "This is Construct function";
    }
    public function hello()
    {
        echo "Hello Everyone";
    }
    public function __destruct()
    {
        echo "This is destruct function";
    }
}
$test = new abc();
$test->hello();
