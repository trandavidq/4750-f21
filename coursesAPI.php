<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = 'https://api.devhub.virginia.edu/v1/courses';
$data = json_decode(file_get_contents($url));
//Will print AAS
//echo($data->{'class_schedules'}->{'records'}[0][0]);

// $dept_tags = array();
// $course_names = array();
$courses = array();
//Hashmap: dept_tag ->[course_names]
foreach($data->{'class_schedules'}->{'records'} as $course){
    //Grab course dept_tags
    $dept_tag = $course[0];
    $course_name = $course[4];
    if(!array_key_exists($dept_tag, $courses)){
        $courses[$dept_tag] = array();
    }
    if(strlen($course_name)>0){
        array_push($courses[$dept_tag],$course_name);
    }
}
foreach($courses as $key => $value){
    $courses[$key] = array_unique($courses[$key]);
}

// for($i=0;$i<count($courses);$i++){
//     foreach
// }
?>