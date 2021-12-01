<?php include_once("../db/isLoggedIn.php") ?>

<!doctype html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Profile</title>
  <link rel="stylesheet" href="../styles/profile.css">
  <meta name="Home" content="Home Page for Application">
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

  <div class="card" style="margin-top:15px; margin-bottom:15px;">
  <div class="card-header" style="display: flex; justify: space-between;">
    <h1><b>Document Viewer</b></h1>
  </div>
  <br/>
    <br/>
    <div class="card text-left hover">
        <div class="card" style="width : 58rem; margin: 0 auto; float: none; margin-bottom: 10px; margin-top: 10px; background-color: LightGray;">
            <div style="display: flex; justify-content: space-between;">
                <h3 style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;"><b>Document Information</b></h3>
                <a class="prof" href="docsearch.php">Back To Document Search</a>
            </div>
            <?php 
              include_once '../db/db_settings.php';

              if (isset($_GET['documentID'])){
                $id = $_GET['documentID'];
                $userid = $_SESSION['userID'];
                $query = "SELECT dateCreated, displayName FROM Document WHERE documentID = $id";
                $courseQuery = "SELECT courseID FROM belongs_to WHERE documentID = $id";
                $result = mysqli_query($conn,$query) or die('Error, query failed');
                list($date, $dName) = mysqli_fetch_array($result);
                $result2 = mysqli_query($conn,$courseQuery) or die('Error, query failed');
                list($courseID) = mysqli_fetch_array($result2);
              }
              else {
                header("Location: ./docsearch.php");
              }
            ?>
            <form action="docEditView.php?documentID=<?php echo $id ?>" method="post">
              <button style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px; background-color: green; border-color: green;" type="submit" class="btn btn-primary">Edit</button>
            </form>
            <form action="../db/deleteDoc.php" method="post">
              <input type="hidden" name="documentID" value="<?=$id?>" />
              <button type="submit" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px; background-color: red; border-color: red;" onclick="return confirm('Are you sure you want to delete this document?');">Delete</button>
            </form>
            <p class="prof">Course: <b><?php echo $courseID ?></b></p>
            <p class="prof">Name: <b><?php echo $dName ?></b></p>
            <p class="prof">Date: <b><?php echo $date ?></b></p>
            <form action="../db/downloadFile.php" method="post">
              <input type="hidden" name="documentID" value="<?=$id?>" />
              <button type="submit" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">Download</button>
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


