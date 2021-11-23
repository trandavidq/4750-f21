<?php
//Update User
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../db/db_settings.php';


session_start();
if (!isset($_SESSION['userID'])) {
    header('Location: login.php');
    exit;
}
$userID = $_SESSION['userID'];

?>

<!doctype html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Edit profile</title>
    <link rel="stylesheet" href="./styles/login.css">
    <meta name="Profile" content="View and Update your Profile">
    <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top" style="margin-bottom: 100px;">
        <div class="container">
            <a class="navbar-brand" href="{% url 'polls:index' %}">Notemates.</i></a>
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
                        <a class="nav-link" href="#">Document Center</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card" style="width : 58rem; margin: 0 auto; float: none; margin-bottom: 10px;">
        <h1>Edit profile:</h1>
        <form action="../db/editProfile.php" method="POST">
            <div>
                <h4>First name: </h4>
                <input type="text" name="firstName">
            </div>
            <div>           
                <h4>Last name: </h4>
                <input type="text" name="lastName">
            </div>
            <div>
                <h4>Email: </h4>
                <input type="text" name="email">
            </div>
            <div>
                <h4>Phone: </h4>
                <input type="text" name="phoneNumber">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

        



    </div>



</body>

</html>