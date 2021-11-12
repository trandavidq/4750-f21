<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db_settings.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone'];
    
    //Update User
    $user_update_query = $conn->prepare("UPDATE Users SET firstName = '$firstName', lastName = '$lastName'");
    $user_update_query->bind_param("sss",$firstName,$lastName);
    echo 'Updating user' . '<br>';
    $user_update_query->execute();
    
    //Update User_email
    $email_update_query = $conn->prepare("UPDATE User_email SET email = '$email'");
    $email_update_query->bind_param("sss",$email);
    echo 'Updating user email' . '<br>';
    $email_update_query->execute();

    //Update User_phone
    if(ctype_digit($phoneNumber)){
        //Phone number can only have digits
        $phone_update_query = $conn->prepare("UPDATE User_phone SET phoneNumber = '$phoneNumber'");
        $phone_update_query->bind_param("sss",$email);
        echo 'Updating user phone' . '<br>';
        $phone_update_query->execute();
    }
    else{
        echo 'Invalid phone number' . '<br>';
    }
}
?>