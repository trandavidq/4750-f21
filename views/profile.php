<?php
//Update User
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../db/db_settings.php';


session_start();
if (!isset($_SESSION['userID'])){
  header('Location: login.php');
  exit;
}
$loggedInID = $_SESSION['userID'];
// $sql1 = "SELECT firstName, lastName FROM User WHERE userID = '$loggedInID'";
// $user_query = mysqli_query($conn,$sql1);
// $user = mysqli_fetch_row($user_query);
?>

<!doctype html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Profile</title>
  <link rel="stylesheet" href="./styles/login.css">
  <meta name="Profile" content="View and Update your Profile">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body>
  <h1>Profile</h1>
  <div id="profile-form">
    <form action="../db/updateProfile.php" method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name" value="<?php echo $user[0]; ?>">
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name" value="<?php echo $user[1]; ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $row['email']; ?>">
      </div>
      <div class="form-group">
        <label>Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="<?php echo $row['phoneNumber']; ?>">
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Update</button>
    </form>
  </div>
  
</body>

</html>