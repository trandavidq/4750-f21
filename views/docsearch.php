<!doctype html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Document Search</title>
  <link rel="stylesheet" href="./styles/login.css">
  <meta name="DocSearch" content="Page should allow for searching of Documents from Database">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>
    
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Notemates</span>
  </div>
</nav>
<h1 class="mx-3"> Document Search </h1>
<form class="mx-3 my-3" method="POST" action = <?php echo $_SERVER['PHP_SELF'];?> style="background-color: rgba(155,155,155,0.5);color:white; pading:50px;text-align:center; border-radius:25px">
    <h2 class="mx-3"> Filters </h2>
  <div id="parent" class="my-1 mx-3" style="white-space: nowrap;">

    <label for="Date1" class="form-label">Dates:</label>
    <div class="child" style="display: inline-block">
      <input type="date" id="firstdate" name="startdate" value= "09/01/2021" min="1950-01-01" max="2050-01-01"/>
    </div>
    <div class="child"style="display: inline-block">
      <p> to </p>
    </div>
    <div class="child" style="display: inline-block">
    <input type="date" id="seconddate" name="enddate" value= "10/01/2021" min="1950-01-01" max="2050-01-01"/>
    </div>
  </div>
  <label for="coursename" class="form-label"> Course: </label>
  <input type="text" id="coursename" name="course" value="Enter Course">

  <button type="submit" class="btn btn-success my-2">Go</button>

</form>
<hr>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../db/db_settings.php';
session_start();

$startDate = $_POST['startdate'];
$endDate = $_POST['enddate'];
$course = $_POST['course'];
$userID = $_SESSION['userID'];

// echo $_SERVER['REQUEST_METHOD']=='POST' ? 'post':'none';
// echo $startDate;
// echo $endDate;
// echo $course;
//WHERE courseID LIKE ? 
$courseQuery = $course . '%';
$get_doc_query = $conn->prepare(
    "SELECT d.documentID from belongs_to b , Document d
     WHERE b.userID=d.userID  AND b.userID = 29
     AND b.courseID LIKE ? AND d.dateCreated >= ?
     AND d.dateCreated <= ?");
$get_doc_query->bind_param("sss",$courseQuery,$startDate,$endDate);
$get_doc_query ->execute();


$result = $get_doc_query->get_result();
while($row = $result->fetch_array(MYSQLI_NUM)){
  echo '<a href="docview.php?documentID=', urlencode($row[0]), '">Link<br>';
}
?>

</body>

<footer>
    <div class="card fixed-bottom">
        <div class="card-header">
            <small> &copy; Copyright 2021, Notemates Team. All Rights Reserved</small>
        </div>
    </div>

</footer>

</html>