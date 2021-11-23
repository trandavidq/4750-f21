<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db_settings.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phoneNumber'];
    $userID = $_SESSION['userID'];

    $update_user_query = $conn->prepare('UPDATE User SET firstName = ? , lastName = ? WHERE userID = ?;');
    $update_phone_query = $conn->prepare('UPDATE User_phone SET phoneNumber = ? WHERE userID = ?;');
    $update_email_query = $conn->prepare('UPDATE User_email SET email =? WHERE userID = ?');

    $update_user_query->bind_param("ssi",$firstName,$lastName,$userID);
    $update_phone_query->bind_param("si",$phoneNumber,$userID);
    $update_email_query->bind_param("si",$email,$userID);

    $update_user_query->execute();
    $update_phone_query->execute();
    $update_email_query->execute();

    //Update session variables
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
}
header('Location: ../views/editProfile.php');
?>