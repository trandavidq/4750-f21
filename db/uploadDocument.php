<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db_settings.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $docName = $_POST['docName'];
    $courseID = $_POST['courseName'];
    $date = $_POST['date'];
    $userid = $_SESSION['userID'];

    $filename = $_FILES['file']['name'];
    $tmpname = $_FILES['file']['tmp_name'];
	  $file_size = $_FILES['file']['size'];
	  $file_type = $_FILES['file']['type'];
	  $ext = pathinfo($filename, PATHINFO_EXTENSION);
	
	  $fp = fopen($tmpname, 'r');
    $content = fread($fp, filesize($tmpname));
    $content = addslashes($content);
    fclose($fp);
    
    if($ext=="png"||$ext=="PNG"||$ext=="JPG"||$ext=="jpg"||$ext=="jpeg"||$ext=="JPEG"
		||$ext=="pdf"||$ext=="PDF"||$ext=="doc"||$ext=="DOC"||$ext=="docx"||$ext=="DOCX"
		||$ext=="XLS"||$ext=="xls"||$ext=="XLSX"||$ext=="xlsx"||$ext=="xlsm"||$ext=="XLSM" || $ext=="txt"){
    
    mysqli_begin_transaction($conn);
    try{
      //Insert Document Information
      $doc_insert_query = $conn->prepare("INSERT INTO Document(userID, dateCreated, displayName, fileType, fileName) VALUES (?, ?, ?, ?, ?)");
      $doc_insert_query->bind_param("issss", $userid, $date, $docName, $file_type, $filename);
      $doc_insert_query->execute();

      $currentDocID = mysqli_insert_id($conn);

      //Need to insert file contents into the File Table

      //first find if it's already in the file table
      $search_file_query = $conn->prepare("SELECT * FROM File WHERE fileName = ?");
      $search_file_query->bind_param("s", $filename);
      $search_file_query->execute();
      $search_result = $search_file_query->get_result();
      if($search_result->num_rows == 0) {
        $contents_insert_query = "INSERT INTO File(fileName, fileType, fileContents) VALUES ('$filename', '$file_type', '$content')";
        $result2 = mysqli_query($conn, $contents_insert_query) or die(mysqli_error($conn));
      }

      //Need to insert course information into the belongs_to table
      $course_insert_query = "INSERT INTO belongs_to(userID, documentID, courseID) VALUES ($userid,$currentDocID,'$courseID')";
      $result3 = mysqli_query($conn, $course_insert_query) or die('Error, belongs query failed');
      mysqli_commit($conn);
    } catch (mysqli_sql_exception $exception) {
      mysqli_rollback($conn);
      throw $exception;
    }
  }
    header("Location: ../views/docsearch.php");
    mysqli_close($conn);
    exit;
}
?>