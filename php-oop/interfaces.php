<?php
interface A
{
    public function hello($n);
}
interface C
{
    function hi($n);
    function bye();
}
class B implements A, C
{
    public function hello($n)
    {
        echo "Hello" . $n;
    }
    public function hi($n)
    {
        echo "Hi" . $n;
    }
    public function bye()
    {
        echo "Bye";
    }
}
