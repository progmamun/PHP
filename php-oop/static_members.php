<?php
class personal
{
    public static $name = "Mamun";
    public static function show()
    {
        echo self::$name;
    }
}
personal::$name;
personal::show();
