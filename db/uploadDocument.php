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
		||$ext=="XLS"||$ext=="xls"||$ext=="XLSX"||$ext=="xlsx"||$ext=="xlsm"||$ext=="XLSM"){

    //Insert Document Information
    $doc_insert_query = "INSERT INTO Document(userID, dateCreated, displayName, fileType, fileName) VALUES ($userid, '$date', '$docName', '$file_type', '$filename')";
    $result = mysqli_query($conn, $doc_insert_query) or die('Error, doc insert query failed');

    $currentDocID = mysqli_insert_id($conn);

    //Need to insert file contents into the File Table

    //first find if it's already in the file table
    $search_file_query = "SELECT * FROM File WHERE fileName = '$filename'";
    $search_result = mysqli_query($conn, $search_file_query);
    if($search_result->num_rows == 0) {
      $contents_insert_query = "INSERT INTO File(fileName, fileType, fileContents) VALUES ('$filename', '$file_type', '$content')";
      $result2 = mysqli_query($conn, $contents_insert_query) or die('Error, contents query failed');
    }

    //Need to insert course information into the belongs_to table
    $course_insert_query = "INSERT INTO belongs_to(userID, documentID, courseID) VALUES ($userid,$currentDocID,'$courseID')";
    $result3 = mysqli_query($conn, $course_insert_query) or die('Error, belongs query failed');
    }
    header("Location: ../views/docsearch.php");
    mysqli_close($conn);
    exit;
}
?>