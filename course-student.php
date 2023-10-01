<?php
interface IStudent
{
    public function enroll($value);
    public function listCourses(): string;
}
class Student implements IStudent
{
    protected string $firstName;
    protected string $lastName;
    protected int $age;
    protected array $courses = [];

    public function __construct(string $firstName, string $lastName, int $age)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }
    public function __set($name, $value)
    {
        $this->courses[$name] = $value;
    }
    
    public function __get($name)
    {
        if (isset($this->courses[$name])) {
            return $this->courses[$name];
        }
    }

    public function enroll($value)
    {
        if (is_array($value)) {
            $this->courses = array_merge($this->courses, $value);
        } else {
            if (!in_array($value, $this->courses)) {
                $this->courses[] = $value;
            }
        }
    }

    public function listCourses(): string
    {
        $coursesList = "Courses Enrolled By {$this->firstName} {$this->lastName}:\n";

        foreach ($this->courses as $course) {
            if (is_array($course)) {
                foreach ($course as $subCourse) {
                    $coursesList .= "- $subCourse\n";
                }
            } else {
                $coursesList .= "- $course\n";
            }
        }

        return $coursesList;
    }
}

$student = new Student("John", "Doe", 23);
$student->courses = ["Math", "History"];
$student->enroll("Biology");
$student->enroll("Chemistry");
echo $student->listCourses();
