<!doctype html>
<html lang="en">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../coursesAPI.php';
session_start();
//Check that user is logged in
// if (!isset($_SESSION["firstName"])){
//   header('Location: login.php');
//   exit;
// }
?>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Course Search</title>
  <meta name="Courses" content="Page should allow for searching of courses">
  <link rel="stylesheet" href="../styles/courses.css">
</head>
    
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Notemates</span>
  </div>
</nav>
<h1 class="mx-3"> Courses </h1>
<div class="searchbar">
    <form action="../db/addCourses.php" method="POST">
        <h3 style="margin-right: 100px;">Choose a course:</h3>
        <label for="">Subject: </label>
        <select name="Subject" id="">
          <?php
          
          foreach($courses as $key => $value){
            echo "<option value = '$key'> $key </option>" ;
          }
          ?>
        </select>

        <label for="">Course name: </label>
        <select name="course_name" id="">
         <?php
         //PHP code to determine all dropdowns
         //Dropdown conditional upon department chosen
         ?>
        </select>
          
        
        <input type="text" name="course_name">
        <button class="btn btn-success" type="submit">Add</button>

    </form>
</div>
<hr>
</body>

<footer>
    <div class="card fixed-bottom">
        <div class="card-header">
            <small> &copy; Copyright 2021, Notemates Team. All Rights Reserved</small>
        </div>
    </div>

</footer>

</html>