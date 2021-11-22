<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db_settings.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $docName = $_POST['docName'];
    $subject = $_POST['subject'];
    $courseName = $_POST['courseName'];
    $date = $_POST['date'];
    $document = $_POST['document'];

    //Insert Document
    $doc_insert_query = $conn->prepare("INSERT INTO Documents(docName, subject, courseName, date, document) VALUES (?, ?, ?, ?, ?)");
    $doc_insert_query->bind_param("sssss",$docName,$subject,$courseName,$date,$document); //type for document shouldn't be s
    echo 'Inserting document' . '<br>';
    $user_update_query->execute();
}
?>