<?php
class personal
{
    public function first()
    {
        echo "This is first function";
    }
    public function second()
    {
        echo "This is second function";
    }
    public function third()
    {
        echo "This is third function";
    }
}
// no need to use separate obj create
$test->first()->second()->third();
