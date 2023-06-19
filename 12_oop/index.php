<?php

require_once 'Person.php';
require_once 'Student.php';

// $p1 = new Person("Peter", "Parker");
// $p1->setAge(27);
// echo '<pre>';
// var_dump($p1);
// echo '</pre>';
// echo $p1->getAge();
// echo '<br>';
// // echo Person::$counter;
// echo Person::getCounter();

$student = new Student("Peter", "Parker", 12345);
echo '<pre>';
var_dump($student);
echo '</pre>';