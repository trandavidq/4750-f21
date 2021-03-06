<!doctype html>
<html lang="en">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../db/isLoggedIn.php';
include_once '../db/db_settings.php';
?>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./styles/courses.css">
  <title>Course Search</title>
  <meta name="Courses" content="Page should allow for searching of courses">
</head>

<body style="background-image: url(../styles/images/background.jpeg);">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="./home.php">Notemates.</i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./courses.php">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./docupload.php">Document Upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./docsearch.php">Document Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <h1 class="mx-3"> Courses </h1>
  <div class="card">
    <form class="spec" action="../db/addCourses.php" method="POST">
      <h3 style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">Choose a course, <?php echo $_SESSION['firstName']?>:</h3>
      <div style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">
      <label for="">Course: </label>
      <select name="subject" id="subject">
        <?php
        //Grab course number
        $get_courseID_query = $conn->prepare("SELECT courseID, courseName FROM Courses;");
        $get_courseID_query->execute();
        $result = $get_courseID_query->get_result();
        while ($class = $result->fetch_array(MYSQLI_NUM)) {
          $optionName = $class[0] . ': ' . $class[1];
          echo "<option value = '$class[0]'> $optionName </option>";
        }
        ?>
      </select>
      <button class="btn btn-success" type="submit">Add</button>
      </div>
    </form>
  </div>

  <hr>
  <div>
    <!-- Display all current courses -->
    <div style="background-color: white;">
    <div style="display: flex; justify-content: space-between; margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">
        <h1>My Courses</h1>
        <form style="margin-top: 10px" action="../db/exportCourses.php">
          <button type="submit" class="btn btn-primary">Download Course List</button>
        </form>
    </div>
    </div>
    <br>
    <?php
    $get_taken_courses_query = $conn->prepare('SELECT courseID from takes WHERE userID = ?');
    $get_taken_courses_query->bind_param("i", $_SESSION['userID']);
    $get_taken_courses_query->execute();
    $result  = $get_taken_courses_query->get_result();
    //Result is an array of courseIDs
    //var_dump($result);
    while ($row = $result->fetch_array()) {
      $courseName = $row[0];
      
      echo 
      "<form action=\"../db/removeCourses.php\" method= \"POST\">
        <div class=\"card\" style=\"width: 58rem;\">
          <div class=\"card-body\">
            <h5 class=\"card-title\">$courseName</h5>
            <input type=\"hidden\" name=\"courseName\" value= \"$courseName\">
            <button class=\"btn btn-danger\" type=\"submit\">Remove course</button>
          </div>
        </div>
      </form>";
    }
    ?>
  </div>
</body>

<footer>
  <div class="card fixed-bottom">
    <div class="card-header">
      <small> &copy; Copyright 2021, Notemates Team. All Rights Reserved</small>
    </div>
  </div>

</footer>

</html>