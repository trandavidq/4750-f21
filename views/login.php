<!doctype html>
<html lang="en">
<?php include_once '../db/isLoggedIn.php'; ?>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="./styles/login.css">
  <meta name="description" content="My Page Description">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body>
  <h1>Notemates Login</h1>
  <div id="login-form">
    <form action="../db/auth.php" method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name">
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label>Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Submit</button>
    </form>
  </div>
  
</body>

</html>