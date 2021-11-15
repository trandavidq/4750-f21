<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = 'https://api.devhub.virginia.edu/v1/courses';
$data = json_decode(file_get_contents($url));
//Will print AAS
//echo($data->{'class_schedules'}->{'records'}[0][0]);
?>