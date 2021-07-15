<?php
class personal
{
    protected static $name = "Mamun Khan";
    public function show()
    {
        echo static::name;
    }
}

class personal extends accounts
{
    protected static $name = "Mamun";
}
