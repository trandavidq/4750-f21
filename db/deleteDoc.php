<?php
	include_once 'db_settings.php';
    session_start();

    $id = $_POST["documentID"];
    $userid = $_SESSION['userID'];
    mysqli_begin_transaction($conn);
    try {
        $query2 = $conn->prepare("DELETE FROM belongs_to WHERE documentID = ? AND userID = ?");
        $query2->bind_param("ii", $id, $userid);
        $query2->execute();
        $query = $conn->prepare("DELETE FROM Document WHERE documentID = ? AND userID = ?");
        $query->bind_param("ii", $id, $userid);
        $query->execute();
        mysqli_commit($conn);
    } catch (mysqli_sql_exception $exception) {
        mysqli_rollback($conn);
        throw $exception;
    }
    header("Location: ../views/docsearch.php");
    mysqli_close($conn);
    exit;
?>