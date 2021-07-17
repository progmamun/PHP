<?php
class abc
{
    public function __toString()
    {
        return "You can't print object as a string.";
    }
}

$test = new abc();
echo $test;
