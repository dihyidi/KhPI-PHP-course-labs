<?php
$first_name_input = $_POST['first_name'];
$first_name = (!empty($first_name_input) && ctype_alpha($first_name_input)) ? $first_name_input : 'FIRST_NAME';

$last_name_input = $_POST['last_name'];
$last_name = (!empty($last_name_input) && ctype_alpha($last_name_input)) ? $last_name_input : 'LAST_NAME';

echo "Hi, $first_name $last_name!";
