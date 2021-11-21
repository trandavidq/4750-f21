<?php
    session_start();
    if (!isset($_SESSION["firstName"])){
        header('Location: login.php');
        exit;
    }
    /**
     * bind
     * prepare
     * execute
     */
?>

<!doctype html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Profile</title>
  <link rel="stylesheet" href="./styles/login.css">
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
            <a class="nav-link" href="./courses.php">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Document Center</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div style="margin-left: 20px; margin-top: 20px">
    <div>
        Welcome, <?php echo $_SESSION['firstName'] ?>
    </div>
    <a href="logout.php">Logout</a>
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

