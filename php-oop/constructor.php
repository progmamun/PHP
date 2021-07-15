<?php
class person
{
    public $name;
    public function __construct($n)
    {
        $this->name = $n;
    }
    public function show()
    {
        echo "Your Name:" . $this->name;
    }
}

//$p1 = new person("Mamun");
//$p1 ->show();
