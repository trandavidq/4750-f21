<?php include_once("../db/isLoggedIn.php") ?>
<?php include_once("../db/dummyDoc.php") ?>

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
      <a class="navbar-brand" href="{% url 'polls:index' %}">Notemates.</i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Document Center</a>
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
            <form action="./docEditView.php">
              <button type="submit" class="btn btn-primary" style="margin-top: 10px; background-color: green; border-color: green;">Edit</button>
            </form>
            <form action="../db/deleteDoc.php">
              <button type="submit" class="btn btn-primary" style="margin-top: 10px; background-color: red; border-color: red;" onclick="return confirm('Are you sure you want to delete this document?');">Delete</button>
            </form>
            <p style="margin-top: 20px;">Subject: <?php echo $_SESSION['selectedSubject'] ?></p>
            <p>Course: <?php echo $_SESSION['selectedCourse'] ?></p>
            <p>Name: <?php echo $_SESSION['selectedName'] ?></p>
            <p>Date: <?php echo $_SESSION['selectedDate'] ?></p>
            <form action="../db/downloadFile.php">
              <button type="submit" class="btn btn-primary">Download</button>
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


