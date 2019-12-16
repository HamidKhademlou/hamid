<?php
class student
{
    public function one_student()
    {
        require_once "Model.php";
        $student = new Model("localhost", "root", "", "mydbpdo");
        $output = $student->search("*", "students", "", true);
        return $output;
    }
}
