<?php
    include_once 'db_settings.php';
    session_start();

    $userid = $_SESSION["userID"];
    // output headers so that the file is downloaded rather than displayed
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=courses.csv');

    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // output the column headings
    fputcsv($output, array('Courses'));

    // fetch the data
    $query = "SELECT c.courseID, c.courseName FROM takes t, Courses c WHERE t.userID = $userid AND c.courseID = t.courseID";
    $rows = mysqli_query($conn, $query) or die("Error, query not working");

    // loop over the rows, outputting them
    while ($row = mysqli_fetch_assoc($rows)) {
        fputcsv($output, $row);
    }
    exit;
?>