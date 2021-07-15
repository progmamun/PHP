<?php
trait test
{
    public function hello()
    {
        echo "Say Hello";
    }
}
class A
{
    use test;
}
class B
{
    use test;
}
$obj = new A();
$obj->hello();
