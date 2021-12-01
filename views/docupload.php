<!doctype html>
<html lang="en">
<?php 
include_once("../db/isLoggedIn.php");

 ?>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Upload Document</title>
  <link rel="stylesheet" href="./styles/login.css">
  <meta name="description" content="My Page Description">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
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

  <div class="card" style="width : 58rem; margin: 0 auto; float: none; margin-bottom: 10px; margin-top: 10px; background-color: LightGray;">
  <h1>New Document</h1>
  <div id="doc-upload-form">
    <form action="../db/uploadDocument.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Document Name</label>
        <input type="text" class="form-control" id="docName" name="docName" placeholder="Enter document name">
      </div>
      <div class="form-group">
        <label>Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject">
      </div>
      <div class="form-group">
                    <label for="">Course </label>
      <select name="courseName" id="courseName">
        <?php
        //Grab course number
        require_once '../db/db_settings.php';
        $get_courseID_query = $conn->prepare("SELECT courseID, courseName FROM Courses;");
        $get_courseID_query->execute();
        $result = $get_courseID_query->get_result();
        while ($class = $result->fetch_array(MYSQLI_NUM)) {
          $optionName = $class[0] . ': ' . $class[1];
          echo "<option value = '$class[0]'> $optionName </option>";
        }
        ?>
      </select>
      </div>
      <div style="margin-top: 10px; margin-bottom: 10px; "class="form-group">
        <label>Date</label>
        <input type="date" id="date" name="date" value= "09/01/2021" min="1950-01-01" max="2050-01-01"/>
      </div>
      <div class="form-group">
        <label>Upload document</label>
        <input type="file" class="form-control" id="file" name="file">
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Save</button>
    </form>
  </div>
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
