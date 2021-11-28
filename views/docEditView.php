<?php include_once("../db/isLoggedIn.php") ?>

<!doctype html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Profile</title>
  <link rel="stylesheet" href="./styles/docview.css">
  <meta name="Home" content="Home Page for Application">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body>
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
        </ul>
      </div>
    </div>
  </nav>

  <div class="card" style="margin-top:15px; margin-bottom:15px;">
  <div class="card-header" style="display: flex; justify: space-between;">
    <h1><b>Document Viewer</b></h1>
  </div>
  <br/>
    <br/>
    <div class="card text-left hover">
        <div class="card-body" style="background-color: #D3D3D3;">
            <div style="display: flex; justify-content: space-between;">
                <h3><b>Document Information</b></h3>
                <a href="docsearch.php">Back To Document Search</a>
            </div>
            <?php
              require_once '../db/db_settings.php';
              $userid = $_SESSION['userID'];
              if (isset($_GET["documentID"])){
                $id = $_GET["documentID"];
              }
              else {
                header("Location: ./docsearch.php");
              }
              $doc_query = "SELECT displayName, dateCreated FROM Document WHERE userID = $userid AND documentID = $id";
              $result = mysqli_query($conn, $doc_query) or die("Error, query failed");
              list($docName, $date) = mysqli_fetch_array($result);
              $course_query = "SELECT courseID FROM belongs_to WHERE userID = $userid AND documentID = $id";
              $result2 = mysqli_query($conn, $course_query) or die("Error, query failed");
              list($courseID) = mysqli_fetch_array($result2);
            ?>
            <div id="docEditForm">
                <form action="../db/docEdit.php" method="POST">
                  <input type="hidden" name="documentID" value="<?=$id?>" /> 
                    <div class="form-group">
                        <label>Course </label>
                        <input type="text" class="form-control" id="courseName" name="courseName" placeholder=<?php echo $courseID ?>>
                    </div>
                    <div class="form-group">
                        <label>Document Name </label>
                        <input type="text" class="form-control" id="docName" name="docName" placeholder=<?php echo $docName ?>>
                    </div>
                    <div style="margin-top: 10px; margin-bottom: 10px; "class="form-group">
                      <label>Date</label>
                      <input type="date" id="date" name="date" value= "09/01/2021" min="1950-01-01" max="2050-01-01"/>
                  </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Save</button>
                </form>
            </div>
            <form action="docview.php?documentID=<?php echo $id ?>">
              <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Cancel</button>
            </form>
        </div>
      </div>
      <br/>
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


