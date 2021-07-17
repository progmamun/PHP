<?Php
class student
{
    public $name;
    public $course;

    public function __construct($n)
    {
        $this->name = $n;
    }
}

$student1 = new student('Mamun');
$student2 = clone $student1;
$student2->name = 'Al Mamun Khan';
echo $student1->name;
