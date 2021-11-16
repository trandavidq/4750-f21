<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once './db/db_settings.php';
$url = 'https://api.devhub.virginia.edu/v1/courses';
$data = json_decode(file_get_contents($url));

$courses = array();
//Hashmap: dept_tag ->[course_names]
foreach($data->{'class_schedules'}->{'records'} as $course){
    //Grab course dept_tags
    $dept_tag = $course[0];
    $course_name = $course[4];
    $catalog_number = $course[1];
    $course_with_number = $dept_tag . $catalog_number ;
    if(!array_key_exists($dept_tag, $courses)){
        $courses[$dept_tag] = array();
    }
    if(strlen($course_name)>0){
        array_push($courses[$dept_tag],$course_name);
    }
    //Insert each course into Courses table
    $insert_course_query = $conn->prepare("INSERT INTO Courses (courseID,courseName,department) VALUES (?,?,?);");
    $insert_course_query ->bind_param("sss",$course_with_number,$course_name,$dept_tag);
    $insert_course_query -> execute();
}
foreach($courses as $key => $value){
    $courses[$key] = array_unique($courses[$key]);
}
?>