<!doctype html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="./styles/login.css">
  <meta name="description" content="My Page Description">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body style="background-image: url(../styles/images/background.jpeg);">
  <div class="card vertical-center" style="margin: 0 auto; float: none; margin-bottom: 10px; width: 40rem;">
  <h1 style="margin-left: 10px; margin-top: 10px;">Notemates.</h1>
  <div id="login-form" style="margin-left: 10px; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;">
    <form action="../db/auth.php" method="POST">
      <div class="form-group" style="margin-top: 10px">
        <label>First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name">
      </div>
      <div class="form-group" style="margin-top: 10px">
        <label>Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name">
      </div>
      <div class="form-group" style="margin-top: 10px">
        <label>Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
      </div>
      <div class="form-group" style="margin-top: 10px">
        <label>Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
      </div>
      <div class="form-group" style="margin-top: 10px">
        <label>Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 40px;">Submit</button>
    </form>
  </div>
  </div>
  
</body>

</html>