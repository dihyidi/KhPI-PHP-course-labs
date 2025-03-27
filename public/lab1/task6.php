<?php
$student = array(
    'name' => 'John',
    'surname' => 'Smith',
    'age' => 20,
    'job' => 'Web Developer'
);
print_r($student);
echo "<br>updated array:<br>";
$student['grade'] = '100';
print_r($student);