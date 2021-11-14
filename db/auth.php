<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db_settings.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    
    $authenticate_query = "SELECT * FROM User WHERE firstName= '$firstName' and lastName = '$lastName'";
    $query_result = mysqli_query($conn,$authenticate_query);
    
    
    if(mysqli_num_rows($query_result)!=0){
        if(password_verify($password,mysqli_fetch_assoc($query_result)['password'])){
            //Successful authentication
            echo 'Successfully authenticated!' . '<br>';
        }
        else{
            echo 'Found, but wrong password' . '<br>';
        }
    }    
    else{
        //User authentication unsuccessful, insert into user instead
        //Insert into User
        $insert_user_query = $conn->prepare("INSERT INTO User (password,firstName,lastName) VALUES (?,?,?);");
        //echo $hashed_password;
        $insert_user_query->bind_param("sss",$hashed_password,$firstName,$lastName);
        echo 'Registering user' . '<br>';
        $insert_user_query->execute();
        
        $select_user_query = $conn->prepare("SELECT * FROM User WHERE firstName = ? and lastName = ?  ");
        $select_user_query ->bind_param('ss',$firstName,$lastName);
        $select_user_query ->execute();
        $user_id = $select_user_query ->get_result()->fetch_assoc()['userID'];
        
        //Insert into User_email

        $insert_user_email_query = $conn->prepare("INSERT INTO User_email (userID,email) VALUES (?,?);");
        $insert_user_email_query -> bind_param('is',$user_id,$_POST['email']);
        $insert_user_email_query->execute();

        //Insert into User_phone
        if(ctype_digit($_POST['phone'])){
            //Phone number can only have digits
            $insert_user_phone_query = $conn->prepare("INSERT INTO User_phone (userID,phoneNumber) VALUES (?,?);");
            $insert_user_phone_query -> bind_param('is',$user_id,$_POST['phone']);
            $insert_user_phone_query->execute();

        }
        
    }
    $_SESSION['firstName'] = $firstName;
        
}

header('Location: ../views/home.php');
exit;

?>
