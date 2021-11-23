<?php
//NOTE: This only works on my version of the database, you will need to insert the appropriate entries into
//the file table to get this working
	include_once 'db_settings.php';

    $query = "SELECT * " .
            "FROM FILE WHERE fileName = 'testFile2'";
    $result = mysqli_query($conn,$query) or die('Error, query failed');
    list($fileName, $fileType, $fileContents) = mysqli_fetch_array($result);
    header("Content-type: $fileType");
    header("Content-Disposition: attachment; filename=$fileName");
    ob_clean();
    flush();
    echo $fileContents;
    mysqli_close($conn);
    exit;

?>