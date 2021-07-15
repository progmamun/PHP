<?php
// require or include are same
// class name and the file must be same

function __autoload($class)
{
    require "classes/" . $class . ".php";
}
$test = new second();
$test1 = new first();
