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

<body>
  <h1>New Document</h1>
  <div id="doc-upload-form">
    <form action="../db/uploadDocument.php" method="POST">
      <div class="form-group">
        <label>Document Name</label>
        <input type="text" class="form-control" id="docName" name="docName" placeholder="Enter document name">
      </div>
      <div class="form-group">
        <label>Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject">
      </div>
      <div class="form-group">
        <label>Course Name</label>
        <input type="password" class="form-control" id="courseName" name="courseName" placeholder="Enter course name">
      </div>
      <div class="form-group">
        <label>Date</label>
        <input type="date" class="form-control" id="date" name="date" value="2021-01-01">
      </div>
      <div class="form-group">
        <label>Upload document</label>
        <input type="file" accept=".pdf,.jpg" class="form-control" id="document" name="document">
      </div>
      <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Save</button>
    </form>
  </div>
  
</body>

</html>
